<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{

    public function role(){

        $roles = Role::all();

        return view('users.create',compact('roles'));
    }
}
