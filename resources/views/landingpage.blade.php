<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IkhsanKisun Cell</title>
    <link rel="icon" type="image/png" href="{{ asset('favico/logo2.png')}}">
    <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">
</head>
<body>
    <header class="header">
        <nav class="nav">
            <a href="#" class="logo">
                <img src="gambar/logo.png" alt="IkhsanKisun Cell" class="logo-img">
            </a>
            <ul class="nav-links">
                <li><a href="{{ route('landingpage') }}">Home</a></li>
                <li><a href="{{ route('services') }}">Layanan Kami</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1 class="animated-text">Hai, Selamat datang di IkhsanKisun Cell</h1>
            <p class="animated-text">Tempatnya layanan provider di indonesia.</p>
            <a href="{{ route('daftar') }}" class="btn animated-btn">Daftar</a>
            <a href="{{ route('masuk') }}" class="btn animated-btn">Masuk</a>
        </div>

    </section>

    <section id="contact" class="contact">
        <h2 class="animated-text">Kontak Kami</h2>
        <p class="animated-text">Hubungi kami untuk mengetahui info lebih lanjut.</p>
        <form action="#" method="post" class="animated-form">
            <input type="text" name="name" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <textarea name="message" placeholder="Pesan" required></textarea>
            <button type="submit" class="btn">Kirim Pesan</button>
        </form>
    </section>
    <footer class="footer">
        <p>&copy; 2024 IkhsanKisun. All rights reserved.</p>
    </footer>
</body>
</html>
