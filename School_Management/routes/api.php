<?php

use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Create user
Route::post(
    '/users',
    [UserController::class, 'storeUser']
);


// 1. Get all students
Route::get(
    '/students',
    [UserController::class, 'indexStudents']
);


// 2. Get all teachers
Route::get(
    '/teachers',
    [UserController::class, 'indexTeachers']
);


// 3. Get teacher courses
Route::get(
    '/teachers/{id}/courses',
    [SchoolController::class, 'Teachers_Courses']
);


// 4. Get students in course
Route::get(
    '/courses/{id}/students',
    [SchoolController::class, 'StudentinCourse']
);


// 5. Create courses for teacher
Route::post(
    '/teachers/{id}/courses',
    [SchoolController::class, 'storeCourse']
);


// 6. Sync students in course
Route::put(
    '/courses/{id}/students',
    [SchoolController::class, 'SyncStudentInCourse']
);
