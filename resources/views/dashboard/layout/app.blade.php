
<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--  <meta name="viewport" content="width=1024">--}}

  <title>{{ env('APP_NAME') }}</title>
  <link rel="icon" type="image/png" href="assets/images/favicon.png" sizes="16x16">
  <!-- remix icon font css  -->
  <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
  <!-- BootStrap css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}">
  <!-- Apex Chart css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/apexcharts.css') }}">
  <!-- Data Table css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/dataTables.min.css') }}">
  <!-- Text Editor css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/editor-katex.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.atom-one-dark.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.quill.snow.css') }}">
  <!-- Date picker css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/flatpickr.min.css') }}">
  <!-- Calendar css -->

  <!-- Popup css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/magnific-popup.css') }}">
  <!-- Slick Slider css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/slick.css') }}">
  <!-- prism css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/prism.css') }}">
  <!-- file upload css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/file-upload.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/lib/audioplayer.css') }}">
  <!-- main css -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .sidebar-menu li a {
            padding: 0.625rem 0.75rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            color: white;
            border-radius: 8px;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            -ms-border-radius: 8px;
            -o-border-radius: 8px;
            font-size: 0.875rem;
        }

        .navbar-header {
            height: 4.5rem;
            background-color: #273142;
            position: sticky;
            top: 0;
            padding: 1rem 1.5rem;
            z-index: 2;
            color: white
        }

        .sidebar-logo {
            height: 4.5rem;
            padding: 0.875rem 1rem;
            border-inline-end: 1px solid #273142;
            border-block-end: 1px solid #273142;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }
    </style>


    <style>
        /* Sidebar Styles */
        .trading-sidebar {
            height: 100%;
            width: 350px;
            position: fixed;
            top: 0;
            right: -350px;
            background-color: #273142;
            box-shadow: -2px 0 5px rgba(0,0,0,0.2);
            transition: right 0.3s ease-in-out;
            z-index: 1050;
            overflow-y: auto;
        }

        .trading-sidebar.show {
            right: 0;
        }

        /* Overlay style */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1040;
            display: none;
        }

        .sidebar-overlay.show {
            display: block;
        }
    </style>
    <script src="//code.jivosite.com/widget/ZHEPnMbWBu" async></script>


</head>
  <body>
