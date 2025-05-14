@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- Nav Item - Alerts (Pindahkan ke sini) -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <span class="badge badge-danger badge-counter">3+</span>
                </a>
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">Alerts Center</h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 12, 2019</div>
                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                        </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-success">
                                <i class="fas fa-donate text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 7, 2019</div>
                            $290.29 has been deposited into your account!
                        </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                </div>
            </li>
        </ul>
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
                            <div class="h5 mb-2 font-weight-bold text-gray-800 text-center p-3">0</div>
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
                            <div class="h5 mb-2 font-weight-bold text-gray-800 text-center p-3">0</div>
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
                            <div class="h5 mb-2 font-weight-bold text-gray-800 text-center p-3">0</div>
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
                            <div class="h5 mb-2 font-weight-bold text-gray-800 text-center p-3">0</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Table --}}
    {{-- Table Anto --}}
    {{-- <div class="table-container">
        <div class="table-header">
            <!-- <button><i class="fas fa-plus"></i> Tambah Kendaraan</button> -->
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Nama Kendaraan</th>
                    <th>Nomor Polisi</th>
                    <th>Status</th>
                    <th>Nama Pemegang</th>
                    <th>Tanggal Servis</th>
                    <th>Tanggal Pajak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            @if (count(value: $kendaraans) < 1)
                <tbody>
                    <tr>
                        <td colspan="9">
                            <p>Tidak ada Data</p> 
                        </td>
                    </tr>
                </tbody>
            @else
                <tbody>
                    @foreach ($kendaraans as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->jumlah_roda }}</t>
                            <td>{{ $item->merk_type }}</td>
                            <td>{{ $item->nomor_polisi }}</td>
                            <td><span class="status available">Tersedia</span></td>
                            <td>-</td>
                            <td>{{ $item->nama_pemegang }}</td>
                            <td>{{ $item->pajak }}</td>
                            <td>
                                <button class="edit">
                                    <a href="/kendaraan/{{ $item->id }}"></a>
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="delete"><i class="fas fa-trash"></i></button>
                                <button class="book-btn" data-id="1"><i class="fas fa-calendar-check"></i></button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            @endif
        </table>
    </div> --}}
@endsection
