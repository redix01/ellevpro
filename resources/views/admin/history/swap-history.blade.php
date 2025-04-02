@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">

                        <div class="row g-gs">
                        <h4>Swap History</h4>
                            <div class="col-lg-12">
                                <div class="card card-bordered card-full">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>User</th>
                                            <th>Swap From</th>
                                            <th>Swap To</th>
                                            <th>Status</th>
                                        </tr>
                                        @foreach($data as $index => $item)
                                            <tr>
                                                <td>{{ $index+1 }}</td>
                                                <td>{{ date('d M, Y', strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->user->name ?? '' }}</td>
                                                <td>{{ $item->swap_from ?? '' }}</td>
                                                <td>{{ $item->swap_to ?? '' }}</td>
                                                <td>{{ number_format($item->amount, 2) ?? '' }} {{ $item->cryptoAsset->name ?? '' }}</td>
                                                <td>{!! $item->status() !!}</td>

                                            </tr>

                                        @endforeach
                                        <tr>

                                        </tr>
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
