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
                    <h6 class="text-lg mb-0">Token Staking </h6>
                </div>
                <div class="card-body p-24 pt-10">
                    <ul class="nav bordered-tab border border-top-0 border-start-0 border-end-0 d-inline-flex nav-pills mb-16" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link px-16 py-10 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Stake Token</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link px-16 py-10" id="pills-details-tab" data-bs-toggle="pill" data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details" aria-selected="false" tabindex="-1">Staking History</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            <div>
                                <div class="text-center">
                                    <strong class="text-warning">Stake your cryptocurrency to earn passive rewards.</strong>
                                    <p class="text-center">
                                        Choose a plan, lock your funds for a set period, and receive competitive ROI.<br>
                                        Start staking to grow your crypto assets effortlessly!
                                    </p>
                                </div>
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
                                   <div class="row gy-4">
                                       @foreach($data as $item)
                                           <div class="col-lg-4">
                                            <div class="card h-100 radius-12 bg-gradient-primary text-center">
                                                <div class="card-body p-24">
                                                    <div class="text-center m-3">
                                                        <strong class="fs-4 mb-4">{{ $item->name ?? '' }}</strong><br><br>
                                                        <div class="d-flex align-items-center justify-content-center mb-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" class="text-warning" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor"><path d="M8 6c3.314 0 6-.895 6-2s-2.686-2-6-2s-6 .895-6 2s2.686 2 6 2m7.5 3a6.5 6.5 0 1 0 0 13a6.5 6.5 0 0 0 0-13"/><path d="M15.5 19c.105 0 .202-.05.397-.148l1.564-.796c.693-.352 1.039-.527 1.039-.806v-3.5m-3 5.25c-.105 0-.202-.05-.397-.148l-1.564-.796c-.693-.352-1.039-.527-1.039-.806v-3.5m3 5.25v-3.5m3-1.75c0-.279-.346-.454-1.039-.806l-1.564-.796c-.195-.098-.292-.148-.397-.148s-.202.05-.397.148l-1.564.796c-.693.351-1.039.527-1.039.806m6 0c0 .279-.346.454-1.039.806l-1.564.796c-.195.098-.292.148-.397.148m-3-1.75c0 .279.346.454 1.039.806l1.564.796c.195.098.292.148.397.148M2 4v8.043c0 .704 1.178 1.59 4.13 1.957M2.107 8.548C3.312 9.61 5.46 10.06 7.754 10.06m6.234-5.939v2.015"/></g></svg>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <table style="background: black" class="table basic-border-table">
                                                            <tbody>
                                                                <tr>
                                                                    <th >Min</th>
                                                                    <td><span class="text-warning">{{ number_format($item->min_amount, 5) ?? '' }}</span> <span>{{ $item->stake_token }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Max</th>
                                                                    <td><span class="text-warning">{{ number_format($item->max_amount, 5) ?? '' }}</span>
                                                                        <span>{{ $item->stake_token }}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Token</th>
                                                                    <td>{{ $item->stake_token ?? '' }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>ROI</th>
                                                                    <td>{{ $item->roi ?? '' }}%</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Locked Period</th>
                                                                    <td>{{ $item->lock_period_days ?? '' }} Day(s)</td>
                                                                </tr>
                                                            </tbody>

                                                        </table>

                                                            @php
                                                                $userAsset = $assets->firstWhere('name', $item->stake_token);
                                                            @endphp
                                                        Bal
                                                            <span class="text-warning">
                                                                {{ number_format($userAsset->balance ?? 0, 5) }}
                                                                <span>{{ $item->getCryptoShort($item->stake_token) ?? ''}}</span>
                                                            </span>

                                                    </div>
                                                    {{ $item->amount }}
                                                    <form action="{{ route('user.staking.store') }}" method="POST" class="mt-3">
                                                        @csrf
        {{--                                                <input type="hidden" name="amount" value="{{ $item->amount }}">--}}
                                                        <input type="hidden" name="plan_id" value="{{ $item->id }}">
                                                        <input type="hidden" name="asset_id" value="{{ $item->crypto_asset_id }}">
                                                        <lable>Staking Amount</lable>
                                                        <input type="number" step="any" class="form-control" name="amount" >
                                                        <button type="submit" class="btn btn-primary btn-sm m-2">Stake Plan</button>
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
                                <span class="text-warning d-block d-lg-none">Scroll to the end of the table</span>
                                <div class="table-responsive">
                                    <table class="table basic-border-table mb-0">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Token Staked</th>
                                            <th>Amount</th>
                                            <th>Profit</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        @foreach($traded as $item)
                                            <tr>
                                                <td>{{ date('d M, Y', strtotime($item->created_at ?? '')) }}</td>
                                                <td>{{ $item->staking_plan->stake_token ?? '' }}</td>
                                                <td>{{ number_format($item->amount, 5) }} <span>{{ $item->staking_plan->stake_token ?? ''}}</span></td>
                                                <td>{{ number_format($item->profit, 4) ?? '' }} <span>{{ $item->staking_plan->stake_token ?? ''}}</span></td>
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
