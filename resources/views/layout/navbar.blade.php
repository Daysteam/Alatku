<nav class="navbar navbar-dark bg-blue navbar-expand-lg px-3 sticky-top">

    <a class="navbar-brand d-flex align-items-center" href="{{ route('barang.index') }}">
        <img src="{{ asset('images/logo.png') }}" width="40" height="40" class="me-2">
        <strong>Alatku</strong>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('user.*') ? 'active rounded px-2' : '' }}" href="{{ route('user.index') }}">User</a>
            </li>
            <li class="nav-item"><a class="nav-link text-white {{ request()->routeIs('barang.*') ? 'active rounded px-2' : '' }}"href="{{ route('barang.index') }}">Barang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('kategori.*') ? 'active rounded px-2' : '' }}"href="{{ route('kategori.index') }}">Kategori</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('lokasi.*') ? 'active rounded px-2' : '' }}"href="{{ route('lokasi.index') }}">Lokasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('peminjaman.*') ? 'active rounded px-2' : '' }}"href="{{ route('peminjaman.index') }}">Peminjaman</a>
            </li>
        </ul>
    </div>
</nav>