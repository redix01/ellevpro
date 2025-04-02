@extends('dashboard.layout.app')
@section('content')

<div class="container-xl wide-lg">
    <div class="nk-content-body">

        <div class="nk-block">
            <div class="row gy-gs">
                <div class="col-lg-10 offset-lg-2 col-xl-8">
                    <div class="nk-block">
                        @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif

                @if(session()->has('success'))
                    <div class="alert alert-warning text-center">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-warning"></em>
                        <h4 class="nk-modal-title">Dear Trader!</h4>
                        <div class="nk-modal-text">
                            <span class="sub-text-sm">{{ session()->get('success') }}</span>
                        </div>

                    </div>
                @endif


                        <div class="nk-block">
                           <div class="card card-bordered product-card">
                                <div class="product-thumb">
                                    <a href="#">
                                        <img class="card-img-top" src="{{ asset('img/banner.png') }}" alt="" >
                                    </a>
                                    <ul class="product-badges">
                                        <li><span class="badge bg-danger">Hot</span></li>
                                    </ul>
                                </div>
                                <div class="card-inner text-center">
                                    <ul class="product-tags">
                                        <li><a href="#">Dear Valued Trader</a></li>
                                    </ul>
                                    <p class="text-white">
                                        You are currently registered as a CopyTrader. To access trading features,
                                        kindly apply for a possible upgrade to an Advanced Trading.
                                    </p>
                                    <a href="{{ route('user.tradeNotify') }}" class="btn btn-primary">Upgrade Now</a>
                                </div>
                            </div>
                    </div><!-- .nk-block -->
                </div><!-- .col -->

            </div><!-- .row -->
        </div><!-- .nk-block -->


    </div>
</div>

<div class="modal fade" tabindex="-1" id="modalAlert"   role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-check bg-warning"></em>
                        <h4 class="nk-modal-title">Dear Trader!</h4>
                        <div class="nk-modal-text">
                            <span class="sub-text-sm">Your Application is under review, We will get back to you.</span>
                        </div>
                        <div class="nk-modal-action">
                            <a href="#" class="btn btn-lg btn-mw btn-primary" data-bs-dismiss="modal">OK</a>
                        </div>
                    </div>
                </div><!-- .modal-body -->
            </div>
        </div>
    </div>

@endsection
