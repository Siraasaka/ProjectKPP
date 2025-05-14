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
                                @if ($p->status_peminjaman == 'dipinjam')
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

                                    <button class="btn btn-sm btn-success mr-1" data-toggle="modal"
                                        data-target="#pinjamModal" data-id="{{ $p->id }}">
                                        <i class="fas fa-calendar-check"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endif
        </table>

        {{-- include modal partials --}}
        @include('pages.peminjaman.create-peminjaman', ['kendaraan' => $kendaraan])
        @include('pages.peminjaman.lihat-detail')

    </div>
@endsection

@section('scripts')
    <script>
        // Edit modal fill
        $('#editModal').on('show.bs.modal', function(e) {
            var btn = $(e.relatedTarget);
            var modal = $(this);
            modal.find('form').attr('action', '/kendaraan/' + btn.data('id'));
            modal.find('input[name=nup]').val(btn.data('nup'));
            modal.find('select[name=jenis_kendaraan]').val(btn.data('jenis'));
            modal.find('input[name=merek_kendaraan]').val(btn.data('merek'));
            modal.find('input[name=nomor_polisi]').val(btn.data('nopol'));
            modal.find('input[name=nomor_rangka]').val(btn.data('rangka'));
            modal.find('input[name=nomor_mesin]').val(btn.data('mesin'));
            modal.find('input[name=tahun_pembuatan]').val(btn.data('pembuatan'));
            modal.find('input[name=nama_pemilik]').val(btn.data('pemilik'));
            modal.find('input[name=pajak_jatuh_tempo]').val(btn.data('pajak'));
            modal.find('input[name=stnk_kadaluarsa]').val(btn.data('stnk'));
        });

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
