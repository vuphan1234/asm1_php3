@include('layouts.head')
@vite(['resources/css/cart.css'])
</head>

@include('layouts.navigation')

<div class="cart-container">
    <h1>Giỏ hàng của bạn</h1>

    <div class="cart-content">
        <!-- Cột trái: Danh sách sản phẩm -->
        <div class="cart-items">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItem->list() as $key => $value)
                    <tr>
                        <td class="product-info">
                            <img src="{{ asset('img/product') }}/{{ $value['image'] }}" alt="Sách 1">
                            <span>{{$value['title']}}</span>
                        </td>
                        <td>{{number_format($value['price'], 0, ',', '.')}}đ</td>
                        <td><input type="number" value="{{$value['quantity']}}" min="1"></td>
                        <td>{{ number_format($value['price'] * $value['quantity'], 0, ',', '.') }}đ</td>
                        <td>
                            <form action="/remove " method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $value['id'] }}">
                                <button type="submit" class="remove-btn">X</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Cột phải: Tổng thanh toán -->
        <div class="cart-summary">
            <h2>Thông tin đơn hàng</h2>
            <p><strong>Tổng tiền:</strong> <span>{{number_format($cartItem->getTotalPrice())}}đ</span></p>
            <button class="checkout-btn">Tiến hành thanh toán</button>
        </div>
    </div>
</div>

</main>
@include('layouts.end')