<!DOCTYPE html>
<html>
<head>
    <title>Laporan SLA</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 150px;
            height: auto;
        }
        .table-container {
            overflow-x: auto; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; 
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
            word-wrap: break-word; 
            font-size: 12px; 
        }
        th {
            background-color: #f2f2f2;
        }
        .signature {
            text-align: right;
            margin-top: 20px;
        }
        .user-info p {
        display: flex;
        justify-content: space-between;
        }
        .user-info strong {
            width: 100px; /
            display: inline-block;
        }
        .text-center {
        text-align: center;
    }
    </style>
</head>
<body>
    <div class="header">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/64/TVRI_Jawa_Barat_2023.svg/800px-TVRI_Jawa_Barat_2023.svg.png" alt="TVRI Jawa Barat" height="30">
        <h1>Laporan SLA</h1>
    </div>
    <div class="user-info">
        <p><strong>User :</strong> {{ $userData->name }}</p>
        <p><strong>Email :</strong> {{ $userData->email }}</p>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Daya TX</th>
                    <th>Keterangan</th>
                    <th>Refleksi TX</th>
                    <th>Keterangan</th>
                    <th>CN Signal IRD</th>
                    <th>Keterangan</th>
                    <th>Eb/No IRD</th>
                    <th>Keterangan</th>
                    <th>Tegangan RST</th>
                    <th>Keterangan</th>
                    <th>Jam Siaran</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $slaData->tanggal }}</td>
                    <td>{{ $slaData->daya_tx }}</td>
                    <td>{{ $slaData->keterangan_daya_tx }}</td>
                    <td>{{ $slaData->refleksi_tx }}</td>
                    <td>{{ $slaData->keterangan_refleksi_tx }}</td>
                    <td>{{ $slaData->cn_signal_ird }}</td>
                    <td>{{ $slaData->keterangan_cn_signal_ird }}</td>
                    <td>{{ $slaData->eb_no_ird }}</td>
                    <td>{{ $slaData->keterangan_eb_no_ird }}</td>
                    <td>{{ $slaData->tegangan_rst }}</td>
                    <td>{{ $slaData->keterangan_tegangan_rst }}</td>
                    <td>{{ $slaData->jam_siaran }}</td>
                    <td>{{ $slaData->keterangan_jam_siaran }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="signature">
    <p>Bandung, {{ date('d F Y') }}</p>
    <br><br><br>
    <p>{{ $userData->name }}</p>
    </div>

</body>
</html>
