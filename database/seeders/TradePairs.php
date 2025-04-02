<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TradePairs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cryptoPairs = [
            'BTC/USDT', 'BTC/BCH', 'ETH/LTC', 'BTC/ETH', 'XRP/BTC', 'ADA/ETH',
            'DOT/USDT', 'BNB/USDT', 'SOL/ETH', 'LTC/USDT', 'DOGE/BTC'
        ];

        $stockPairs = [
            'AAPL/MSFT', 'GOOGL/AMZN', 'TSLA/FB', 'NFLX/AMD', 'INTC/NVDA',
            'BA/F', 'KO/PEP', 'DIS/T', 'GS/JPM', 'XOM/CVX'
        ];


        $forexPairs = [
            'EUR/USD', 'GBP/USD', 'USD/JPY', 'AUD/USD', 'USD/CAD',
            'NZD/USD', 'USD/CHF', 'EUR/GBP', 'EUR/JPY', 'GBP/JPY'
        ];

        $commPairs = [
            'XAU/USD', 'XAG/USD', 'WTI/USD', 'BRENT/USD', 'NG/USD',
            'COPPER/USD', 'PLATINUM/USD', 'PALLADIUM/USD', 'SOYBEAN/USD', 'CORN/USD',
            'SUGAR/USD', 'COFFEE/USD', 'COCOA/USD', 'RICE/USD', 'WHEAT/USD',
            'COTTON/USD', 'ORANGE/USD', 'LEANHOG/USD', 'LIVECATTLE/USD', 'RUBBER/USD'
        ];

        $indicesPairs = [
            'DJI/SPX', 'SPX/NASDAQ', 'DJI/NASDAQ', 'FTSE/DAX', 'DAX/CAC',
            'NIKKEI/HSI', 'NIKKEI/ASX', 'HSI/ASX', 'SENSEX/HSI', 'SENSEX/DAX',
            'SPX/RUSSELL', 'RUSSELL/NASDAQ', 'FTSE/ASX', 'NIKKEI/FTSE', 'DAX/FTSE',
            'CAC/DAX', 'SPX/DJI', 'FTSE/NIKKEI', 'SPX/CAC', 'NASDAQ/DAX'
        ];

        $BondPairs = [
            'US10Y/US30Y', 'US10Y/UK10Y', 'US10Y/GER10Y', 'US10Y/JAP10Y', 'UK10Y/GER10Y',
            'UK10Y/JAP10Y', 'US30Y/GER30Y', 'US30Y/UK30Y', 'US30Y/JAP30Y', 'UK30Y/GER30Y',
            'UK30Y/JAP30Y', 'GER10Y/JAP10Y', 'GER30Y/JAP30Y', 'US10Y/US5Y', 'US10Y/US2Y',
            'US30Y/US2Y', 'UK10Y/UK5Y', 'UK10Y/UK2Y', 'GER10Y/GER5Y', 'GER10Y/GER2Y'
        ];

        $etfPairs = [
            'SPY/QQQ', 'IVV/VTI', 'VOO/XLK', 'XLF/XLY', 'XLE/XLU',
            'ARKK/ARKQ', 'IWM/VTWO', 'VOO/SPY', 'IWF/IWD', 'VGT/FTEC',
            'IYR/XLRE', 'XHB/ITB', 'KBE/KRE', 'SLV/GLD', 'XLV/XBI',
            'XRT/RTH', 'XOP/OIH', 'VDC/XLP', 'VWO/EEM', 'SPY/ARKK'
        ];

        foreach ($cryptoPairs as $pair) {
            DB::table('trade_pairs')->insert([
                'type' => 'crypto',
                'pair' => $pair,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach ($stockPairs as $pair) {
            DB::table('trade_pairs')->insert([
                'type' => 'stock',
                'pair' => $pair,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach ($forexPairs as $pair) {
            DB::table('trade_pairs')->insert([
                'type' => 'forex',
                'pair' => $pair,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        foreach ($commPairs as $pair) {
            DB::table('trade_pairs')->insert([
                'type' => 'commodities',
                'pair' => $pair,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        foreach ($indicesPairs as $pair) {
            DB::table('trade_pairs')->insert([
                'type' => 'indices',
                'pair' => $pair,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        foreach ($BondPairs as $pair) {
            DB::table('trade_pairs')->insert([
                'type' => 'bonds',
                'pair' => $pair,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        foreach ($etfPairs as $pair) {
            DB::table('trade_pairs')->insert([
                'type' => 'etf',
                'pair' => $pair,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }


}
