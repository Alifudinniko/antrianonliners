<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Nomer;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users  = User::orderby('id', 'desc')->where('role_id', '!=', 3)->paginate(5);
        return view('admins.officers.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.officers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validateStore($request);
        $data = $request->all();

        $name = (new User)->userAvatar($request);
        $data['image'] = $name;
        //
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->route('officer.index')->with('message', 'Petugas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $data = Nomer::where('poli_id', $id)->get();
        // dd($data);

        return view('admins.officers.delete', compact('user', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admins.officers.edit', compact('user'));
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
        $this->validateUpdate($request, $id);
        $data = $request->all();
        // dd($data);
        $user = User::find($id);
        $imageName = $user->image;
        if ($request->hasFile('image')) {
            $imageName = (new User)->userAvatar($request);
            unlink(public_path('images/' . $user->image));
        }
        $data['image'] = $imageName;
        $userPassword = $user->password;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $userPassword;
        }
        $user->update($data);
        return redirect()->route('officer.index')->with('message', 'Data Petugas berhasil diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        if (auth()->user()->id == $id) {
            abort(401);
        }
        $user = User::find($id);
        $userDelete = $user->delete();
        if ($userDelete) {
            unlink(public_path('images/' . $user->image));
        }
        return redirect()->route('officer.index')->with('message', 'Petugas deleted successfully');
    }

    public function validateStore($request)
    {
        return  $this->validate($request, [
            'name' => 'required',
            // 'nik' => 'required|numeric',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:25',
            // 'jk' => 'required',
            'alamat' => 'required',
            'poli' => 'required',
            'telp' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png',
            'role_id' => 'required',

        ]);
    }
    public function validateUpdate($request, $id)
    {
        return  $this->validate($request, [
            'name' => 'required',
            // 'nik' => 'required|numeric',
            'email' => 'required|unique:users,email,' . $id,
            // 'jk' => 'required',
            'alamat' => 'required',
            'poli' => 'required',
            'telp' => 'required|numeric',
            // 'image' => 'mimes:jpeg,jpg,png',
            // 'role_id' => 'required',

        ]);
    }
}
