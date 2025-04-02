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
                    <h6 class="text-lg mb-0">Live Trading Signal </h6>
                </div>
                <div class="card-body p-24 pt-10">
                    <ul class="nav bordered-tab border border-top-0 border-start-0 border-end-0 d-inline-flex nav-pills mb-16" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link px-16 py-10 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Signal Trading</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link px-16 py-10" id="pills-details-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details" aria-selected="false" tabindex="-1">Trade History</button>
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
                                   <div class="row gy-4">
                                       @foreach($data as $item)
                                           <div class="col-xxl-3 col-sm-6">
                                            <div class="card h-100 radius-12 bg-gradient-primary text-center">
                                                <div class="card-body p-24">
                                                    <div class="text-center m-3">
                                                        <strong class="fs-5">{{ $item->name ?? '' }}</strong><br>
                                                        <div class="d-flex align-items-center justify-content-center mb-3">
                                                            <img style="border-radius: 50%;" height="80" width="80" src="{{ asset($item->avatar ?? 'img2/signal.jpg') }}" alt="">
                                                        </div>
                                                        <span>Min Amount</span>
                                                        <h6 class="mb-2" style="font-size: 10px;">${{ number_format($item->amount, 2) }}</h6>
                                                    </div>

                                                    <ul style="text-align: left; width: 500px" class="mt-3">
                                                        <li><i class="fa fa-check-circle "></i> Leverage 1:300</li>
                                                        <li><i class="fa fa-check-circle "></i> Standard Options</li>
                                                        <li><i class="fa fa-check-circle "></i> Risk Managements</li>
                                                        <li><i class="fa fa-check-circle "></i> {{ $item->percent ?? '' }}% Trading Percentage</li>
                                                    </ul>
                                                    <form action="{{ route('user.signal.store') }}" method="POST" class="mt-3">
                                                        @csrf
        {{--                                                <input type="hidden" name="amount" value="{{ $item->amount }}">--}}
                                                        <input type="hidden" name="signal_id" value="{{ $item->id }}">
                                                        <input type="hidden" name="amount" value="{{ $item->amount }}">
                                                        <button type="submit" class="btn btn-primary btn-sm ">Purchase Signal</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                       @endforeach
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
                                            <th>Traded Signal</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        @foreach($traded as $item)
                                            <tr>
                                                <td>{{ date('d M, Y', strtotime($item->created_at ?? '')) }}</td>
                                                <td>{{ $item->trade_signal->name ?? '' }}</td>
                                                <td>${{ number_format($item->amount, 2) }}</td>
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


@endsection
