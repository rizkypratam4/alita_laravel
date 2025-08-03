<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GussetController extends Controller
{
    public function index(Request $request)
    {
        $operators = Operator::with('wipSchedule')
            ->leftJoin('wip_schedules', 'operators.wip_schedule_id', '=', 'wip_schedules.id')
            ->whereNull('operators.status_production')
            ->where('wip_schedules.kategori', 'gusset')
            ->where('wip_schedules.area_id', Auth::user()->area_id)
            ->where('wip_schedules.work_place_id', Auth::user()->work_place_id)
            ->orderBy('wip_schedules.priority', 'asc')
            ->orderBy('wip_schedules.name', 'asc')
            ->select('operators.*')
            ->paginate(10);

        return view('operators.gusset', compact('operators'));
    }
}
