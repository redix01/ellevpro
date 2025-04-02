@extends('dashboard.layout.app')
@section('content')

    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="kyc-app wide-sm m-auto">
                <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                    <div class="nk-block-head-content text-center">
                        <h2 class="nk-block-title fw-normal">KYC Status</h2>
                    </div>
                </div><!-- nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-kyc-app p-sm-2 text-center">
                                <div class="nk-kyc-app-icon">
                                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-success"></em>
{{--                                    <em class="icon ni ni-check-circle text-success"></em>--}}
                                </div>
                                <div class="nk-kyc-app-text mx-auto">
                                    <div class="alert alert-info">
                                        <p class="lead">You have successfully submitted your KYC documents.</p>
                                        <p>Please note that our team is reviewing your submission. The verification process may take up to 24-48 hours. You will be notified once the review is complete.</p>
                                    </div>

                                </div>
                                <div class="nk-kyc-app-action">
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-lg btn-primary">Go to Dashboard</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pt-4">
                        <p>If you have any question, please contact our support team <a href="mailto:info@tradestad.com">info@tradestad.com</a></p>
                    </div>
                </div><!-- nk-block -->
            </div><!-- kyc-app -->
        </div>
    </div>

@endsection
