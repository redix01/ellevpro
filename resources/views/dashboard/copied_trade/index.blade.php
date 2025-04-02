@extends('dashboard.layout.app')
@section('content')

<div class="container-xl wide-lg">
    <ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#tabItem1">Copy Trader</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#tabItem2">History</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="tabItem1">
         <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title fw-normal">Copy Trades</h2>
                        <div class="nk-block-des">
                            <p>Copy our most performed traders</p>
                            @if(auth()->user()->deposit < 500)
                                <strong class="text-danger">Note: You need a minimum of $500.00 in your deposit account to copy a trader</strong>
                            @endif
                        </div>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="container my-4">
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
                    <div class="row g-4">

                        <!-- Card 2 -->
                       @foreach($traders as $item)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card text-center">
                                <img src="{{ asset('storage/'.$item->avatar ?? 'img/default-avatar.png') }}" class="card-img-top rounded-circle mx-auto mt-3" alt="Profile Pic" style="width: 100px; height: 100px;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }} <div class="status dot dot-lg dot-success"></div></h5>
                                    <table class="table mt-3">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Win Rate</th>
                                                <td>{{ $item->win_rate ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Profit Share</th>
                                                <td>{{ $item->profit_share ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Wins</th>
                                                <td>{{ $item->win ?? '0' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Losses</th>
                                                <td>{{ $item->loss ?? '0' }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Min Price</th>
                                                <td>${{ number_format($item->amount, 2) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <form action="{{ route('user.copytrade.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="amount" value="{{ $item->amount }}">
                                    <input type="hidden" name="trader_id" value="{{ $item->id }}">
                                    <button class="btn btn-primary m-4" type="submit"><span class="text-center">Copy Trade <em class="icon ni ni-copy-fill"></em></span></button>
                                </form>

                            </div>
                        </div>
                        @endforeach


                        <!-- Card 3 -->

                    </div>
                </div>
            </div><!-- .nk-block -->
        </div>
    </div>
    <div class="tab-pane" id="tabItem2">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                        <h2 class="nk-block-title fw-normal">Copied Trade History</h2>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="container my-4">
                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Trader</th>
                            <th>Status</th>
                        </tr>
                        @foreach($copiedTrades as $index => $item)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ date('d M, Y', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->copy_trader->name }}</td>
                                <td>{!! $item->status() !!}</td>
                            </tr>
                        @endforeach
                        <tr>

                        </tr>
                    </table>
                </div>
            </div><!-- .nk-block -->
        </div>
    </div>

</div>

</div>

@endsection
