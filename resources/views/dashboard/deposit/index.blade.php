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
                                <h5>Make A Deposit</h5>
                            </div>
                            <div class="card-body p-24">

                                <div class="col-lg-10 offset-lg-1">
                                    <form action="{{ route('user.deposit.store') }}" method="POST" class="buysell-form">
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
                                        @if(session()->has('message'))
                                            <div class="alert alert-success">
                                                {{ session()->get('message') }}
                                            </div>
                                        @endif

                                        <div class="buysell-field form-group">
                                            <div class="form-label-group">
                                                <label class="form-label">Choose payment method</label>
                                            </div>
                                            <div class="form-control-wrap ">
                                                <div class="form-control-select">
                                                    <select name="payment_method_id" class="form-control"
                                                            id="default-06">
                                                        @foreach($wallets as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            <span class="icon ni ni-arrow-down"></span>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div><!-- .buysell-field -->
                                        <div class="buysell-field form-group mt-4">
                                            <div class="form-label-group">
                                                <label class="form-label" for="buysell-amount">Amount</label>
                                            </div>
                                            <div class="form-control-group">
                                                <input type="text" class="form-control form-control-number" required
                                                       id="buysell-amount" name="amount" placeholder="1000">

                                            </div>
                                        </div><!-- .buysell-field -->

                                        <div class="buysell-field form-action mt-3 text-center">
                                            <button type="submit" class="btn btn-block btn-primary" id="submitButto">
                                                Continue Deposit
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
                            <h6 class="m-3">Deposit History</h6>
                            <span class="text-warning d-block d-lg-none">Scroll to the end of the table</span>
                            <div class="table-responsive">
                                <table class="table basic-border-table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Payment Method</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($deposits as $index => $item)
                                            <tr>
                                                <td><span class="text-uppercase">{{ substr($item->id, 0, 8) }}</span></td>
                                                <td style="white-space: no-wrap">{{ date('d M, Y', strtotime($item->created_at)) }}</td>
                                                <td>{{ number_format($item->amount, 2) ?? ''}}</td>
                                                <td>{{ $item->payment_method->name ?? '' }}</td>
                                                <td>{!! $item->status() !!}</td>
                                                <td>
                                                    @if($item->status == 1)
                                                        <a href="#">Paid</a>
                                                    @else
                                                        <a href="{{ route('user.deposit.payment', $item->id) }}"
                                                           class="btn btn-sm btn-link">Pay</a></td>
                                                @endif
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
