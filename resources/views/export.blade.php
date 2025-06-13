<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi Bulanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .summary {
            margin-top: 20px;
            width: 50%;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Sumber Complang</h1>
        <h2>Laporan Transaksi {{ $jenisFilter != 'semua' ? 'Tiket '.ucfirst($jenisFilter) : '' }} Bulan {{ $bulan }} {{ $tahun }}</h2>
        <p>Tanggal Cetak: {{ date('d/m/Y H:i') }} WIB</p>
    </div>
    
    <!-- Tabel Transaksi -->
    <h2>A. Data Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Order ID</th>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>No. HP</th>
                @if($jenisFilter == 'semua')
                <th>Tiket Kolam</th>
                <th>Tiket Parkir</th>
                @endif
                <th>Total Tiket</th>
                <th>Metode Pembayaran</th>
                <th>Status</th>
                <th>Total (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $index => $trx)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $trx->order_id }}</td>
                    <td>{{ $trx->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $trx->user->name ?? 'Unknown' }}</td>
                    <td>{{ $trx->user->no_hp ?? '-' }}</td>
                    @if($jenisFilter == 'semua')
                    <td>{{ $ticketCounts[$trx->id_transaksi_tiket]['kolam'] ?? 0 }}</td>
                    <td>{{ $ticketCounts[$trx->id_transaksi_tiket]['parkir'] ?? 0 }}</td>
                    @endif
                    <td>{{ $ticketCounts[$trx->id_transaksi_tiket]['total'] ?? 0 }}</td>
                    <td>{{ ucfirst($trx->metode_pembayaran) }}</td>
                    <td>{{ ucfirst($trx->status) }}</td>
                    <td>{{ number_format($trx->total_harga, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="{{ $jenisFilter == 'semua' ? '10' : '9' }}" style="text-align: center">Tidak ada data transaksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    <!-- Ringkasan -->
    <h2>B. Ringkasan</h2>
    <table class="summary">
        <tr>
            <th>Jumlah Transaksi Selesai</th>
            <td>{{ $countByStatus['selesai'] }}</td>
        </tr>
        <tr>
            <th>Jumlah Transaksi Dibayar</th>
            <td>{{ $countByStatus['dibayar'] }}</td>
        </tr>
        <tr>
            <th>Jumlah Transaksi Divalidasi</th>
            <td>{{ $countByStatus['divalidasi'] }}</td>
        </tr>
        <tr>
            <th>Total Transaksi</th>
            <td>{{ array_sum($countByStatus) }}</td>
        </tr>
        @if($jenisFilter == 'semua' || $jenisFilter == 'kolam')
        <tr>
            <th>Total Tiket Kolam Terjual</th>
            <td>{{ $totalTickets['kolam'] ?? 0 }} tiket</td>
        </tr>
        @endif
        @if($jenisFilter == 'semua' || $jenisFilter == 'parkir')
        <tr>
            <th>Total Tiket Parkir Terjual</th>
            <td>{{ $totalTickets['parkir'] ?? 0 }} tiket</td>
        </tr>
        @endif
        <tr>
            <th>Total Tiket Terjual</th>
            <td>{{ $totalTickets['total'] ?? 0 }} tiket</td>
        </tr>
        <tr>
            <th>Total Omset</th>
            <td>Rp {{ number_format($totalOmset, 0, ',', '.') }}</td>
        </tr>
    </table>
    
    <div class="footer">
        <p>Dicetak oleh Sistem Pemesanan Tiket Sumber Complang - {{ date('Y') }}</p>
    </div>
</body>
</html>