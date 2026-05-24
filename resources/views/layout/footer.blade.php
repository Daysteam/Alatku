<footer class="bg-dark text-white mb-0 mt-5 px-4 px-md-5 py-4">
    <div class="container-fluid">
        <div class="row g-4 justify-content-between">
            
            <div class="col-12 col-lg-5">
                <a href="" class="text-white text-decoration-none d-flex align-items-center mb-3 fw-bold fs-4">
                    <img src="{{ asset('images/logo.png') }}" alt="logo" width="40px" height="40px" class="me-2">
                    Alatku
                </a>
                <p class="text-white-50 small">Alatku adalah platform yang digunakan oleh guru untuk dapat mengatur keperluan inventaris sekolah. Mulai dari barang, lokasi dan siapa yang meminjam.</p>
            </div>
            
            <div class="col-6 col-sm-4 col-lg-2">
                <h6 class="mb-3 fw-bold text-uppercase small">Link Cepat</h6>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a href="{{ route('barang.index') }}" class="text-white-50 text-decoration-none small">Barang</a></li>
                    <li><a href="{{ route('kategori.index') }}" class="text-decoration-none text-white-50 small">Kategori</a></li>
                    <li><a href="{{ route('lokasi.index') }}" class="text-decoration-none text-white-50 small">Lokasi</a></li>
                    <li><a href="{{ route('peminjaman.index') }}" class="text-decoration-none text-white-50 small">Peminjaman</a></li>
                    <li><a href="{{ route('user.index') }}" class="text-decoration-none text-white-50 small">User</a></li>
                </ul>
            </div>
            
            <div class="col-6 col-sm-4 col-lg-3">
                <h6 class="mb-3 fw-bold text-uppercase small">Kontak Kami</h6>
                <p class="text-white-50 small mb-2"><i class="bi bi-telephone me-1"></i>+62 85236117737</p>
                <p class="text-white-50 small mb-0 text-break"><i class="bi bi-envelope me-1 "></i>evaldyariyanto@gmail.com</p>
            </div>

        </div>
        
        <hr class="text-white-50 my-4">
        <div class="text-center text-white-50 small">
            &copy; 2026 Alatku. All rights reserved.
        </div>
    </div>
</footer>