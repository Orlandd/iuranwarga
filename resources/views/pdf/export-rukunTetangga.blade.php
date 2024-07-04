<!DOCTYPE html>
<html>
<head>
    <title>Data Rukun Tetangga</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Data Rukun Tetangga</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama RT</th>
                <th>Nama Ketua RT</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rts as $rt)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rt->nama }}</td>
                    <td>{{ optional($rt->warga->first())->nama ?? 'Tidak ada Ketua' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
