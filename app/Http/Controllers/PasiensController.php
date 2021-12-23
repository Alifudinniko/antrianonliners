<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class PasiensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users  = User::orderby('created_at', 'desc')->where('role_id', '=', 3)->get();
        return view('admins.pasiens.index', compact('users'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'jk' => 'required'
        ]);
        User::where('id', $request->id)
            ->update($request->except('_token'));
        return redirect()->back()->with('message', 'profile updated');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = User::find($id);

        return view('admins.pasiens.show2', compact('pasien'));
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
}
