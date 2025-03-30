@include('layouts.head')
@vite(['resources/css/auth.css'])
</head>

@include('layouts.navigation')

<div class="auth-container">
    <h2>Đăng ký</h2>
    <form action="/register" method="POST">
        @csrf
        <div class="input-group">
            <label>Họ và tên</label>
            <input type="text" name="username" placeholder="Nhập họ và tên" value="{{ old('username') }}" required>
            @error('username')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Nhập email" value="{{ old('email') }}" required>
            @error('email')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="input-group">
            <label>Mật khẩu</label>
            <input type="password" name="password" placeholder="Nhập mật khẩu" required>
            @error('password')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <div class="input-group">
            <label>Xác nhận mật khẩu</label>
            <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
            @error('password_confirmation')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn">Đăng ký</button>
    </form>
    <div class="links">
        <a href="/login">Đã có tài khoản? Đăng nhập</a>
    </div>
</div>

</main>
@include('layouts.end')
