<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    // 3. Get all teacher's courses
    public function Teachers_Courses($id)
    {
        $teacher = Teacher::with('courses')
            ->findOrFail($id);

        return response()->json($teacher, 200);
    }


    // 4. Get all students in a course
    public function StudentinCourse($id)
    {
        $course = Course::with('students.user')
            ->findOrFail($id);

        return response()->json($course, 200);
    }


    // 5. Attach/Create courses for teacher using createMany()
    public function storeCourse(
        StoreCourseRequest $request,
        $id
    ) {
        $teacher = Teacher::findOrFail($id);

        $courses = $teacher
            ->courses()
            ->createMany(
                $request->validated()['courses']
            );

        return response()->json($courses, 201);
    }


    // 6. Sync students in course
    public function SyncStudentInCourse(
        Request $request,
        $id
    ) {
        $request->validate([
            'student_ids' => [
                'required',
                'array'
            ],

            'student_ids.*' => [
                'integer',
                'exists:students,id'
            ],
        ]);

        $course = Course::findOrFail($id);

        $course
            ->students()
            ->sync($request->student_ids);

        return response()->json(
            $course->load('students.user'),
            200
        );
    }

    public function attachStudents(Request $request, $id)
{
    $request->validate([
        'student_ids' => ['required', 'array'],
        'student_ids.*' => ['exists:students,id'],
    ]);

    $course = Course::findOrFail($id);

    $course->students()->attach(
        $request->student_ids
    );

    return response()->json(
        $course->load('students.user')
    );
}
}
