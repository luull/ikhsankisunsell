
    <div class="sidebar" id="sidebar">

    <img src="{{ asset('gambar/logo.png') }}" alt="IkhsanKisun Cell" class="logo-img">

     
        <ul>
            @if (Auth::user()->role == "customer")
                <li><a href="{{ route('beranda') }}">Home</a></li>
                <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                <li><a href="{{ route('produk') }}">Produk</a></li>
                <li><a href="{{ route('user.transactions') }}">Data Transaksi</a></li>
                <li><a href="#">Contact</a></li>
            @endif
                @if (Auth::user()->role == "admin")
                    <li><a href="{{ route('admin.transactions') }}">Data Transaksi</a></li>
                @endif

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            </form>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
            </ul>

    </div>
