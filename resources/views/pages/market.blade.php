@extends('pages.layout.app')
@section('content')

   <main>
            <!-- Hero Section -->
    <div class="py-12 md:py-16 bg-gradient-to-b from-[#0D091C] to-[#0A0714]">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Explore <span class="text-[#00FF99]">Markets</span></h1>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">Discover and trade a wide range of cryptocurrencies with advanced tools and real-time data.</p>
            </div>
        </div>
    </div>

    <!-- Market Search Section -->
    <div class="py-4 bg-[#0A0714]">
        <div class="container mx-auto px-4">
            <div class="bg-[#0D091C] p-6 rounded-xl border border-[#00FF99]/10 mb-10">
                <div class="flex flex-col md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-4">
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" id="market-search" placeholder="Search cryptocurrencies..." class="w-full bg-[#1A1428] border border-[#00FF99]/20 rounded-lg p-3 pl-10 text-white focus:outline-none focus:border-[#00FF99] transition-colors">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <select id="market-sort" class="bg-[#1A1428] border border-[#00FF99]/20 rounded-lg p-3 text-white focus:outline-none focus:border-[#00FF99] transition-colors">
                            <option value="market_cap_desc">Market Cap (High to Low)</option>
                            <option value="market_cap_asc">Market Cap (Low to High)</option>
                            <option value="volume_desc">Volume (High to Low)</option>
                            <option value="volume_asc">Volume (Low to High)</option>
                            <option value="price_change_desc">Gainers</option>
                            <option value="price_change_asc">Losers</option>
                        </select>
                        <button id="apply-filter" class="bg-[#00FF99] text-[#0A0714] px-4 py-3 rounded-lg hover:bg-[#00FF99]/80 transition-colors font-medium">
                            <i class="fas fa-filter mr-2"></i> Filter
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Markets List Section -->
    <div class="py-4 bg-[#0A0714]">
        <div class="container mx-auto px-4">
            <div class="mb-8">
                <h2 class="text-2xl font-bold mb-6">Cryptocurrency <span class="text-[#00FF99]">Markets</span></h2>

                <!-- Desktop Table View (hidden on mobile) -->
                <div class="hidden md:block overflow-x-auto bg-[#0D091C] rounded-xl border border-[#00FF99]/10">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="border-b border-[#00FF99]/10 text-gray-300">
                                <th class="p-4 text-left">#</th>
                                <th class="p-4 text-left">Asset</th>
                                <th class="p-4 text-right">Price</th>
                                <th class="p-4 text-right">24h Change</th>
                                <th class="p-4 text-right">24h Volume</th>
                                <th class="p-4 text-right">Market Cap</th>
                                <th class="p-4 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody id="crypto-market-table">
            <tr class="hover:bg-[#00FF99]/5 transition-colors">
                <td class="px-6 py-4 text-gray-400">1</td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <img src="https://coin-images.coingecko.com/coins/images/1/large/bitcoin.png?1696501400" alt="BTC" class="w-8 h-8 mr-3">
                        <div>
                            <div class="font-medium">Bitcoin</div>
                            <div class="text-gray-400 text-sm">BTC</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 text-right font-medium">$109,239.00</td>
                <td class="px-6 py-4 text-right">
                    <span class="px-2 py-1 bg-green-500/10 text-green-500 rounded-md">+0.19%</span>
                </td>
                <td class="px-6 py-4 text-right text-gray-300">$39.3B</td>
                <td class="px-6 py-4 text-right text-gray-300">$2174.6B</td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="px-4 py-1 bg-[#00FF99]/10 text-[#00FF99] rounded-lg hover:bg-[#00FF99]/20 transition-colors text-sm">Trade</a>
                </td>
            </tr>

            <tr class="hover:bg-[#00FF99]/5 transition-colors">
                <td class="px-6 py-4 text-gray-400">2</td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <img src="https://coin-images.coingecko.com/coins/images/279/large/ethereum.png?1696501628" alt="ETH" class="w-8 h-8 mr-3">
                        <div>
                            <div class="font-medium">Ethereum</div>
                            <div class="text-gray-400 text-sm">ETH</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 text-right font-medium">$4,358.79</td>
                <td class="px-6 py-4 text-right">
                    <span class="px-2 py-1 bg-red-500/10 text-red-500 rounded-md">-2.59%</span>
                </td>
                <td class="px-6 py-4 text-right text-gray-300">$29.0B</td>
                <td class="px-6 py-4 text-right text-gray-300">$525.7B</td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="px-4 py-1 bg-[#00FF99]/10 text-[#00FF99] rounded-lg hover:bg-[#00FF99]/20 transition-colors text-sm">Trade</a>
                </td>
            </tr>

            <tr class="hover:bg-[#00FF99]/5 transition-colors">
                <td class="px-6 py-4 text-gray-400">3</td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <img src="https://coin-images.coingecko.com/coins/images/325/large/Tether.png?1696501661" alt="USDT" class="w-8 h-8 mr-3">
                        <div>
                            <div class="font-medium">Tether</div>
                            <div class="text-gray-400 text-sm">USDT</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 text-right font-medium">$1.00</td>
                <td class="px-6 py-4 text-right">
                    <span class="px-2 py-1 bg-red-500/10 text-red-500 rounded-md">-0.01%</span>
                </td>
                <td class="px-6 py-4 text-right text-gray-300">$81.1B</td>
                <td class="px-6 py-4 text-right text-gray-300">$168.0B</td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="px-4 py-1 bg-[#00FF99]/10 text-[#00FF99] rounded-lg hover:bg-[#00FF99]/20 transition-colors text-sm">Trade</a>
                </td>
            </tr>
        </tbody>
                    </table>
                </div>

                <!-- Mobile Card View (shown only on mobile) -->
                <div class="md:hidden">
                    <div id="crypto-market-cards" class="space-y-4">
            <div class="bg-[#1A1428] rounded-xl p-4 border border-[#00FF99]/10 hover:border-[#00FF99]/30 transition-all">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center">
                        <div class="w-10 h-10 mr-3 flex-shrink-0">
                            <img src="https://coin-images.coingecko.com/coins/images/1/large/bitcoin.png?1696501400" alt="BTC" class="w-full h-full">
                        </div>
                        <div>
                            <div class="font-medium">Bitcoin</div>
                            <div class="text-gray-400 text-xs">BTC</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="font-medium">$109,239.00</div>
                        <div class="text-green-500 text-sm">+0.19%</div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-2 mb-3">
                    <div class="bg-[#0D091C]/50 rounded-lg p-2">
                        <div class="text-xs text-gray-400">24h Volume</div>
                        <div class="text-sm font-medium">$39.3B</div>
                    </div>
                    <div class="bg-[#0D091C]/50 rounded-lg p-2">
                        <div class="text-xs text-gray-400">Market Cap</div>
                        <div class="text-sm font-medium">$2174.6B</div>
                    </div>
                </div>

                <a href="#" class="block w-full py-2 text-center bg-[#00FF99]/10 text-[#00FF99] rounded-lg hover:bg-[#00FF99]/20 transition-colors text-sm">Trade</a>
            </div>

            <div class="bg-[#1A1428] rounded-xl p-4 border border-[#00FF99]/10 hover:border-[#00FF99]/30 transition-all">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center">
                        <div class="w-10 h-10 mr-3 flex-shrink-0">
                            <img src="https://coin-images.coingecko.com/coins/images/279/large/ethereum.png?1696501628" alt="ETH" class="w-full h-full">
                        </div>
                        <div>
                            <div class="font-medium">Ethereum</div>
                            <div class="text-gray-400 text-xs">ETH</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="font-medium">$4,358.79</div>
                        <div class="text-red-500 text-sm">-2.59%</div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-2 mb-3">
                    <div class="bg-[#0D091C]/50 rounded-lg p-2">
                        <div class="text-xs text-gray-400">24h Volume</div>
                        <div class="text-sm font-medium">$29.0B</div>
                    </div>
                    <div class="bg-[#0D091C]/50 rounded-lg p-2">
                        <div class="text-xs text-gray-400">Market Cap</div>
                        <div class="text-sm font-medium">$525.7B</div>
                    </div>
                </div>

                <a href="#" class="block w-full py-2 text-center bg-[#00FF99]/10 text-[#00FF99] rounded-lg hover:bg-[#00FF99]/20 transition-colors text-sm">Trade</a>
            </div>

            <div class="bg-[#1A1428] rounded-xl p-4 border border-[#00FF99]/10 hover:border-[#00FF99]/30 transition-all">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center">
                        <div class="w-10 h-10 mr-3 flex-shrink-0">
                            <img src="https://coin-images.coingecko.com/coins/images/325/large/Tether.png?1696501661" alt="USDT" class="w-full h-full">
                        </div>
                        <div>
                            <div class="font-medium">Tether</div>
                            <div class="text-gray-400 text-xs">USDT</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="font-medium">$1.00</div>
                        <div class="text-red-500 text-sm">-0.01%</div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-2 mb-3">
                    <div class="bg-[#0D091C]/50 rounded-lg p-2">
                        <div class="text-xs text-gray-400">24h Volume</div>
                        <div class="text-sm font-medium">$81.1B</div>
                    </div>
                    <div class="bg-[#0D091C]/50 rounded-lg p-2">
                        <div class="text-xs text-gray-400">Market Cap</div>
                        <div class="text-sm font-medium">$168.0B</div>
                    </div>
                </div>

                <a href="#" class="block w-full py-2 text-center bg-[#00FF99]/10 text-[#00FF99] rounded-lg hover:bg-[#00FF99]/20 transition-colors text-sm">Trade</a>
            </div>
        </div>
                </div>

                <!-- Pagination -->
                <div class="mt-6 flex justify-between items-center">
                    <div class="text-gray-400 text-sm">
                        Showing <span id="showing-start">1</span>-<span id="showing-end">10</span> of <span id="total-count">100</span> cryptocurrencies
                    </div>
                    <div class="flex space-x-2">
                        <button id="prev-page" class="px-4 py-2 bg-[#1A1428] text-gray-300 rounded-lg border border-[#00FF99]/10 hover:border-[#00FF99]/30 disabled:opacity-50 disabled:cursor-not-allowed opacity-50 cursor-not-allowed" disabled="">
                            <i class="fas fa-chevron-left mr-1"></i> Previous
                        </button>
                        <button id="next-page" class="px-4 py-2 bg-[#1A1428] text-gray-300 rounded-lg border border-[#00FF99]/10 hover:border-[#00FF99]/30 disabled:opacity-50 disabled:cursor-not-allowed">
                            Next <i class="fas fa-chevron-right ml-1"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Top Gainers and Losers -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <div class="bg-[#0D091C] p-6 rounded-xl border border-[#00FF99]/10 hover:border-[#00FF99]/30 transition-colors">
                    <h3 class="text-xl font-semibold mb-4">Top <span class="text-[#00FF99]">Gainers</span></h3>
                    <div id="top-gainers" class="space-y-3">
                        <div class="flex justify-between items-center p-2 hover:bg-[#1A1428] rounded-lg transition-colors">
                            <div class="flex items-center">
                                <img src="https://coin-images.coingecko.com/coins/images/53247/large/square-bg-transparent.png?1752637478" alt="MemeCore" class="w-6 h-6 mr-3 rounded-full">
                                <span>M</span>
                            </div>
                            <div class="flex items-center">
                                <span class="mr-3">$0.813228</span>
                                <span class="text-green-500">+21.06%</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center p-2 hover:bg-[#1A1428] rounded-lg transition-colors">
                            <div class="flex items-center">
                                <img src="https://coin-images.coingecko.com/coins/images/11610/large/Bitget_logo.png?1736925727" alt="Bitget Token" class="w-6 h-6 mr-3 rounded-full">
                                <span>BGB</span>
                            </div>
                            <div class="flex items-center">
                                <span class="mr-3">$4.69</span>
                                <span class="text-green-500">+2.84%</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center p-2 hover:bg-[#1A1428] rounded-lg transition-colors">
                            <div class="flex items-center">
                                <img src="https://coin-images.coingecko.com/coins/images/39925/large/sky.jpg?1724827980" alt="Sky" class="w-6 h-6 mr-3 rounded-full">
                                <span>SKY</span>
                            </div>
                            <div class="flex items-center">
                                <span class="mr-3">$0.06602</span>
                                <span class="text-green-500">+1.82%</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center p-2 hover:bg-[#1A1428] rounded-lg transition-colors">
                            <div class="flex items-center">
                                <img src="https://coin-images.coingecko.com/coins/images/1047/large/sa9z79.png?1696502152" alt="KuCoin" class="w-6 h-6 mr-3 rounded-full">
                                <span>KCS</span>
                            </div>
                            <div class="flex items-center">
                                <span class="mr-3">$14.75</span>
                                <span class="text-green-500">+1.77%</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center p-2 hover:bg-[#1A1428] rounded-lg transition-colors">
                            <div class="flex items-center">
                                <img src="https://coin-images.coingecko.com/coins/images/12817/large/filecoin.png?1696512609" alt="Filecoin" class="w-6 h-6 mr-3 rounded-full">
                                <span>FIL</span>
                            </div>
                            <div class="flex items-center">
                                <span class="mr-3">$2.32</span>
                                <span class="text-green-500">+0.88%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#0D091C] p-6 rounded-xl border border-[#00FF99]/10 hover:border-[#00FF99]/30 transition-colors">
                    <h3 class="text-xl font-semibold mb-4">Top <span class="text-[#00FF99]">Losers</span></h3>
                    <div id="top-losers" class="space-y-3">
                        <div class="flex justify-between items-center p-2 hover:bg-[#1A1428] rounded-lg transition-colors">
                            <div class="flex items-center">
                                <img src="https://coin-images.coingecko.com/coins/images/50767/large/wlfi.png?1756438915" alt="World Liberty Financial" class="w-6 h-6 mr-3 rounded-full">
                                <span>WLFI</span>
                            </div>
                            <div class="flex items-center">
                                <span class="mr-3">$0.217304</span>
                                <span class="text-red-500">-22.70%</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center p-2 hover:bg-[#1A1428] rounded-lg transition-colors">
                            <div class="flex items-center">
                                <img src="https://coin-images.coingecko.com/coins/images/28600/large/bonk.jpg?1696527587" alt="Bonk" class="w-6 h-6 mr-3 rounded-full">
                                <span>BONK</span>
                            </div>
                            <div class="flex items-center">
                                <span class="mr-3">$0.000021</span>
                                <span class="text-red-500">-9.82%</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center p-2 hover:bg-[#1A1428] rounded-lg transition-colors">
                            <div class="flex items-center">
                                <img src="https://coin-images.coingecko.com/coins/images/7310/large/cro_token_logo.png?1696507599" alt="Cronos" class="w-6 h-6 mr-3 rounded-full">
                                <span>CRO</span>
                            </div>
                            <div class="flex items-center">
                                <span class="mr-3">$0.268274</span>
                                <span class="text-red-500">-7.97%</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center p-2 hover:bg-[#1A1428] rounded-lg transition-colors">
                            <div class="flex items-center">
                                <img src="https://coin-images.coingecko.com/coins/images/54342/large/pi_network.jpg?1739347576" alt="Pi Network" class="w-6 h-6 mr-3 rounded-full">
                                <span>PI</span>
                            </div>
                            <div class="flex items-center">
                                <span class="mr-3">$0.3417</span>
                                <span class="text-red-500">-7.33%</span>
                            </div>
                        </div>

                        <div class="flex justify-between items-center p-2 hover:bg-[#1A1428] rounded-lg transition-colors">
                            <div class="flex items-center">
                                <img src="https://coin-images.coingecko.com/coins/images/36530/large/ethena.png?1711701436" alt="Ethena" class="w-6 h-6 mr-3 rounded-full">
                                <span>ENA</span>
                            </div>
                            <div class="flex items-center">
                                <span class="mr-3">$0.628666</span>
                                <span class="text-red-500">-5.62%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-12 bg-[#0A0714]">
        <div class="container mx-auto px-4">
            <div class="bg-gradient-to-r from-[#0D091C] to-[#1A1428] p-8 md:p-12 rounded-2xl border border-[#00FF99]/20 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-[#00FF99]/10 rounded-full blur-3xl -mr-32 -mt-32"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl -ml-32 -mb-32"></div>
                <div class="relative z-10">
                    <div class="text-center max-w-3xl mx-auto">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6">Start Trading Today</h2>
                        <p class="text-xl text-gray-300 mb-8">Create an account in minutes and access all markets with low fees and advanced tools.</p>
                        <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                            <a href="{{ route('register') }}" class="px-8 py-3 bg-[#00FF99] text-[#0A0714] rounded-lg hover:bg-[#00FF99]/80 transition-colors font-medium text-center">Create Account</a>
                            <a href="#" class="px-8 py-3 border border-[#00FF99]/30 text-white rounded-lg hover:bg-[#00FF99]/10 transition-colors font-medium text-center">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        </main>
@endsection