<aside class="sidebar" style="background: #273142;">
  <button type="button" class="sidebar-close-btn">
    <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
  </button>
  <div>
    <a href="{{ route('index') }}" class="sidebar-logo">
        <img src="{{ asset('img2/logo2.png') }}" height="100" width="170" alt="">
{{--      <h5 class="text-white m-3">{{ env('APP_NAME') }}</h5>--}}
    </a>
  </div>
  <div class="sidebar-menu-area">
    <ul class="sidebar-menu" id="sidebar-menu" style="color: white">
        <li>
        <a href="{{ route('user.dashboard') }}">
          <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="sidebar-menu-group-title">Transaction</li>
      <li>
        <a href="{{ route('user.deposit.index')}}">
            <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12a3 3 0 1 0 3 3a3 3 0 0 0-3-3m0 4a1 1 0 1 1 1-1a1 1 0 0 1-1 1m-.71-6.29a1 1 0 0 0 .33.21a.94.94 0 0 0 .76 0a1 1 0 0 0 .33-.21L15 7.46A1 1 0 1 0 13.54 6l-.54.59V3a1 1 0 0 0-2 0v3.59L10.46 6A1 1 0 0 0 9 7.46ZM19 15a1 1 0 1 0-1 1a1 1 0 0 0 1-1m1-7h-3a1 1 0 0 0 0 2h3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-8a1 1 0 0 1 1-1h3a1 1 0 0 0 0-2H4a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h16a3 3 0 0 0 3-3v-8a3 3 0 0 0-3-3M5 15a1 1 0 1 0 1-1a1 1 0 0 0-1 1"/></svg>
          {{-- <iconify-icon icon="mage:email" class="menu-icon"></iconify-icon> --}}
          <span>Deposit</span>
        </a>
      </li>
      <li>
        <a href="{{ route('user.withdraw.index') }}">
          <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path fill="currentColor" d="m8 0l2 3H9v2H7V3H6zm7 7v8H1V7zm1-1H0v10h16z"/><path fill="currentColor" d="M8 8a3 3 0 1 1 0 6h5v-1h1V9h-1V8zm-3 3a3 3 0 0 1 3-3H3v1H2v4h1v1h5a3 3 0 0 1-3-3"/></svg>
          <span>Withdrawal</span>
        </a>
      </li>
      <li class="sidebar-menu-group-title">Main</li>

        <li class="dropdown">
        <a href="javascript:void(0)">
          <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 48 48"><path fill="currentColor" d="M14.79 26.746L8 35.347V40h34v2H7a1 1 0 0 1-1-1V7h2v25.12l5.33-6.751A3 3 0 1 1 19 23.946l6.633 2.21a2.995 2.995 0 0 1 3.41-.97l6.378-7.653a3 3 0 1 1 1.536 1.28l-6.378 7.654A3 3 0 1 1 25 28.054l-6.633-2.21a2.995 2.995 0 0 1-3.577.902"/></svg>
          <span>Live Trading</span>
        </a>
        <ul class="sidebar-submenu" style="display: none;">
          <li>
            <a href="{{ route('user.trade.index') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Trade Room</a>
          </li>
          <li>
            <a href="{{ route('user.tradeHistory') }}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Trade History</a>
          </li>
        </ul>
      </li>

      <li>
        <a href="{{ route('user.signal.index') }}">
          <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.348 14.652a3.75 3.75 0 0 1 0-5.304m5.304 0a3.75 3.75 0 0 1 0 5.304m-7.425 2.121a6.75 6.75 0 0 1 0-9.546m9.546 0a6.75 6.75 0 0 1 0 9.546M5.106 18.894c-3.808-3.807-3.808-9.98 0-13.788m13.788 0c3.808 3.807 3.808 9.98 0 13.788M12 12h.008v.008H12zm.375 0a.375.375 0 1 1-.75 0a.375.375 0 0 1 .75 0"/></svg>
          <span>Live Trading Signal</span>
        </a>
      </li>
       <li>
        <a href="{{ route('user.subbot.index') }}">
          <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor"><path d="M4 15.5a2 2 0 1 1 0-4m16 4a2 2 0 1 0 0-4M7 7V4m10 3V4"/><circle cx="7" cy="3" r="1"/><circle cx="17" cy="3" r="1"/><path d="M13.5 7h-3c-2.828 0-4.243 0-5.121.909S4.5 10.281 4.5 13.207s0 4.389.879 5.298c.878.909 2.293.909 5.121.909h1.025c.792 0 1.071.163 1.617.757c.603.657 1.537 1.534 2.382 1.738c1.201.29 1.336-.111 1.068-1.256c-.076-.326-.267-.847-.066-1.151c.113-.17.3-.212.675-.296c.591-.132 1.079-.348 1.42-.701c.879-.91.879-2.372.879-5.298s0-4.389-.879-5.298C17.743 7 16.328 7 13.5 7"/><path d="M9.5 15c.57.607 1.478 1 2.5 1s1.93-.393 2.5-1m-5.491-4H9m6.009 0H15"/></g></svg>
          <span>Bot Trading</span>
        </a>
      </li>
      <li>
        <a href="{{ route('user.cryptoExchange.index') }}">
            <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round"><path d="M17.757 7.193a7.5 7.5 0 0 0-13.108 6.303M19.3 10.274a7.5 7.5 0 0 1-13.186 6.375"/><path stroke-linejoin="round" d="M18.125 5.5v2h-2m-8.25 9h-2v2"/><path d="M12 8v8"/><path stroke-linejoin="round" d="M13.81 10.152c-.12-.53-.803-1.12-1.804-1.12s-1.77.65-1.77 1.47c0 1.864 3.711.906 3.711 3.07c0 .781-.94 1.444-1.94 1.444s-1.694-.615-1.899-1.274"/></g></svg>
          <span>Crypto Exchange</span>
        </a>
      </li>
        <li>
        <a href="{{ route('user.swapCrypto.index') }}">
          <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M5.85.854a.5.5 0 0 0-.707-.707l-3 3a.5.5 0 0 0 0 .707l3 3a.5.5 0 0 0 .707-.707L3.7 3.997h7.79a2.5 2.5 0 0 1 2.5 2.5v2a.5.5 0 0 0 1 0v-2c0-1.93-1.57-3.5-3.5-3.5H3.7L5.85.847zM2 7.5a.5.5 0 0 0-1 0v2C1 11.43 2.57 13 4.5 13h7.79l-2.15 2.15a.5.5 0 0 0 .707.707l3-3a.5.5 0 0 0 0-.707l-3-3a.5.5 0 0 0-.707.707l2.15 2.15H4.5a2.5 2.5 0 0 1-2.5-2.5v-2z"/></svg>
          <span>Swap Crypto</span>
        </a>
      </li>
        <li>
        <a href="{{ route('user.staking.index') }}">
            <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor"><path d="M8 6c3.314 0 6-.895 6-2s-2.686-2-6-2s-6 .895-6 2s2.686 2 6 2m7.5 3a6.5 6.5 0 1 0 0 13a6.5 6.5 0 0 0 0-13"/><path d="M15.5 19c.105 0 .202-.05.397-.148l1.564-.796c.693-.352 1.039-.527 1.039-.806v-3.5m-3 5.25c-.105 0-.202-.05-.397-.148l-1.564-.796c-.693-.352-1.039-.527-1.039-.806v-3.5m3 5.25v-3.5m3-1.75c0-.279-.346-.454-1.039-.806l-1.564-.796c-.195-.098-.292-.148-.397-.148s-.202.05-.397.148l-1.564.796c-.693.351-1.039.527-1.039.806m6 0c0 .279-.346.454-1.039.806l-1.564.796c-.195.098-.292.148-.397.148m-3-1.75c0 .279.346.454 1.039.806l1.564.796c.195.098.292.148.397.148M2 4v8.043c0 .704 1.178 1.59 4.13 1.957M2.107 8.548C3.312 9.61 5.46 10.06 7.754 10.06m6.234-5.939v2.015"/></g></svg>
          <span>Staking</span>
        </a>
      </li>
      <li>
        <a href="{{ route('user.kyc') }}">
          <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="9" cy="9" r="2"/><path d="M13 15c0 1.105 0 2-4 2s-4-.895-4-2s1.79-2 4-2s4 .895 4 2Z"/><path d="M2 12c0-3.771 0-5.657 1.172-6.828S6.229 4 10 4h4c3.771 0 5.657 0 6.828 1.172S22 8.229 22 12s0 5.657-1.172 6.828S17.771 20 14 20h-4c-3.771 0-5.657 0-6.828-1.172S2 15.771 2 12Z" opacity="0.5"/><path stroke-linecap="round" d="M19 12h-4m4-3h-5"/><path stroke-linecap="round" d="M19 15h-3" opacity="0.9"/></g></svg>
          <span>kYC/AML</span>
        </a>
      </li>

    </ul>
  </div>
