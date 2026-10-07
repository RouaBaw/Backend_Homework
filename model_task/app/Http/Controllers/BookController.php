<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books=Book::query()->get();
        return $this->success($books,200,'books retrieved successfully');
    }

    public function show($id){
        $books=Book::query()->where('id',$id)->first();
        return $this->success($books,200,'books retrieved successfully');
    }

     public function store(StoreBookRequest $request){
        $books=Book::query()->create($request->validated());
        return $this->success($books,201,'books created successfully');
    }

     public function update(UpdateBookRequest $request, $id)
    {
    $book = Book::query()->where('id', $id)->first();

    $book->update($request->validated());

    return $this->success($book, 200, 'book updated successfully');
    }

    public function destroy($id){
        $books=Book::query()->where('id',$id)->delete();
        return $this->success($books,200,'books deleted successfully');
    }





}
