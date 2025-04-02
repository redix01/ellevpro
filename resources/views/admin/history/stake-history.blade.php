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
                                        <h4 class="m-3">Staking History</h4>

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
                                                  <th class="fw-bold">Token Staked</th>
                                                  <th class="fw-bold">Profit</th>
                                                  <th class="fw-bold">Status</th>
                                                  <th class="fw-bold">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              @foreach($data as $item)
                                                   <tr class="border-b2">
                                                      <td>{{ date('d M, Y', strtotime($item->created_at)) }}</td>
                                                       <td>{{ $item->user->name ?? '' }}</td>
                                                      <td>{{ number_format($item->amount, 4) ?? '' }} <span>{{ $item->staking_plan->getCryptoShort($item->staking_plan->stake_token) ?? '' }}</span></td>
                                                      <td>{{ $item->staking_plan->getCryptoShort($item->staking_plan->stake_token) ?? ''}}</td>
                                                      <td>{{ number_format($item->profit, 4) ?? '' }} <span>{{ $item->staking_plan->getCryptoShort($item->staking_plan->stake_token) ?? '' }}</span></td>
                                                      <td>{!! $item->status() !!}</td>
                                                      <td>
                                                             <a  class="btn btn-primary btn-sm" data-bs-toggle="modal" href="#buy-coin-{{ $item->id }}"><em class="icon ni ni-edit"></em></a>
                                                       </td>

                                                    </tr>

                                                   <!-- .modal -->
                                              @endforeach


                                              </tbody>
                                            </table>
                                        </div>

                                        @foreach($data as $item)
                                             <div class="modal fade" tabindex="-1" role="dialog" id="buy-coin-{{ $item->id }}">
                                                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                                        <div class="modal-content">
                                                            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                            <form action="{{ route('admin.stakingProfit', $item->id) }}" method="POST">
                                                                @csrf
                                                                 <div class="modal-body modal-body-lg">
                                                                <div class="nk-block-head nk-block-head-xs text-center">
                                                                    <h5 class="nk-block-title">Edit Staking</h5>
                                                                </div>
                                                                <div class="nk-block mt-3">
                                                                    <div class="buysell-field form-group">
                                                                        <div class="form-label-group">
                                                                            <label class="form-label">Enter Profit Amount</label>
                                                                        </div>
                                                                        <input type="number" step="any" name="amount" class="form-control" placeholder="Enter Amount">
                                                                    </div>
                                                                    <div class="buysell-field form-action text-center">
                                                                        <div>
                                                                           <button type="submit" name="type" value="profit" class="btn btn-success btn-sm" >Add Profit</button>
                                                                            <button type="submit" name="type" value="loss" class="btn btn-danger btn-sm" >Add Loss</button>
                                                                            <a href="{{ route('admin.endStaking', $item->id) }}" class="btn btn-sm btn-secondary m-3">End Staking</a>
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
                                        @endforeach
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