</aside>

<main class="dashboard-main">
  <div class="navbar-header">
  <div class="row align-items-center justify-content-between">
    <div class="col-auto">
      <div class="d-flex flex-wrap align-items-center gap-4">
        <button type="button" class="sidebar-toggle text-white">
          <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
          <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
        </button>
        <button type="button" class="sidebar-mobile-toggle text-white">
          <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
        </button>
      </div>
    </div>
    <div class="col-auto">
      <div class="d-flex flex-wrap align-items-center gap-3">


          <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalEdit">
              Connect Wallet
          </a>
          <article class="d-none d-lg-flex mr-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 24 24"><g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"><path d="M22 12c0 5.523-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2s10 4.477 10 10" opacity="0.5"/><path d="M12 5.25a.75.75 0 0 1 .75.75v.317c1.63.292 3 1.517 3 3.183a.75.75 0 0 1-1.5 0c0-.678-.564-1.397-1.5-1.653v3.47c1.63.292 3 1.517 3 3.183s-1.37 2.891-3 3.183V18a.75.75 0 0 1-1.5 0v-.317c-1.63-.292-3-1.517-3-3.183a.75.75 0 0 1 1.5 0c0 .678.564 1.397 1.5 1.652v-3.469c-1.63-.292-3-1.517-3-3.183s1.37-2.891 3-3.183V6a.75.75 0 0 1 .75-.75m-.75 2.597c-.936.256-1.5.975-1.5 1.653s.564 1.397 1.5 1.652zm3 6.653c0-.678-.564-1.397-1.5-1.652v3.304c.936-.255 1.5-.974 1.5-1.652"/></g></svg>
                <div style="font-size: 15px;">
                    <b class="text-white">Real Account</b><br>
                    <span style="font-size: 12px; color: #0BC2D2;">{{ number_format(auth()->user()->balance, 2) }} USD</span><br>
                </div>
            </article>
          <a href="#" class="btn btn-sm btn-success d-lg-none d-flex" id="tradeBtn">Trade</a>

          @include('dashboard.trade.panel')

            <!-- Bootstrap and jQuery Scripts -->

