@extends('dashboard.layout.app')
@section('content')

    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <div class="nk-block-head-sub"><span>Account Setting</span></div>
                    <h2 class="nk-block-title fw-normal">My Profile</h2>
                    <div class="nk-block-des">
                        <p>You have full control to manage your own account setting.</p>
                    </div>

                </div>
            </div><!-- .nk-block-head -->
            <ul class="nk-nav nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.profile') }}">Personal</a>
                </li>
                <li class="nav-item active current-page">
                    <a class="nav-link" href="{{ route('user.security') }}">Security</a>
                </li>
            </ul><!-- .nk-menu -->
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
            <div class="nk-block">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title">Security Settings</h5>
                        <div class="nk-block-des">
                            <p>These settings are helps you keep your account secure.</p>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="card card-bordered">
                    <div class="card-inner-group">

                        <div class="card-inner">
                            <div class="between-center flex-wrap flex-md-nowrap g-3">
                                <div class="nk-block-text">
                                    <h6>Change Password</h6>
                                    <p>Set a unique password to protect your account.</p>
                                </div>
                                <div class="nk-block-actions flex-shrink-sm-0">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                        <li class="order-md-last">
                                            <a  data-bs-toggle="modal" data-bs-target="#profile-edit" class="btn btn-primary">Change Password</a>
                                        </li>
                                        <li>
                                            <em class="text-soft text-date fs-12px">Last changed: <span>{{ date('2 M, Y', strtotime($user->password_update ?? '...')) }}</span></em>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .card-inner -->

                    </div><!-- .card-inner-group -->
                </div><!-- .card -->
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-head-content">
                        <div class="nk-block-title-group">
                            <h6 class="nk-block-title title">Recent Activity</h6>
                        </div>
                        <div class="nk-block-des">
                            <p>This information about the last login activity on your account.</p>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="card card-bordered">
                    <table class="table table-ulogs">
                        <thead class="table-light">
                            <tr>
                                <th class="tb-col-os">
                                    <span class="overline-title">Browser <span class="d-sm-none">/ IP</span></span>
                                </th>
                                <th class="tb-col-ip">
                                    <span class="overline-title">IP</span>
                                </th>
                                <th class="tb-col-time">
                                    <span class="overline-title">Last Activity</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sessions as $session)
                                <tr>
                                    <td class="tb-col-os">
                                        @php
                                            // Extract browser and OS from the user agent
                                            $userAgent = $session->user_agent;
                                            $browser = \App\Helpers\UserAgentParser::getBrowser($userAgent);
                                            $os = \App\Helpers\UserAgentParser::getOS($userAgent);
                                        @endphp
                                        {{ $browser }} on {{ $os }}
                                    </td>
                                    <td class="tb-col-ip">
                                        <span class="sub-text">{{ $session->ip_address }}</span>
                                    </td>
                                    <td class="tb-col-time">
                                        <span class="sub-text">
                                            {{ \Carbon\Carbon::createFromTimestamp($session->last_activity)->format('h:i A') }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div><!-- .card -->
            </div><!-- .nk-block -->
        </div>
    </div>


    <div class="modal fade" role="dialog" id="profile-edit">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Change Password</h5>

                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <form action="{{ route('user.updatePassword') }}" method="POST">
                                @csrf
                                <div class="row gy-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Current Password</label>
                                        <input type="password" name="current_password" required class="form-control form-control-lg" id="full-name"  placeholder="Enter Current Password">
                                    </div>
                                </div>
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">New Password</label>
                                        <input type="password" name="new_password" required class="form-control form-control-lg" id="full-name"  placeholder="Enter New Password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Confirm New Password</label>
                                        <input type="password" name="new_password_confirmation" required class="form-control form-control-lg" id="full-name"  placeholder="Confirm New Password">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button type="submit" class="btn btn-lg btn-primary">Update Password</button>
                                        </li>
                                        <li>
                                            <a href="#" data-bs-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            </form>

                        </div><!-- .tab-pane -->

                    </div><!-- .tab-content -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>

@endsection
