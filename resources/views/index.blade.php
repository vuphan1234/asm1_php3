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
            <a href="/productdetail/{{ $book->slug }}" style="text-decoration: none">
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

{{--    <button class="load-more">Xem Thêm</button>--}}

</div>

<div class="best-seller">
    <h2>Bảng xếp hạng bán chạy tuần</h2>

    <!-- Thanh danh mục -->
    <nav class="category-nav">
        <ul>
            @foreach ($category as $item)
            <li><a href="{{ route('home', ['category' => $item->id])  }}" style="text-decoration: none">{{ $item->category_name }}</a></li>
            @endforeach
        </ul>
    </nav>

    <div class="content">
        <!-- Danh sách bảng xếp hạng -->
        <div class="ranking">
            @if($book_select_cate->isNotEmpty())
                @foreach($book_select_cate as $book)
                    <a href="{{route('home', ['category' => $selectCate, 'book' => $book->id])}}" style="text-decoration: none">
                        <div class="rank-item">
                            <span class="rank-num"></span>
                            <img src="{{asset('img/product/'. $book->image_url)}}" alt="{{$book->title}}">
                            <div class="rank-info">
                                <h4>{{$book->title}}</h4>
                                <p>{{$book->author}}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>

        <!-- Chi tiết sách -->
        <div class="book-detail">
            @if($bookDetail)
                <a href="/productdetail/{{ $bookDetail->slug }}">
                    <img src="{{asset('img/product/'. $bookDetail->image_url)}}" alt="Trường Ca Achilles">
                </a>
                <div class="book-info">
                    <h3>{{$bookDetail->title}}</h3>
                    <p><strong>Tác giả:</strong> {{$bookDetail->author}}</p>
                    <p><strong>Nhà xuất bản:</strong> {{$bookDetail->publisher}}</p>
                    <p class="price"><strong>{{number_format($bookDetail->price, 0, ',', '.')}} đ</strong> </p>
                    <p class="description">
                        {{$bookDetail->description}}
                    </p>
                </div>
            @endif

        </div>
    </div>

</div>


</main>
@include('layouts.end')
