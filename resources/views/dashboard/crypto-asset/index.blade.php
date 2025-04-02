@extends('dashboard.layout.app')
@section('content')

    <div class="container-fluid main-content px-2 px-lg-4">
        <div class="row my-2 g-3 g-lg-4">
          <div class="col-md-6 col-lg-5 col-xxl-4">
            <div class="wallet-balance">
              <div class="left-wrapper">
                <div class="left">
                  <div class="d-flex align-items-center gap-2 mb-4">
                    <img src="{{ asset('assets/img/crypto/bitcoin.png') }}" alt="">
                    <span class="fw-bold">Bitcoin</span>
                  </div>
                  <span>Total Balance</span>
                  <h2 id="btcBalance" class="text-white mt-2">0.0000000</h2>
                    <span class="primary">{{ number_format($balance, 2) }} USD</span>
                  <div class="d-flex gap-3 pt-4">
                    <a href="{{ route('user.withdraw.index') }}" class="primary-btn-lg">Withdraw</a>
                    <a href="{{ route('user.deposit.index') }}" class="outline-btn-lg">Deposit</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-7 col-xxl-7">
            <div class="right">
              <div class="py-3">
                <div class="d-flex  justify-content-between align-items-end">
                  <div class="d-flex flex-column">
                    <span>Total Deposit</span>
{{--                    <span class="fw-bold text-white pg-large my-1">0.397466349</span>--}}
                    <span class="primary">{{ number_format($deposits, 2) }} USD</span>
                  </div>
                </div>
                <div class="green-bar mt-2">
                  <div class="inner"></div>
                </div>
              </div>
              <div class="py-3">
                <div class="d-flex  justify-content-between align-items-end">
                  <div class="d-flex flex-column">
                    <span>Total Withdraw</span>
{{--                    <span class="fw-bold text-white pg-large my-1">0.397466349</span>--}}
                    <span class="secondary">{{ number_format($withdrawal, 2) }} USD</span>
                  </div>
                </div>
                <div class="red-bar mt-2">
                  <div class="inner"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Tables -->
        <div class="row my-2 g-3 gx-lg-4 pb-3">
          <div class="col-12">
            <div class="mainchart px-3 px-md-4 py-3 py-lg-4 ">
              <div class="d-flex justify-content-between flex-wrap gap-4">
                <h5 class="mb-0">Cryptocurrency Assets</h5>
              </div>
              <div class="pb-2 pt-3 price-table">
                <table>
                  <thead>
                    <tr>
                      <th class="fw-bold">Asset</th>
                      <th class="fw-bold">Price</th>
                      <th class="fw-bold">24Hr Change</th>
                      <th class="fw-bold">Balance</th>
                      <th class="fw-bold">...</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($assets as $item)

                             <tr>
                                <td class="d-flex align-items-center gap-2">
                                   <img src="{{ $item->avatar() }}" alt="{{ $item->name }}" style="height: 30px; width: 30px; border-radius: 50%;">
                                    {{ $item->name }}
                                </td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td class="{{ $item->change < 0 ? 'secondary' : 'text-success' }}">
                                    {{ number_format(ceil($item->change), 2) }}%
                                </td>
                                <td>${{ number_format($item->balance, 2) }}</td>
                                <td>
                                    @if($item->balance > 0)
                                        <a href="{{ route('user.withdraw.index') }}" class="primary-btn-lg">Withdraw</a>
                                   @endif
                                     <a href="{{ route('user.deposit.index') }}" class="outline-btn-lg">Deposit</a>
                                </td>
                            </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        @include('dashboard.layout.footer')
      </div>




<script>
    // Assume `totalBalanceInUSD` is set dynamically from server data
    const totalBalanceInUSD = {{ $balance }};

    // Function to fetch the current BTC price in USD from a crypto API
    async function fetchBTCPriceInUSD() {
        try {
            const response = await fetch('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
            const data = await response.json();
            return data.bitcoin.usd;
        } catch (error) {
            console.error('Error fetching BTC price:', error);
            return null;
        }
    }

    // Function to display the BTC equivalent of the balance
    async function displayBTCBalance() {
        const btcPriceInUSD = await fetchBTCPriceInUSD();
        if (btcPriceInUSD) {
            // Calculate BTC balance
            const btcBalance = totalBalanceInUSD / btcPriceInUSD;

            // Display formatted BTC balance
            document.getElementById('btcBalance').textContent = btcBalance.toFixed(8);
        }
    }

    // Update BTC balance on page load
    displayBTCBalance();
</script>

@endsection
