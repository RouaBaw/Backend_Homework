<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function storeUser(StoreUserRequest $request){
        $user=User::query()->create($request->validated());
        return response()->json($user, 201);
    }


    public function indexStudents(){
        $students=Student::query()->with('user')->get();
        return response()->json($students);
    }

    public function indexTeachers(){
        $teachers=Teacher::query()->with('user')->get();
        return response()->json($teachers);
    }



}
