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
                            <h5>Payment</h5>
                        </div>
                        <div class="card-body p-24">
                            <div>
                                <p>Your Order no. <span class="text-uppercase">{{ substr($deposit->id, 0, 8) }}</span> has been placed successfully.</p>


                            </div>

                            <form action="{{ route('user.deposit.store') }}" method="POST" class="buysell-form" >
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

                                <div class="buysell-field form-group">
                                   <div class="card card-bordered">
                                    <div class="card-inner">
                                        <table  class="table " style="width:100%">
                                          <tr>
                                            <th>Amount to pay:</th>
                                            <td>${{ number_format($deposit->amount, 2) }}</td>
                                          </tr>
                                          <tr>
                                            <th>Payment Method:</th>
                                            <td>{{ $deposit->payment_method->name ?? '' }}</td>
                                          </tr>
                                          <tr>
                                            <th>Status:</th>
                                            <td>{!! $deposit->status() !!}</td>
                                          </tr>
                                        </table>
                                        <hr>
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <h5 class="text-center">Scan Qrcode</h5>
                                            {!! QrCode::size(120)->generate($deposit->payment_method->value ?? '') !!}
                                        </div>
                                        <div class="mt-3 ">
                                            <div class="input-group">
                                                <input type="text" id="foo" class="form-control col-6" value="{{ $deposit->payment_method->value }}">
                                                <button type="button" data-clipboard-target="#foo" class="input-group-text bg-base btn btn-primary">
                                                    <iconify-icon icon="lucide:copy"></iconify-icon>
                                                </button>
                                           </div>
                                        </div>



                                        <div class="buysell-field form-action mt-4">

                                            <a class="btn btn-block btn-primary mt-3" data-bs-toggle="modal" href="#buy-coin">Confirm Payment</a>
                                        </div><!-- .buysell-field -->

                                    </div>
                                </div>

                                </div><!-- .buysell-field -->

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Crypto Home Widgets End -->



    </div>
  </div>







<div class="modal fade" tabindex="-1" role="dialog" id="buy-coin">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <form action="{{ route('user.confirmPayment', $deposit->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                     <div class="modal-body modal-body-lg">
                    <div class="nk-block-head nk-block-head-xs text-center">
                        <h5 class="nk-block-title">Confirm Payment</h5>
                    </div>
                    <div class="nk-block mt-3">
                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label">Upload Payment Screenshot</label>
                            </div>
                            <input type="file" name="payment_proof" class="form-control" >
                        </div><!-- .buysell-field -->
                        <div class="buysell-field form-action text-center">
                            <div>
                                <button type="submit" class="btn btn-success btn-sm mt-3" >Confirm Payment</button>
                            </div>
                            <div class="pt-3">
                                <a href="#" data-bs-dismiss="modal" class="link link-danger">Cancel</a>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div><!-- .modal-body -->
                </form>

            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->

<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.11/dist/clipboard.min.js"></script>
 <script>
     new ClipboardJS('.btn');
 </script>
@endsection
