<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Models\WipSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\WipScheduleRequest;

class WipScheduleController extends Controller
{
    public function index()
    {
        $wip_schedules = WipSchedule::whereNull('schedule_status')
            ->where('area_id', Auth::user()->area_id)
            ->where('work_place_id', Auth::user()->work_place_id)
            ->orderBy('priority', 'asc')
            ->paginate(10);

        return view('wip_schedules.index', compact('wip_schedules'));
    }

    public function create()
    {
        return view('wip_schedules.new', ['title' => 'Finish Good']);
    }

    public function store(WipScheduleRequest $request)
    {
        try {
            $validated = $request->validated();
            $validated['area_id'] = Auth::user()->area_id;
            $validated['work_place_id'] = Auth::user()->work_place_id;

            $wip = WipSchedule::create($validated);


            for ($i = 0; $i < $wip->qty; $i++) {
                Operator::create([
                    'wip_schedule_id' => $wip->id,
                ]);
            }

            return redirect()->route('wip_schedules.index')
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
            $user = Auth::user();

            for ($i = 1; $i < $data->count(); $i++) {
                $row = array_combine($header->toArray(), $data[$i]->toArray());

                $cleaned = collect($row)->map(fn($v) => is_string($v) ? trim($v) : $v);

                $wip = WipSchedule::create([
                    'name' => $cleaned['WIP_name'],
                    'qty'  => $cleaned['WIP_qty'],
                    'priority'  => $cleaned['WIP_priority'],
                    'kategori'  => $cleaned['WIP_kategori'],
                    'area_id' => $user->area_id,
                    'work_place_id' => $user->work_place_id,
                ]);

                for ($j = 0; $j < (int) $cleaned['WIP_qty']; $j++) {
                    Operator::create([
                        'wip_schedule_id' => $wip->id,
                        'status_production' => null,
                        'tanggal_selesai' => null,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('wip_schedules.index')->with('success', 'Data berhasil diimport.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Import error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat import: ' . $e->getMessage());
        }
    }

    public function clearAll(Request $request)
    {
        $wips = WipSchedule::with('operators')
            ->whereNull('schedule_status')
            ->get();

        foreach ($wips as $wip) {
            $wip->update(['schedule_status' => true]);

            foreach ($wip->operators as $operator) {
                if ($operator->status_production !== true && $operator->status_production !== false) {
                    $wip->operators()->whereNull('status_production')->delete();
                    break;
                }
            }
        }

        return redirect()->route('wip_schedules.index')
            ->with('success', 'Data berhasil dihapus');
    }

    public function deleteSelected(Request $request)
    {
        $ids = $request->input('wip_schedule_ids', []);

        if (empty($ids)) {
            return redirect()->route('wip_schedules.index')->with('error', 'Tidak ada data yang dipilih.');
        }

        WipSchedule::whereIn('id', $ids)->delete();

        return redirect()->route('wip_schedules.index')->with('success', 'Data berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;

        $wip_schedules = WipSchedule::where('name', 'like', "%$keyword%")
            ->orWhere('qty', 'like', "%$keyword%")
            ->orWhere('priority', 'like', "%$keyword%")
            ->orWhere('kategori', 'like', "%$keyword%")
            ->paginate(10);

        return view('wip_schedules._table', compact('wip_schedules'))->render();
    }
}
