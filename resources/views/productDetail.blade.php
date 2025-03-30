@include('layouts.head')
@vite(['resources/css/productDetail.css'])
</head>

@include('layouts.navigation')

<div class="product-container">
    <!-- Hình ảnh sản phẩm -->
    <div class="product-image">
        <img src="{{ asset('img/product/'.$bookDetail->image_url) }}" alt="Tên sách">
    </div>

    <!-- Thông tin sản phẩm -->
    <div class="product-info">

        <h1>{{$bookDetail->title}}</h1>
        <p class="author">Tác giả: <strong>{{$bookDetail->author}}</strong></p>
        <p class="publisher">Nhà xuất bản: <strong>{{$bookDetail->publisher}}</strong></p>
        <p class="price">Giá: <span>{{ number_format($bookDetail->price, 0, ',', '.') }}đ</span></p>

        <div class="rating">
            ⭐⭐⭐⭐☆ (4.5/5)
        </div>

        <p class="description">
            {{$bookDetail->description}}
        </p>
        <form action="/addcart" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $bookDetail->id }}">
            <div class="quantity">
                <label for="quantity">Số lượng:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
            </div>
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
        <li><strong>Tác giả:</strong> {{$bookDetail->author}}</li>
        <li><strong>Nhà xuất bản:</strong> {{$bookDetail->publisher}}</li>
        <li><strong>Năm xuất bản:</strong> {{$bookDetail->publish_date}}</li>
        <li><strong>Thể loại:</strong> {{$bookDetail->category->category_name}}</li>
    </ul>
</div>

</main>
@include('layouts.end')
