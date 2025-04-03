@extends('dashboard.layout.app')
@section('content')

<div class="dashboard-main-body">

    <div class="row ">

        <!-- Crypto Home Widgets Start -->
        <div class="col-xxl-8">
            <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener"
                    target="_blank"><span class="blue-text"></span></a></div>
            <script type="text/javascript"
                src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                    {
                        "symbols": [
                            {
                                "proName": "FOREXCOM:SPXUSD",
                                "title": "S&P 500"
                            },
                            {
                                "proName": "FOREXCOM:NSXUSD",
                                "title": "US 100"
                            },
                            {
                                "proName": "FX_IDC:EURUSD",
                                "title": "EUR/USD"
                            },
                            {
                                "proName": "BITSTAMP:BTCUSD",
                                "title": "Bitcoin"
                            },
                            {
                                "proName": "BITSTAMP:ETHUSD",
                                "title": "Ethereum"
                            }
                        ],
                            "showSymbolLogo": true,
                            "colorTheme": "dark",                                    "isTransparent": false,
                                        "displayMode": "adaptive",
                                            "locale": "en"
                    }
                </script>
        </div>
        <!-- TradingView Widget END -->

            <div style="margin-bottom: 10px;" class="row gy-2 ">
                <div class="col-lg-6 col-sm-12">
                    <div style="background-image: linear-gradient(5deg, #274E82, #000066);border:none" class="card shadow-none border ">
                        <div class="card-body p-20">
                          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                               <div class="w-25-px h-25-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                                    <span class="mb-0 w-40-px h-40-px bg-purple flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6 mb-0">
                                        <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                                    </span>
                                </div>

                                <div class="flex-grow-1">
                                    <h6 class="text-xl mb-1 text-white">Available Balance</h6>
                                </div>
                            </div>
                            <div class="mt-3 d-flex ">
                                <div class="">
                                    <h6 class="mb-8 text-white">${{ number_format($user->balance, 2) ?? '' }} </h6>
                                    <span class="text-warning">{{ number_format($user->BTCValue($user->balance), 5) ?? '' }} BTC</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div style="background-image: linear-gradient(10deg, #23272D, #23272D);border:none" class="card shadow-none border ">
                        <div class="card-body p-20">
                          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                               <div class="w-25-px h-25-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                                    <span class="mb-0 w-40-px h-40-px bg-secondary flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6 mb-0">
                                        <iconify-icon icon="streamline:bag-dollar-solid" class="icon"></iconify-icon>
                                    </span>
                                </div>

                                <div class="flex-grow-1">
                                    <h6 class="text-xl mb-1 text-white">Accumulating Balance</h6>
                                </div>
                            </div>
                            <div class="mt-3 d-flex ">
                                <div class="">
                                    <h6 class="mb-8 text-white">${{ number_format($user->acum_balance, 2) ?? '' }} </h6>
                                    <span  class="text-warning visibility-hidden">{{ number_format($user->BTCValue($user->profit), 5) ?? '' }} BTC</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div style="background-image: linear-gradient(10deg, #23272D, #23272D);border:none" class="card shadow-none border ">
                        <div class="card-body p-20">
                          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                               <div class="w-20-px h-20-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                                    <span class="mb-0 w-40-px h-40-px bg-primary flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6 mb-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32"><path fill="currentColor" d="m4.67 28l6.39-12l7.3 6.49a2 2 0 0 0 1.7.47a2 2 0 0 0 1.42-1.07L27 10.9l-1.82-.9l-5.49 11l-7.3-6.49a2 2 0 0 0-1.68-.51a2 2 0 0 0-1.42 1L4 25V2H2v26a2 2 0 0 0 2 2h26v-2Z"/></svg>
                                    </span>
                                </div>

                                <div class="flex-grow-1">
                                    <h6 class="text-xl mb-1 text-white">Trades Status</h6>
                                </div>
                            </div>
                            <br>
                            <div  class="row mt-3">
                                <div class="col">
                                    <strong class="text-success">Won: {{ $wonTrades ?? '0' }}</strong>
                                </div>
                                <div class="col">
                                    <strong class="text-danger">Loss: {{ $lossTrades ?? '0' }}</strong>
                                </div>
                            </div>
                            <div class="mt-3 d-flex visibility-hidden">
                                <h6 class="mb-8 text-white d-none">${{ number_format($sumTrades, 2) ?? '' }} </h6>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="col-lg-6 col-sm-12">
                    <div style="background-image: linear-gradient(100deg, orange, #353b48);border:none" class="card shadow-none border">
                        <div class="card-body p-20">
                            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                                <div class="w-25-px h-25-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                                    <span class="mb-0 w-40-px h-40-px bg-success-main flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6 mb-0">
                                        <iconify-icon icon="streamline:bag-dollar-solid" class="icon"></iconify-icon>
                                    </span>
                                </div>

                                <div class="flex-grow-1">
                                    <h6 class="text-xl mb-1 text-white">Profit</h6>
                                </div>
                            </div>
                            <div class="mt-3 d-flex">
                                <div>
                                    <h6 class="mb-8 text-white">${{ number_format($user->profit, 2) ?? '' }} </h6>
                                    <span class="text-white">{{ number_format($user->BTCValue($user->profit), 5) ?? '' }} BTC</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row gy-4">
                <div class="col-12">
                    <div class="card h-100 radius-8 border-0">
                        <div style="background: #273142" class="card-body p-24">
                            <!-- TradingView Widget BEGIN -->
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                      <script type="text/javascript">
                      new TradingView.widget(
                      {
                      "width": "auto",
                      "height": 610,
                      "symbol": "FX:EURUSD",
                      "timezone": "Etc/UTC",
                      "theme": "Dark",
                      "style": "1",
                      "locale": "en",
                      "toolbar_bg": "#f1f3f6",
                      "enable_publishing": false,
                      "withdateranges": true,
                      "range": "all",
                      "allow_symbol_change": true,
                      "save_image": false,
                      "details": true,
                      "hotlist": true,
                      "calendar": true,
                      "news": [
                        "stocktwits",
                        "headlines"
                      ],
                      "studies": [
                        "BB@tv-basicstudies",
                        "MACD@tv-basicstudies",
                        "MF@tv-basicstudies"
                      ],
                      "container_id": "tradingview_f263f"
                    }
                      );
                      </script>

                        <!-- TradingView Widget END -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Crypto Home Widgets End -->

        <div class="col-xxl-4 d-none d-lg-block">
            <div class="row gy-4">
                <div class="col-xxl-12 col-lg-6">
                    <div class="card h-100">
                        <div style="background: #273142; color: white" class="card-body p-24">
                            <span class="mb-4 text-sm text-white-50">Avail Balance</span>
                            <h6 class="mb-4 text-warning">${{ number_format($user->balance, 2) }}</h6>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-Buy" role="tabpanel" aria-labelledby="pills-Buy-tab" tabindex="0">
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
                                            <option value="Live" selected>Main Balance ({{ number_format($user->balance, 2)}})</option>
                                           <option value="Demon">Demo Account ({{ number_format($user->demo_balance, 2)}})</option>
                                        </select>
                                    </div>
                                    <div class="mb-20">
                                        <label for="">Market</label>
                                        <select name="market" class="form-select" aria-label="Default select example">
                                            <option disabled selected>Select Market</option>
                                            <option value="Cryptocurrency">Cryptocurrency</option>
                                            <option value="Stock">Stock</option>
                                            <option value="Forex">Forex</option>
                                            <option value="Commodities">Commodities</option>
                                            <option value="Indices">Indices</option>
                                            <option value="Bonds">Bonds</option>
                                            <option value="ETFs">ETFs</option>
                                        </select>
                                    </div>

                                     <div class="mb-20">

                                        <div data-pair-container="Cryptocurrency" class="pair-container" style="display: none;">
                                            <label for="">Pair</label>
                                            <select class="form-select" name="crypto_pair" aria-label="Default select example">

                                                @foreach($pairs as $item)
                                                    @if($item->type == 'crypto')
                                                        <option value="{{ $item->pair }}">{{ $item->pair }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div data-pair-container="Stock" style="display: none;">
                                            <label for="">Pair</label>
                                            <select class="form-select" name="stock_pair" aria-label="Default select example">
                                                 @foreach($pairs as $item)
                                                    @if($item->type == 'stock')
                                                        <option value="{{ $item->pair }}">{{ $item->pair }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div data-pair-container="Forex" style="display: none;">
                                            <label for="">Pair</label>
                                            <select class="form-select" name="forex_pair" aria-label="Default select example">
                                                 @foreach($pairs as $item)
                                                    @if($item->type == 'forex')
                                                        <option value="{{ $item->pair }}">{{ $item->pair }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div data-pair-container="Commodities" style="display: none;">
                                            <label for="">Pair</label>
                                            <select class="form-select" name="common_pair" aria-label="Default select example">
                                                 @foreach($pairs as $item)
                                                    @if($item->type == 'commodities')
                                                        <option value="{{ $item->pair }}">{{ $item->pair }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div data-pair-container="Indices" style="display: none;">
                                            <label for="">Pair</label>
                                            <select class="form-select" name="indices_pair" aria-label="Default select example">

                                                @foreach($pairs as $item)
                                                    @if($item->type == 'indices')
                                                        <option value="{{ $item->pair }}">{{ $item->pair }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div data-pair-container="Bonds" style="display: none;">
                                            <label for="">Pair</label>
                                            <select class="form-select" name="bond_pair" aria-label="Default select example">

                                                 @foreach($pairs as $item)
                                                    @if($item->type == 'bonds')
                                                        <option value="{{ $item->pair }}">{{ $item->pair }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div data-pair-container="ETFs" style="display: none;">
                                            <label for="">Pair</label>
                                            <select class="form-select" name="etf_pair" aria-label="Default select example">
                                                <option selected disabled>..select..</option>
                                                 @foreach($pairs as $item)
                                                    @if($item->type == 'etf')
                                                        <option value="{{ $item->pair }}">{{ $item->pair }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-20">
                                        <label for="time-interval">Select Time Interval</label>
                                        <select id="time-interval" name="time_interval" class="form-control" >
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
                                                    <input type="number" step="any" id="takeProfit" name="take_profit" class="form-control ">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-20">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="takeProfit" class="form-label text-white">Trade Amount</label>
                                                <input type="number" step="any" id="takeProfit" name="amount" required class="form-control ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>


<script>

// Get the DOM elements
const marketSelect = document.querySelector('select[name="market"]');
const pairContainers = document.querySelectorAll('[data-pair-container]');

// Hide all pair containers initially
pairContainers.forEach(container => {
    container.style.display = "none";
});

// Add event listener to the market select dropdown
marketSelect.addEventListener("change", () => {
    const selectedMarket = marketSelect.value;

    // Hide all pair containers
    pairContainers.forEach(container => {
        container.style.display = "none";
    });

    // Show the corresponding pair container if a valid market is selected
    if (selectedMarket) {
        const targetContainer = document.querySelector(`[data-pair-container="${selectedMarket}"]`);
        if (targetContainer) {
            targetContainer.style.display = "block";
        }
    }
});

</script>
@endsection