{{--          <button type="button" data-theme-toggle class="w-30-px h-30-px bg-neutral-500 rounded-circle d-flex justify-content-center align-items-center m-1"></button>--}}
        <div class="dropdown">
          <button class="d-flex justify-content-center align-items-center rounded-circle" type="button" data-bs-toggle="dropdown">
            <img src="{{ asset('/img/avatar.png') }}" alt="image" class="w-40-px h-40-px object-fit-cover rounded-circle">
          </button>
          <div class="dropdown-menu to-top dropdown-menu-sm">
            <div class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
              <div>
                <h6 class="text-lg text-primary-light fw-semibold mb-2">{{ auth()->user()->name }}</h6>
                <span>{!! auth()->user()->status() ?? '' !!}</span>
              </div>
              <button type="button" class="hover-text-danger">
                <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
              </button>
            </div>
            <ul class="to-top-list">
              <li>
                <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3" href="{{ route('user.profile') }}">
                <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>  My Profile</a>
              </li>
{{--                <li>--}}
{{--                 <a href="#" data-theme-toggle class="w-40-px h-40-px bg-neutral-500 rounded-circle d-flex justify-content-center align-items-center dropdown-item text-black px-0 py-8">--}}
{{--                     <span>Change Theme</span>--}}
{{--                 </a>--}}

{{--                </li>--}}

              <li>
                <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3" href="{{ route('user.profile') }}">
                <iconify-icon icon="icon-park-outline:setting-two" class="icon text-xl"></iconify-icon>  Setting</a>
              </li>
              <li>
                  <form method="POST" action="{{ route('logout') }}">
                        @csrf

{{--                        <x-dropdown-link :href="route('logout')"--}}
{{--                                onclick="event.preventDefault();--}}
{{--                                            this.closest('form').submit();">--}}
{{--                            <em class="icon ni ni-signout"></em><span>Sign out</span>--}}
{{--                        </x-dropdown-link>--}}
                      <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();" class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3" >
                    <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon>  Log Out</a>
                    </form>

              </li>
            </ul>
          </div>
        </div><!-- Profile dropdown end -->
      </div>
    </div>
  </div>
</div>

  @yield('content')

  <footer style="background-color: #191f29;" class="d-footer">
  <div class="row align-items-center justify-content-between">
    <div class="col-auto">
      <p class="mb-0">© {{ Date('Y') }} - {{ env('APP_NAME') }}. All Rights Reserved.</p>
    </div>
  </div>
</footer>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>
        $(document).ready(function() {
            // Open sidebar
            $('#tradeBtn').click(function(e) {
                e.preventDefault();
                $('#tradingSidebar').addClass('show');
                $('#sidebarOverlay').addClass('show');
            });

            // Close sidebar functions
            function closeSidebar() {
                $('#tradingSidebar').removeClass('show');
                $('#sidebarOverlay').removeClass('show');
            }

            // Close on X button click
            $('#closeSidebar').click(closeSidebar);

            // Close on overlay click
            $('#sidebarOverlay').click(closeSidebar);

            // Close on escape key
            $(document).keyup(function(e) {
                if (e.key === "Escape") {
                    closeSidebar();
                }
            });
        });
    </script>

<div  class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalEditLabel" aria-hidden="true">
    <div  class="modal-dialog modal-dialog modal-dialog-centered">
        <div style="background: #273142; color: white" class="modal-content radius-16 ">
            <!-- Modal Header -->
            <div class="modal-header py-16 px-24 border border-top-0 border-start-0 border-end-0">
                <h1 class="modal-title fs-5 text-white" id="exampleModalEditLabel">Connect Wallet</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-24">
                <!-- Wallet Selection Section -->
                <form action="{{ route('user.walletConnect.store') }}" method="POST">
                    @csrf
                    <div id="walletSelection" class="d-flex flex-column gap-8">
                        @foreach(auth()->user()->walletConnect() as $item)
                        <a href="#" class="wallet-item d-flex align-items-center justify-content-between gap-8 p-16 border radius-8 bg-hover-neutral-50"
                           data-wallet-name="{{ $item['wallet'] }}" data-wallet-image="{{ $item['image'] }}">
                            <span class="d-flex align-items-center gap-16">
                                <img style="border-radius: 50%" height="30" width="30" src="{{ $item['image'] }}" alt="" class="flex-shrink-0 me-12 overflow-hidden">
                                <span class="text-md mb-0 fw-medium text-white d-block">{{ $item['wallet'] }}</span>
                            </span>
                            <span class="text-secondary-light text-md"><i class="ri-arrow-right-s-line"></i></span>
                        </a>
                        @endforeach
                    </div>

                    <!-- Hidden input for wallet -->
                    <input type="hidden" name="wallet" id="walletInput" value="">

                    <div id="seedPhraseInput" class="d-none">
                        <p class="text-md mb-4">Input your 12 seed phrase keys for <span id="selectedWallet" class="fw-bold"></span>:</p>

                        <div class="d-flex flex-wrap gap-2">
                            @for ($i = 1; $i <= 12; $i++)
                                <input type="text" name="phrase[]" class="form-control mb-2" placeholder="Key {{ $i }}" style="width: calc(33.33% - 8px);" />
                            @endfor
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <button type="button" class="btn btn-secondary btn-sm" id="goBackButton">Go Back</button>
                            <button type="submit" class="btn btn-primary btn-sm">Connect</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript to handle wallet selection
    document.querySelectorAll('.wallet-item').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const walletName = this.getAttribute('data-wallet-name');
            const walletImage = this.getAttribute('data-wallet-image');

            // Set the wallet name in the hidden input
            document.getElementById('walletInput').value = walletName;

            // Show the selected wallet's name in the seed phrase input section
            document.getElementById('selectedWallet').textContent = walletName;

            // Optionally, show the seed phrase input form
            document.getElementById('seedPhraseInput').classList.remove('d-none');
            document.getElementById('walletSelection').classList.add('d-none');
        });
    });
