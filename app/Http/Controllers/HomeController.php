<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $category = Category::all();

        $selectCate = $request->query('category');
        $book_select_cate = $selectCate ? Book::where('category_id', $selectCate)->take(5)->get() : collect();

        $selectedBook = $request->query('book');
        $bookDetail = $selectedBook ? Book::find($selectedBook) : null;

        $books = Book::orderBy('created_at', 'desc')->take(8)->get();
        // $bookByCate = Book::find('category_id')
        return view('index', ['books' => $books, 'category' => $category, 'book_select_cate' => $book_select_cate, 'bookDetail' => $bookDetail, 'selectCate' => $selectCate, 'pageTitle' => 'Trang chủ']);
    }
    public function bookByCate($id)
    {
        $bookByCates = Book::where('category_id', $id)->get();
        return view('index', ['bookByCates' => $bookByCates]);
    }
}
