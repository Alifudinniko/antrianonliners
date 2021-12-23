<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Antrian;
use App\Dokter;
use App\Poly;
use App\Jadwal;
use App\Sesi;
use App\Nomer;
use Illuminate\Support\Facades\DB;
use Dompdf\Adapter\PDFLib;
use PDF;

class FrontendController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        // dd(date('Y-m-d'));
        $polii = Sesi::where('date', date('Y-m-d'))->where('status', 0)->get();
        // return $dokter;
        if (request('date')) {
            $polys = DB::table('polys')->get();
            $polii = $this->findPolisBasedOnDate(request('date'))->where('status', 0);

            return view('welcomeee', compact('polys', 'polii'));
        }
        //antrian hari today
        $polys = DB::table('polys')->get();
        return view('welcomeee', compact('polys', 'polii'));
    }
    public function show($poly_id)
    {
        $id_poly = $poly_id;
        $poly = Poly::where('id', $poly_id)->first();
        $antrian = Antrian::where('id_poly', $poly_id);


        return view('antrian', compact('poly', 'id_poly'));
    }

    public function tiket(Request $request, $id_user, $id_dokter, $date, $sesi)
    {
        date_default_timezone_set('Asia/Jakarta');
        // $check1 = $this->checknomer();
        $check = $this->checkmax();
        // dd($check1);

        if (
            Nomer::orderby('id', 'desc')
            ->where('user_id', auth()->user()->id)
            ->where('date', date('Y-m-d'))
            ->where('dokter_id', $id_dokter)
            ->where('poli_id', $id_user)
            ->where('sesi_id', $sesi)
            ->where('status', '0')
            ->exists()
        ) {
            return redirect()->back()->with('message', 'Kamu udah mengantri untuk ini, cek antrianmu yaa');
        }



        $nomerk =  DB::table('nomers')->where(
            [
                ['sesi_id', '=', $sesi],
                ['date', '=', $date],
                ['dokter_id', '=', $id_dokter],
                ['poli_id', '=', $id_user],

            ]
        )->latest()->select('no')->max('no');

        Nomer::create([
            'user_id' =>  auth()->user()->id,
            'dokter_id' =>  $id_dokter,
            'date' => $date,
            'sesi_id' => $sesi,
            'status' => 0,
            'poli_id' => $id_user,
            'no' => $nomerk + 1,
        ]);

        //send email notification
        // $NamaDokter = Dokter::where('id', $request->id_dokter)->first();
        // $mailData = [
        //     'name' => auth()->user()->name,
        //     'time' => $request->time,
        //     'date' => $request->date,
        //     'namadokter' => $NamaDokter->name

        // ];

        return redirect()->route('my.antrian')->with('message', 'Berhasil mengantri !!');
    }
    public function store(Request $request)
    {
        $check = $this->checkantrian();

        if ($check) {
            return redirect()->back()->with('message', 'Kamu udah mengantri poli ini check homepage mu yaa');
        }
        Antrian::create([
            'id_user' => auth()->user()->id,
            'id_poly' => $request->id_poly,
            'status' => 0
        ]);

        return redirect()->back()->with('message', 'Antrian Sudah didapatkan !');
    }

    public function checkmax()
    {
        return Nomer::orderby('id', 'desc')
            ->whereDate('date', date('Y-m-d'))
            ->where('sesi_id', 'sesi')
            ->where('dokter_id', 'id_dokter')
            ->count();
    }
    // public function checknomer()
    // {
    //     return Nomer::orderby('id', 'desc')
    //         ->where('user_id', auth()->user()->id)
    //         ->where('date', date('Y-m-d'))
    //         ->where('dokter_id', $iddokter)
    //         ->where('poli_id', $iduser)
    //         ->where('sesi_id', $idsesi)
    //         ->where('status', '0')
    //         ->exists();
    // }

    public function myAntrians()
    {


        $antrians1 = Nomer::where('user_id', auth()->user()->id)->get();

        $antrians = Nomer::orderby('created_at', 'desc')->where('user_id', auth()->user()->id)->paginate(5);
        // dd($antrians);
        // dd($antrians);
        return view('pasien.index', compact('antrians'));
    }

    public function nomer($id_user, $id_dokter, $date, $sesi)
    {
        return ('ok');
    }
    public function findPolisBasedOnDate($date)
    {
        $polis = Sesi::where('date', $date)->get();
        return $polis;
    }

    public function print($id)
    {

        date_default_timezone_set('Asia/Jakarta');
        // $nomer = Nomer::where('date', date('Y-m-d'))->where('user_id', auth()->user()->id)->where('status', 0)->get();
        // dd($nomer);
        $nomer = Nomer::where('date', date('Y-m-d'))->where('id', $id)->where('user_id', auth()->user()->id)->where('status', 0)->get();
        // dd($nomer);
        $pdf = PDF::loadview('pasien.tiket-pdf', compact('nomer'));


        return $pdf->download('tiket-pdf');
    }
}
