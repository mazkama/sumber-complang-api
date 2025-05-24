<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class XenditService
{
    protected $secretKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->secretKey = config('xendit.secret_key'); // simpan di config/xendit.php atau .env
        $this->baseUrl = 'https://api.xendit.co';
    }

    /**
     * Buat invoice Xendit QRIS
     * 
     * @param array $params
     * @return array
     * @throws \Exception jika gagal
     */
    public function createInvoice(array $params): array
    {
        $url = $this->baseUrl . '/v2/invoices';

        $response = Http::withBasicAuth($this->secretKey, '')
            ->post($url, $params);

        if ($response->failed()) {
            throw new \Exception('Gagal membuat invoice Xendit: ' . $response->body());
        }

        return $response->json();
    }
}
