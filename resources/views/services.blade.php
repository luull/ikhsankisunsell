<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Layanan</title>
    <link rel="icon" type="image/png" href="{{ asset('favico/logo2.png')}}">
    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
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

    <section id="indosat" class="product-section">
        <div class="product-container animated-form">
            <h2 class="animated-text">Layanan Indosat</h2>
            <div class="product-card animated-item">
                <img src="gambar/indosat.png" alt="Indosat Logo" class="product-logo">
                <h3>Paket Internet</h3>
                <p>Beragam pilihan paket internet dengan kuota besar dan harga terjangkau.</p>
            </div>
            <div class="product-card animated-item">
                <img src="gambar/indosat.png" alt="Indosat Logo" class="product-logo">
                <h3>Paket Nelpon (Coming soon)</h3>
                <p>Paket nelpon dengan harga murah dan jangkauan luas.</p>
            </div>
            <div class="product-card animated-item">
                <img src="gambar/indosat.png" alt="Indosat Logo" class="product-logo">
                <h3>Paket SMS (Coming soon)</h3>
                <p>Paket SMS murah ke semua operator.</p>
            </div>
        </div>
    </section>

    <section id="telkomsel" class="product-section">
        <div class="product-container animated-form">
            <h2 class="animated-text">Layanan Telkomsel</h2>
            <div class="product-card animated-item">
                <img src="gambar/logo2.png" alt="Telkomsel Logo" class="product-logo">
                <h3>Paket Internet (Coming Soon)</h3>
                <p>Pilihan paket internet dengan kecepatan tinggi dan kuota besar.</p>
            </div>
            <div class="product-card animated-item">
                <img src="gambar/logo2.png" alt="Telkomsel Logo" class="product-logo">
                <h3>Paket Nelpon (Coming soon)</h3>
                <p>Paket nelpon dengan harga terjangkau dan kualitas suara jernih.</p>
            </div>
            <div class="product-card animated-item">
                <img src="gambar/logo2.png" alt="Telkomsel Logo" class="product-logo">
                <h3>Paket SMS (Coming Soon)</h3>
                <p>Paket SMS dengan harga hemat dan jangkauan luas.</p>
            </div>
        </div>
    </section>

    <footer id="contact" class="footer">
        <p>&copy; 2024 IkhsanKisun Cell. All rights reserved.</p>
    </footer>
</body>
</html>
