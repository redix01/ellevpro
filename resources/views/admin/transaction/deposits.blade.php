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
                                        <h4 class="m-3">Deposits History</h4>

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
                                                  <th class="fw-bold">Payment Method</th>
                                                  <th class="fw-bold">Status</th>
                                                  <th class="fw-bold">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                              @foreach($deposits as $item)
                                                   <tr class="border-b2">
                                                      <td>{{ date('d M, Y', strtotime($item->created_at)) }}</td>
                                                       <td>{{ $item->user->name ?? ''}}</td>
                                                      <td>${{ number_format($item->amount, 2) ?? ''}}</td>
                                                      <td>{{ $item->payment_method->name ?? ''}}</td>
                                                      <td>{!! $item->status() !!}</td>
                                                      <td>
                                                          @if($item->status == 0)
                                                              <a href="{{ route('admin.approveDeposit', $item->id) }}" class="btn btn-sm btn-success"><em class="icon ni ni-check"></em></a>
                                                          @endif
                                                          <a  class="btn btn-primary btn-sm" data-bs-toggle="modal" href="#buy-coin-{{ $item->id }}">
                                                             <em class="icon ni ni-eye"></em>
                                                         </a>

                                                       </td>

                                                    </tr>

                                                   <!-- .modal -->
                                              @endforeach


                                              </tbody>
                                            </table>
                                        </div>
                                        @foreach($deposits as $item)
                                            <div class="modal fade" tabindex="-1" role="dialog" id="buy-coin-{{ $item->id }}">
                                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                                            <form >
                                                                 <div class="modal-body modal-body-lg">
                                                                <div class="nk-block-head nk-block-head-xs text-center">
                                                                    <h5 class="nk-block-title">View Screenshot</h5>
                                                                </div>
                                                                <div class="nk-block mt-3">
                                                                    <img class="mt-2" src="{{ asset('storage/'.$item->payment_proof) }}" height="200" width="150" alt="">
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
