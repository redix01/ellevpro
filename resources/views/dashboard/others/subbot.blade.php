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
                    <h6 class="text-lg mb-0">Bot Trading</h6>
                </div>
                <div class="card-body p-24 pt-10">
                    <ul class="nav bordered-tab border border-top-0 border-start-0 border-end-0 d-inline-flex nav-pills mb-16" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link px-16 py-10 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Bot Trading</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link px-16 py-10" id="pills-details-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details" aria-selected="false" tabindex="-1">History</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            <div>
                                <div class="card h-100 radius-8 border-0">
                                <div class="card-body p-24">
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
                                   <div class="row gy-4 text-center">
                                       <h6 class="text-primary">Now Start Earning</h6>
                                       <h4>Activate Bot Trading</h4>
                                       @if(auth()->user()->balance < 1)
                                           <p>You need to deposit funds to your account before you can
                                           start trading with our automated bot trading. Once your deposit is confirmed, you can use your capital to select a plan and start earning.</p>

                                       @endif
                                    </div>
                                        <div class="mt-5">
                                            <div class="table-responsive">
                                                <table class="table basic-border-table mb-0">
                                                <thead>
                                                 <tr>
                                                     <th>...</th>
                                                    <th>Plan</th>
                                                    <th>Amount</th>
                                                    <th>Duration</th>
                                                    <th>Return</th>
                                                </tr>
                                                </thead>
                                                @foreach($plans as $item)
                                                    <tbody>
                                                    <tr>
                                                        <td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}" class="btn btn-warning btn-sm">Activate Bot</a></td>
                                                        <td><span class="text-warning">{{ $item->name }}</span> <em class="fa fa-check-circle text-success"></em></td>
                                                        <td>${{ number_format($item->amount, 2) }}</td>
                                                        <td>{{ $item->duration }} Day(s)</td>
                                                        <td>{{ $item->roi }}%</td>
                                                    </tr>
                                                    </tbody>
                                                    <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">Activate {{ $item->name }} Bot</h6>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                          </div>
                                                          <div class="modal-body">
                                                              <form action="{{ route('user.subbot.store') }}" method="POST">
                                                                  @csrf
                                                                  <input type="hidden" name="bot_plan_id" value="{{ $item->id }}">
                                                                  <input type="hidden" name="amount" value="{{ $item->amount }}">
                                                                <div class="form-group">
                                                                    <label for="trading-pair">Trading Pair</label>
                                                                    <select name="pair" id="trading-pair" class="form-control">
                                                                        <optgroup label="Cryptocurrency">
                                                                            <option value="BTCUSD">BTC/USD</option>
                                                                            <option value="ETHUSD">ETH/USD</option>
                                                                            <option value="LTCUSD">LTC/USD</option>
                                                                            <option value="XRPUSD">XRP/USD</option>
                                                                            <option value="ADAUSD">ADA/USD</option>
                                                                            <option value="DOTUSD">DOT/USD</option>
                                                                            <option value="SOLUSD">SOL/USD</option>
                                                                            <option value="DOGEUSD">DOGE/USD</option>
                                                                            <option value="MATICUSD">MATIC/USD</option>
                                                                            <option value="BNBUSD">BNB/USD</option>
                                                                        </optgroup>
                                                                        <optgroup label="Forex">
                                                                            <option value="EURUSD">EUR/USD</option>
                                                                            <option value="GBPUSD">GBP/USD</option>
                                                                            <option value="AUDUSD">AUD/USD</option>
                                                                            <option value="USDJPY">USD/JPY</option>
                                                                            <option value="USDCAD">USD/CAD</option>
                                                                            <option value="USDCHF">USD/CHF</option>
                                                                            <option value="NZDUSD">NZD/USD</option>
                                                                            <option value="EURGBP">EUR/GBP</option>
                                                                            <option value="EURJPY">EUR/JPY</option>
                                                                            <option value="GBPJPY">GBP/JPY</option>
                                                                        </optgroup>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group text-center mt-3">
                                                                    <button type="submit" class="btn btn-success btn-lg">Activate</button>
                                                                </div>
                                                            </form>

                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>

                                                @endforeach
                                            </table>
                                            </div>
                                        </div>


                                </div>
                            </div>
                            </div>
                        </div>
                         <div class="tab-pane fade" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab" tabindex="0">
                            <div>
                                <div class="table-responsive">
                                    <table class="table basic-border-table mb-0">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Active Bot</th>
                                            <th>Trading Pair</th>
                                            <th>Amount</th>
                                            <th>Profit</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        @foreach($data as $item)
                                            <tr>
                                                <td>{{ date('d M, Y', strtotime($item->created_at ?? '')) }}</td>
                                                <td>{{ $item->bot_plan->name ?? '' }}</td>
                                                <td>{{ $item->pair ?? '' }}</td>
                                                <td>${{ number_format($item->amount, 2) ?? ''}}</td>
                                                <td>${{ number_format($item->profit, 2) ?? '' }}</td>
                                                <td>{!! $item->status() !!}</td>
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
  </div>

<!-- Modal -->
@endsection
