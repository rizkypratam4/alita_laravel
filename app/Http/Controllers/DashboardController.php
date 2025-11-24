<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
use App\Models\Asset;
use App\Models\Operator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $productionTrend = $this->getProductionTrend();

        return view('dashboard', array_merge(
            compact('user'),
            [
                'title' => 'Dashboard',
                'finishGoodTahunan' => $this->getFinishGoodTahunan(),
                'wipScheduleTahunan' => $this->getWipScheduleTahunan(),
                'totalUsers' => $this->getTotalUsers(),
                'totalMesinProduksi' => $this->getTotalMesinProduksi(),
                'finishGoodHariIni' => $this->getFinishGoodHariIni(),
                'wipHariIni' => $this->getWipHariIni(),
                'finishGoodHariIniList' => $this->getFinishGoodListHariIni(),
                'wipScheduleHariIniList' => $this->getWipScheduleHariIniList(),
            ],
            $this->getProductionTrend()
        ));
    }

    private function getFinishGoodTahunan()
    {
        $oneYearAgo = Carbon::now()->subYear();

        return Operator::where('status_production', true)
            ->whereNotNull('finish_good_schedule_id')
            ->where('created_at', '>=', $oneYearAgo)
            ->count('finish_good_schedule_id');
    }

    private function getWipScheduleTahunan()
    {
        $oneYearAgo = Carbon::now()->subYear();

        return Operator::where('status_production', true)
            ->whereNotNull('wip_schedule_id')
            ->where('created_at', '>=', $oneYearAgo)
            ->count('wip_schedule_id');
    }

    private function getTotalUsers()
    {
        return User::count();
    }

    private function getTotalMesinProduksi()
    {
        return Asset::where('status', false)->count();
    }

    private function getFinishGoodHariIni()
    {
        $today = Carbon::today();

        return Operator::where('status_production', true)
            ->whereNotNull('finish_good_schedule_id')
            ->whereDate('tanggal_selesai', $today)
            ->count();
    }


    private function getWipHariIni()
    {
        $today = Carbon::today();

        return Operator::where('status_production', true)
            ->whereNotNull('wip_schedule_id')
            ->whereDate('tanggal_selesai', $today)
            ->count('wip_schedule_id');
    }

    private function getFinishGoodListHariIni()
    {
        $today = Carbon::today();

        $grouped = Operator::where('status_production', true)
            ->whereNotNull('finish_good_schedule_id')
            ->whereDate('tanggal_selesai', $today)
            ->with('finishGoodSchedule')
            ->get()
            ->groupBy('finish_good_schedule_id')
            ->map(function ($group) {
                $first = $group->first();
                return (object) [
                    'item_number' => $first->finishGoodSchedule->item_number ?? '-',
                    'name' => $first->finishGoodSchedule->name ?? '-',
                    'total_amount' => $group->count(),
                ];
            })

            ->values();


        $perPage = 10;
        $currentPage = request()->input('page_finish', 1);
        $pagedData = $grouped->slice(($currentPage - 1) * $perPage, $perPage)->values();

        return new \Illuminate\Pagination\LengthAwarePaginator(
            $pagedData,
            $grouped->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'pageName' => 'page_finish']
        );
    }


    private function getWipScheduleHariIniList()
    {
        $today = Carbon::today();

        $grouped = Operator::where('status_production', true)
            ->whereNotNull('wip_schedule_id')
            ->whereDate('tanggal_selesai', $today)
            ->with('wipSchedule')
            ->get()
            ->groupBy('wip_schedule_id')
            ->map(function ($group) {
                $first = $group->first();
                return (object) [
                    'name' => $first->wipSchedule->name ?? '-',
                    'kategori' => $first->wipSchedule->kategori ?? '-',
                    'total_amount' => $group->count(),
                ];
            })
            ->values();

        $perPage = 10;
        $currentPage = request()->input('page', 1);
        $pagedData = $grouped->slice(($currentPage - 1) * $perPage, $perPage)->values();

        return new \Illuminate\Pagination\LengthAwarePaginator(
            $pagedData,
            $grouped->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }


    private function getProductionTrend()
    {
        $now = Carbon::now();
        $oneWeekAgo = $now->copy()->subDays(7);
        $oneMonthAgo = $now->copy()->subDays(30);

        return [
            'weeklyFinishGood' => Operator::whereNotNull('finish_good_schedule_id')
                ->where('status_production', true)
                ->whereBetween('updated_at', [$oneWeekAgo, $now])
                ->count(),

            'weeklyWip' => Operator::whereNotNull('wip_schedule_id')
                ->where('status_production', true)
                ->whereBetween('updated_at', [$oneWeekAgo, $now])
                ->count(),

            'monthlyFinishGood' => Operator::whereNotNull('finish_good_schedule_id')
                ->where('status_production', true)
                ->whereBetween('updated_at', [$oneMonthAgo, $now])
                ->count(),

            'monthlyWip' => Operator::whereNotNull('wip_schedule_id')
                ->where('status_production', true)
                ->whereBetween('updated_at', [$oneMonthAgo, $now])
                ->count()
        ];
    }
}
