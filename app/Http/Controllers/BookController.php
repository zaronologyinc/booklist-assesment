<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;

class BookController extends Controller
{
    public function __invoke()
    {
        $books = Book::paginate(15);
        return view('books', ['books' => $books]);
    }
}
