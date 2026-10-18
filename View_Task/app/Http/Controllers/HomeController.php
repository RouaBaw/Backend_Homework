<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
         $name = 'Roua';

        return view('home',compact('name'));
    }



    public function store(Request $request){
        $user=User::query()->create(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password
            ]
        );
        return $this->success($user, 201, 'user created successfully');
    }

    public function index(){
        $users=User::query()->get();

        return view('users',compact('users'));
    }
}
