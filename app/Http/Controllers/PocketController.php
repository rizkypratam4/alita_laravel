<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;

class PocketController extends Controller
{
    public function index(Request $request)
    {
        $operators = Operator::with('wipSchedule')
                                ->leftJoin('wip_schedules', 'operators.wip_schedule_id', '=', 'wip_schedules.id')
                                ->whereNull('operators.status_production')
                                ->where('wip_schedules.kategori', 'pocket')
                                ->orderBy('wip_schedules.priority', 'asc')
                                ->orderBy('wip_schedules.name', 'asc')
                                ->select('operators.*')
                                ->paginate(10);

        return view('operators.panel', compact('operators'));
    }
}
