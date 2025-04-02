@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">
                        <div class="row g-3 mb-3">
                            <div class="col-lg-12">
                                <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                        <h4 class="m-3">Crypto Exchange</h4>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#tabItem1">Deposits</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#tabItem2">Withdrawal</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tabItem1">
                                                <div class="m-3">
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
                                            </div>
                                            <div class="table-responsive">
                                             <table class="table table-striped">
                                              <thead>
                                                <tr class="border-b2">
                                                  <th class="fw-bold">Date</th>
                                                  <th class="fw-bold">User</th>
                                                  <th class="fw-bold">Amount</th>
                                                  <th class="fw-bold">Token</th>
                                                  <th class="fw-bold">Status</th>
                                                  <th class="fw-bold">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              @foreach($deposits as $item)
                                                   <tr class="border-b2">
                                                      <td>{{ date('d M, Y', strtotime($item->created_at)) ?? '' }}</td>
                                                       <td>{{ $item->user->name ?? ''}}</td>
                                                      <td>
                                                          <span class="text-warning mt-2">{{ number_format($item->cryptoValue(), 4) ?? '' }} </span>
                                                          {{ $item->crypto_asset->getCryptoShort($item->crypto_asset->name) ?? ''}}
                                                          <br>
                                                          ${{ number_format($item->amount, 2) ?? ''}}

                                                      </td>
                                                      <td>{{ $item->crypto_asset->name }}</td>
                                                      <td>{!! $item->status() !!}</td>
                                                      <td>
                                                          @if($item->status == 0)
                                                              <form action="{{ route('admin.cryptoExchangeStore', $item->id) }}" method="POST">
                                                                  @csrf
                                                                  <input type="hidden" name="amount" value="{{ number_format($item->cryptoValue(), 6) ?? '' }}">
                                                                  <input type="hidden" name="crypto_asset_id" value="{{ $item->crypto_asset->id }}">
                                                                <button type="submit" class="btn btn-primary btn-sm">Approve</button>
                                                              </form>
{{--                                                             <a  class="btn btn-primary btn-sm" data-bs-toggle="modal" href="#buy-coin-{{ $item->id }}">Confirm</a>--}}
                                                          @else
                                                              <a  class="btn btn-sm btn-success btn-sm" >Approved</a>
                                                          @endif

                                                       </td>

                                                    </tr>
                                                  <div class="modal fade" tabindex="-1" role="dialog" id="buy-coin-{{ $item->id }}">
                                                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                                        <div class="modal-content">
                                                            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                            <form action="{{ route('admin.approveDeposit', $item->id) }}" method="POST">
                                                                @csrf
                                                                 <div class="modal-body modal-body-lg">
                                                                <div class="nk-block-head nk-block-head-xs text-center">
                                                                    <h5 class="nk-block-title">Approve Deposit</h5>
                                                                </div>
                                                                <div class="nk-block mt-3">
                                                                    <div class="buysell-field form-group">
                                                                        <div class="form-label-group">
                                                                            <label class="form-label">Enter Amount</label>
                                                                        </div>
                                                                        <input type="number" step="0.000001" name="amount" class="form-control" placeholder="Enter Amount">
                                                                    </div>
                                                                    <div class="buysell-field form-group">
                                                                        <div class="form-label-group">
                                                                            <label class="form-label">Reward</label>
                                                                        </div>
                                                                        <input type="number" step="0.0001" name="reward" class="form-control" >
                                                                        <small class="text-danger">Optional: For First time Deposit</small>
                                                                    </div>
                                                                    <div class="buysell-field form-action text-center">
                                                                        <div>
                                                                            <button type="submit" class="btn btn-success btn-lg" >Approve</button>
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
                                                </div>
                                                   <!-- .modal -->
                                              @endforeach


                                              </tbody>
                                            </table>
                                        </div>

                                            </div>
                                            <div class="tab-pane" id="tabItem2">
                                               <div class="m-3">
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
                                            </div>
                                                <div class="table-responsive">
                                             <table class="table table-striped">
                                              <thead>
                                                <tr class="border-b2">
                                                  <th class="fw-bold">Date</th>
                                                  <th class="fw-bold">User</th>
                                                  <th class="fw-bold">Amount</th>
                                                  <th class="fw-bold">Token</th>
                                                  <th class="fw-bold">Address</th>
                                                  <th class="fw-bold">Status</th>
                                                  <th class="fw-bold">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              @foreach($withdrawal as $item)
                                                   <tr class="border-b2">
                                                      <td>{{ date('d M, Y', strtotime($item->created_at)) ?? '' }}</td>
                                                       <td>{{ $item->user->name ?? ''}}</td>
                                                      <td>
                                                          <span class="text-warning mt-2">{{ number_format($item->amount, 5) ?? '' }} </span>
                                                           {{ $item->crypto_asset->getCryptoShort($item->crypto_asset->name) ?? ''}}
                                                          <br>
                                                          ${{ number_format($item->usdValue(), 2) ?? ''}}

                                                      </td>
                                                      <td>{{ $item->crypto_asset->name ?? '' }}</td>
                                                       <td>{{ $item->withdrawal_wallet ?? '' }}</td>
                                                      <td>{!! $item->status() !!}</td>
                                                      <td>
                                                          @if($item->status == 0)
                                                              <form action="{{ route('admin.cryptoExchangeWithdraw', $item->id) }}" method="POST">
                                                                  @csrf
                                                                  <input type="hidden" name="amount" value="{{ $item->amount ?? '' }}" >
                                                                  <input type="hidden" name="crypto_asset_id" value="{{ $item->crypto_asset->id }}">
                                                                <button type="submit" class="btn btn-primary btn-sm">Approve</button>
                                                              </form>
{{--                                                             <a  class="btn btn-primary btn-sm" data-bs-toggle="modal" href="#buy-coin-{{ $item->id }}">Confirm</a>--}}
                                                          @else
                                                              <a  class="btn btn-sm btn-success btn-sm" >Approved</a>
                                                          @endif

                                                       </td>

                                                    </tr>

                                                   <!-- .modal -->
                                              @endforeach


                                              </tbody>
                                            </table>
                                        </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>

   <!-- Modal Trigger Code -->

<!-- Modal Content Code -->


@endsection
