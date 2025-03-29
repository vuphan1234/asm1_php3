@include('layouts.head')
@vite(['resources/css/product.css'])
</head>

@include('layouts.navigation')
<div class="container">
    <!-- Sidebar Lọc -->
    <aside class="sidebar">
        <!-- <h3>Nhóm sản phẩm</h3>
        <ul class="category-product-list">
            <li><a href="#">Sách Tiếng Việt</a></li>
            <li><a href="#">Văn học</a></li>
            <li><a href="#" class="active">Tiểu thuyết</a></li>
            <li><a href="#">Truyện Ngắn - Tản Văn</a></li>
            <li><a href="#">Light Novel</a></li>
            <li><a href="#">Xem Thêm ▼</a></li>
        </ul> -->

        <h3>Giá</h3>
        <form action="" method="GET">
            <ul class="price-filter">
                <li>
                    <label>
                        <input type="checkbox" name="price[]" value="under50"
                            {{ in_array('under50', request('price', [])) ? 'checked' : '' }}>
                        Dưới 50.000đ
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="price[]" value="50to100"
                            {{ in_array('50to100', request('price', [])) ? 'checked' : '' }}>
                        50.000đ - 100.000đ
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="price[]" value="100to150"
                            {{ in_array('100to150', request('price', [])) ? 'checked' : '' }}>
                        100.000đ - 150.000đ
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" name="price[]" value="above150"
                            {{ in_array('above150', request('price', [])) ? 'checked' : '' }}>
                        Trên 150.000đ
                    </label>
                </li>
            </ul>
            <button type="submit">Áp dụng</button>
        </form>



    </aside>


    <!-- Danh sách sản phẩm -->
    <main class="product-list">
        <div class="sort-bar">
            <form action="" method="GET">
                <select id="sortBy" name="sortBy" onchange="this.form.submit()">
                    <option value="default" {{ request('sortBy') == 'default' ? 'selected' : '' }}>Mặc định</option>
                    <option value="price-asc" {{ request('sortBy') == 'price-asc' ? 'selected' : '' }}>Giá tăng dần
                    </option>
                    <option value="price-desc" {{ request('sortBy') == 'price-desc' ? 'selected' : '' }}>Giá giảm dần
                    </option>
                </select>

                <select id="perPage" name="perPage" onchange="this.form.submit()">
                    <option value="12" {{ request('perPage', 12) == 12 ? 'selected' : '' }}>12 sản phẩm
                    </option>
                    <option value="24" {{ request('perPage', 24) == 24 ? 'selected' : '' }}>24 sản phẩm</option>
                </select>
            </form>
        </div>

        <div class="grid">
            @foreach ($bookByCates as $bookByCate)
            <div class="product">
                <a href="/productdetail/{{ $bookByCate->slug }}">
                    <img src="{{ asset('img/product/'.$bookByCate->image_url) }}" alt="Mèo Chiến Binh">
                    <h3>{{ $bookByCate->title }}</h3>
                    <p>Giá: {{number_format($bookByCate->price, 0, ',', '.')}}đ</p>
                </a>

            </div>
            @endforeach
        </div>

        {{ $bookByCates->appends(['perPage' => $perPage, 'sortBy' => $sortBy, 'price' => $priceFilters])->links() }}
        <!-- <div class="pagination">
        </div> -->
    </main>
</div>

</main>
@include('layouts.end')