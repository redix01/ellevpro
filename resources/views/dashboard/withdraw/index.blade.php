@extends('dashboard.layout.app')
@section('content')

    <div class="dashboard-main-body">

        <div class="row gy-4 mt-4">

            <!-- Crypto Home Widgets Start -->
            <div class="col-lg-6 offset-lg-3">
                <div class="row gy-4">
                    <div class="col-12">
                        <div class="card h-100 radius-8 border-0">
                            <div class="card-header text-center">
                                <h6>Make A Withdrawal</h6>
                            </div>
                            <div class="card-body p-24">
                                <div class="col-lg-10 offset-lg-1">
                                    <form action="{{ route('user.withdraw.store') }}" method="POST"
                                          class="buysell-form">
                                        @csrf
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if(session()->has('error'))
                                            <div class="alert alert-danger">
                                                {{ session()->get('error') }}
                                            </div>
                                        @endif

                                        <div class="buysell-field form-group">
                                            <div class="form-label-group">
                                                <label class="form-label">Choose Account</label>
                                            </div>
                                            <div class="form-control-wrap ">
                                                <div class="form-control-select">
                                                    <select name="account_type" class="form-control" id="default-06">
                                                        <option value="Main">Main Bal:
                                                            ${{ number_format($user->balance, 2) ?? '' }}</option>
                                                        <option value="Profit">Profit:
                                                            ${{ number_format($user->profit, 2) ?? '' }}</option>
                                                    </select>

                                                </div>
                                            </div>

                                        </div><!-- .buysell-field -->
                                        <div class="buysell-field form-group mt-3">
                                            <div class="form-label-group">
                                                <label class="form-label" for="buysell-amount">Amount</label>
                                            </div>
                                            <div class="form-control-group">
                                                <input type="number" step="any" class="form-control form-control-number"
                                                       required id="buysell-amount" name="amount" placeholder="1000">
                                            </div>
                                        </div>
                                        <div class="buysell-field form-group">
                                            <div class="form-label-group mt-3">
                                                <label class="form-label" for="buysell-amount">Wallet</label>
                                            </div>
                                            <div class="form-control-group">
                                                <select name="wallet" class="form-control">
                                                    <option selected="" disabled="">choose wallet</option>
                                                    <option value="Bitcoin">Bitcoin</option>
                                                    <option value="Ethereum">Ethereum</option>
                                                    <option value="Tether USDt">Tether USDt</option>
                                                    <option value="XRP">XRP</option>
                                                    <option value="BNB">BNB</option>
                                                    <option value="Solana">Solana</option>
                                                    <option value="USDC">USDC</option>
                                                    <option value="Cardano">Cardano</option>
                                                    <option value="Dogecoin">Dogecoin</option>
                                                    <option value="TRON">TRON</option>
                                                    <option value="Pi">Pi</option>
                                                    <option value="Chainlink">Chainlink</option>
                                                    <option value="UNUS SED LEO">UNUS SED LEO</option>
                                                    <option value="Hedera">Hedera</option>
                                                    <option value="Stellar">Stellar</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="buysell-field form-group mt-3">
                                            <div class="form-label-group">
                                                <label class="form-label" for="buysell-amount">Wallet Address</label>
                                            </div>
                                            <div class="form-control-group">
                                                <input type="text" name="address"
                                                       class="form-control form-control-number" required
                                                       id="buysell-amount">
                                            </div>
                                        </div>

                                        <div class="buysell-field form-action mt-3 text-center">
                                            <button type="submit" class="btn btn-block btn-primary" id="submitButto">
                                                Process Withdrawal
                                            </button>
                                        </div>


                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Crypto Home Widgets End -->

            <div class="col-lg-12">
                <div class="card h-100 radius-8 border-0">
                    <div class="card-body">
                        <div class="mt-5">
                            <h6 class="m-3">Withdrawal History</h6>
                            <span class="text-warning d-block d-lg-none">Scroll to the end of the table</span>
                            <div class="table-responsive">
                                <table class="table basic-border-table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Wallet</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($data as $index => $item)
                                        <tr>
                                            <td><span class="text-uppercase">{{ substr($item->id, 1, 9) }}</span></td>
                                            <td style="white-space: no-wrap">{{ date('d M, Y', strtotime($item->created_at)) }}</td>
                                            <td>${{ number_format($item->amount, 2) ?? ''}}</td>
                                            <td>{{ $item->wallet ?? '' }}</td>
                                            <td>{!! $item->with_status() ?? ''!!}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5"><h6 class="text-center my-4">No History</h6></td>
                                        </tr>
                                    @endforelse
                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.11/dist/clipboard.min.js"></script>
    <script>
        new ClipboardJS('.btn');
    </script>
@endsection
