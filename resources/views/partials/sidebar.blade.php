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
