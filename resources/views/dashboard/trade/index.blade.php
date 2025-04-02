@extends('dashboard.layout.app')
@section('content')

<div class="dashboard-main-body">

    <div class="row gy-4 mt-4">
        <h6 class="fw-semibold mb-0 text-center">Live Trade</h6>

        <!-- Crypto Home Widgets Start -->
        <div class="col-xxl-8">
            <div class="row gy-4">
                <div class="col-12">
                    <div class="card h-100 radius-8 border-0">
                        <div class="card-body p-24">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                              <div class="tradingview-widget-container__widget"></div>
                              <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/cryptocurrencies/prices-all/" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
                              <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                              {
                              "width": "100%",
                              "height": 600,
                              "defaultColumn": "overview",
                              "screener_type": "crypto_mkt",
                              "displayCurrency": "USD",
                              "colorTheme": "dark",
                              "locale": "en"
                            }
                              </script>
                            </div>
                            <div class="tradingview-widget-container">
                              <div class="tradingview-widget-container__widget"></div>
                              <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/currencies/forex-cross-rates/" rel="noopener" target="_blank"><span class="blue-text"></span></a> </div>
                              <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
                              {
                              "width": "100%",
                              "height": 240,
                              "currencies": [
                                "EUR",
                                "USD",
                                "JPY",
                                "GBP",
                                "CHF",
                                "AUD",
                                "CAD",
                                "NZD",
                                "CNY",
                                "TRY",
                                "SEK",
                                "NOK"
                              ],
                              "isTransparent": false,
                              "colorTheme": "dark",
                              "locale": "en"
                            }
                              </script>
                            </div>
                            <!-- TradingView Widget END -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Crypto Home Widgets End -->

        <div class="col-xxl-4 mt-5">
            <div class="row gy-4">
                <div class="col-xxl-12 col-lg-6">
                    <div class="card h-100">
                        <div class="card-body p-24">
                            <span class="mb-4 text-sm text-secondary-light">Aval Balance</span>
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
                                            <option disabled selected>...</option>
                                            <option value="Live">Main Balance ({{ number_format($user->balance, 2)}})</option>
                                           <option value="Demo">Demo Account ({{ number_format($user->demo_balance, 2)}})</option>

                                        </select>

                                    </div>
                                    <div class="mb-20">
                                        <label for="">Market</label>
                                        <select name="market" id="marketSelect" class="form-select" aria-label="Default select example">
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
                                                <label for="takeProfit" class="form-label">Trade Amount</label>
                                                <input type="number" step="any" id="takeProfit" name="amount" class="form-control " required>
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

        <div class="col-xxl-12 d-none">
            <div class="row gy-4">
                <div class="col-xxl-12 col-lg-6">
                    <div class="card h-100">
                        <div class="card-body p-24">

                            <div class="table-responsive">
                                <table class="table basic-border-table mb-0">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Acct Type </th>
                                        <th>Market</th>
                                        <th>Pair</th>
                                        <th>Order</th>
                                        <th>Interval</th>
                                        <th>TP</th>
                                        <th>SL</th>
                                        <th>Amount</th>
                                        <th>PNL</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    @foreach($trades as $item)
                                        <tr>
                                            <td>{{ date('d M, Y', strtotime($item->created_at ?? '')) }}</td>
                                            <td>{{ $item->acct_type ?? '' }}</td>
                                            <td>{{ $item->market ?? '' }}</td>
                                            <td>{{ $item->tradePair() ?? '' }}</td>
                                            <td>{!! $item->trade_type() ?? '' !!}</td>
                                            <td>{{ $item->time_interval ?? '' }}</td>
                                            <td>{{ $item->take_profit ?? '' }}</td>
                                            <td>{{ $item->stop_loss ?? '' }}</td>
                                            <td>${{ number_format($item->amount, 2) }}</td>
                                            <td>${{ number_format($item->profit, 2) }}</td>
                                            <td>{!! $item->status() ?? ''!!}</td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>


<script>
document.addEventListener("DOMContentLoaded", () => {
    const marketSelect = document.getElementById("marketSelect");
    // Select only the elements that have the data-pair-container attribute
    const pairContainers = document.querySelectorAll('[data-pair-container]');

    // Function to hide all pair containers
    const hideAllContainers = () => {
        pairContainers.forEach(container => {
            container.style.display = "none";
        });
    };

    // Initial hide
    hideAllContainers();

    // Event listener for toggling
    marketSelect.addEventListener("change", (event) => {
        hideAllContainers();

        const selectedMarket = event.target.value;
        if (selectedMarket) {
            const targetContainer = document.querySelector(`[data-pair-container="${selectedMarket}"]`);
            if (targetContainer) {
                targetContainer.style.display = "block";
            }
        }
    });
});
</script>



@endsection
