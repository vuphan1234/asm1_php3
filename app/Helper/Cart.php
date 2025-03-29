<?php

namespace App\Helper;

class Cart
{
    private $items = [];
    private $total_quantity = 0;
    private $total_price = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
    }

    // phương thức lấy về danh sách sản phẩm trong giỏ hàng
    public function list()
    {
        return $this->items;
    }

    // thêm mới giỏ hàng
    public function addCart($product, $quantity = 1,)
    {
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]['quantity'] += $quantity;
        } else {
            $item = [
                'id' => $product->id,
                'title' => $product->title,
                'price' => $product->price,
                'image' => $product->image_url,
                'quantity' => $quantity
            ];
            $this->items[$product->id] = $item;
        }
        session(['cart' => $this->items]);
    }

    // xoá khỏi giỏ hàng
    public function removeCart($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);
    }

    // xoá hết sản phẩm trong giỏ hàng

    // phương thức lấy tổng tiền
    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->items as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return $totalPrice;
    }
}
