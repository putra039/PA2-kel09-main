<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Penduduk</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed; /* Menentukan lebar tabel secara tetap */
        }
        
        th, td {
            border: 1px solid black;
            padding: 8px;
            word-wrap: break-word; /* Memastikan teks dalam sel dapat mematahkan baris */
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
        
        /* Menentukan lebar kolom dengan persentase */
        th:nth-child(1),
        td:nth-child(1) {
            width: 3%;
        }
        
        th:nth-child(2),
        td:nth-child(2) {
            width: 10%;
        }
        
        /* Sisakan ruang untuk kolom lainnya */
        th:nth-child(3),
        td:nth-child(3),
        th:nth-child(4),
        td:nth-child(4),
        th:nth-child(5),
        td:nth-child(5),
        th:nth-child(6),
        td:nth-child(6),
        th:nth-child(7),
        td:nth-child(7),
        th:nth-child(8),
        td:nth-child(8),
        th:nth-child(9),
        td:nth-child(9),
        th:nth-child(10),
        td:nth-child(10),
        th:nth-child(11),
        td:nth-child(11),
        th:nth-child(12),
        td:nth-child(12) {
            width: 6%;
        }
    </style>
</head>
<body>
    <h1>Daftar Penduduk</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>No. Telp</th>
                <th>Alamat</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Usia</th>
                <th>Jenis Kelamin</th>
                <th>Pekerjaan</th>
                <th>Agama</th>
                <th>KK</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->nik }}</td>
                <td>{{ $user->no_telp }}</td>
                <td>{{ $user->alamat }}</td>
                <td>{{ $user->tempat_lahir }}</td>
                <td>{{ $user->tanggal_lahir }}</td>
                <td>{{ $user->usia }}</td>
                <td>{{ $user->jenis_kelamin }}</td>
                <td>{{ $user->pekerjaan }}</td>
                <td>{{ $user->agama }}</td>
                <td>{{ $user->kk }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
{{-- <div class="card">
    <div class="card-header d-flex justify-content-between">
       <div class="header-title">
          <h4 class="card-title">Tables</h4>
       </div>
    <div class="header-action">
             <i  type="button" data-toggle="collapse" data-target="#table-1" aria-expanded="false" aria-controls="alert-1">
                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                </svg>
             </i>
          </div>
    </div>
    <div class="card-body">
       <div class="collapse" id="table-1">
             <div class="card"><kbd class="bg-dark"><pre id="tables" class="text-white"><code>
&#x3C;table class=&#x22;table&#x22;&#x3E;
&#x3C;thead&#x3E;
&#x3C;tr&#x3E;
&#x3C;th scope=&#x22;col&#x22;&#x3E;#&#x3C;/th&#x3E;
&#x3C;th scope=&#x22;col&#x22;&#x3E;First&#x3C;/th&#x3E;
&#x3C;th scope=&#x22;col&#x22;&#x3E;Last&#x3C;/th&#x3E;
&#x3C;th scope=&#x22;col&#x22;&#x3E;Handle&#x3C;/th&#x3E;
&#x3C;/tr&#x3E;
&#x3C;/thead&#x3E;
&#x3C;tbody&#x3E;
&#x3C;tr&#x3E;
&#x3C;th scope=&#x22;row&#x22;&#x3E;1&#x3C;/th&#x3E;
&#x3C;td&#x3E;Mark&#x3C;/td&#x3E;
&#x3C;td&#x3E;Otto&#x3C;/td&#x3E;
&#x3C;td&#x3E;@mdo&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;th scope=&#x22;row&#x22;&#x3E;2&#x3C;/th&#x3E;
&#x3C;td&#x3E;Jacob&#x3C;/td&#x3E;
&#x3C;td&#x3E;Thornton&#x3C;/td&#x3E;
&#x3C;td&#x3E;@fat&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;tr&#x3E;
&#x3C;th scope=&#x22;row&#x22;&#x3E;3&#x3C;/th&#x3E;
&#x3C;td&#x3E;Larry&#x3C;/td&#x3E;
&#x3C;td&#x3E;the Bird&#x3C;/td&#x3E;
&#x3C;td&#x3E;@twitter&#x3C;/td&#x3E;
&#x3C;/tr&#x3E;
&#x3C;/tbody&#x3E;
&#x3C;/table&#x3E;
</code></pre></kbd></div>
          </div>
       <p>The <code>.table </code> class adds basic styling to a table.</p>
       <table class="table">
          <thead>
             <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIK</th>
                <th scope="col">No. Telp</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tempat Lahir</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Usia</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">Agama</th>
                <th scope="col">KK</th>
             </tr>
          </thead>
          <tbody>
            @foreach($user as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->nik }}</td>
                <td>{{ $user->no_telp }}</td>
                <td>{{ $user->alamat }}</td>
                <td>{{ $user->tempat_lahir }}</td>
                <td>{{ $user->tanggal_lahir }}</td>
                <td>{{ $user->usia }}</td>
                <td>{{ $user->jenis_kelamin }}</td>
                <td>{{ $user->pekerjaan }}</td>
                <td>{{ $user->agama }}</td>
                <td>{{ $user->kk }}</td>
            </tr>
            @endforeach
          </tbody>
       </table>
    </div>
 </div>
 @endsection --}}