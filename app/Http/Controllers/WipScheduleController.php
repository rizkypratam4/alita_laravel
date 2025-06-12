<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Models\WipSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WipScheduleController extends Controller
{
     public function index()
    {
        $finish_good_schedules = WipSchedule::whereNull('schedule_status')
                                ->orderBy('priority', 'asc')
                                ->paginate(10);

        return view('finish_good_schedules.index', compact('finish_good_schedules'));

    }

    public function create()
    {
        return view('finish_good_schedules.new', ['title' => 'Finish Good']);
    }


    public function store(WipScheduleRequest $request)
    {
        try {
            $validated = $request->validated();
            $finishGood = WipSchedule::create($validated);

            for ($i = 0; $i < $finishGood->quantity; $i++) {
                Operator::create([
                    'finish_good_schedule_id' => $finishGood->id,
                ]);
            }

            return redirect()->route('finish_good_schedules.index')
                            ->with('success', 'Data berhasil disimpan dan operator telah dibuat.');
        } catch (\Exception $e) {
            return back()->withInput()
                        ->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }


    public function import(Request $request)
    {
        $file = $request->file('file');

        if (!$file) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        try {
            $data = Excel::toCollection(null, $file)[0];
            $header = $data[0];

            DB::beginTransaction();

            for ($i = 1; $i < $data->count(); $i++) {
                $row = array_combine($header->toArray(), $data[$i]->toArray());

                $cleaned = collect($row)->map(fn($v) => is_string($v) ? trim($v) : $v);

                $fg = WipSchedule::create([
                    'item_number' => $cleaned['ITEM NUMBER'],
                    'name'        => $cleaned['NAMA BARANG 1'],
                    'keterangan'  => $cleaned['NAMA BARANG 2'],
                    'quantity'    => (int) $cleaned['QTY'],
                    'priority'    => (int) $cleaned['PRIORITY'],
                ]);

                for ($j = 0; $j < (int) $cleaned['QTY']; $j++) {
                    Operator::create([
                        'finish_good_schedule_id' => $fg->id,
                        'status_production' => null,
                        'tanggal_selesai' => null,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('finish_good_schedules.index')->with('success', 'Data berhasil diimport.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Import error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat import: ' . $e->getMessage());
        }
    }

    public function clearAll(Request $request)
    {
        $finishGoods = WipSchedule::with('operators')
            ->whereNull('schedule_status')
            ->get();

        foreach ($finishGoods as $finishGood) {
            $finishGood->update(['schedule_status' => true]);

            foreach ($finishGood->operators as $operator) {
                if ($operator->status_production !== true && $operator->status_production !== false) {
                    $finishGood->operators()->whereNull('status_production')->delete();
                    break;
                }
            }
        }

    return redirect()->route('finish_good_schedules.index')
                     ->with('success', 'Data berhasil dihapus');
    }

    public function deleteSelected(Request $request)
    {
        $ids = $request->input('finish_good_schedule_ids', []);

        if (empty($ids)) {
            return redirect()->route('finish_good_schedules.index')->with('error', 'Tidak ada data yang dipilih.');
        }

        WipSchedule::whereIn('id', $ids)->delete();

        return redirect()->route('finish_good_schedules.index')->with('success', 'Data berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;

        $finish_good_schedules = WipSchedule::where('item_number', 'like', "%$keyword%")
            ->orWhere('name', 'like', "%$keyword%")
            ->orWhere('keterangan', 'like', "%$keyword%")
            ->orWhere('quantity', 'like', "%$keyword%")
            ->paginate(10);

        // return partial view
        return view('finish_good_schedules._table', compact('finish_good_schedules'))->render();
    }
}
