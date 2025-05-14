@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exportModal">
            <i class="fas fa-file-export mr-1"></i> Export
        </button>

    </div>

    <div class="row">
        <!-- Total Kendaraan Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Kendaraan</div>
                            <div class="h5 mb-2 font-weight-bold text-gray-800 text-center p-3">{{ $total }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Kendaraan Tersedia Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Kendaraan Tersedia</div>
                            <div class="h5 mb-2 font-weight-bold text-gray-800 text-center p-3">{{ $tersedia }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sedang Digunakan Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Sedang Digunakan</div>
                            <div class="h5 mb-2 font-weight-bold text-gray-800 text-center p-3">{{ $terpakai }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Servis Terjadwal Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Service Terjadwal</div>
                            <div class="h5 mb-2 font-weight-bold text-gray-800 text-center p-3">{{ $service }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Peminjaman Terakhir -->
    <div class="table-container mt-5">
        <h4 class="mb-3">Peminjaman Terakhir</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Kendaraan</th>
                        <th>Peminjam</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($peminjaman_terakhir->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data</td>
                        </tr>
                    @else
                        @foreach ($peminjaman_terakhir as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->kendaraan->merek_kendaraan }} - {{ $p->kendaraan->nomor_polisi }}</td>
                                <td>{{ $p->nama_peminjam }}</td>
                                <td>{{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d M Y') }} s/d
                                    {{ \Carbon\Carbon::parse($p->tanggal_kembali)->format('d M Y') }}</td>
                                <td>
                                    @if ($p->status_pinjam == 'dipinjam')
                                        <span class="badge badge-warning">Dipinjam</span>
                                    @else
                                        <span class="badge badge-success">Selesai</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button class="btn btn-info" data-toggle="modal"
                                            data-target="#detailModal{{ $p->id }}">
                                            Detail
                                        </button>
                                        <button class="btn btn-success" data-toggle="modal"
                                            data-target="#konfirmasiSelesaiModal{{ $p->id }}">
                                            Selesai
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @include('pages.peminjaman.lihat-detail', ['p' => $p])
                            @include('pages.peminjaman.konfirmasi-selesai', ['p' => $p])
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include Modal Form Peminjaman -->
    @include('pages.peminjaman.create-peminjaman', ['kendaraans' => $kendaraans])
    @include('pages.kendaraan.export')
@endsection
