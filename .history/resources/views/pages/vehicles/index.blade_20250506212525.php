@extends('layouts.app')

@section('content')
    <h1>Daftar Kendaraan</h1>
    <a href="{{ route('pages.vehicles.create') }}" class="btn btn-primary">Tambah Kendaraan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NUP</th>
                <th>Merek</th>
                <th>Nomor Polisi</th>
                <th>Status</th>
                <th>Pajak Jatuh Tempo</th>
                <th>STNK Kadaluarsa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->nup }}</td>
                    <td>{{ $vehicle->brand }}</td>
                    <td>{{ $vehicle->license_plate }}</td>
                    <td>
                        <span
                            class="badge badge-{{ $vehicle->status == 'available' ? 'success' : ($vehicle->status == 'in_use' ? 'warning' : 'danger') }}">
                            {{ $vehicle->status }}
                        </span>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($vehicle->tax_due_date)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($vehicle->stnk_expired)->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
