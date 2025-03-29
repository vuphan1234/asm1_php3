@include('layouts.head')
@vite(['resources/css/auth.css'])
</head>

@include('layouts.navigation')

<div class="auth-container">
    <h2>Đăng ký</h2>
    <form action="" method="POST">
        @csrf
        <div class="input-group">
            <label>Họ và tên</label>
            <input type="text" name="fullname" placeholder="Nhập họ và tên" required>
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Nhập email" required>
        </div>
        <div class="input-group">
            <label>Mật khẩu</label>
            <input type="password" name="password" placeholder="Nhập mật khẩu" required>
        </div>
        <div class="input-group">
            <label>Xác nhận mật khẩu</label>
            <input type="password" placeholder="Nhập lại mật khẩu" required>
        </div>
        <button type="submit" class="btn">Đăng ký</button>
        <div class="links">
            <a href="/login">Đã có tài khoản? Đăng nhập</a>
        </div>
    </form>
</div>

</main>
@include('layouts.end')