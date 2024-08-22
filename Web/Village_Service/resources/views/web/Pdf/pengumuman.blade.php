<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pengumuman</title>
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
{{-- <body>
    <h1>Daftar Perangkat Desa</h1>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Judul</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengumuman as $pengumuman)
            <tr>
                <td>{{ $pengumuman->tanggal }}</td>
                <td>{{ $pengumuman->judul }}</td>
                <td>{{ $pengumuman->deskripsi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body> --}}

<table class="table">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            {{-- <th>Unit Price</th>
            <th>Total Price</th> --}}
        </tr>
    </thead>

    {{-- {{ for order_line in invoice.order_lines }} --}}
    @foreach($pengumuman as $pengumuman)
    <tr>
        <td>{{ $pengumuman->tanggal }}</td>
        <td>{{ $pengumuman->judul }}</td>
        <td class="text-end">{{ $pengumuman->deskripsi }}</td>
        {{-- <td class="text-end">${{ order_line.unit_price | math.format "F2" }}</td>
        <td class="text-end">${{ order_line.total_price | math.format "F2" }}</td> --}}
    </tr>
    @endforeach
    {{-- {{ end }} --}}

    {{-- <tfoot>
        <tr>
            <td class="text-end" colspan="4"><strong>Total:</strong></td>
            <td class="text-end">${{ invoice.total_price | math.format "F2" }}</td>
        </tr>
    </tfoot> --}}
</table>
</html>
