<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now();

        $pendingElections = Election::where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->get();

        $upcomingElections = Election::where('start_date', '>', $now)
            ->get();

        $finishedElections = Election::where('end_date', '<', $now)
            ->orderBy('end_date', 'desc')
            ->get();

        if ($finishedElections->count() > 5) {
            $oldestElection = $finishedElections->last();
            $oldestElection->delete();
        }

        return view('dashboard', [
            'pendingElections' => $pendingElections,
            'upcomingElections' => $upcomingElections,
            'finishedElections' => $finishedElections->take(5),
        ]);
    }
}
