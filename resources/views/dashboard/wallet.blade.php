@extends('dashboard.layout.app')
@section('content')

<div class="container-xl wide-lg">
    <div class="nk-content-body">
        <div class="nk-block-head">
            <div class="nk-block-head-sub"><span>Account Balance</span></div>
            <div class="nk-block-between-md g-4">
                <div class="nk-block-head-content">
                    <h2 class="nk-block-title fw-normal">My Account</h2>
                    <div class="nk-block-des">
                        <p>At a glance summary of your account. Have fun!</p>
                    </div>
                </div>
                <div class="nk-block-head-content">
                    <ul class="nk-block-tools gx-3">
                        <li class="btn-wrap"><a href="{{ route('user.deposit.index') }}" class="btn btn-icon btn-xl btn-success"><em class="icon ni ni-wallet-in"></em></a><span class="btn-extext">Deposit</span></li>
                        <li class="btn-wrap"><a href="{{ route('user.withdraw.index') }}" class="btn btn-icon btn-xl btn-warning"><em class="icon ni ni-wallet-out"></em></a><span class="btn-extext">Withdraw</span></li>
                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="nk-wg1 mb-3">
                        <div class="nk-wg1-group g-2">
                            <div class="nk-wg1-item me-xl-4">
                                <div class="nk-wg1-title">Available Balance
                                </div>
                                <div class="nk-wg1-amount">
                                    <div class="amount">{{ number_format($user->usdSum(), 2 ?? '') }}
                                        <small class="currency currency-btc text-success">USD</small>
                                    </div>
                                    <div class="amount fs-4">{{ number_format($user->BTCrate((float) $user->usdSum() ?? ''), 8) }}
                                        <small class="currency currency-btc text-warning">BTC</small>
                                    </div>
                                </div>
                            </div><!-- .nk-wg1-item -->
                            <div class="nk-wg1-item ms-lg-auto">
                                <div class="nk-wg1-title">Transactions</div>
                                <div class="nk-wg1-group g-2">
                                    <div class="nk-wg1-sub">
                                        <div class="sub-text"><span>Deposits</span>
                                            <div class="dot" data-bg="#9cabff" style="background: rgb(156, 171, 255);"></div>
                                        </div>
                                        <div class="lead-text">${{ number_format($user->deposit, 2 ?? '') }}</div>
                                    </div>
                                    <div class="nk-wg1-sub">
                                        <div class="sub-text"><span>Withdrawal</span>
                                            <div class="dot" data-bg="#baaeff" style="background: rgb(186, 174, 255);"></div>
                                        </div>
                                        <div class="lead-text">${{ number_format($withdrawal, 2 ?? '') }}</div>
                                    </div>
                                    </div>
{{--                                    <div class="nk-wg1-sub">--}}
{{--                                        <div class="sub-text"><span>Traded</span>--}}
{{--                                            <div class="dot" data-bg="#a7ccff" style="background: rgb(167, 204, 255);"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="lead-text">762,954.63</div>--}}
{{--                                    </div>--}}
                                </div>
                            </div><!-- .nk-wg1-item -->
                        </div><!-- .nk-wg1-group -->
                    </div><!-- .nk-wg1 -->
                    <div class="nk-ck1"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas class="chart-account-balance chartjs-render-monitor" id="mainBalance" width="1976" height="240" style="display: block; height: 120px; width: 988px;"></canvas>
                    </div><!-- .nk-ck1 -->
                </div><!-- .card-inner -->
            </div><!-- .card -->

        </div><!-- .nk-block -->
    </div>
</div>

@endsection
