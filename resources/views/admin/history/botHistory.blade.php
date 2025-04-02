@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">

                        <div class="row g-gs">
                        <h4>Traded Signal History</h4>
                            <div class="col-lg-12">
                                <div class="card card-bordered card-full">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>User</th>
                                            <th>Active Bot</th>
                                            <th>Pair</th>
                                            <th>Amount</th>
                                            <th>Profit</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        @foreach($data as $index => $item)
                                            <tr>
                                                <td>{{ $index+1 }}</td>
                                                <td>{{ date('d M, Y', strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->user->name ?? '' }}</td>
                                                <td>{{ $item->bot_plan->name ?? '' }}</td>
                                                <td>{{ $item->pair }}</td>
                                                <td>${{ number_format($item->amount, 2) ?? '' }}</td>
                                                <td>${{ number_format($item->profit, 2) ?? '' }}</td>
                                                <td>{!! $item->status() !!}</td>
                                                <td><a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}">Add Profit</a></td>
                                            </tr>
                                            <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{ $item->bot_plan->name ?? ''}} Bot</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <form action="{{ route('admin.addBotProfit', $item->id) }}" method="POST">
                                                          @csrf
                                                          <div class="form-group">
                                                              <label for="">Add Profit</label>
                                                              <input type="number" step="any" name="profit" class="form-control">
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
                                                      </form>
                                                  </div>
{{--                                                  <div class="modal-footer">--}}
{{--                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                                                  </div>--}}
                                                </div>
                                              </div>
                                        </div>

                                            @endforeach
                                    </table>
                                    </div>


                                </div><!-- .card -->
                            </div><!-- .col -->


                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>


@endsection
