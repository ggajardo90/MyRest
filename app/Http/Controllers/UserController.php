<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Actions\Fortify\CreateNewUser;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $users = User::orderBy('id', 'ASC')->paginate(10);
        return view('users.index', compact('users'));
    }


    public function create()
    {


        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $newUser = new CreateNewUser();
        $user = $newUser->create($request->all());
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')->with('success', 'Cuenta de usuario creada con exito');
    }

    public function show(User $user)
    {

        // $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {

        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {

        $input = $request->all();
        $password = $request->input('password');
        if ($password) {
            $input['password'] = bcrypt($password);
        }

        if ($request->hasFile('image_path')) {
            $image_path = $request->file('image_path');
            $filename = time() . '.' . $image_path->getClientOriginalExtension();
            Image::make($image_path)->resize(500, 500)->save(public_path('img/profile_images/' . $filename));
            $input['image_path'] = $filename;
        }

        $user = User::find($id);
        $user->update($input);

        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'Cuenta de usuario actualizada con exito');
    }

    public function destroy($id)
    {
        /*
        $user->delete();

        return back()->with('success','Usuario Eliminado Con Exito'); */

        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado correctamente');
    }
}
