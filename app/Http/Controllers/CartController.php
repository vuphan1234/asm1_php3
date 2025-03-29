<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Cart;
use App\Models\Book;



class CartController extends Controller
{
    public function index(Cart $cart)
    {
        return view('cart', ['cartItem' => $cart, 'pageTitle' => 'Giỏ hàng của tôi']);
    }
    public function addCart(Request $request, Cart $cart)
    {
        $product = Book::find($request->id);
        $quantity = $request->quantity;
        $cart->addCart($product, $quantity);
        return redirect('/cart');
    }
    public function removeCart(Request $request, Cart $cart)
    {
        $id = $request->id;
        $cart->removeCart($id);
        return redirect('/cart');
    }
}
