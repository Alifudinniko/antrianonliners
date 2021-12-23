<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Antrian;
use App\User;
use App\Nomer;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Mail\Mailable;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Auth;

class AntriansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $all = Nomer::where('poli_id', auth()->user()->id)->get();
        $today = Nomer::where('date', date('Y-m-d'))->where('poli_id', auth()->user()->id)->where('sesi_id', 1)->get();
        $today1 = Nomer::orderby('date', 'asc')->where('poli_id', auth()->user()->id)->where('sesi_id', 1)->where('status', 0)->get();
        $today2 = Nomer::orderby('date', 'asc')->where('poli_id', auth()->user()->id)->where('sesi_id', 2)->where('status', 0)->get();

        $us = $today->sortBy('today');


        $hariini = $today->count();


        return view('admins.antrians.index', compact('all', 'today', 'today1', 'today2', 'hariini'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        $antrian = Antrian::create([
            'id_user' => auth()->user()->id,
            'id_poly' => $request->id_poly,
            'status' => 0,
            // 'date' => $request->date,

        ]);
        return redirect()->back()->with('message', 'Antrian dibuat ' . $request->id_poli);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //Menampilkan list di antrians
        $tampil = Nomer::orderby('id', 'desc')->where('poli_id', auth()->user()->id)->paginate(6);

        date_default_timezone_set('Asia/Jakarta');
        if (request('date')) {
            $pasien = $this->findPasiensBasedOnDate(request('date'))->where('status', 1);
            $tampil = Nomer::latest()->where('date', $request->date)->where('poli_id', auth()->user()->id)->paginate(20);
            return view('admins.antrians.list', compact('tampil'));
        }
        return view('admins.antrians.list', compact('tampil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $antrian = Nomer::find($id);

        // $antrian2 = Nomer::find($id)->where('date', date('Y-m-d'))->where('poli_id', auth()->user()->id)->where('sesi_id', 1)->where('status', 0)->where('id', $id)->get();
        $emmail = User::where('id', $antrian->user_id)->get('email');


        // $doctorName = User::where('id', $request->doctorId)->first();
        // $mailData = [
        //     'name' => auth()->user()->name,
        //     'time' => $request->time,
        //     'date' => $request->date,
        //     'doctorName' => $doctorName->name

        // ];
        try {
            // \Mail::to(auth()->user()->email)->send(new AppointmentMail($mailData));
            Mail::to($emmail)->send(new SendEmail());
        } catch (\Exception $e) {
            return redirect()->back()->with('errmessage', 'Antrian Tidak dipanggil !!');
        }

        // return view('admins.antrians.edit',  compact('antrian'));
        return redirect()->back()->with('message', 'Antrian dipanggil !!');
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

        // $this->validate($request, [
        //     'status' => 'required'
        // ]);
        $antro = Nomer::find($id);

        $antro->status = 1;
        $antro->save();
        // $antro->no = $request->name;

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $antrian = Nomer::find($id);
        $antrian->delete();
        return redirect()->back();
    }
    public function kirimmail($id)
    {
        $antrian2 = Nomer::find($id)->where('date', date('Y-m-d'))->where('poli_id', auth()->user()->id)->where('sesi_id', 1)->where('status', 0)->where('id', $id)->get();
        $emmail = User::where('id', $antrian->user_id)->get('email');
        Mail::to($emmail)->send(new SendEmail());
    }
    public function list(Request $request)
    {


        date_default_timezone_set('Asia/Jakarta');
        if (request('date')) {
            $pasien = $this->findPasiensBasedOnDate(request('date'))->where('status', 1);
            // dd($pasien);
            $antrians = Nomer::latest()->where('date', $request->date)->where('poli_id', auth()->user()->id)->get();
            return view('admins.antrians.list', compact('antrians'));
        }
        $antrians = Nomer::latest()->where('date', date('Y-m-d'))->where('poli_id', auth()->user()->id)->get();
        // dd($antrians);
        return view('admins.antrians.list', compact('antrians'));
    }
    public function findPasiensBasedOnDate($date)
    {
        $pasiens = Nomer::where('date', $date)->get();
        return $pasiens;
    }
    public function antriantoday($id)
    {


        date_default_timezone_set('Asia/Jakarta');
        $sesi = $id;
        $tanggal = date('d-m-Y');
        $today = Nomer::where('date', date('Y-m-d'))->where('poli_id', auth()->user()->id)->where('sesi_id', $id)->where('status', 0)->get();

        return view('admins.antrians.today', compact('today', 'sesi', 'tanggal'));
    }
    public function toggleStatus($id)
    {
        $antrian = Nomer::find($id);
        $antrian->status = !$antrian->status;
        $antrian->save();
        return redirect()->back();
    }
}
