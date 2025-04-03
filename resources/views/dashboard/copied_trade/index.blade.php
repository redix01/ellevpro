@extends('dashboard.layout.app')
@section('content')
    <style>
        .fa {
            font-size: 10px;
            color: #6060e4;
        }
    </style>
    <style>
        /* Enhanced Card Styling */
        .enhanced-card {
            background-color: #000000; /* Solid white background to stand out */
            border: 2px solid #00FF99; /* Green border to match the theme */
            border-radius: 10px; /* Rounded corners for a card look */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); /* Stronger shadow to lift the card */
            transition: transform 0.2s ease-in-out; /* Smooth hover effect */
            position: relative; /* Ensure it’s above the parent card */
            z-index: 2; /* Higher z-index to prevent blending */
        }

        .enhanced-card:hover {
            transform: translateY(-5px); /* Slight lift on hover */
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4); /* Enhanced shadow on hover */
        }

        /* Table Styling */
        .table-dark-custom {
            background-color: #2A3A3B; /* Dark background for the table */
            color: #ffffff; /* White text for contrast */
            border-radius: 8px; /* Rounded corners for the table */
            overflow: hidden; /* Ensure rounded corners are visible */
        }

        .table-dark-custom th,
        .table-dark-custom td {
            border: none; /* Remove default borders for a cleaner look */
            padding: 10px; /* Better spacing */
            font-size: 0.9rem;
            background: #273142;
        }

        .table-dark-custom th {
            font-weight: 600; /* Slightly bolder for headers */
            color: #00FF99; /* Green color for headers to match the theme */
        }

        .table-dark-custom td {
            color: #ffffff; /* White text for table data */
        }

        /* Button Styling */
        .custom-btn {
            background-color: #00FF99; /* Green button to match the theme */
            border: none; /* Remove default border */
            color: #000000; /* Black text for contrast */
            font-weight: bold; /* Bold text */
            padding: 10px 20px; /* Better padding */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s ease; /* Smooth transition for hover */
        }

        .custom-btn:hover {
            background-color: #00E68A; /* Slightly darker green on hover */
        }

        /* Status Dot Styling (if needed) */
        .status.dot.dot-lg.dot-success {
            display: inline-block;
            width: 12px;
            height: 12px;
            background-color: #00FF99; /* Green dot to match the theme */
            border-radius: 50%;
            vertical-align: middle;
            margin-left: 5px;
        }

        /* Card Body Styling */
        .card-body {
            padding: 20px; /* Better spacing inside the card */
        }

        /* Card Title Styling */
        .card-title {
            font-size: 1.25rem; /* Slightly larger title */
            font-weight: bold;
            color: #333333; /* Darker text for contrast against white background */
            margin-bottom: 15px; /* More space below the title */
        }
    </style>




    <div class="dashboard-main-body">

        <div class="row gy-4 mt-4">
            <div class="col-xxl-12">
                <div class="card p-0 overflow-hidden position-relative radius-12 h-100">
                    <div class="card-header py-16 px-24 bg-base border border-end-0 border-start-0 border-top-0">
                        <h6 class="text-lg mb-0">Copy Trading </h6>
                    </div>
                    <div class="card-body p-24 pt-10">
                        <ul class="nav bordered-tab border border-top-0 border-start-0 border-end-0 d-inline-flex nav-pills mb-16"
                            id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-16 py-10 active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Signal Trading
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-16 py-10" id="pills-details-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-details" type="button" role="tab"
                                        aria-controls="pills-details" aria-selected="false" tabindex="-1">Trade History
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="pills-home" role="tabpanel"
                                 aria-labelledby="pills-home-tab" tabindex="0">
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
                                            <div class="row gy-4">
                                                @foreach($traders as $item)
                                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                                        <div class="card text-center enhanced-card">
                                                            <img
                                                                src="{{ asset('storage/'.$item->avatar ?? 'img/default-avatar.png') }}"
                                                                class="card-img-top rounded-circle mx-auto mt-3"
                                                                alt="Profile Pic" style="width: 100px; height: 100px;">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $item->name }}
                                                                    <div class="status dot dot-lg dot-success"></div>
                                                                </h5>
                                                                <table class="table mt-3 table-dark-custom">
                                                                    <tbody>
                                                                    <tr style="background: red">
                                                                        <th scope="row">Win Rate</th>
                                                                        <td>{{ $item->win_rate ?? 'N/A' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Profit Share</th>
                                                                        <td>{{ $item->profit_share ?? 'N/A' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Wins</th>
                                                                        <td>{{ $item->win ?? '0' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Losses</th>
                                                                        <td>{{ $item->loss ?? '0' }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">Min Price</th>
                                                                        <td>${{ number_format($item->amount, 2) }}</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <form action="{{ route('user.copytrade.store') }}"
                                                                  method="POST">
                                                                @csrf
                                                                <input type="hidden" name="trader_id"
                                                                       value="{{ $item->id }}">
                                                                <div class="form-group col-10 offset-1">
                                                                    <input type="number" step="any" class="form-control col-10" name="amount"
                                                                      placeholder="enter amount" required>
                                                                </div>

                                                                <button class="btn btn-primary m-4 custom-btn"
                                                                        type="submit">
                                                                    <span class="text-center">Copy Trade <em
                                                                            class="icon ni ni-copy-fill"></em></span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-details" role="tabpanel"
                                 aria-labelledby="pills-details-tab" tabindex="0">
                                <div>
                                    <h5 class="">Copied Trade History</h5>
                                    <div class="table-responsive">
                                        <table class="table basic-border-table mb-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Trader</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            @foreach($copiedTrades as $index => $item)
                                                <tr>
                                                    <td>{{ $index+1 }}</td>
                                                    <td>{{ date('d M, Y', strtotime($item->created_at)) }}</td>
                                                    <td>{{ $item->copy_trader->name }}</td>
                                                    <td>{!! $item->status() !!}</td>
                                                </tr>
                                            @endforeach
                                            <tr>

                                            </tr>
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
