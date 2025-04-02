<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Trading Sidebar -->
<div class="trading-sidebar" id="tradingSidebar">
    <div class="p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="m-4 text-white">Trade</h5>
            <button type="button" class="btn-close" id="closeSidebar"></button>
        </div>

        <div class="m-3">
            <form action="{{ route('user.trade.store') }}" method="POST">
                @csrf
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mb-20">
                    <label for="">Select Account Type</label>
                    <select name="acct_type" class="form-select" aria-label="Default select example">
                        <option disabled selected>...</option>
                        <option value="Live">Main Balance ({{ number_format(auth()->user()->balance, 2)}})</option>
                        <option value="Demo">Demo Account ({{ number_format(auth()->user()->demo_balance, 2)}})</option>
                    </select>
                </div>
                <div class="mb-20">
    <label for="tradeMarketSelect">Market</label>
    <select name="trade_market" id="tradeMarketSelect" class="form-select" aria-label="Default select example">
        <option disabled selected>Select Market</option>
        <option value="Crypto">Cryptocurrency</option>
        <option value="Stock">Stock</option>
        <option value="Forex">Forex</option>
        <option value="Commodities">Commodities</option>
        <option value="Indices">Indices</option>
        <option value="Bonds">Bonds</option>
        <option value="ETFs">ETFs</option>
    </select>
</div>

<div class="mb-20">
    <div data-trade-pair-container="Cryptocurrency" class="trade-pair-container" style="display: none;">
        <label for="">Pair</label>
        <select class="form-select" name="crypto_pair" aria-label="Default select example">
            <option selected disabled>..select..</option>
            @foreach(auth()->user()->tradePairs() as $item)
                @if($item->type == 'crypto')
                    <option value="{{ $item->id }}">{{ $item->pair }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div data-trade-pair-container="Stock" class="trade-pair-container" style="display: none;">
        <label for="">Pair</label>
        <select class="form-select" name="stock_pair" aria-label="Default select example">
            <option selected disabled>..select..</option>
            @foreach(auth()->user()->tradePairs() as $item)
                @if($item->type == 'stock')
                    <option value="{{ $item->pair }}">{{ $item->pair }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div data-trade-pair-container="Forex" class="trade-pair-container" style="display: none;">
        <label for="">Pair</label>
        <select class="form-select" name="forex_pair" aria-label="Default select example">
            <option selected disabled>..select..</option>
            @foreach(auth()->user()->tradePairs() as $item)
                @if($item->type == 'forex')
                    <option value="{{ $item->pair }}">{{ $item->pair }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div data-trade-pair-container="Commodities" class="trade-pair-container" style="display: none;">
        <label for="">Pair</label>
        <select class="form-select" name="common_pair" aria-label="Default select example">
            <option selected disabled>..select..</option>
            @foreach(auth()->user()->tradePairs() as $item)
                @if($item->type == 'commodities')
                    <option value="{{ $item->pair }}">{{ $item->pair }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div data-trade-pair-container="Indices" class="trade-pair-container" style="display: none;">
        <label for="">Pair</label>
        <select class="form-select" name="indices_pair" aria-label="Default select example">
            <option selected disabled>..select..</option>
            @foreach(auth()->user()->tradePairs() as $item)
                @if($item->type == 'indices')
                    <option value="{{ $item->pair }}">{{ $item->pair }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div data-trade-pair-container="Bonds" class="trade-pair-container" style="display: none;">
        <label for="">Pair</label>
        <select class="form-select" name="bond_pair" aria-label="Default select example">
            <option selected disabled>..select..</option>
            @foreach(auth()->user()->tradePairs() as $item)
                @if($item->type == 'bonds')
                    <option value="{{ $item->pair }}">{{ $item->pair }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div data-trade-pair-container="ETFs" class="trade-pair-container" style="display: none;">
        <label for="">Pair</label>
        <select class="form-select" name="etf_pair" aria-label="Default select example">
            <option selected disabled>..select..</option>
            @foreach(auth()->user()->tradePairs() as $item)
                @if($item->type == 'etf')
                    <option value="{{ $item->pair }}">{{ $item->pair }}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

                <div class="mb-20">
                    <label for="time-interval">Select Time Interval</label>
                    <select id="time-interval" name="time_interval" class="form-control text-white">
                        <option value="5min">5 mins</option>
                        <option value="10min">10 mins</option>
                        <option value="15min">15 mins</option>
                        <option value="30min">30 mins</option>
                        <option value="1hr">1 hr</option>
                        <option value="2hr">2 hrs</option>
                        <option value="3hr">3 hrs</option>
                        <option value="4hr">4 hrs</option>
                        <option value="5hr">5 hrs</option>
                        <option value="6hr">6 hrs</option>
                        <option value="12hr">12 hrs</option>
                        <option value="24hr">24 hrs</option>
                    </select>
                </div>

                <div class="mb-20">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <label for="stopLoss" class="form-label text-danger">Stop Loss</label>
                                <input type="number" step="any" id="stopLoss" name="stop_loss" class="form-control ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <label for="takeProfit" class="form-label text-success">Take Profit</label>
                                <input type="number" step="any" id="takeProfit" name="take_profit"
                                       class="form-control ">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="mb-20">
                    <div class="col">
                        <div class="mb-3">
                            <label for="takeProfit" class="form-label">Trade Amount</label>
                            <input type="number" step="any" id="takeProfit" name="amount" required
                                   class="form-control ">
                        </div>
                    </div>
                </div>
                <div class="row mt-3 gy-3">
                    <div class="col-md-6">
                        <button type="submit" name="trade_type" value="buy" class="btn btn-success w-100">Buy</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" name="trade_type" value="sell" class="btn btn-danger w-100">Sell</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    // Get the trade market select element and its related pair containers
    const tradeMarketSelect = document.getElementById("tradeMarketSelect");
    const tradePairContainers = document.querySelectorAll(".trade-pair-container");

    // Function to hide all trade pair containers
    const hideAllTradeContainers = () => {
        tradePairContainers.forEach(container => {
            container.style.display = "none";
        });
    };

    // Initial hide of all containers
    hideAllTradeContainers();

    // Listen for changes on the trade market select
    tradeMarketSelect.addEventListener("change", (event) => {
        hideAllTradeContainers();

        const selectedMarket = event.target.value;
        if (selectedMarket) {
            // Look for the container that corresponds to the selected market
            const targetContainer = document.querySelector(`[data-trade-pair-container="${selectedMarket}"]`);
            if (targetContainer) {
                targetContainer.style.display = "block";
            }
        }
    });
});
</script>
