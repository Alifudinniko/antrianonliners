<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Nomer;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->role->name == 'pasien') {
            return view('home');
        }

        if (Auth::user()->role->name == 'officer') {
            $users = Nomer::select(\DB::raw("COUNT(*) as count"))
                ->where('poli_id',  auth()->user()->id)
                ->whereYear('created_at', date('Y'))
                ->groupBy(\DB::raw("Day(date)"))
                ->pluck('count');
            $isi = [];
            foreach ($users as $atas) {
                $isi[] = $atas;
            }
            // dd($users);
            $categories2 = Nomer::all()->groupBy('date');
            // dd($categories);
            $datee = Nomer::select('date')
                ->where('poli_id',  auth()->user()->id)
                ->whereYear('date', date('Y'))
                ->groupBy('date')
                ->pluck('date');


            return view('admins.layouts.dashboard2', compact('users', 'datee', 'isi'));
        }

        $users = Nomer::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Day(date)"))
            ->pluck('count');
        $datee = Nomer::select('date')
            ->whereYear('created_at', date('Y'))
            ->groupBy('date')
            ->pluck('date');
        // return view('chart', compact('users'));
        return view('admins.layouts.dashboard', compact('users', 'datee'));
    }
}
