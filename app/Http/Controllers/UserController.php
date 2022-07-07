<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

        $users = User::paginate(10);
        return view('users.index',compact('users'));
    }


    public function create()
    {


        $roles = Role::all();

        return view('users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $role = $request->rol;
        $newUser = new CreateNewUser();
        $user = $newUser->create($request->all());
        $user->assignRole($role);
        return redirect()->route('users.index')->with('success','Usuario Creado Con Exito');
    }

    public function show(User $user){

       // $user = User::findOrFail($id);
        return view('users.show',compact('user'));

    }

    public function edit(User $user){


        return view('users.edit',compact('user'));
    }

    public function update(Request $request,$id){

        $user = User::findOrFail($id);

        $data = $request->only('name','username','email');
        if (trim($request->password)=='')
        {
            $data = $request->except('password');
        }else {
            $data = $request->all();
            $data['password']=bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->back();

    }
}
