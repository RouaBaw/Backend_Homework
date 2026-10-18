<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function storeCourse(StoreCourseRequest $request,$id){
    $teacher = Teacher::find($id);
    $courses = $teacher->courses()->createMany($request->validated()['courses']);

    return response()->json($courses, 201);
    }


    public function Teachers_Courses($id){
    $teacher=Teacher::query()->find($id);
    $teacher->courses()->get();
    return response()->json($teacher);
    }

    public function StudentinCourse($id){
    $course = Course::query()->with('students.user')->find($id);
    return response()->json($course);
    }

    public function SyncStudentInCourse(Request $request,$id) {
    $request->validate([
        'student_ids' => ['required', 'array'],
        'student_ids.*' => ['exists:students,id'],
    ]);

    $course = Course::find($id);

    $course->students()->sync($request->student_ids);

    return response()->json($course->load('students'));
}


}
