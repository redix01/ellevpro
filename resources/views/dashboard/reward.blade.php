@extends('dashboard.layout.app')
@section('content')

<div class="container-xl wide-lg">
    <div class="nk-content-body">

        <div class="nk-block">
            <div class="row gy-gs">
                <div class="col-lg-7 col-xl-6">
                    <div class="nk-block">
                        <div class="nk-block-head-xs">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title title">Rewards Center</h5>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block">
                            <div class="card card-bordered text-light is-dark h-100">
                                <div class="card-inner">
                                    <div class="nk-wg7">
                                        <div class="nk-wg7-stats">
                                            <div class="nk-wg7-title">Your Reward</div>
                                            <div class="number-lg amount">{{ number_format($user->reward, 2 ?? '') }} <small class="text-success fs-4">USD</small></div>
                                        </div>
                                    </div><!-- .nk-wg7 -->
                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div><!-- .nk-block -->
                    </div><!-- .nk-block -->
                </div><!-- .col -->
                <div class="col-lg-12 col-xl-12 ">
                    <div class="nk-block">
                        <div class="nk-block-head-xs">
                            <div class="nk-block-between-md g-2">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title title">Reward </h5>
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="row g-2">

                                <div class="col-sm-6 ">
                                <div class="card bg-light" >
                                    <div class="nk-wgw sm">
                                        @if($user->status == 0)
                                        <a class="nk-wgw-inner" >
                                            <div class="nk-wgw-name">
                                                <div class="nk-wgw-icon">
                                                    <em class="icon ni ni-check-circle"></em>
                                                </div>
                                                <h5 class="nk-wgw-title title">KYC Verification</h5>
                                            </div>

                                            <div class="mt-2">
                                                <p class="text-white">Earn upto <span class="text-warning">+$100</span> on completing your KYC Verification</p>
                                            </div>
                                            <a href="{{ route('user.kyc') }}" class="btn btn-link ">Verify Now</a>
                                        </a>
                                        @else
                                        <a class="nk-wgw-inner" >
                                            <div class="nk-wgw-name">
                                                <div class="nk-wgw-icon">
                                                    <em class="icon ni ni-check-circle"></em>
                                                </div>
                                                    <h5 class="nk-wgw-title title">KYC Verified</h5>
                                            </div>

                                            <div class="mt-2">
                                                <p class="text-white"><span class="text-warning">+$100</span> Claimed</p>
                                            </div>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div><!-- .col -->

                            <div class="col-sm-6 ">
                                <div class="card bg-light" >
                                    <div class="nk-wgw sm">
                                        <a class="nk-wgw-inner" >
                                            <div class="nk-wgw-name">
                                                <div class="nk-wgw-icon">
                                                    <em class="icon ni ni-check-circle"></em>
                                                </div>
                                                <h5 class="nk-wgw-title title">Deposit Reward</h5>
                                            </div>
                                            @if($hasDeposit)
                                            <div class="mt-2">
                                                <p class="text-white">Congratulations! Your reward of <span class="text-warning">+$50</span> has been credited for your first deposit.</p>
                                             </div>
                                             @else
                                                <p class="text-white">Earn up to <span class="text-warning">+$50</span> on your first deposit</p>
                                                <a href="{{ route('user.deposit.index') }}" class="btn btn-link">Deposit Now</a>
                                            @endif

                                        </a>
                                    </div>
                                </div>
                            </div><!-- .col -->

                        </div><!-- .row -->
                    </div><!-- .nk-block -->

                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .nk-block -->

    </div>
</div>



@endsection
