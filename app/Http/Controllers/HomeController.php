<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->take(4)->get();
        // $bookByCate = Book::find('category_id')
        return view('index', ['books' => $books, 'pageTitle' => 'Trang chủ']);
    }
    public function bookByCate($id)
    {
        $bookByCates = Book::where('category_id', $id)->get();
        return view('index', ['bookByCates' => $bookByCates]);
    }
}
