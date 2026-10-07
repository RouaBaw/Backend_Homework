<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Session\Store;


class BookController extends Controller
{
public function index()
    {
        $books = Book::query()->get();

        return $this->success($books, 200, 'books retrieved successfully');
    }

public function show($id)
    {
        $book = Book::query()->where('id', $id)->first();

        return $this->success($book, 200, 'book retrieved successfully');
    }

public function store(StoreBookRequest $request)
    {

        $book = Book::query()->create($request->validated());

        return $this->success($book, 201, 'Book created successfully');
    }


public function update(UpdateBookRequest $request, $id)
    {
        $validated = $request->validated();

        $book = Book::query()->where('id', $id)->first();


        $book->update($validated);

        return $this->success($book, 200, 'Book updated successfully');
    }

public function delete($id)
    {
        $book = Book::query()->where('id', $id)->first();

        $book->delete();

        return $this->success( 200, 'Book deleted successfully');
    }
}
