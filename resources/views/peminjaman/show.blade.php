<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alatku | Show</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <style>
        @media print {
            .no-print{
                visibility: hidden;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between my-3 no-print">
            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary"><i class="bi bi-home me-1"></i>Kembali</a>
            <button class="btn btn-primary"><i class="bi bi-print me-1" onclick="window.print()">Print</i></button>
        </div>
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center align-middle">
                        <tr>
                            <th>Nama User</th>
                            <th>Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td>{{ $peminjaman->user->nama }}</td>
                            <td>{{ $peminjaman->barang->nama_barang }}</td>
                            <td>{{ $peminjaman->tanggal_pinjam }}</td>
                            <td>{{ $peminjaman->tanggal_kembali ?? '-' }}</td>
                            <td>
                                <span class="
                                @if ($peminjaman->status === 'kembali')
                                        badge bg-success
                                    @else
                                        badge bg-danger
                                    @endif">
                                    {{ $peminjaman->status }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">Alasan</td>
                        </tr>
                        <tr>
                            <td colspan="5">{{ $peminjaman->alasan ?? '-'}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>