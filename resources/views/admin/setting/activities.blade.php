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
                                            <h4 class="nk-block-title">Login Activity</h4>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block card card-bordered">
                                    <table class="table table-ulogs">
                                    <thead class="table-light">
                                        <tr>
                                            <th>IP Address</th>
                                            <th>User Agent</th>
                                            <th>Last Activity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $session)
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

                                </div><!-- .nk-block-head -->
                            </div>
                                <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg toggle-screen-lg" data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                    <div class="card-inner-group" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                        <div class="card-inner">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary">
                                                    <span>AP</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">{{ $user->name }}</span>
                                                    <span class="sub-text">{{ $user->email }}</span>
                                                </div>

                                            </div><!-- .user-card -->
                                        </div><!-- .card-inner -->

                                        <div class="card-inner p-0">
                                            <ul class="link-list-menu">
                                                <li><a class="" href="{{ route('admin.settings') }}"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                                <li><a class="active" href="{{ route('admin.activities') }}"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a></li>
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
