<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;


class MattrasController extends Controller
{
    public function index()
    {
        $operators = Operator::with('finishGoodSchedule')
            ->whereNull('status_production')
            ->orderBy('finishGoodSchedule.priority', 'asc')
            ->orderBy('finishGoodSchedule.name')
            ->paginate(10);

        return view('operators.mattras', compact('operators'));
    }

    public function markComplete(Operator $operator)
    {
        $operator->status_production = 'complete';
        $operator->save();

        return redirect()->back()->with('success', 'Status produksi ditandai sebagai selesai.');
    }

    public function markPending(Operator $operator)
    {
        $operator->status_production = 'pending';
        $operator->save();

        return redirect()->back()->with('warning', 'Status produksi ditandai sebagai pending.');
    }
}
