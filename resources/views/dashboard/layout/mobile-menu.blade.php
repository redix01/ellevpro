<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .bottom-menu {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #000000;
            padding: 5px 0;
            left: 0;
            border-radius: 18%;
        }

        .bottom-menu .nav-link {
            /*color: #ccc;*/
            font-size: 14px;
            white-space: nowrap;
        }

        .bottom-menu .nav-link.active {
            color: #007bff;
        }

        .bottom-menu i {
            display: block;
            font-size: 25px;
        }

    </style>

<!-- Bottom Menu -->
<div class="bottom-menu d-block d-lg-none">
    <div class="container">
        <div class="row justify-content-between text-center">
            <div class="col">
               <a href="{{ route('user.dashboard') }}" class="nav-link {{ Route::is('user.dashboard') ? 'active' : '' }}">
                    <i class="icon ni ni-wallet-alt"></i>
                    Account
                </a>

            </div>
            <div class="col">
                <a href="{{ route('user.copytrade.index') }}" class="nav-link {{ Route::is('user.copytrade.index') ? 'active' : '' }}">
                     <i class="icon ni ni-layers"></i>
                    Copy Trading
                </a>
            </div>
            <div class="col">
                <a href="{{ route('user.trade') }}" class="nav-link {{ Route::is('user.trade') ? 'active' : '' }}">
                    <i class="icon ni ni-bar-chart"></i>
                    Trade
                </a>
            </div>
            <div class="col">
                <a href="{{ route('user.reward') }}" class="nav-link {{ Route::is('user.reward') ? 'active' : '' }}">
                    <i class="icon ni ni-gift"></i>
                    Rewards
                </a>
            </div>
            <div class="col">
                <a href="#" class="nav-link">
                    <i class="fas fa-ellipsis-h"></i>
                    More
                </a>
            </div>
        </div>
    </div>
</div>
