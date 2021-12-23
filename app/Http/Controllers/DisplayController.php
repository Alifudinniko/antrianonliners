<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nomer;

class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesiberapa = 1;

        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-m-Y');
        // Poli Gigi
        $dpg = Nomer::where('date', date('Y-m-d'))->where('poli_id', 22)->where('sesi_id', 1)->where('status', 0)->first();

        // $check = $this->checknomer();

        // if ($check) {
        //     $todaypg = Nomer::where('date', date('Y-m-d'))->where('poli_id', 22)->where('sesi_id', 1)->where('status', 0)->get();

        //     $sesipg = $dpg->no;
        // }
        $todaypg = Nomer::where('date', date('Y-m-d'))->where('poli_id', 22)->where('sesi_id', 1)->where('status', 0)->get();
        // dd($todaypg);

        // $sesipg = $dpg->no;
        $sesipg = 0;
        if ($dpg == null) {
            $sesipg == 0;
        } else {
            $sesipg = $dpg->no;
        }

        // return view('admins.antrians.display', compact('sesipg', 'dpg', 'todaypg'))->with('message', 'Tidak ada antrian !');



        // Poli Umum
        $dpu = Nomer::where('date', date('Y-m-d'))->where('poli_id', 23)->where('sesi_id', 1)->where('status', 0)->first();
        $todaypu = Nomer::where('date', date('Y-m-d'))->where('poli_id', 23)->where('sesi_id', 1)->where('status', 0)->get();
        // $sesipu = $dpu->no;
        $sesipu = 0;
        if ($dpu == null) {
            $sesipu == 0;
        } else {
            $sesipu = $dpu->no;
        }

        // Poli Anak
        $dpa = Nomer::where('date', date('Y-m-d'))->where('poli_id', 24)->where('sesi_id', 1)->where('status', 0)->first();
        $todaypa = Nomer::where('date', date('Y-m-d'))->where('poli_id', 24)->where('sesi_id', 1)->where('status', 0)->get();
        $sesipa = 0;
        if ($dpa == null) {
            $sesipa == 0;
        } else {
            $sesipa = $dpa->no;
        }

        //Poli Mata
        $dpm = Nomer::where('date', date('Y-m-d'))->where('poli_id', 25)->where('sesi_id', 1)->where('status', 0)->first();
        $todaypm = Nomer::where('date', date('Y-m-d'))->where('poli_id', 25)->where('sesi_id', 1)->where('status', 0)->get();
        $sesipm = 0;
        if ($dpm == null) {
            $sesipm == 0;
        } else {
            $sesipm = $dpm->no;
        }

        // Poli Saraf
        $dps = Nomer::where('date', date('Y-m-d'))->where('poli_id', 26)->where('sesi_id', 1)->where('status', 0)->first();
        $todayps = Nomer::where('date', date('Y-m-d'))->where('poli_id', 26)->where('sesi_id', 1)->where('status', 0)->get();
        // $sesips = $dps->no;
        $sesips = 0;
        if ($dps == null) {
            $sesips == 0;
        } else {
            $sesips = $dps->no;
        }




        return view('admins.antrians.display', compact('tanggal', 'sesiberapa', 'sesipg', 'dpg', 'todaypg', 'sesipa', 'dpa', 'todaypa', 'sesipu', 'dpu', 'todaypu', 'sesips', 'dps', 'todayps', 'sesipm', 'dpm', 'todaypm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checknomer()
    {
        return Nomer::orderby('id', 'desc')
            ->where('user_id', 22)
            ->where('status', 1)
            ->whereDate('created_at', date('Y-m-d'))
            ->exists();
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function show($id)
    {
        $sesiberapa = $id;

        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('d-m-Y');
        // dd($tanggal);
        // Poli Gigi
        $dpg = Nomer::where('date', date('Y-m-d'))->where('poli_id', 22)->where('sesi_id', $id)->where('status', 0)->first();
        $dpg2 = Nomer::where('date', date('Y-m-d'))->where('poli_id', 22)->where('sesi_id', $id)->where('status', 1)->latest()->first();
        // dd($dpg2);

        $todaypg = Nomer::where('date', date('Y-m-d'))->where('poli_id', 22)->where('sesi_id', $id)->where('status', 0)->get();
        // dd($todaypg);

        $sesipg = 0;
        if ($dpg2 == null) {
            $sesipg == 0;
        } else {
            $sesipg = $dpg2->no;
        }


        // $sesipg = $dpg2->no;
        if ($dpg == null) {
            $sesipg == 0;
        } else {
            $sesipg = $dpg->no;
        }

        // return view('admins.antrians.display', compact('sesipg', 'dpg', 'todaypg'))->with('message', 'Tidak ada antrian !');



        // Poli Umum
        $dpu = Nomer::where('date', date('Y-m-d'))->where('poli_id', 23)->where('sesi_id', $id)->where('status', 0)->first();
        $dpu2 = Nomer::where('date', date('Y-m-d'))->where('poli_id', 23)->where('sesi_id', $id)->where('status', 1)->latest()->first();


        $todaypu = Nomer::where('date', date('Y-m-d'))->where('poli_id', 23)->where('sesi_id', $id)->where('status', 0)->get();

        $sesipu = 0;
        if ($dpu2 == null) {
            $sesipu == 0;
        } else {
            $sesipu = $dpu2->no;
        }

        // $sesipu = 0;
        if ($dpu == null) {
            $sesipu == 0;
        } else {
            $sesipu = $dpu->no;
        }

        // Poli Anak
        $dpa = Nomer::where('date', date('Y-m-d'))->where('poli_id', 24)->where('sesi_id', $id)->where('status', 0)->first();
        $dpa2 = Nomer::where('date', date('Y-m-d'))->where('poli_id', 24)->where('sesi_id', $id)->where('status', 1)->latest()->first();
        $todaypa = Nomer::where('date', date('Y-m-d'))->where('poli_id', 24)->where('sesi_id', $id)->where('status', 0)->get();
        $sesipa = 0;
        if ($dpa2 == null) {
            $sesipa == 0;
        } else {
            $sesipu = $dpa2->no;
        }
        if ($dpa == null) {
            $sesipa == 0;
        } else {
            $sesipa = $dpa->no;
        }

        //Poli Mata
        $dpm = Nomer::where('date', date('Y-m-d'))->where('poli_id', 25)->where('sesi_id', $id)->where('status', 0)->first();
        $dpm2 = Nomer::where('date', date('Y-m-d'))->where('poli_id', 25)->where('sesi_id', $id)->where('status', 1)->latest()->first();
        $todaypm = Nomer::where('date', date('Y-m-d'))->where('poli_id', 25)->where('sesi_id', $id)->where('status', 0)->get();
        $sesipm = 0;
        if ($dpm2 == null) {
            $sesipm == 0;
        } else {
            $sesipm = $dpm2->no;
        }
        if ($dpm == null) {
            $sesipm == 0;
        } else {
            $sesipm = $dpm->no;
        }

        // Poli Saraf
        $dps = Nomer::where('date', date('Y-m-d'))->where('poli_id', 26)->where('sesi_id', $id)->where('status', 0)->first();
        $dps2 = Nomer::where('date', date('Y-m-d'))->where('poli_id', 26)->where('sesi_id', $id)->where('status', 0)->latest()->first();
        $todayps = Nomer::where('date', date('Y-m-d'))->where('poli_id', 26)->where('sesi_id', $id)->where('status', 0)->get();
        // $sesips = $dps->no;
        $sesips = 0;
        if ($dps2 == null) {
            $sesips == 0;
        } else {
            $sesips = $dps2->no;
        }
        if ($dps == null) {
            $sesips == 0;
        } else {
            $sesips = $dps->no;
        }




        return view('admins.antrians.display', compact('tanggal', 'sesiberapa', 'sesipg', 'dpg', 'todaypg', 'sesipa', 'dpa', 'todaypa', 'sesipu', 'dpu', 'todaypu', 'sesips', 'dps', 'todayps', 'sesipm', 'dpm', 'todaypm'));
    }
}
