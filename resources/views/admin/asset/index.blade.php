@extends('admin.layout.app')
@section('content')
     <style>
        .datatable-wrap {
            border: none;
            border-radius: 4px;
        }
    </style>


    <div class="nk-content mt-5">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block">
                        <div class="row g-3 mb-3">
                            <div class="col-lg-12">
                                <div class="card card-bordered card-preview">
                                    <div class="card-inner">
                                        <h4 class="m-3">All Assets</h4>
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
                                        <div id="DataTables_Table_1_wrapper"
                                             class="dataTables_wrapper dt-bootstrap4 no-footer">

                                            <div class="datatable-wrap my-3 table-responsive">
                                                <table
                                                    class="datatable-init nowrap nk-tb-list nk-tb-ulist dataTable no-footer"
                                                    data-auto-responsive="false" id="DataTables_Table_1"
                                                    aria-describedby="DataTables_Table_1_info">
                                                    <thead>
                                                    <tr class="nk-tb-item nk-tb-head">
                                                        <th class="nk-tb-col" tabindex="0"
                                                            aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                                            aria-label="User: activate to sort column ascending"><span
                                                                class="sub-text">Coin</span></th>
                                                        <th class="nk-tb-col " tabindex="0"
                                                            aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                                            aria-label="Balance: activate to sort column ascending">
                                                            <span class="sub-text">Price</span></th>
                                                        <th class="nk-tb-col" tabindex="0"
                                                            aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                                            aria-label="Last Login: activate to sort column ascending">
                                                            <span class="sub-text">24Hr Change</span></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($data as $item)
                                                            <tr class="nk-tb-item odd">
                                                            <td class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div style="background: none" class="user-avatar  d-sm-flex">
                                                                        <img src="{{ $item->avatar() }}" alt="{{ $item->name }}" style="height: 30px; width: 30px;">
                                                                    </div>
                                                                    <div class="user-info">
                                                                        <span class="tb-lead">{{ $item->name ?? ''}}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                ${{ number_format($item->price, 2) }}
                                                            </td>
                                                            <td class="nk-tb-col {{ $item->change < 0 ? 'text-danger' : 'text-success' }}">
                                                                {{ number_format(ceil($item->change), 2) }}%
                                                            </td>
                                                        </tr>

                                                             <div class="modal fade" id="modalForm-{{ $item->id }}">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Update Coin Info</h5>
                                                                        <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                            <em class="icon ni ni-cross"></em>
                                                                        </a>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{ route('admin.updateAsset', $item->id) }}" method="POST" class="form-validate is-alter" enctype="multipart/form-data">
                                                                            @csrf
                                                                            @method('PATCH')
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="email-address">Balance</label>
                                                                                <div class="form-control-wrap">
                                                                                    <input type="number" step="0.01" name="amount"  class="form-control">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="form-label" for="phone-no">Wallet Icon</label>
                                                                                <div class="form-control-wrap">
                                                                                    <input type="file" name="avatar" class="form-control" >
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
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
                </div>
            </div>
        </div>
    </div>

@endsection
