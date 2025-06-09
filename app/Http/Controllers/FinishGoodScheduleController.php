<?php

namespace App\Http\Controllers;

use App\Models\FinishGoodSchedule;
use Illuminate\Http\Request;

class FinishGoodScheduleController extends Controller
{
    public function index()
    {
        $finish_good_schedules = FinishGoodSchedule::whereNull('schedule_status')
                                ->orderBy('priority', 'asc')
                                ->paginate(10);

        return view('finish_good_schedules.index', compact('finish_good_schedules'));

    }
}
