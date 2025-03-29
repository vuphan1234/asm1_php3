@include('layouts.head')
@vite(['resources/css/home.css'])
</head>

@include('layouts.navigation')

<!-- Giao diện Xu Hướng Mua Sắm -->
<div class="trend-shopping">

    <!-- Phần tiêu đề -->
    <section class="trend-header">
        <h2><i>🛍️</i> Xu Hướng Mua Sắm</h2>
        <div class="tabs">
            <a href="#" class="active">Xu Hướng Theo Ngày</a>
        </div>
    </section>

    <!-- Danh sách sản phẩm -->
    <div class="product-list">
        @foreach ($books as $book)
        <div class="product">
            <a href="/productdetail/{{ $book->slug }}">
                <img src="{{ asset('img/product/'. $book->image_url) }}" alt="{{ $book->title }}">
                <span class="tag new">Mới</span>
                <h3>{{ $book->title }}</h3>
                <p class="price">{{ number_format($book->price, 0, ',', '.')  }} đ</p>
                <!-- <div class="sold-bar"><span style="width: 78%;"></span></div> -->
                <!-- <p class="sold-text">Đã bán 78</p> -->
            </a>

        </div>
        @endforeach
    </div>

    <button class="load-more">Xem Thêm</button>

</div>

<div class="best-seller">
    <h2>Bảng xếp hạng bán chạy tuần</h2>

    <!-- Thanh danh mục -->
    <nav class="category-nav">
        <ul>
            @foreach ($categories as $category)
            <li><a href="{{ $category->id }}">{{ $category->category_name }}</a></li>
            @endforeach
        </ul>
    </nav>

    <div class="content">
        <!-- Danh sách bảng xếp hạng -->
        <div class="ranking">
            <div class="rank-item">
                <span class="rank-num">01</span>
                <img src="book1.jpg" alt="Sách 1">
                <div class="rank-info">
                    <h4>Trường Ca Achilles</h4>
                    <p>Madeline Miller</p>
                    <span class="points">1494 điểm</span>
                </div>
            </div>

            <div class="rank-item">
                <span class="rank-num">02</span>
                <img src="book2.jpg" alt="Sách 2">
                <div class="rank-info">
                    <h4>Người Đàn Ông Mang Tên OVE</h4>
                    <p>Fredrik Backman</p>
                    <span class="points">1445 điểm</span>
                </div>
            </div>

            <div class="rank-item">
                <span class="rank-num">03</span>
                <img src="book3.jpg" alt="Sách 3">
                <div class="rank-info">
                    <h4>Lớp Cô Tàng Sự Không Cần Điểm Danh</h4>
                    <p>Doo Vandenis</p>
                    <span class="points">1049 điểm</span>
                </div>
            </div>

            <div class="rank-item">
                <span class="rank-num">04</span>
                <img src="book4.jpg" alt="Sách 4">
                <div class="rank-info">
                    <h4>Hai Số Phận</h4>
                    <p>Jeffrey Archer</p>
                    <span class="points">1023 điểm</span>
                </div>
            </div>

            <div class="rank-item">
                <span class="rank-num">05</span>
                <img src="book5.jpg" alt="Sách 5">
                <div class="rank-info">
                    <h4>Tiệm Sách Của Nàng</h4>
                    <p>Nguyễn Nhật Ánh</p>
                    <span class="points">990 điểm</span>
                </div>
            </div>
        </div>

        <!-- Chi tiết sách -->
        <div class="book-detail">
            <img src="book1.jpg" alt="Trường Ca Achilles">
            <div class="book-info">
                <h3>Trường Ca Achilles</h3>
                <p><strong>Tác giả:</strong> Madeline Miller</p>
                <p><strong>Nhà xuất bản:</strong> NXB Kim Đồng</p>
                <p class="price"><strong>124,800 đ</strong> <span class="old-price">156,000 đ</span> <span
                        class="discount">-20%</span></p>
                <p class="description">
                    Trường Ca Achilles - Một bản tình ca bi tráng dưới ánh hoàng hôn Hy Lạp.
                    Lấy cảm hứng từ sử thi Iliad, Madeline Miller đã tái hiện một câu chuyện tình yêu đầy say đắm nhưng
                    cũng nhuốm màu bi kịch.
                </p>
                <p><strong>Về tác giả:</strong> Là nhà văn người Mỹ, chuyên gia về văn học Hy Lạp cổ đại.</p>
            </div>
        </div>
    </div>

    <!-- Nút xem thêm -->
    <div class="load-more-container">
        <button class="load-more">Xem Thêm</button>
    </div>
</div>


</main>
@include('layouts.end')