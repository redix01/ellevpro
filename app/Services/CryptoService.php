<?php

namespace App\Services;

use App\Models\CryptoAsset;
use Illuminate\Support\Facades\Auth;

class CryptoService
{
    protected $apiKey;
    protected $url;

    public function __construct()
    {
        $this->apiKey = config('services.coinmarketcap.key');
        $this->url = config('services.coinmarketcap.url', 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest');
    }

    public function getTopCryptoAssets()
    {
        if (empty($this->apiKey)) {
            throw new \Exception("CoinMarketCap API key missing. Set COINMARKETCAP_API_KEY in your .env file.");
        }
        $parameters = [
            'start' => '1',
            'limit' => '15',
            'convert' => 'USD',
        ];

        $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY: ' . $this->apiKey,
        ];

        $qs = http_build_query($parameters);
        $request = "{$this->url}?{$qs}";

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $request,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_TIMEOUT => 60, // Set a timeout
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            throw new \Exception("cURL error: " . $error);
        }

        $decodedResponse = json_decode($response, true);

        if (!is_array($decodedResponse)) {
            throw new \Exception("API error: invalid response from CoinMarketCap.");
        }

        if (isset($decodedResponse['status']['error_code']) && $decodedResponse['status']['error_code'] !== 0) {
            throw new \Exception("API error: " . ($decodedResponse['status']['error_message'] ?? 'Unknown error'));
        }

        if (!isset($decodedResponse['data']) || !is_array($decodedResponse['data'])) {
            throw new \Exception("API error: unexpected response structure from CoinMarketCap.");
        }

        return $decodedResponse;
    }

    public function getBTCPrice()
    {
        $cryptoData = $this->getTopCryptoAssets();
        $btcData = collect($cryptoData['data'])->firstWhere('name', 'Bitcoin');

        if ($btcData) {
            return $btcData['quote']['USD']['price'];
        }

        return null;
    }

    public function getTokenPrice($tokenName)
    {
        $cryptoData = $this->getTopCryptoAssets();
        $tokenData = collect($cryptoData['data'])->firstWhere('name', $tokenName);

        if ($tokenData) {
            return $tokenData['quote']['USD']['price'];
        }

        return null; // Return null if token not found
    }


    public function syncCryptoAssets($userId)
    {
        $cryptoData = $this->getTopCryptoAssets();

        foreach ($cryptoData['data'] as $data) {
            $existingAsset = CryptoAsset::where('name', $data['name'])
                ->where('user_id', $userId)
                ->first();

            $price = $data['quote']['USD']['price'];
            $percentChange = $data['quote']['USD']['percent_change_24h'] ?? 0;

            // Retain the existing balance or default to 0.00 for new assets
            $balance = $existingAsset ? $existingAsset->balance : 0.00;

            // Calculate USD Rate (price per unit)

            CryptoAsset::updateOrCreate(
                ['name' => $data['name'], 'user_id' => $userId],
                [
                    'avatar' => $data['logo'] ?? null,
                    'price' => $price,
                    'change' => $percentChange,
                    'balance' => $balance,
                ]
            );
        }
}






}
