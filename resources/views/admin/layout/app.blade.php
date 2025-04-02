<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>{{ env('APP_NAME') }} | Admin Dashboard</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashlite.css?ver=3.1.1') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin/assets/css/theme.css?ver=3.1.1') }}">
</head>

<body class="nk-body bg-lighter npc-general has-sidebar dark-mode">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-menu-trigger">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-sidebar-brand">
                        <a href="{{ route('admin.dashboard') }}" class="logo-link nk-sidebar-logo">
                            <h4 style="font-weight: bolder; color: white">Admin Dash</h4>
                        </a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">

                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Dashboards</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.dashboard') }}" class="nk-menu-link ">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashlite"></em></span>
                                        <span class="nk-menu-text"> Dashboard</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('user.dashboard') }}" target="_blank" class="nk-menu-link ">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user-alt"></em></span>
                                        <span class="nk-menu-text">User Dashboard</span>
                                    </a>
                                </li>

                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Main</h6>
                                </li><!-- .nk-menu-heading -->
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.users.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                                        <span class="nk-menu-text">Users</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.transactions.deposits') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-arrow-down"></em></span>
                                        <span class="nk-menu-text">Deposits</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.transactions.withdraws') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-arrow-up-circle"></em></span>
                                        <span class="nk-menu-text">Withdrawal</span>
                                    </a>
                                </li>


                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">History</h6>
                                </li><!-- .nk-menu-heading -->
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.tradeHistory') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-line-chart"></em></span>
                                        <span class="nk-menu-text">Trade History</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.copiedTrade') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-chart-up"></em></span>
                                        <span class="nk-menu-text">Copied Trades</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.signalHistory') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-line-chart"></em></span>
                                        <span class="nk-menu-text">Traded Signal </span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.botHistory') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-bar-chart-alt"></em></span>
                                        <span class="nk-menu-text">Bot Trades</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.cryptoExchange') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-bitcoin"></em></span>
                                        <span class="nk-menu-text">Crypto Exchange</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.swapHistory') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-swap"></em></span>
                                        <span class="nk-menu-text">Swap History</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.stakeHistory') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                        <span class="nk-menu-text">Stake History</span>
                                    </a>
                                </li>
                                 <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">CRUD</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.signal.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-signal"></em></span>
                                        <span class="nk-menu-text">Trade Signal</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.botplan.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-box"></em></span>
                                        <span class="nk-menu-text">Bot Plan</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.stakingPlan.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-list-fill"></em></span>
                                        <span class="nk-menu-text">Staking Plans</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.copyTrader.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-copy-fill"></em></span>
                                        <span class="nk-menu-text">Copy Trading</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.payment-method.index') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-coin-alt"></em></span>
                                        <span class="nk-menu-text">Payment Method</span>
                                    </a>
                                </li>

                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Others</h6>
                                </li><!-- .nk-menu-heading -->
                                <li class="nk-menu-item">
                                    <a href="{{ route('admin.settings') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                        <span class="nk-menu-text">Settings</span>
                                    </a>
                                </li>


                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="{{ route('admin.dashboard') }}" class="logo-link">
                                    <h4 style="font-weight: bolder; color: white">Admin Dash</h4>
                                </a>
                            </div><!-- .nk-header-brand -->

                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-status">Administrator</div>
                                                    <div class="user-name dropdown-indicator">{{ auth()->user()->name }}</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>AD</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{ auth()->user()->name }}</span>
                                                        <span class="sub-text">{{ auth()->user()->email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="{{ route('admin.settings') }}"><em class="icon ni ni-setting-alt"></em><span>Settings</span></a></li>

                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <form method="POST" action="{{ route('logout') }}">
                                                        @csrf

                                                        <x-dropdown-link :href="route('logout')"
                                                                onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                                                            <em class="icon ni ni-signout"></em><span>Sign out</span>
                                                        </x-dropdown-link>
                                                    </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->

                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                @yield('content')
                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; {{ Date('Y') }} {{ env('APP_NAME') }}.
                            </div>

                        </div>
                    </div>
                </div>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->

    <!-- JavaScript -->
    <script src="{{ asset('admin/assets/js/bundle.js?ver=3.1.1') }}"></script>
    <script src="{{ asset('admin/assets/js/scripts.js?ver=3.1.1') }}"></script>
    <script src="{{ asset('admin/assets/js/charts/gd-default.js?ver=3.1.1') }}"></script>
</body>

</html>
