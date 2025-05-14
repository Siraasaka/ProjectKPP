<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Data Kendaraan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 6px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h3>Data Kendaraan</h3>
    <table>
        <thead>
            <tr>
                <th>NUP</th>
                <th>Jenis</th>
                <th>Merek</th>
                <th>Nomor Polisi</th>
                <th>Nomor Rangka</th>
                <th>Nomor Mesin</th>
                <th>Tahun</th>
                <th>Nama Pemilik</th>
                <th>Tanggal Pajak</th>
                <th>STNK</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nup }}</td>
                    <td>{{ $item->jenis_kendaraan }}</td>
                    <td>{{ $item->merek_kendaraan }}</td>
                    <td>{{ $item->nomor_polisi }}</td>
                    <td>{{ $item->nomor_rangka }}</td>
                    <td>{{ $item->nomor_mesin }}</td>
                    <td>{{ $item->tahun_pembuatan }}</td>
                    <td>{{ $item->nama_pemilik }}</td>
                    <td>{{ $item->pajak_jatuh_tempo }}</td>
                    <td>{{ $item->stnk_kadaluarsa }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
