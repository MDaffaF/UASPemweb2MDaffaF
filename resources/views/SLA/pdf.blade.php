<!DOCTYPE html>
<html>
<head>
    <title>Laporan SLA</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1 class="text-center">Laporan SLA</h1>
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
</body>
</html>
