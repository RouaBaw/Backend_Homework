<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// Retrieve All Projects
Route::get('/projects', function () {

    return DB::table('projects')->get();

});


// Create New Project
Route::post('/projects', function (Request $request) {

    DB::table('projects')->insert([
        'name' => $request->name,
        'description' => $request->description,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'status' => $request->status,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return response()->json([
        'message' => 'Project created successfully'
    ], 201);

});

// Retrieve Task Comments
Route::get('/tasks/{task_id}/comments', function ($task_id) {

    return DB::table('comments')
        ->where('task_id', $task_id)
        ->get();

});


// Add New Comment
Route::post('/tasks/{task_id}/comments', function (Request $request, $task_id) {

    DB::table('comments')->insert([
        'task_id' => $task_id,
        'comment_text' => $request->comment_text,
        'author' => $request->author,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return response()->json([
        'message' => 'Comment added successfully'
    ], 201);

});


// Delete Comment
Route::delete('/comments/{id}', function ($id) {

    DB::table('comments')
        ->where('id', $id)
        ->delete();

    return response()->json([
        'message' => 'Comment deleted successfully'
    ]);

});

// Add new  Tasks
Route::post('/tasks', function (Request $request) {

    DB::table('tasks')->insert([
        'project_id' => $request->project_id,
        'title' => $request->title,
        'details' => $request->details,
        'status' => $request->status,
        'priority' => $request->priority,
        'due_date' => $request->due_date,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return response()->json([
        'message' => 'Task created successfully'
    ], 201);
});
