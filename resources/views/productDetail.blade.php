@include('layouts.head')
@vite(['resources/css/productDetail.css'])
</head>

@include('layouts.navigation')

<div class="product-container">
    <!-- Hình ảnh sản phẩm -->
    <div class="product-image">
        @foreach ($bookDetail as $item)
        <img src="{{ asset('img/product/'.$item->image_url) }}" alt="Tên sách">
        @endforeach
    </div>

    <!-- Thông tin sản phẩm -->
    <div class="product-info">
        @foreach ($bookDetail as $item)
        <h1>{{$item->title}}</h1>
        <p class="author">Tác giả: <strong>{{$item->author}}</strong></p>
        <p class="publisher">Nhà xuất bản: <strong>{{$item->publisher}}</strong></p>
        <p class="price">Giá: <span>{{ number_format($item->price, 0, ',', '.') }}đ</span></p>

        <div class="rating">
            ⭐⭐⭐⭐☆ (4.5/5)
        </div>

        <p class="description">
            {{$item->description}}
        </p>
        <form action="/addcart" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $item->id }}">
            <div class="quantity">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
            </div>
            @endforeach

            <button type="submit" class="buy-button">Thêm vào giỏ hàng</button>
        </form>

        <div class="social-share">
            <p>Chia sẻ:</p>
            <a href="#">Facebook</a> | <a href="#">Twitter</a> | <a href="#">Zalo</a>
        </div>
    </div>
</div>

<!-- Mô tả chi tiết -->
<div class="product-details">
    <h2>Chi tiết sản phẩm</h2>
    <ul>
        @foreach ($bookDetail as $item)
        <li><strong>Tác giả:</strong> {{$item->author}}</li>
        <li><strong>Nhà xuất bản:</strong> {{$item->publisher}}</li>
        <li><strong>Năm xuất bản:</strong> {{$item->publish_date}}</li>
        <li><strong>Thể loại:</strong> {{$item->category_id}}</li>
        @endforeach
    </ul>
</div>

</main>
@include('layouts.end')