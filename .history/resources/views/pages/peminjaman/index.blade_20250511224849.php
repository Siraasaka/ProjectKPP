@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Peminjaman</h1>
        <div class="flex gap-2">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createPeminjamanModal">
                <i class="fas fa-plus fa-sm text-white-50"></i> Peminjaman Baru</a>
        </div>
    </div>

    {{-- Table --}}
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kendaraan</th>
                    <th>Peminjam</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            @if ($peminjaman->isEmpty())
                <tbody>
                    <tr>
                        <td colspan="7 ">
                            <p>Tidak ada Data</p>
                        </td>
                    </tr>
                </tbody>
            @else
                <tbody>
                    @foreach ($peminjaman as $p)
                        <tr>

                            <td>{{ $p->id }}</td>
                            <td>{{ $p->kendaraan->merek_kendaraan }} - {{ $p->kendaraan->nomor_polisi }}</td>
                            <td>{{ $p->nama_peminjam }}</td>
                            <td>{{ $p->tanggal_pinjam }} - {{ $p->tanggal_kembali }}</td>
                            <td>
                                @if ($p->status_pinjam == 'dipinjam')
                                    <span class="status in-use">Dipinjam</span>
                                @else
                                    <span class="status service">Selesai</span>
                                @endif
                            </td>

                            {{-- bagian aksi --}}
                            <td class="teks-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <button class="btn btn-info btn-sm mr-1" data-toggle="modal"
                                        data-target="#detailModal{{ $p->id }}">
                                        Detail
                                    </button>

                                    <button class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#konfirmasiSelesaiModal{{ $p->id }}">
                                        Selesai
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @include('pages.peminjaman.lihat-detail', ['p' => $p])
                    @endforeach
                </tbody>
            @endif
        </table>

        {{-- include modal partials --}}
        @include('pages.peminjaman.create-peminjaman', ['kendaraan' => $kendaraan])


    </div>
@endsection

@section('scripts')
    <script>
        // Pinjam modal
        $('#pinjamModal').on('show.bs.modal', function(e) {
            var btn = $(e.relatedTarget);
            $(this).find('input[name=kendaraan_id]').val(btn.data('id'));
        });

        // Servis modal
        $('#servisModal').on('show.bs.modal', function(e) {
            var btn = $(e.relatedTarget);
            $(this).find('input[name=kendaraan_id]').val(btn.data('id'));
        });
    </script>
@endsection
