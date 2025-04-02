@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">

                        <div class="row g-gs">

                            <div class="col-lg-12">
                                <div class="card card-bordered card-full">
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
                                    <div class="card-inner">
                                        <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#modalForm">Add Trader</button>
                                        <h4 class="m-2">Copy Traders</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Avatar</th>
                                                    <th>Name</th>
                                                    <th>Min Amount</th>
                                                    <th>Win Rate</th>
                                                    <th>Profit Share</th>
                                                    <th>Wins</th>
                                                    <th>Losses</th>
                                                    <th>Action</th>
                                                </tr>
                                                @foreach($traders as $index => $item)
                                                    <tr>
                                                        <td><img style="border-radius: 50%" src="{{ asset('storage/'.$item->avatar ?? 'img/default-avatar.png') }}" height="25" width="25" alt=""></td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>${{ $item->amount }}</td>
                                                        <td>{{ $item->win_rate }}%</td>
                                                        <td>{{ $item->profit_share }}</td>
                                                        <td>{{ $item->win }}</td>
                                                        <td>{{ $item->loss }}</td>
                                                        <td>
                                                            <a href="" data-bs-toggle="modal" data-bs-target="#modalForm-{{ $item->id }}" class="btn btn-sm btn-primary">Edit</a>
                                                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-href="/items/1/delete">Delete</a>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade" id="modalForm-{{ $item->id }}">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Trader Info</h5>
                                                                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                        <em class="icon ni ni-cross"></em>
                                                                    </a>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('admin.copyTrader.update', $item->id) }}" method="POST" class="form-validate is-alter" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="full-name">Username</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}" class="form-control" id="full-name" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="email-address">Profile Pic</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="file" name="avatar" class="form-control" id="email-address" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="full-name">Win</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="number" step="0.001" name="win" value="{{ old('win', $item->win ?? '') }}" class="form-control" id="full-name" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="email-address">Loss</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="number" step="0.001" name="loss" value="{{ old('loss', $item->loss ?? '') }}" class="form-control" id="email-address" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="full-name">Win Rate</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="number" step="0.001" name="win_rate" value="{{ old('win_rate', $item->win_rate ?? '') }}" class="form-control" id="full-name" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="email-address">Profit Share</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="number" step="0.001" name="profit_share" value="{{ old('profit_share', $item->profit_share ?? '') }}" class="form-control" >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="email-address">Min Amount</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="number" step="0.001" name="amount" value="{{ old('amount', $item->amount ?? '') }}" class="form-control"  >
                                                                            </div>
                                                                        </div>



                                                                        <div class="form-group mt-3">
                                                                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this item? This action cannot be undone.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <form id="deleteForm" method="POST" action="{{ route('admin.copyTrader.destroy', $item->id) }}">
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

                                </div><!-- .card -->
                            </div><!-- .col -->


                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Trader Info</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.copyTrader.store') }}" method="POST" class="form-validate is-alter" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Username</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="name" class="form-control" id="full-name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="email-address">Profile Pic</label>
                                    <div class="form-control-wrap">
                                        <input type="file" name="avatar" class="form-control" id="email-address" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Win</label>
                                    <div class="form-control-wrap">
                                        <input type="number" step="0.001" name="win" class="form-control" id="full-name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="email-address">Loss</label>
                                    <div class="form-control-wrap">
                                        <input type="number" step="0.001" name="loss" class="form-control" id="email-address" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Win Rate</label>
                                    <div class="form-control-wrap">
                                        <input type="number" step="0.001" name="win_rate" class="form-control" id="full-name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="email-address">Profit Share</label>
                                    <div class="form-control-wrap">
                                        <input type="number" step="0.001" name="profit_share" class="form-control" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Min Amount</label>
                            <div class="form-control-wrap">
                                <input type="number" step="0.001" name="amount" class="form-control"  >
                            </div>
                        </div>



                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" id="modalAlert2"  aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                        <h4 class="nk-modal-title">Unable to Process!</h4>
                        <div class="nk-modal-text">
                            <p class="lead">We are sorry, we were unable to process your payment. Please try after sometimes.</p>
                            <p class="text-soft">If you need help please contact us at (855) 485-7373.</p>
                        </div>
                        <div class="nk-modal-action mt-5">
                            <a href="#" class="btn btn-lg btn-mw btn-light" data-bs-dismiss="modal">Return</a>
                        </div>
                    </div>
                </div><!-- .modal-body -->
            </div>
        </div>
    </div>
@endsection
