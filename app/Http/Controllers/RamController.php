<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;

class RamController extends Controller
{
    public function index(Request $request)
    {
        $operators = Operator::with('wipSchedule')
                                ->leftJoin('wip_schedules', 'operators.wip_schedule_id', '=', 'wip_schedules.id')
                                ->whereNull('operators.status_production')
                                ->where('wip_schedules.kategori', 'ram')
                                ->orderBy('wip_schedules.priority', 'asc')
                                ->orderBy('wip_schedules.name', 'asc')
                                ->select('operators.*')
                                ->paginate(10);

        return view('operators.ram', compact('operators'));
    }
}
