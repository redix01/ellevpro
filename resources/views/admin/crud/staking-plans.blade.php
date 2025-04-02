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
                                        <button type="button" class="btn btn-primary m-4" data-bs-toggle="modal" data-bs-target="#modalForm">Add Staking Plan</button>
                                        <h4 class="m-2">Copy Traders</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Min Amount</th>
                                                    <th>Max Amount</th>
                                                    <th>Staking Token</th>
                                                    <th>ROI</th>
                                                    <th>Locked Period</th>
                                                    <th>Action</th>
                                                </tr>
                                                @foreach($data as $index => $item)
                                                    <tr>
                                                        <td>{{ $item->name ?? ''}}</td>
                                                        <td>{{ number_format($item->min_amount, 5) ?? '' }}
                                                            <span>{{ $item->stake_token }}</span>
                                                        </td>
                                                        <td>{{ number_format($item->max_amount, 4) ?? ''}}
                                                            <span>{{ $item->stake_token }}</span>
                                                        </td>
                                                        <td>{{ $item->stake_token ?? '' }}</td>
                                                        <td>{{ $item->roi ?? '' }}%</td>
                                                        <td>{{ $item->lock_period_days ?? '' }} Day(s)</td>
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
                                                                     <form action="{{ route('admin.stakingPlan.update', $item->id) }}" method="POST" class="form-validate is-alter" enctype="multipart/form-data">
                                                                        @csrf
                                                                         @method('PATCH')
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="full-name">Name</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}"  class="form-control" id="full-name" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="email-address">Staking Token</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <select name="stake_token" id="" class="form-control">
                                                                                            <option selected disabled>Select Token</option>
                                                                                            @foreach($assets as $token)
                                                                                                <option value="{{ $token }}">{{ $token ?? '' }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="full-name">Min Amount</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="number" step="0.001" name="min_amount" value="{{ old('min_amount', $item->min_amount ?? '') }}"  class="form-control" id="full-name" required>
                                                                                    </div>
                                                                                    <small class="text-warning">Enter the amount in the selected token</small>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="email-address">Max Amount</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="number" step="0.001" name="max_amount" value="{{ old('max_amount', $item->max_amount ?? '') }}"  class="form-control" id="email-address" required>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-2">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="full-name">ROI</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="number" step="0.001" name="roi" value="{{ old('roi', $item->roi ?? '') }}"  class="form-control" id="full-name" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="form-label" for="email-address">Locked Period</label>
                                                                                    <div class="form-control-wrap">
                                                                                        <input type="number" step="0.001" name="lock_period_days" value="{{ old('lock_period_days', $item->lock_period_days ?? '') }}"  class="form-control" >
                                                                                    </div>
                                                                                    <small class="text-warning">In Day(s)</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>



                                                                        <div class="form-group mt-3">
                                                                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
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
                                                                <form id="deleteForm" method="POST" action="{{ route('admin.stakingPlan.destroy', $item->id) }}">
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
                    <h5 class="modal-title">Staking Plan</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.stakingPlan.store') }}" method="POST" class="form-validate is-alter" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="name"  class="form-control" id="full-name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="email-address">Staking Token</label>
                                    <div class="form-control-wrap">
                                        <select name="stake_token" id="" class="form-control">
                                          @foreach($assets as $asset)
                                            <option value="{{ $asset }}">{{ $asset }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Min Amount</label>
                                    <div class="form-control-wrap">
                                        <input type="number" step="0.001" name="min_amount" class="form-control" id="full-name" required>
                                    </div>
                                    <small class="text-warning">Enter the amount in the selected token</small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="email-address">Max Amount</label>
                                    <div class="form-control-wrap">
                                        <input type="number" step="0.001" name="max_amount" class="form-control" id="email-address" required>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="full-name">ROI</label>
                                    <div class="form-control-wrap">
                                        <input type="number" step="0.001" name="roi" class="form-control" id="full-name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" for="email-address">Locked Period</label>
                                    <div class="form-control-wrap">
                                        <input type="number" step="0.001" name="lock_period_days" class="form-control" >
                                    </div>
                                    <small class="text-warning">In Day(s)</small>
                                </div>
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


@endsection
