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
                                        <h4 class="m-3">Trade History</h4>

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
                                              <table class="table basic-border-table mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Acct Type </th>
                                                    <th>Market</th>
                                                    <th>Pair</th>
                                                    <th>Order</th>
                                                    <th>Interval</th>
                                                    <th>TP</th>
                                                    <th>SL</th>
                                                    <th>Amount</th>
                                                    <th>PNL</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                @foreach($trades as $item)

                                                         <tr>
                                                        <td>{{ date('d M, Y', strtotime($item->created_at ?? '')) }}</td>
                                                        <td>{{ $item->acct_type ?? '' }}</td>
                                                        <td>{{ $item->market ?? '' }}</td>
                                                        <td>{{ $item->tradePair() ?? '' }}</td>
                                                        <td>{!! $item->trade_type() ?? '' !!}</td>
                                                        <td>{{ $item->time_interval ?? '' }}</td>
                                                        <td>{{ $item->take_profit ?? '' }}</td>
                                                        <td>{{ $item->stop_loss ?? '' }}</td>
                                                        <td>${{ number_format($item->amount, 2) }}</td>
                                                        <td>${{ number_format($item->profit, 2) }}</td>
                                                        <td>{!! $item->status() ?? ''!!}</td>
                                                        <td>
                                                             <a  class="btn btn-primary btn-sm" data-bs-toggle="modal" href="#buy-coin-{{ $item->id }}"><em class="icon ni ni-edit"></em></a>
                                                            <a class="btn btn-danger btn-sm" data-bs-toggle="modal" href="#delete-modal-{{ $item->id }}">
                                                                <em class="icon ni ni-trash"></em>
                                                            </a>

                                                        </td>
                                                    </tr>

                                                @endforeach
                                                  @foreach($trades as $item)
                                                      <div class="modal fade" tabindex="-1" role="dialog" id="buy-coin-{{ $item->id }}">
                                                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                                        <div class="modal-content">
                                                            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                            <form action="{{ route('admin.tradeProfit', $item->id) }}" method="POST">
                                                                @csrf
                                                                 <div class="modal-body modal-body-lg">
                                                                <div class="nk-block-head nk-block-head-xs text-center">
                                                                    <h5 class="nk-block-title">Edit Trade Profit</h5>
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
                                                                            <a href="{{ route('admin.closeTrade', $item->id) }}" class="btn btn-sm btn-secondary m-3">Close Trade</a>
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
                                                      <div class="modal fade" id="delete-modal-{{ $item->id }}" tabindex="-1" aria-labelledby="delete-modal-{{ $item->id }}-label" aria-hidden="true">
                                                          <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" id="delete-modal-{{ $item->id }}-label">Confirm Delete</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                              </div>
                                                              <div class="modal-body">
                                                                <p>Are you sure you want to delete this item?</p>
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <form method="POST" action="{{ route('admin.deleteTrade', $item->id) }}">
                                                                  @csrf
                                                                  @method('DELETE')
                                                                  <button type="submit" class="btn btn-danger">Delete</button>
                                                                </form>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>

                                                  @endforeach

                                            </table>
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
