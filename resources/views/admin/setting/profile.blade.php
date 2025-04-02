@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-aside-wrap">
                                <div class="card-inner card-inner-lg">
                                    <div class="nk-block-head nk-block-head-lg">
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Admin Information</h4>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="nk-data data-list">
                                            <div class="data-head">
                                                <h6 class="overline-title">Basics</h6>
                                            </div>
                                            <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Full Name</span>
                                                    <span class="data-value">{{ $user->name }}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"></span></div>
                                            </div><!-- data-item -->
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <span class="data-label">Email</span>
                                                    <span class="data-value">{{ $user->email }}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                                            </div><!-- data-item -->

                                        </div><!-- data-list -->
                                        <div class="nk-data data-list">
                                            <div class="data-head">
                                                <h6 class="overline-title">Edit Information</h6>
                                            </div>
                                            <form action="{{ route('admin.updateProfile') }}" method="POST" class="mt-5">
                                                @csrf
                                                @if(session()->has('success'))
                                                    <div class="alert alert-success">
                                                        {{ session()->get('success') }}
                                                    </div>
                                                @endif
                                                <div class="row gy-4">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="full-name">Full Name</label>
                                                            <input type="text" name="name" class="form-control form-control-lg" id="full-name" value="{{ $user->name }}" placeholder="Enter Full name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="display-name">Email</label>
                                                            <input style="background: #e2dddd" class="form-control form-control-lg " id="display-name" value="{{ $user->email }}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                                            <li>
                                                                <button type="submit" class="btn btn-lg btn-primary">Update Profile</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </form>

                                        </div><!-- data-list -->
                                    </div><!-- .nk-block -->
                                </div>
                                <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg toggle-screen-lg" data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                    <div class="card-inner-group" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                        <div class="card-inner">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary">
                                                    <span>AB</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">{{ $user->name }}</span>
                                                    <span class="sub-text">{{ $user->email }}</span>
                                                </div>

                                            </div><!-- .user-card -->
                                        </div><!-- .card-inner -->

                                        <div class="card-inner p-0">
                                            <ul class="link-list-menu">
                                                <li><a class="active" href="{{ route('admin.settings') }}"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                                <li><a href="{{ route('admin.activities') }}"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a></li>
                                                <li><a href="{{ route('admin.security') }}"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
                                            </ul>
                                        </div><!-- .card-inner -->
                                    </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 504px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div><!-- .card-inner-group -->
                                </div><!-- card-aside -->
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>

@endsection
