@extends('dashboard.layout.app')
@section('content')

<div class="dashboard-main-body">

    <div class="card h-100 p-0 radius-12">
        <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">

            <h6 class="text-center">Swap Crypto</h6>
        </div>
        <div class="card-body p-24">
            <div class="table-responsive scroll-sm">
               <table class="table bordered-table sm-table mb-0">
                        <thead>
                        <tr>

                            <th scope="col">Asset</th>
                            <th scope="col">Price</th>
                            <th scope="col">Last (24H)</th>
                            <th scope="col">Balance</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($assets as $item)
                            <tr>

                                <td>
                                    <a href="#" class="d-flex align-items-center">
                                        <img src="{{ asset($item->avatar()) }}" alt=""
                                             class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                        <span class="flex-grow-1 d-flex flex-column">
                                <span
                                    class="text-md mb-0 fw-medium text-primary-light d-block">{{ $item->name ?? '' }}</span>
                              </span>
                                    </a>
                                </td>
                                <td>${{ number_format($item->price, 2) ?? '' }}</td>
                                <td>
                            <span
                                class="{{ $item->change >= 0 ? 'bg-success-focus text-success-600' : 'bg-danger-focus text-danger-600' }} px-16 py-6 rounded-pill fw-semibold text-xs">
                                <i class="{{ $item->change >= 0 ? 'ri-arrow-up-s-fill' : 'ri-arrow-down-s-fill' }}"></i>
                                {{ number_format($item->change, 2) ?? '0' }}%
                            </span>
                                </td>

                                <td><span>{{ number_format($item->balance, 5) ?? '' }}</span><br>
                                    <span class="text-success">${{ number_format($item->usd_rate, 2) ?? '' }}</span></td>


                            </tr>

                        @endforeach


                        </tbody>
                    </table>
            </div>
    </div>
    </div>
    <div class="card h-100 p-0 radius-12 mt-5">

        <div class="card-body p-24">
            <div class="col-8 offset-1">
                <form action="{{ route('user.swapCrypto.store') }}" method="POST">
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
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Swap From</label>
                        <select name="swap_from" id="" class="form-control">
                            @foreach($assets as $item)
                                <option value="{{ $item->id }}">{{ $item->name ?? '' }} ({{ number_format($item->balance, 5) ?? '' }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label>Swap To</label>
                        <select name="swap_to" id="" class="form-control">
                            @foreach($assets as $item)
                                <option value="{{ $item->id }}">{{ $item->name ?? '' }} ({{ number_format($item->balance, 5) ?? '' }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label>Amount</label>
                        <input type="number" step="any" class="form-control" name="amount">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary btn-sm">Process Swap</button>
                    </div>

                </form>
            </div>
        </div>

        <div class="container mt-5">
        <strong class="text-center mb-4">History</strong>
            <div class="table-responsive">
          <table class="table basic-border-table mb-0">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Swap From</th>
                    <th>Swap To</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $index => $item)
                 <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $item->swap_from ?? '' }}</td>
                    <td>{{ $item->swap_to ?? '' }}</td>
                    <td>{{ number_format($item->amount, 2) }} {{ $item->cryptoAsset->name ?? '' }}</td>
                    <td>{!! $item->status() !!}</td>
                    <td>{{ date('d M, Y', strtotime($item->created_at)) }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
   </div>

    </div>
    </div>
  </div>



@endsection
