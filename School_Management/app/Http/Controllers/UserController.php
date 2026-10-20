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
        public function storeUser(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        return response()->json($user, 201);
    }


    // 1. Get all students
    public function indexStudents()
    {
        $students = Student::with('user')->get();

        return response()->json($students, 200);
    }


    // 2. Get all teachers
    public function indexTeachers()
    {
        $teachers = Teacher::with('user')->get();

        return response()->json($teachers, 200);
    }
}

