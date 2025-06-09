<?php

namespace App\Http\Controllers;

use App\Models\WipSchedule;
use Illuminate\Http\Request;

class WipScheduleController extends Controller
{
    public function index()
    {
        $wip_schedules = WipSchedule::whereNull('schedule_status')
                                ->orderBy('priority', 'asc')
                                ->paginate(10);

        return view('wip_schedules.index', compact('wip_schedules'));

    }
}
