@include('layouts.head')
@vite(['resources/css/auth.css'])

</head>

@include('layouts.navigation')

<div class="auth-container">
    <h2>Đăng nhập</h2>
{{--    @if ($message = Session::get('error'))--}}
{{--    <div>--}}
{{--        <strong>{{ $message }}</strong>--}}
{{--    </div>--}}

{{--    @endif--}}

    <form action="/login" method="POST">
        @csrf
        @if (session('error'))
            <p style="color: red; margin-top: 4px">{{ session('error') }}</p>
        @endif
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Nhập email" value="{{ old('email') }}" required>
            @error('email')
                <p style="color: red; margin-top: 4px">{{ $message }}</p>
            @enderror
        </div>
        <div class="input-group">
            <label>Mật khẩu</label>
            <input type="password" name="password" placeholder="Nhập mật khẩu" required>
            @error('password')
                <p style="color: red; margin-top: 4px">{{ $message }}</p>
            @enderror
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
