@extends('dashboard.layout.app')
@section('content')

<div class="dashboard-main-body">

    <div class="row gy-4 mt-4">

        <!-- Crypto Home Widgets Start -->
        <div class="col-lg-8 offset-lg-2">
            <div class="row gy-4">
                <div class="col-12">
                    <div class="card h-100 radius-8 border-0">
                        <div class="card-header text-center">
                            <h5>KYC Verification</h5>
                        </div>
                        <div class="card-body p-24">

                            <div class="col-lg-10 offset-lg-1 text-center">
                               <p>To comply with regulation each participant will have to go through identity verification (KYC/AML) to prevent fraud causes. </p>
                                <div class="nk-kyc-app-text mx-auto">
                                <p class="text-warning">You have not submitted your necessary documents to verify your identity. Please verify yourself to get full access to our platform.</p>

                            </div>
                                <hr>
                            <div style="text-align: left" class="my-4 ">
                                <ul class="text-info">
                                    <li>Fiat Currency Wallet (USD, EUR, GBP)</li>
                                    <li>10+ Digital Crypto Wallet (ETH, BTC, LTC etc)</li>
                                    <li>Receive payments from {{ env('APP_NAME') }}</li>
                                </ul>
                            </div>
                            <div class="nk-kyc-app-action mt-5">
                                <a href="{{ route('user.kycForm') }}" class="btn btn-lg btn-primary">Click to Get Started</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Crypto Home Widgets End -->


    </div>
  </div>



@endsection
