<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Perangkat Desa</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        tr:nth-child(even) {
            background-color: #e6e6e6;
        }
        
        tr:hover {
            background-color: #d9d9d9;
        }
    </style>
</head>
<body>
    <h1>Daftar Perangkat Desa</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($perangkat as $perangkat)
            <tr>
                <td>{{ $perangkat->nama }}</td>
                <td>{{ $perangkat->jabatan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
