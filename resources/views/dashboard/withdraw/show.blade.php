@extends('dashboard.layout.app')
@section('content')

<div class="dashboard-main-body">

    <div class="row gy-4 mt-4">

        <!-- Crypto Home Widgets Start -->
        <div class="col-lg-6 offset-lg-3">
            <div class="row gy-4">
                <div class="col-12">
                    <div class="card h-100 radius-8 border-0">
                        <div class="card-header text-center">
                            <h5>Withdrawal Notice</h5>
                        </div>
                        <div class="card-body p-24">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="nk-kyc-app-text mx-auto">
                                    <div class="alert alert-info">
                                        <p class="lead text-center">Your withdrawal request has been successfully submitted.</p>
                                        <p>Kindly note that it may take up to 24 hours for the withdrawal to be approved.</p>

                                    </div>

                                </div>
                                <div class="nk-kyc-app-action text-center">
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-sm btn-primary">Go to Dashboard</a>
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







<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.11/dist/clipboard.min.js"></script>
 <script>
     new ClipboardJS('.btn');
 </script>
@endsection
