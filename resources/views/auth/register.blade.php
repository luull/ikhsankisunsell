<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Daftar</title>
    <link rel="icon" type="image/png" href="{{ asset('favico/logo2.png')}}">
    <link rel="stylesheet" href="{{ asset("css/register.css") }}">
</head>
<body>
    <div class="register-container">
        <div class="register-form animated-form">
            <h2 class="animated-text">Daftar</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="text" name="name" placeholder="Nama (Minimal 5 Karakter)" required>
                <input type="text" inputmode="numeric" name="no_hp" placeholder="No Handphone" required>
                <input type="email" name="email" placeholder="Email anda" required>
                <input type="password" name="password" placeholder="Sandi (minimal 6 karakter)" required>
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Sandi" required>
                <button type="submit" class="btn animated-btn">Daftar</button>
                <br>
            <p class="link-paragraph">
                <a href="{{ route("landingpage") }}">Kembali ke halaman utama</a>
            </p>
            </form>
        </div>
    </div>
    @if($errors->any())
        <script>
            window.onload = function() {
                alert("{{ $errors->first('email') }}");
            };
        </script>
    @endif
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
