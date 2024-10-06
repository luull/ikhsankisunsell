<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="{{ asset('css/home/beranda.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('favico/logo2.png')}}">
</head>
<body>
    <div class="container">
        <div class="sidebar" id="sidebar">

            <img src="gambar/logo.png" alt="IkhsanKisun Cell" class="logo-img">

            <ul>
                <li><a href="{{ route('beranda') }}">Home</a></li>
                <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                <li><a href="{{ route('produk') }}">Produk</a></li>
                <li><a href="#">Contact</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
            </ul>

        </div>
        <div class="content" id="content">
            <button class="toggle-btn" id="toggle-btn">☰</button>
            <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
            @if (session('Berhasil'))
            <div class="alert alert-success">
                {{ session('Berhasil','Profil anda telah di ubah.')}}
            </div>
        @endif
        </div>
    </div>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>
