@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">

                        <div class="row g-gs">
                        <h4>Copied Trades</h4>
                            <div class="col-lg-12">
                                <div class="card card-bordered card-full">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                     <table class="table table-bordered">
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>User</th>
                                            <th>Trader</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach($trades as $index => $item)
                                            <tr>
                                                <td>{{ $index+1 }}</td>
                                                <td>{{ date('d M, Y', strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->user->name ?? '' }}</td>
                                                <td>{{ $item->copy_trader->name ?? '' }}</td>
                                                <td>{!! $item->status() !!}</td>
                                                <td><a href="{{ route('admin.stopTrade', $item->id) }}" class="btn btn-sm btn-danger">Stop Trade</a></td>
                                            </tr>
                                        @endforeach
                                        <tr>

                                        </tr>
                                    </table>

                                </div><!-- .card -->
                            </div><!-- .col -->


                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>


@endsection