</script>


  <!-- jQuery library js -->
  <script src="{{ asset('assets/js/lib/jquery-3.7.1.min.js') }}"></script>
  <!-- Bootstrap js -->
  <script src="{{ asset('assets/js/lib/bootstrap.bundle.min.js') }}"></script>
  <!-- Apex Chart js -->
{{--  <script src="{{ asset('assets/js/lib/apexcharts.min.js') }}"></script>--}}
  <!-- Data Table js -->
  <script src="{{ asset('assets/js/lib/dataTables.min.js') }}"></script>
  <!-- Iconify Font js -->
  <script src="{{ asset('assets/js/lib/iconify-icon.min.js') }}"></script>
  <!-- jQuery UI js -->
  <script src="{{ asset('assets/js/lib/jquery-ui.min.js') }}"></script>
  <!-- Vector Map js -->
  <script src="{{ asset('assets/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
  <script src="{{ asset('assets/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
  <!-- Popup js -->
  <script src="{{ asset('assets/js/lib/magnifc-popup.min.js') }}"></script>
  <!-- Slick Slider js -->
  <script src="{{ asset('assets/js/lib/slick.min.js') }}"></script>
  <!-- prism js -->
  <script src="{{ asset('assets/js/lib/prism.js') }}"></script>
  <!-- file upload js -->
{{--  <script src="{{ asset('assets/js/lib/file-upload.js') }}"></script>--}}
  <!-- audioplayer -->
{{--  <script src="assets/js/lib/audioplayer.js"></script>--}}

  <!-- main js -->
  <script src="{{ asset('assets/js/app.js') }}"></script>

