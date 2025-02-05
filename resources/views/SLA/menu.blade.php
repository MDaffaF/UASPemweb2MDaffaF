<!DOCTYPE html>
<html>
<head>
    <title>SLA</title>
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <style>
        body, html {
            height: 100%;
            background-color: #f0f0f0;
        }
        .container-menu {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }
        .menu-content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            width: 100%;
            overflow-x: auto;
        }
        .navbar {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
        }
        th, td {
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/TVRI_Jawa_Barat_2023.svg/800px-TVRI_Jawa_Barat_2023.svg.png" alt="TVRI Jawa Barat" height="30">
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-menu">
        <div class="menu-content">
            <h1 class="text-center">SLA</h1>
            <form class="mt-3" method="GET" action="{{ route('sla.index') }}">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan Tanggal, Daya TX, dll" value="{{ request()->get('search') }}">
                    <button class="btn btn-primary" type="submit" style="margin-right: 5px;">
                        <i class="fas fa-search"> Cari</i>
                    </button>
                    <a class="btn btn-primary" href="{{ route('sla.create') }}">
                        <i class="fas fa-plus"> Tambah</i>
                    </a>
                </div>
            </form>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Daya TX</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Refleksi TX</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">CN Signal IRD</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Eb/No IRD</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tegangan RST</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Jam Siaran</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slaData as $index => $sla)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $sla->tanggal }}</td>
                            <td>{{ $sla->daya_tx }}</td>
                            <td>{{ $sla->keterangan_daya_tx }}</td>
                            <td>{{ $sla->refleksi_tx }}</td>
                            <td>{{ $sla->keterangan_refleksi_tx }}</td>
                            <td>{{ $sla->cn_signal_ird }}</td>
                            <td>{{ $sla->keterangan_cn_signal_ird }}</td>
                            <td>{{ $sla->eb_no_ird }}</td>
                            <td>{{ $sla->keterangan_eb_no_ird }}</td>
                            <td>{{ $sla->tegangan_rst }}</td>
                            <td>{{ $sla->keterangan_tegangan_rst }}</td>
                            <td>{{ $sla->jam_siaran }}</td>
                            <td>{{ $sla->keterangan_jam_siaran }}</td>
                            <td>
                                <a href="{{ route('sla.edit', ['id' => $sla->id]) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"> Edit</i>
                                </a>
                                <a href="{{ route('sla.exportPdf', ['id' => $sla->id]) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-file-pdf"> Cetak</i>
                                </a>
                                <button class="btn btn-sm btn-danger" onclick="confirmDelete('{{ $sla->id }}')">
                                    <i class="fas fa-trash-alt"> Hapus</i>
                                </button>
                                <form id="delete-form-{{ $sla->id }}" action="{{ route('sla.destroy', ['id' => $sla->id]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($slaData->isEmpty())
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            Swal.fire({
                                title: 'Data Tidak Ditemukan',
                                text: 'Tidak ada data yang sesuai dengan pencarian Anda.',
                                icon: 'info',
                                confirmButtonText: 'OK'
                            });
                        });
                    </script>
                @endif
            </div>
        </div>
    </div>
    <footer class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid justify-content-center">
            <span class="navbar-text">
                &copy; 2024 TVRI Jawa Barat. Muhammad Daffa Fikriawan
            </span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang sudah dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
</body>
</html>
