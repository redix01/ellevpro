@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Dashboard Overview</h3>
                                <div class="nk-block-des text-soft">
                                    <p>Welcome to {{ env('APP_NAME') }} Admin Dashboard.</p>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner">
                                        <div class="card-title-group align-start mb-2">
                                            <div class="card-title">
                                                <h6 class="title">Total Users</h6>
                                            </div>
                                            <div class="card-tools">
                                            </div>
                                        </div>
                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                            <div class="nk-sale-data">
                                                <span class="amount">{{ $total_users }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div>
                            <div class="col-md-4">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner">
                                        <div class="card-title-group align-start mb-2">
                                            <div class="card-title">
                                                <h6 class="title">Total Deposits</h6>
                                            </div>
                                            <div class="card-tools">
                                            </div>
                                        </div>
                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                            <div class="nk-sale-data">
                                                <span class="amount">${{ number_format($deposits, 2) }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div>
                           <div class="col-md-4">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner">
                                        <div class="card-title-group align-start mb-2">
                                            <div class="card-title">
                                                <h6 class="title">Total Withdrawal</h6>
                                            </div>
                                            <div class="card-tools">
                                            </div>
                                        </div>
                                        <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                            <div class="nk-sale-data">
                                                <span class="amount">${{ number_format($withdrawals, 2) }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div><!-- .card -->
                            </div>
                        </div>
                        <div class="row g-gs">

                            <div class="col-lg-12">
                                <div class="card card-bordered card-full">
                                    <div class="card-inner">
                                        <h4 class="m-2">Recent Users</h4>
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

                                        </div>
                                    </div>

                                    <div class="card-inner-sm border-top text-center d-sm-none">
                                        <a href="#" class="btn btn-link btn-block">See All</a>
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
