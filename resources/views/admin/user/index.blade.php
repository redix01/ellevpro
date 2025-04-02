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
                                        <h4 class="m-3">All Users</h4>
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

                                            <div class="datatable-wrap my-3">
                                                <table
                                                    class="datatable-init nowrap nk-tb-list nk-tb-ulist dataTable no-footer"
                                                    data-auto-responsive="false" id="DataTables_Table_1"
                                                    aria-describedby="DataTables_Table_1_info">
                                                    <thead>
                                                    <tr class="nk-tb-item nk-tb-head">
                                                        <th class="nk-tb-col tb-col-md sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                                            aria-label="Phone: activate to sort column ascending"><span
                                                                class="sub-text">joined At</span></th>

                                                        <th class="nk-tb-col sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                                            aria-label="User: activate to sort column ascending"><span
                                                                class="sub-text">User</span></th>
                                                        <th class="nk-tb-col tb-col-mb sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                                            aria-label="Balance: activate to sort column ascending">
                                                            <span class="sub-text">Balance</span></th>
                                                        <th class="nk-tb-col tb-col-lg sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                                            aria-label="Last Login: activate to sort column ascending">
                                                            <span class="sub-text">Last Login</span></th>
                                                        <th class="nk-tb-col tb-col-md sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                                            aria-label="Status: activate to sort column ascending"><span
                                                                class="sub-text">Status</span></th>
                                                        <th class="nk-tb-col nk-tb-col-tools text-end sorting"
                                                            tabindex="0" aria-controls="DataTables_Table_1" rowspan="1"
                                                            colspan="1" aria-label="
                                                            : activate to sort column ascending">
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($users as $item)
                                                            <tr class="nk-tb-item odd">
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span>{{ date('d M, Y', strtotime($item->created_at)) }}</span>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div
                                                                        @php
                                                                            $nameParts = explode(' ', $item->name);
                                                                            $initials = strtoupper(substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''));
                                                                        @endphp

                                                                        class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                                        <span class="text-capitalize">{{ $initials }}</span>
                                                                    </div>
                                                                    <div class="user-info">
                                                                        <span class="tb-lead">{{ $item->name ?? ''}} <span
                                                                                class="dot dot-success d-md-none ms-1"></span></span>
                                                                        <span>{{ $item->email ?? ''}}</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                                <span class="tb-amount">{{ number_format($item->balance, 2) ?? '' }} <span
                                                                        class="currency">USD</span></span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-lg">
                                                                <span>{{ $item->last_login ?? '' }}</span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span class="tb-status text-success">Active</span>
                                                            </td>
                                                            <td class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1">

                                                                    <li>
                                                                        <div class="drodown">
                                                                            <a href="#"
                                                                               class="dropdown-toggle btn btn-icon btn-trigger"
                                                                               data-bs-toggle="dropdown"
                                                                               aria-expanded="false"><em
                                                                                    class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                                 style="">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li><a href="{{ route('admin.user.show', $item->id) }}"><em
                                                                                                class="icon ni ni-eye"></em><span>View Details</span></a>
                                                                                    </li>
                                                                                    <li><a href="{{ route('admin.user.show', $item->id) }}" data-bs-toggle="modal"
                                                                                                data-bs-target="#modalForm-{{ $item->id }}">
                                                                                            <em class="icon ni ni-edit"></em><span>Edit Balance</span></a>
                                                                                    </li>
                                                                                    <li class="divider"></li>

                                                                                    <li>
                                                                                        <form action="{{ route('admin.deleteUser', $item->id) }}" method="POST" style="display: inline;">
                                                                                            @csrf
                                                                                            @method('DELETE')
                                                                                            <button type="submit" class="btn btn-link text-danger" style="padding: 0; border: none; background: none;"
                                                                                                    onclick="return confirm('Are you sure you want to delete this user?');">
                                                                                                <em class="icon ni ni-trash"></em><span>Delete User</span>
                                                                                            </button>
                                                                                        </form>
                                                                                    </li>

                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>

                                            @foreach($users as $item)
                                                <div class="modal fade" id="modalForm-{{ $item->id }}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Balance</h5>
                                                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <em class="icon ni ni-cross"></em>
                                                                </a>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('admin.fundUser', $item->id) }}" method="POST" class="form-validate is-alter" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="email-address">Balance</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="number" step="0.000001" name="balance" class="form-control">
                                                                            <span class="text-warning">${{ number_format($item->balance, 2) }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="email-address">Profit</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="number" step="0.000001" name="profit" class="form-control">
                                                                            <span class="text-warning">${{ number_format($item->profit, 2) }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label" for="email-address">Accumulating Bal</label>
                                                                        <div class="form-control-wrap">
                                                                            <input type="number" step="0.000001" name="acum_balance" class="form-control">
                                                                            <span class="text-warning">${{ number_format($item->acum_balance, 2) }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button type="submit" name="type" value="add" class="btn btn-sm btn-primary">Add</button>
                                                                        <button type="submit" name="type" value="debit" class="btn btn-sm btn-danger">Debit</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

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


@endsection
