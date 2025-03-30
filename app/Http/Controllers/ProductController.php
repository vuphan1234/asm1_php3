<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        // Lấy giá trị từ request
        $perPage = $request->input('perPage', 12);
        $sortBy = $request->input('sortBy', 'default');
        $priceFilters = $request->input('price', []);

        // Query lấy sản phẩm theo danh mục
        $query = Book::where('category_id', $category->id);

        // Áp dụng bộ lọc giá
        if (in_array('under50', $priceFilters)) {
            $query->orWhere('price', '<', 50000);
        }
        if (in_array('50to100', $priceFilters)) {
            $query->orWhereBetween('price', [50000, 100000]);
        }
        if (in_array('100to150', $priceFilters)) {
            $query->orWhereBetween('price', [100000, 150000]);
        }
        if (in_array('above150', $priceFilters)) {
            $query->orWhere('price', '>', 150000);
        }

        // Áp dụng bộ lọc sắp xếp giá
        if ($sortBy == 'price-asc') {
            $query->orderBy('price', 'asc');
        } elseif ($sortBy == 'price-desc') {
            $query->orderBy('price', 'desc');
        }

        // Phân trang
        $bookByCates = $query->paginate($perPage);
        return view('products', ['bookByCates' => $bookByCates, 'perPage' => $perPage, 'sortBy' => $sortBy, 'priceFilters' => $priceFilters, 'pageTitle' => 'Danh sách sản phẩm']);
    }
    public function productDetail($slug)
    {
        $cate = Category::all();
        $bookDetail = Book::where('slug', $slug)->first();
        return view('productDetail', ['bookDetail' => $bookDetail, 'cate' => $cate ,'pageTitle' => $bookDetail->title]);
    }
    public function search(SearchRequest $request)
    {
        $keyword = $request->input('keyword');
        $books = Book::query()->when($keyword, function ($q) use ($keyword) {
            return $q->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('description', 'LIKE', "%{$keyword}%");
        })
            ->paginate(10);
        return view('search', ['books' => $books, 'keyword' => $keyword, 'pageTitle' => 'search']);
    }
}
