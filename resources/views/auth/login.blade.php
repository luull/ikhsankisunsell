<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Masuk</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('favico/logo2.png')}}">
</head>
<body>
    <div class="login-container">
        <div class="login-form animated-form">
            <h2 class="animated-text">Masuk akun</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Sandi" required>
                <button type="submit" class="btn animated-btn">Login</button>
            </form>
            <p class="link-paragraph">
                <a href="{{ route('daftar') }}">Belum punya akun ? Klik disini</a>
            </p>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</body>
</html>
