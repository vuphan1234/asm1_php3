<body>
    <header class="header">
        <!-- Logo -->
        <div class="logo">
            <a href="/">ShopLogo</a>
        </div>

        <!-- Thanh tìm kiếm -->
        <div class="search-box">
            <form action="/product/search" method="get">
                <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..." value="{{ old('keyword', $keyword ?? '') }}" required>
                <button type="submit">🔍</button>
            </form>
            <!-- Hiển thị lỗi nếu có -->
            @if ($errors->has('keyword'))
                <p style="color: red; margin-top: 4px">{{ $errors->first('keyword') }}</p>
            @endif
        </div>

        <!-- Giỏ hàng + User -->
        <div class="icons">
            <a href="/cart" class="cart">
                🛒 <span class="cart-badge">3</span>
            </a>
            <div class="user-menu">
                <div class="user-icon">👤</div>
                <div class="dropdown">
                    <a href="/login" class="login"><i>🔑</i> Đăng nhập</a>
                    <a href="/register" class="register"><i>📝</i> Đăng ký</a>
                </div>
            </div>
        </div>

    </header>

    <main>
        <nav class="categories">
            <!-- <h2>Danh mục sản phẩm</h2> -->
            <ul class="category-list">
                @foreach ($categories as $category)
                <li><a href="/products/{{ $category->slug }}">{{ $category->category_name }}</a></li>
                @endforeach

                <!-- <li><a href="#"><i>📚</i> Kinh tế</a></li>
                <li><a href="#"><i>🎓</i> Giáo dục</a></li>
                <li><a href="#"><i>💡</i> Kỹ năng sống</a></li>
                <li><a href="#"><i>🔬</i> Khoa học</a></li>
                <li><a href="#"><i>🏆</i> Phát triển bản thân</a></li> -->
            </ul>
        </nav>
