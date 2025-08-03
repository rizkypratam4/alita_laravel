<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperatorController extends Controller
{
    public function index()
    {

        return view('operators.index');
    }

    public function markComplete(string $id)
    {
        $operator = Operator::find($id);

        if (!$operator) {
            return redirect()->back()->with('alert', 'Data operator tidak ditemukan.');
        }

        $updated = $operator->update([
            'status_production' => true,
            'tanggal_selesai' => now(),
            'waktu_selesai' => now(),
            'creator_id' => Auth::id(),
        ]);

        if ($updated) {
            return redirect()->back()->with('notice', 'Produksi selesai, data telah diperbarui.');
        } else {
            return redirect()->back()->with('alert', 'Gagal menyelesaikan produksi.');
        }
    }

    public function markPending(string $id)
    {
        $operator = Operator::find($id);

        if (!$operator) {
            return redirect()->back()->with('alert', 'Data operator tidak ditemukan.');
        }

        $updated = $operator->update([
            'status_production' => false,
            'tanggal_selesai' => now(),
            'waktu_selesai' => now(),
            'creator_id' => Auth::id(),
        ]);

        if ($updated) {
            return redirect()->back()->with('pending', 'Produksi pending, data telah alihkan ke halaman reschedule.');
        } else {
            return redirect()->back()->with('alert', 'Gagal menyelesaikan produksi.');
        }
    }
}
