@include('layouts.head')
@vite(['resources/css/auth.css'])

</head>

@include('layouts.navigation')

<div class="auth-container">
    <h2>Đăng nhập</h2>
    @if ($message = Session::get('error'))
    <div>
        <strong>{{ $message }}</strong>
    </div>

    @endif
    <form action="#" method="POST">
        @csrf
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Nhập email" required>
        </div>
        <div class="input-group">
            <label>Mật khẩu</label>
            <input type="password" name="password" placeholder="Nhập mật khẩu" required>
        </div>
        <button type="submit" class="btn">Đăng nhập</button>
        <div class="links">
            <a href="/forgot-password">Quên mật khẩu?</a>
            <a href="/register">Chưa có tài khoản? Đăng ký</a>
        </div>
    </form>
</div>

</main>
@include('layouts.end')