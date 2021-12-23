<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Time;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $jadwalku = Jadwal::latest()->where('user_id', auth()->user()->id)->get();

        return view('admins.jadwal.index', compact('jadwalku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|unique:jadwals,date,NULL,id,user_id,' . \Auth::id(),
            'time' => 'required'
        ]);
        // dd($request->all());
        $jadwal = Jadwal::create([
            'user_id' => auth()->user()->id,
            'date' => $request->date,
        ]);
        // dd($jadwal->id);
        foreach ($request->time as $time) {
            Time::create([
                'jadwal_id' => $jadwal->id,
                'time' => $time,
                'status' => '0',
            ]);
        }
        return redirect()->back()->with('message', 'Jadwal berhasil dibuat untuk' . $request->date);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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

    public function check(Request $request)
    {

        $date = $request->date;
        $jadwal = Jadwal::where('date', $date)->where('user_id', auth()->user()->id)->first();
        if (!$jadwal) {
            return redirect()->to('/jadwal')->with('errmessage', 'Tidak ada jadwal untuk tanggal  ' . $request->date);
        }
        $jadwalId = $jadwal->id;
        $times = Time::where('jadwal_id', $jadwalId)->get();

        // return $times;


        return view('admins.jadwal.index', compact('times', 'jadwalId', 'date'));
    }

    public function updateTime(Request $request)
    {
        // return "ok";
        $jadwalId = $request->jadwalId;
        $jadwal = Time::where('jadwal_id', $jadwalId)->delete();
        foreach ($request->time as $time) {
            Time::create([
                'jadwal_id' => $jadwalId,
                'time' => $time,
                'status' => 0
            ]);
        }
        return redirect()->route('jadwal.index')->with('message', 'Jadwal berhasil dirubah !');
    }
}
