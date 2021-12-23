<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of thSe resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $users  = User::orderby('id', 'desc')->where('role_id', '=', 1)->get();
        return view('admins.admins.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.admins.create');
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

        return redirect()->back()->with('message', 'admins added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return view('admins.admins.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::find($id);
        return view('admins.admins.edit', compact('admin'));
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
        $user = User::find($id);
        $imageName = $user->image;
        $userPassword = $user->password;
        // if ($request->hasFile('image')) {
        //     $imageName = (new User)->userAvatar($request);
        //     unlink(public_path('images/' . $user->image));
        // }
        // $data['image'] = $imageName;
        // if ($request->password) {
        //     $data['password'] = bcrypt($request->password);
        // } else {
        //     $data['password'] = $userPassword;
        // }
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $userPassword;
        }
        $user->update($data);
        return redirect()->route('officer.index')->with('message', 'Admin updated successfully');
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

        return redirect()->route('admins.index')->with('message', 'admins deleted successfully');
    }

    public function validateStore($request)
    {
        return  $this->validate($request, [
            'name' => 'required',
            'nik' => 'required|numeric',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:25',
            'jk' => 'required',
            'alamat' => 'required',
            'telp' => 'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png',
            'role_id' => 'required',

        ]);
    }
    public function validateUpdate($request, $id)
    {
        return  $this->validate($request, [
            'name' => 'required',
            'nik' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'jk' => 'required',
            'alamat' => 'required',
            'poli' => 'required',
            'telp' => 'required|numeric',
            'image' => 'mimes:jpeg,jpg,png',
            'role_id' => 'required',

        ]);
    }
}
