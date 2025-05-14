@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kendaraan</h1>
        <div class="flex gap-2">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            <a href="/kendaraan/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kendaraan</a>
        </div>
    </div>

    {{-- Table --}}
    {{-- Table Anto --}}
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    {{-- <th>No</th> --}}
                    <th>NUP</th>
                    <th>Jenis Kendaraan</th>
                    <th>Merek</th>
                    <th>Nomor Polisi</th>
                    <th>Nomor Rangka</th>
                    <th>Nomor Mesin</th>
                    <th>Tahun Pembuatan</th>
                    <th>Nama Pemilik</th>
                    <th>Tanggal Pajak</th>
                    <th>STNK</th>
                    <th>Status</th>
                    {{-- <th>Jadwal Servis</th> --}}
                    <th>Aksi</th>
                </tr>
            </thead>
            @if ($kendaraans->isEmpty())
                <tbody>
                    <tr>
                        <td colspan="12">
                            <p>Tidak ada Data</p>
                        </td>
                    </tr>
                </tbody>
            @else
                <tbody>
                    @foreach ($kendaraans as $item)
                        <tr>

                            {{-- <td>{{ $item->id }}</td> --}}
                            {{-- <td>{{ $loop->iteration }}</td> --}}
                            <td>{{ $item->nup }}</td>
                            <td>
                                @if ($item->jenis_kendaraan == 'roda_empat')
                                    <span>Roda Empat</span>
                                @else
                                    <span>Roda Dua</span>
                                @endif
                            </td>
                            <td>{{ $item->merek_kendaraan }}</td>
                            <td>{{ $item->nomor_polisi }}</td>
                            <td>{{ $item->nomor_rangka }}</td>
                            <td>{{ $item->nomor_mesin }}</td>
                            <td>{{ $item->tahun_pembuatan }}</td>
                            <td>{{ $item->nama_pemilik }}</td>
                            <td>{{ $item->pajak_jatuh_tempo }}</td>
                            <td>{{ $item->stnk_kadaluarsa }}</td>
                            <td>
                                @if ($item->status_kendaraan == 'terpakai')
                                    <span class="status in-use">Digunakan</span>
                                @elseif($item->status_kendaraan == 'service')
                                    <span class="status service">Servis</span>
                                @else
                                    <span class="status available">Tersedia</span>
                                @endif
                            </td>



                            {{-- bagian aksi --}}
                            <td class="btn-aksi">
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editModal"
                                    data-id="{{ $item->id }}" data-nup="{{ $item->nup }}"
                                    data-jenis="{{ $item->jenis_kendaraan }}" data-merek="{{ $item->merek_kendaraan }}"
                                    data-nopol="{{ $item->nomor_polisi }}" data-rangka="{{ $item->nomor_rangka }}"
                                    data-mesin="{{ $item->nomor_mesin }}" data-pembuatan="{{ $item->tahun_pembuatan }}"
                                    data-pemilik="{{ $item->nama_pemilik }}" data-pajak="{{ $item->pajak_jatuh_tempo }}"
                                    data-stnk="{{ $item->stnk_kadaluarsa }}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#konfirmasiHapus{{ $item->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                                {{-- <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                    data-bs-target="#pinjamForm{{ $item->id }}">
                                    <i class="fas fa-calendar-check"></i>
                                </button> --}}
                                <a href="/kendaraan/{{ $item->id }}/pinjam">
                                    <button type="button" class="btn btn-sm btn-success">
                                        <i class="fas fa-calendar-check"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @include('pages.kendaraan.konfirmasi-hapus')
                        @include('pages.kendaraan.popUp-pinjam')
                    @endforeach
                </tbody>
            @endif
        </table>
    </div>
@endsection
