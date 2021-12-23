<?php

namespace App\Http\Controllers;

use App\Dokter;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::user()->role->name == "admin") {
            $dokter = DB::table('dokters')->get();
            $poliy =  auth()->user()->poli;
            return view('admins.dokters.index', compact('dokter', 'poliy'));
        }
        if (Auth::user()->role->name = "officer") {
            $dokter = DB::table('dokters')->where('poli', auth()->user()->poli)->get();
            $poliy =  auth()->user()->poli;
            return view('admins.dokters.index', compact('dokter', 'poliy'));
        }
    }

    public function create()
    {
        $data = Dokter::max('code');
        $huruf = "D";
        // $poli = DB::table('polys')->where('id', auth()->user()->poli)->pluck('id');

        // $huruf2 = head($poli);
        // $last = last($huruf2);
        // dd($last);
        $urutan = (int)substr($data, 2, 3);
        $urutan++;
        $dokters = $huruf . sprintf("%03s", $urutan);
        return view('admins.dokters.create', compact('dokters'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $poliy =  auth()->user()->poli;

        $this->validateStore($request);
        $data = $request->all();
        // $data['code'] = $request->dokters;
        $data['poli'] = $poliy;


        Dokter::create($data);

        return redirect()->route('dokter.create')->with('message', 'Dokter berhasil ditambahkan');
    }


    public function show($id)
    {
        $dokter = Dokter::find($id);
        return view('admins.dokters.delete', compact('dokter'));
    }


    public function edit($id)
    {
        $dokter = Dokter::find($id);

        return view('admins.dokters.edit', compact('dokter'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',

        ]);
        $dokter = Dokter::find($id);
        $dokter->name = $request->name;
        // $poly->status = $request->status;
        $dokter->save();
        return redirect()->route('dokter.index');
    }


    public function destroy($id)
    {

        $dokter = Dokter::find($id);
        $dokter->delete();
        return redirect()->route('dokter.index')->with('message', 'Dokter berhasil dihapus');
    }


    public function validateStore($request)
    {
        return  $this->validate($request, [
            'name' => 'required',
        ]);
    }

    public function toggleStatus($id)
    {
        $dok = Dokter::find($id);
        $dok->status = !$dok->status;
        $dok->save();
        return redirect()->back();
    }
}
