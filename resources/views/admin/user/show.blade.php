@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <div class="nk-block-head-sub"><span>Account Setting</span></div>
                    <h2 class="nk-block-title fw-normal">User Profile</h2>
                    <div class="nk-block-des">
                        <p>
                            {{ $user->name }} Profile Information
                        </p>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <ul class="nk-nav nav nav-tabs">
                <li class="nav-item active current-page">
                    <a class="nav-link" href="{{ route('admin.user.show', $user->id) }}">Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.userAssets', $user->id) }}">User Assets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.connectedWallet', $user->id) }}">Connect Wallet</a>
                </li>

            </ul><!-- .nk-menu -->
            <!-- NK-Block @s -->
            <div class="nk-block">

                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title">Personal Information</h5>

                            @if($user->status == 0)
                               <div class="alert alert-warning">
                                <div class="alert-cta flex-wrap flex-md-nowrap">
                                    <div class="alert-text">
                                        <p>This Account has not been verified.</p>
                                        <a href="{{ route('admin.verifyUser', $user->id) }}" class="btn btn-success">Very User</a>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="alert alert-success">
                                <div class="alert-cta flex-wrap flex-md-nowrap">
                                    <div class="alert-text">
                                        <p>This Account is verified.</p>
                                    </div>
                                </div>
                            </div>
                            @endif

                        <div class="nk-block-des">
{{--                            <p>Basic info, like your name and address, that you use on Nio Platform.</p>--}}
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-data data-list">
                    <div class="data-head">
                        <h6 class="overline-title">Basics</h6>
                    </div>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Full Name</span>
                            <span class="data-value">{{ $user->name ?? '' }}</span>
                        </div>

                    </div><!-- .data-item -->
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Username</span>
                            <span class="data-value">{{ $user->username ?? '' }}</span>
                        </div>
                    </div><!-- .data-item -->
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">Email</span>
                            <span class="data-value">{{ $user->email ?? '' }}</span>
                        </div>
                    </div>
                    <div class="data-item">
                        <div class="data-col">
                            <span class="data-label">Password</span>
                            <span class="data-value">{{ $user->pass ?? '' }}</span>
                        </div>
                    </div>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Phone Number</span>
                            <span class="data-value text-soft">{{ $user->phone ?? '' }}</span>
                        </div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Telegram</span>
                            <span class="data-value text-soft">{{ $user->telegram ?? '' }}</span>
                        </div>
                    </div><!-- .data-item -->
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                        <div class="data-col">
                            <span class="data-label">Date of Birth</span>
                            <span class="data-value">{{ date('d M, Y', strtotime($user->date_of_birth)) }}</span>
                        </div>
                    </div><!-- .data-item -->
                    <div class="data-head">
                        <h6 class="overline-title">Address Information</h6>
                    </div>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-verify" >
                        <div class="data-col">
                            <span class="data-label">Address 1</span>
                            <span class="data-value">{{ $user->address ?? 'Not Set' }}</span>
                        </div>
                    </div>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-verify" >
                        <div class="data-col">
                            <span class="data-label">Address 2</span>
                            <span class="data-value">{{ $user->address_2 ?? 'Not Set' }}</span>
                        </div>
                    </div>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-verify" >
                        <div class="data-col">
                            <span class="data-label">City</span>
                            <span class="data-value">{{ $user->city ?? 'Not Set' }}
                                <br>{{ $user->city ?? '' }}, {{ $user->country ?? '' }}</span>
                        </div>
                    </div>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-verify" >
                        <div class="data-col">
                            <span class="data-label">State</span>
                            <span class="data-value">{{ $user->state ?? 'Not Set' }}</span>
                        </div>
                    </div>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-verify" >
                        <div class="data-col">
                            <span class="data-label">Country</span>
                            <span class="data-value">{{ $user->country ?? 'Not Set' }}</span>
                        </div>
                    </div>
                    <div class="data-head">
                        <h6 class="overline-title">ID Verification</h6>
                    </div>
                    <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-verify" >
                        <div class="data-col">
                            <span class="data-label">ID Type</span>
                            <span class="data-value">{{ $user->id_type ?? 'Not Set' }}</span>
                        </div>
                    </div>
                    <div class="row">
                     <div class="col m-3">
                        <h6>ID image Front</h6>
                        <img src="{{ asset('storage/'.$user->id_image_1) }}" height="200" width="190" alt="{{ $user->name }}">
                    </div>
                    <div class="col m-3">
                        <h6>ID image Back</h6>
                        <img src="{{ asset('storage/'.$user->id_image_2) }}" height="200" width="190" alt="{{ $user->name }}">
                    </div>
                    </div>
                </div><!-- .nk-data -->

                <br>
                <hr>
                <div class="col-10">
                     <form action="{{ route('admin.fundUser', $user->id) }}" method="POST" class="form-validate is-alter" enctype="multipart/form-data">
                    @csrf
                          @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                    <div class="form-group">
                        <label class="form-label" for="email-address">Balance</label>
                        <div class="form-control-wrap">
                            <input type="number" step="0.000001" name="balance" class="form-control">
                            <span class="text-warning">${{ number_format($user->balance, 2) }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Profit</label>
                        <div class="form-control-wrap">
                            <input type="number" step="0.000001" name="profit" class="form-control">
                            <span class="text-warning">${{ number_format($user->profit, 2) }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Accumulating Bal</label>
                        <div class="form-control-wrap">
                            <input type="number" step="0.000001" name="acum_balance" class="form-control">
                            <span class="text-warning">${{ number_format($user->acum_balance, 2) }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="type" value="add" class="btn  btn-primary">Add</button>
                        <button type="submit" name="type" value="debit" class="btn  btn-danger">Debit</button>
                    </div>
                </form>

                </div>

            </div>
            <!-- NK-Block @e -->
            <!-- //  Content End -->
        </div>
    </div>

        </div>
    </div>



@endsection
