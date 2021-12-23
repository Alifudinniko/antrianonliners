<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sesi;
use App\Nomer;
use Illuminate\Support\Facades\DB;
use App\Dokter;

class SesisController extends Controller
{
    public function index()
    {
        $sesi = Sesi::orderby('date', 'desc')->where('user_id', auth()->user()->id)->get();
        $jumlahpasien = Sesi::where(
            ['sesi_id', '=', '$sesi->sesi_id'],
            ['date', '=', '$sesi->date'],
            ['dokter_id', '=', '$sesi->id_dokter'],
            ['poli_id', '=', '$sesi->id_user'],

        );


        return view('admins.sesi.index', compact('sesi'));
    }
    public function create()
    {
        return view('admins.sesi.create');
    }
    public function store(Request $request)
    {

        date_default_timezone_set('Asia/Jakarta');

        // if ($request->dokter_id == '0') {
        //     return redirect()->back()->with('message', 'Belum masukin dokter yaa');
        // }

        $this->validate($request, [
            'date' => 'required',
            'dokter_id' => 'required',
            'sesi' => 'required',


        ]);

        Sesi::create([
            'user_id' => auth()->user()->id,
            'dokter_id' => $request->dokter_id,
            'date' => $request->date,
            'sesi' => $request->sesi,
            'status' => 0,


        ]);


        $isi = array([$request->max]);
        $sesi = $request->sesi;
        $dokter = $request->dokter_id;
        $namadokter = Dokter::where('id', 'dokter_id');
        return redirect()->back()->with('message', ' Yey ! Jadwal berhasil dibuat untuk ' . $request->date . ' Sesi: ' . $request->sesi);
    }
    public function edit($id)
    {
        $sesy = Sesi::find($id);

        return view('admins.sesi.edit',  compact('sesy'));
    }

    public function update(Request $request, $id)
    {

        // $this->validate($request, [
        //     'status' => 'required'
        // ]);

        $sesyi = Sesi::find($id);
        $sesyi->status = $request->status;
        $sesyi->save();


        return redirect()->route('sesi.index');
    }
    public function update2(Request $request, $id)
    {


        $sesyi = Sesi::find($id);
        $sesyi->status = 0;
        $sesyi->save();


        return redirect()->route('sesi.index');
    }
    public function destroy($id)
    {
        $asesi = Sesi::find($id);
        $asesi->delete();
        return redirect()->route('sesi.index')->with('Sesi', 'berhasil dihapus');
    }
    public function checksesin()
    {
        return Sesi::orderby('id', 'desc')
            ->where('sesi', 'sesi')
            ->where('date', 'date')
            ->exists();
    }
    public function toggleStatus($id)
    {
        $sesii = Sesi::find($id);
        $sesii->status = !$sesii->status;
        $sesii->save();
        return redirect()->back();
    }
}
