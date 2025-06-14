<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;


class MattrasController extends Controller
{
    public function index()
    {
       $operators = Operator::with('finishGoodSchedule')
                            ->join('finish_good_schedules', 'operators.finish_good_schedule_id', '=', 'finish_good_schedules.id')
                            ->whereNull('operators.status_production')
                            ->orderBy('finish_good_schedules.priority', 'asc')
                            ->orderBy('finish_good_schedules.name', 'asc')
                            ->select('operators.*')
                            ->paginate(10);

        return view('operators.mattras', compact('operators'));
    }
}
