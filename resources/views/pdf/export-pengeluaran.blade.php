<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengeluaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h3>Laporan Pengeluaran</h3>
    <table>
        <thead>
            <tr>
                <th>Nama Kegiatan</th>
                <th>Nominal</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Kegiatan</th>
                <th>Tanggal Kegiatan</th>
                <th>RT</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengeluarans as $pengeluaran)
            <tr>
                <td>{{ $pengeluaran->nama }}</td>
                <td>{{ $pengeluaran->nominal }}</td>
                <td>{{ $pengeluaran->deskripsi }}</td>
                <td>{{ $pengeluaran->tanggal }}</td>
                <td>{{ $pengeluaran->lingkungans->nama }}</td>
                <td>{{ $pengeluaran->lingkungans->tanggal }}</td>
                <td>{{ $pengeluaran->lingkungans->rts->nama }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
