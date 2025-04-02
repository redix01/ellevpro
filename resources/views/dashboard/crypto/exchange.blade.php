@extends('dashboard.layout.app')
@section('content')

    <div class="dashboard-main-body">

        <div class="card h-100 p-0 radius-12">
            <div
                class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">

                <h6 class="text-center">Crypto Exchange</h6>
            </div>
            <div class="card-body p-24">
                <span class="text-warning d-block d-lg-none">Scroll to the end of the table</span>
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
                <div class="table-responsive scroll-sm">
                    <table class="table bordered-table sm-table mb-0">
                        <thead>
                        <tr>

                            <th scope="col">Asset</th>
                            <th scope="col">Price</th>
                            <th scope="col">Last (24H)</th>
                            <th scope="col">Balance</th>
                            <th scope="col" class="text-center">...</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($assets as $item)
                            <tr>

                                <td>
                                    <a href="#" class="d-flex align-items-center">
                                        <img src="{{ asset($item->avatar()) }}" alt=""
                                             class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                        <span class="flex-grow-1 d-flex flex-column">
                                <span
                                    class="text-md mb-0 fw-medium text-primary-light d-block">{{ $item->name ?? '' }}</span>
                              </span>
                                    </a>
                                </td>
                                <td>${{ number_format($item->price, 2) ?? '' }}</td>
                                <td>
                            <span
                                class="{{ $item->change >= 0 ? 'bg-success-focus text-success-600' : 'bg-danger-focus text-danger-600' }} px-16 py-6 rounded-pill fw-semibold text-xs">
                                <i class="{{ $item->change >= 0 ? 'ri-arrow-up-s-fill' : 'ri-arrow-down-s-fill' }}"></i>
                                {{ number_format($item->change, 2) ?? '0' }}%
                            </span>
                                </td>

                                <td><span>{{ number_format($item->balance, 5) ?? '' }}</span><br>
                                    <span class="text-success">${{ number_format($item->usd_rate, 2) ?? '' }}</span></td>

                                <td class="text-center">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}"
                                       class="btn btn-sm btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                             viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                               stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                                                <path d="M16.002 13.5a1.5 1.5 0 1 0 3 0a1.5 1.5 0 0 0-3 0"/>
                                                <path
                                                    d="M2.002 11c0-3.771 0-5.657 1.172-6.828S6.23 3 10.002 3h4c.93 0 1.395 0 1.776.102A3 3 0 0 1 17.9 5.224c.102.381.102.846.102 1.776m-8 0h6c2.828 0 4.243 0 5.121.879c.879.878.879 2.293.879 5.121v2c0 2.828 0 4.243-.879 5.121c-.878.879-2.293.879-5.121.879h-3.501M10 17H6m0 0H2m4 0v4m0-4v-4"/>
                                            </g>
                                        </svg>
                                    </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#withdrawalModal-{{ $item->id }}"
                                       class="btn btn-sm btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                             viewBox="0 0 16 16">
                                            <path fill="currentColor" d="m8 0l2 3H9v2H7V3H6zm7 7v8H1V7zm1-1H0v10h16z"/>
                                            <path fill="currentColor"
                                                  d="M8 8a3 3 0 1 1 0 6h5v-1h1V9h-1V8zm-3 3a3 3 0 0 1 3-3H3v1H2v4h1v1h5a3 3 0 0 1-3-3"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                Fund {{ $item->name ?? '' }} Wallet</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('user.cryptoExchange.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="crypto_asset_id" value="{{ $item->id }}">
                                                <!-- Amount Input -->
                                                <div class="col mb-3">

                                                    <label for="amount">Amount (USD)</label>
                                                    <input
                                                        type="number"
                                                        step="any"
                                                        class="form-control"
                                                        id="amount{{ $item->id }}"
                                                        name="amount"
                                                        placeholder="Enter amount in USD"
                                                        oninput="calculateEquivalent('{{ $item->id }}', '{{ $item->price }}', '{{ $item->name }}')">
                                                    <strong class="mt-2 text-success">Equivalent:
                                                        0 {{ $item->name }}</strong>
                                                </div>


                                                <!-- Wallet Address and QR Code -->
                                                <div class="">
                                                    <label for="walletAddres" class="d-block">Wallet Address</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="walletAddress"
                                                               value="{{ $item->getCryptoValue($item->name) ?? 'No Wallet Address' }}"
                                                               readonly>
                                                        <button type="button" class="btn btn-outline-secondary"
                                                                id="copyWalletAddress"
                                                                onclick="copyToClipboard('walletAddress')">
                                                            <i class="fa fa-clipboard"></i> <!-- Bootstrap Icons -->
                                                        </button>
                                                    </div>
                                                    <!-- QR Code -->
                                                    <div class="text-center mt-3">
                                                        <p class="m-2">Scan Qrcode For Address</p>
                                                        {!! QrCode::size(120)->generate($item->getCryptoValue($item->name) ?? 'No wallet') !!}
                                                    </div>
                                                </div>

                                                <!-- Confirm Button -->
                                                <div class="mt-4 text-center">
                                                    <button
                                                        type="submit"
                                                        class="btn btn-success btn-sm mt-3">
                                                        Confirm Deposit
                                                    </button>
                                                </div>
                                            </form>
                                        </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                    data-bs-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="withdrawalModal-{{ $item->id }}" tabindex="-1"
                                 aria-labelledby="withdrawalModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="withdrawalModalLabel">Withdrawal
                                                For {{ $item->name ?? '' }} Wallet</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('user.cryptoExchange.withdrawal') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="crypto_asset_id" value="{{ $item->id }}">
                                                <!-- Amount Input -->
                                                <strong class="text-warning mb-4">Bal: {{ number_format($item->balance, 5) }}</strong>
                                                <div class="col mb-2">

                                                    <label for="amount">Amount</label>
                                                    <input type="number"
                                                       step="any"
                                                       class="form-control"
                                                       id="amount"
                                                       name="amount"
                                                       data-price="{{ $item->price }}"
                                                       placeholder="Enter amount" required>
                                                    <strong id="usdEquivalent" class="text-success">Equivalent: $0.00</strong>

                                                </div>

                                                <!-- Wallet Address and QR Code -->
                                                <div class="mt-3">
                                                    <label for="walletAddres" class="d-block">Withdrawal Wallet Address</label>
                                                    <div class="col mt-2">
                                                        <input type="text" name="withdrawal_wallet" required class="form-control" id="walletAddress" >
                                                    </div>
                                                    <p class="text-warning">Enter your {{ $item->name ?? '' }} wallet address</p>
                                                </div>

                                                <!-- Confirm Button -->
                                                <div class="mt-4 text-center">
                                                    <button
                                                        type="submit"
                                                        class="btn btn-danger btn-sm mt-3">
                                                        Confirm Withdrawal
                                                    </button>
                                                </div>
                                            </form>
                                        </div>


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                    data-bs-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 mt-5">
            <div class="card p-0 overflow-hidden position-relative radius-12 h-100">
                <div class="card-header py-16 px-24 bg-base border border-end-0 border-start-0 border-top-0">
                    <h6 class="text-lg mb-0">History</h6>
                </div>
                <div class="card-body p-24 pt-10">
                    <ul class="nav bordered-tab border border-top-0 border-start-0 border-end-0 d-inline-flex nav-pills mb-16"
                        id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-16 py-10 active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Deposit
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-16 py-10" id="pills-details-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-details" type="button" role="tab"
                                    aria-controls="pills-details" aria-selected="false" tabindex="-1">Withdrawal
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-home" role="tabpanel"
                             aria-labelledby="pills-home-tab" tabindex="0">
                            <div>
                                <div class="table-responsive">
                                    <table class="table basic-border-table mb-3">
                                        <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Token</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($deposits as $index => $item)
                                            <tr>
                                                <td>{{ $index+1 }}</td>
                                                <td>{{ $item->crypto_asset->name ?? '' }}</td>
                                                <td>${{ number_format($item->amount, 2) }}</td>
                                                <td>{!! $item->status() !!}</td>
                                                <td>{{ date('d M, Y', strtotime($item->created_at)) }} </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-details" role="tabpanel"
                             aria-labelledby="pills-details-tab" tabindex="0">
                            <div>
                                <div class="table-responsive">
                                    <table class="table basic-border-table mb-3">
                                        <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Token</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($withdrawal as $index => $item)
                                            <tr>
                                                <td>{{ $index+1 }}</td>
                                                <td>{{ $item->crypto_asset->name ?? '' }}</td>
                                                <td>{{ number_format($item->amount, 5) }}</td>
                                                <td>{!! $item->status() !!}</td>
                                                <td>{{ date('d M, Y', strtotime($item->created_at)) }} </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
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
        function calculateEquivalent(assetId, price, tokenName) {
            try {
                // Convert price to a clean number and handle possible formatting issues
                price = parseFloat(String(price).replace(',', ''));

                // Get the input element
                const amountInput = document.getElementById(`amount${assetId}`);

                // Get the paragraph element that shows the equivalent (it's the next sibling after the input)
                const equivalentParagraph = amountInput.nextElementSibling;

                // Get the entered USD amount and clean it
                const usdAmount = parseFloat(amountInput.value || '0');

                // Calculate the equivalent token amount (USD amount divided by token price)
                const tokenAmount = !isNaN(price) && price > 0 ? (usdAmount / price) : 0;

                // Format the token amount to a reasonable number of decimal places
                let formattedAmount;
                if (isNaN(tokenAmount)) {
                    formattedAmount = '0';
                } else if (tokenAmount < 0.0001) {
                    formattedAmount = tokenAmount.toFixed(8);
                } else {
                    formattedAmount = tokenAmount.toFixed(4);
                }

                // Update the equivalent text
                equivalentParagraph.textContent = `Equivalent: ${formattedAmount} ${tokenName}`;
            } catch (error) {
                console.error('Error calculating equivalent:', error);
            }
        }

        function calculateTokenToUSD(tokenAmount, price) {
    try {
        // Clean the input values
        const amount = parseFloat(tokenAmount) || 0;
        const tokenPrice = parseFloat(String(price).replace(',', '')) || 0;

        // Calculate USD value
        const usdValue = amount * tokenPrice;

        // Format as USD currency
        return new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(usdValue);
    } catch (error) {
        console.error('Error calculating USD value:', error);
        return '$0.00';
    }
}

        // Example usage in your HTML:
        document.getElementById('amount').addEventListener('input', function() {
            const tokenAmount = this.value;
            const price = this.getAttribute('data-price');
            const usdValue = calculateTokenToUSD(tokenAmount, price);
            document.getElementById('usdEquivalent').textContent = `Equivalent: ${usdValue}`;
        });

        function copyToClipboard(elementId) {
            const input = document.getElementById(elementId);

            // Check if the input exists
            if (input) {
                // Select the text in the input field
                input.select();
                input.setSelectionRange(0, 99999); // For mobile devices

                try {
                    // Attempt to copy the selected text
                    const successful = document.execCommand('copy');
                    if (successful) {
                        alert("Wallet address copied to clipboard!");
                    } else {
                        alert("Failed to copy wallet address. Please try again.");
                    }
                } catch (err) {
                    console.error('Copy error: ', err);
                    alert("Failed to copy wallet address.");
                }
            }
        }
    </script>

@endsection
