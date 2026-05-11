<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Laporan Pemilahan Sampah</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #111;
        }

        .header {
            text-align: center;
            margin-bottom: 24px;
        }

        .header h2 {
            margin: 0 0 6px;
            font-size: 20px;
        }

        .header p {
            margin: 0;
            font-size: 12px;
        }

        .filter-box {
            margin-bottom: 16px;
            padding: 10px;
            border: 1px solid #444;
            font-size: 11px;
        }

        .filter-box table {
            width: 100%;
        }

        .filter-box td {
            padding: 3px 4px;
        }

        .summary {
            margin-bottom: 14px;
            font-size: 12px;
            font-weight: bold;
        }

        table.data-table {
            width: 100%;
            border-collapse: collapse;
        }

        table.data-table th,
        table.data-table td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }

        table.data-table th {
            background: #eaeaea;
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }

        .footer {
            margin-top: 28px;
            text-align: right;
            font-size: 11px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>Laporan Pemilahan Sampah</h2>
        <p>Sistem Monitoring Sampah</p>
    </div>

    <div class="filter-box">

        <table>
            <tr>
                <td width="20%">Tanggal Awal</td>
                <td width="30%">: {{ $filter['tanggal_awal'] ?: 'Semua' }}</td>

                <td width="20%">Tanggal Akhir</td>
                <td width="30%">: {{ $filter['tanggal_akhir'] ?: 'Semua' }}</td>
            </tr>

            <tr>
                <td>Lokasi</td>
                <td>: {{ $filter['lokasi_id'] ?: 'Semua' }}</td>

                <td>Kategori</td>
                <td>: {{ $filter['kategori_id'] ?: 'Semua' }}</td>
            </tr>
        </table>

    </div>

    <div class="summary">
        Total Data: {{ $laporan->count() }} |
        Total Volume: {{ $laporan->sum('volume_kg') }} KG
    </div>

    <table class="data-table">

        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Tanggal</th>
                <th width="20%">Lokasi</th>
                <th width="20%">Kategori</th>
                <th width="15%">Volume</th>
                <th width="15%">Status</th>
            </tr>
        </thead>

        <tbody>

            @forelse($laporan as $item)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->lokasi->nama_lokasi ?? '-' }}</td>
                    <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                    <td>{{ $item->volume_kg }} KG</td>
                    <td>{{ $item->status }}</td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" style="text-align: center;">
                        Tidak ada data laporan
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

    <div class="footer">
        Dicetak pada: {{ now()->format('d-m-Y H:i') }}
    </div>

</body>
</html>
