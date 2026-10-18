<!-- <?php

use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/users',[UserController::class, 'storeUser']);

Route::get('/students',[UserController::class, 'indexStudents']);

Route::get('/teachers',[UserController::class, 'indexTeachers']);

Route::post('/teachers/{id}/courses',[SchoolController::class, 'storeCourse']);

Route::get('/teachers/{id}/courses',[SchoolController::class, 'Teachers_Courses']);

Route::get('/courses/{id}/students',[SchoolController::class, 'StudentinCourse']);

Route::put( '/courses/{id}/students', [SchoolController::class, 'SyncStudentInCourse']);
