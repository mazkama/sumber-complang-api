<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran Berhasil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-yellow-50 text-black min-h-screen flex items-center justify-center">

    <div class="bg-white border-[4px] border-black rounded-xl p-10 shadow-[8px_8px_0_0_rgba(0,0,0,1)] max-w-xl w-full">
        <div class="text-center">
            <div class="text-5xl font-extrabold text-green-600 mb-4">✔</div>
            <h1 class="text-3xl font-bold mb-2">Pembayaran Berhasil!</h1>
            <p class="text-lg mb-6">Terima kasih, transaksi Anda telah diproses.</p>
        </div>

        <div class="bg-yellow-100 border-[3px] border-black p-4 rounded-lg shadow-[4px_4px_0_0_rgba(0,0,0,1)]">
            <table class="w-full text-left">
                <tr class="border-b border-black">
                    <th class="py-2">🆔 ID Pesanan</th>
                    <td class="py-2">{{ $orderId }}</td>
                </tr>
                <tr class="border-b border-black">
                    <th class="py-2">📦 Status</th>
                    <td class="py-2 uppercase">{{ $transactionStatus }}</td>
                </tr>
                <tr class="border-b border-black">
                    <th class="py-2">💳 Pembayaran</th>
                    <td class="py-2 capitalize">{{ $paymentType }}</td>
                </tr>
                <tr>
                    <th class="py-2">💰 Total</th>
                    <td class="py-2">Rp {{ number_format($grossAmount, 0, ',', '.') }}</td>
                </tr>
            </table>
        </div>

        <div class="text-center mt-8">
            <a href="{{ url('/') }}"
               class="bg-pink-500 hover:bg-pink-600 text-white font-bold px-6 py-3 border-[3px] border-black rounded-lg shadow-[4px_4px_0_0_rgba(0,0,0,1)] inline-block transition-all">
                Kembali ke Beranda
            </a>
        </div>
    </div>

</body>
</html>