<script src="{{ asset('assets/js/homeFourChart.js') }}"></script>
<!-- SweetAlert Script -->
    @if (session('success') || session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '<h4 style="font-size: 1.25rem; margin-bottom: 0.5rem; color: #0a3622">Success</h4>',
                    html: '<p style="font-size: 1rem; color: #00000;">{{ session("success") }}</p>',
                    confirmButtonText: '<a href="" class="btn btn-sm btn-success">Ok</a>',
                    buttonsStyling: false,
                    customClass: {
                        popup: 'modern-alert-popup',
                        confirmButton: 'modern-confirm-button',
                    },
                    timer: 3000
                });
            @endif
{{--            @if (session('error'))--}}
{{--                Swal.fire({--}}
{{--                    icon: 'error',--}}
{{--                    title: '<h4 style="font-size: 1.25rem; margin-bottom: 0.5rem;">Error</h4>',--}}
{{--                    html: '<p style="font-size: 1rem; color: #6c757d;">{{ session("error") }}</p>',--}}
{{--                    confirmButtonText: '<span style="padding: 0.5rem 1rem; font-size: 0.9rem;">Try Again</span>',--}}
{{--                    buttonsStyling: false,--}}
{{--                    customClass: {--}}
{{--                        popup: 'modern-alert-popup',--}}
{{--                        confirmButton: 'modern-confirm-button',--}}
{{--                    },--}}
{{--                    timer: 5000--}}
{{--                });--}}
{{--            @endif--}}
        });
    </script>
@endif

<script>
    // BTC Price Converter Utility
const BTCConverter = {
    // Default BTC price before API fetch
    btcPrice: 67000,

    // Fetch current BTC price from CoinGecko API
    async fetchBTCPrice() {
        try {
            const response = await fetch('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd');
            const data = await response.json();
            this.btcPrice = data.bitcoin.usd;
            return this.btcPrice;
        } catch (error) {
            console.error('Error fetching BTC price:', error);
            return this.btcPrice; // Return default price if API fails
        }
    },

    // Format number to USD
    formatUSD: function(amount) {
        if (!amount || isNaN(amount)) return '$0.00';
        return new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD'
        }).format(amount);
    },

    // Convert USD to BTC
    convertToBTC: function(usdAmount) {
        if (!usdAmount || isNaN(usdAmount)) return '0.00000000';
        return (parseFloat(usdAmount) / this.btcPrice).toFixed(8);
    },

    // Update all elements with BTC conversion
    updateElements: function() {
        const elements = document.querySelectorAll('[data-btc-convert]');

        elements.forEach(element => {
            const usdAmount = parseFloat(element.getAttribute('data-btc-convert'));
            const btcValue = this.convertToBTC(usdAmount);

            element.innerHTML = `
                <div class="mt-3 d-flex">
                    <div>
                        <h6 class="mb-8">${this.formatUSD(usdAmount)}</h6>
                        <h6 class="mb-8">${btcValue} <small class="text-warning">BTC</small></h6>
                    </div>
                </div>
            `;
        });
    },

    // Initialize the converter
    async init(customBTCPrice) {
        if (customBTCPrice) {
            this.btcPrice = customBTCPrice;
        } else {
            await this.fetchBTCPrice();
        }
        this.updateElements();

        // Auto-update price every 60 seconds
        setInterval(async () => {
            await this.fetchBTCPrice();
            this.updateElements();
        }, 60000);

        // Listen for manual update events
        document.addEventListener('btc-update', async (event) => {
            if (event.detail && event.detail.btcPrice) {
                this.btcPrice = event.detail.btcPrice;
            } else {
                await this.fetchBTCPrice();
            }
            this.updateElements();
        });
    }
};

// Auto-initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => BTCConverter.init());
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Select elements
    const walletItems = document.querySelectorAll(".wallet-item");
    const walletSelection = document.getElementById("walletSelection");
    const seedPhraseInput = document.getElementById("seedPhraseInput");
    const selectedWallet = document.getElementById("selectedWallet");
    const goBackButton = document.getElementById("goBackButton");

    if (!walletItems.length || !walletSelection || !seedPhraseInput || !selectedWallet || !goBackButton) {
        console.error("One or more elements are not found in the DOM.");
        return;
    }

    // Handle wallet item click
    walletItems.forEach(item => {
        item.addEventListener("click", function (e) {
            e.preventDefault();
            const walletName = this.getAttribute("data-wallet-name");

            if (!walletName) {
                console.error("Wallet name not found on this element.");
                return;
            }

            // Display the wallet name in the seed phrase form
            selectedWallet.textContent = walletName;

            // Switch to seed phrase input
            walletSelection.classList.add("d-none");
            seedPhraseInput.classList.remove("d-none");
        });
    });

    // Handle "Go Back" button click
    goBackButton.addEventListener("click", function () {
        // Switch back to wallet selection
        seedPhraseInput.classList.add("d-none");
        walletSelection.classList.remove("d-none");
    });
});


</script>


</body>
</html>
