<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource
     * 
     * @return \Illuminate\Http\Response
     */

    public function index(){

        $users = User::paginate(5);
        return view('users.index',compact('users'));
    }


    public function create()
    {
        $user = new User();
        return view('users.create');
    }

    public function store(Request $request)
    {
        $newUser = new CreateNewUser();
        $user = $newUser->create($request->all());
        return redirect()->route('users.index');
    }
}
