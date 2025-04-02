@extends('dashboard.layout.app')
@section('content')
    <style>
        .fa {
            font-size: 10px;
            color: #6060e4;
        }
    </style>

<div class="dashboard-main-body">

    <div class="row gy-4 mt-4">
        <div class="col-xxl-12">
            <div class="card p-0 overflow-hidden position-relative radius-12 h-100">
                <div class="card-header py-16 px-24 bg-base border border-end-0 border-start-0 border-top-0">
                    <h6 class="text-lg mb-0">Trade History</h6>
                </div>
                <div class="card-body p-24 pt-10">
                    <ul class="nav bordered-tab border border-top-0 border-start-0 border-end-0 d-inline-flex nav-pills mb-16" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link px-16 py-10 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Open Trades</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link px-16 py-10" id="pills-details-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details" aria-selected="false" tabindex="-1">Closed Trades</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
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
                                        @if($item->status == 1)
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
                                        @endif
                                    @endforeach

                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab" tabindex="0">
                            <div>
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
                                        @if($item->status == 2)
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
                                        @endif
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
  </div>


@endsection
