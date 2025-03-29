@include('layouts.head')
@vite(['resources/css/auth.css'])

</head>

@include('layouts.navigation')

<div class="auth-container">
    <h2>Quên mật khẩu</h2>
    <form action="/forgot-password" method="POST">
        @csrf
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="{{old(('email'))}}" placeholder="Nhập email của bạn" required>
            @error('email')
                <div style="color: red; margin-top: 5px;">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn">Gửi yêu cầu</button>
        <div class="links">
            <a href="/login">Quay lại đăng nhập</a>
        </div>
    </form>
</div>

</main>
@include('layouts.end')
