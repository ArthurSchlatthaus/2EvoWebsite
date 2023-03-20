<div class="navbar navbar-expand-lg" style="text-transform: uppercase">
    <div class="container-fluid navi">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".mobile"
                aria-controls="navi_left" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" aria-hidden="true" style="color: #b7934c"></i>
        </button>
        <div class="navbar-collapse collapse mobile" id="navi_left"
             style="z-index: 888 !important;justify-content: center">
            <ul class="navbar-nav" style="margin-right: auto; margin-left: auto;">
                <li class="nav-item"><a class="nav-link" href="{{url('/')}}">{{ __('messages.home') }}</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-expanded="false">
                        {{ __('messages.ranking') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item nav-link" href="{{url('char_ranking')}}">{{ __('messages.player') }}</a></li>
                        <li><a class="dropdown-item nav-link" href="{{url('guild_ranking')}}">{{ __('messages.guild') }}</a></li>
                        <li><a class="dropdown-item nav-link" href="{{url('minime_ranking')}}">{{ __('messages.minime') }}</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">{{ __('messages.board') }}</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-expanded="false">
                        {{ __('messages.items') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item nav-link" href="{{url('proto_0_0_0')}}">{{ __('messages.proto') }}</a></li>
                        <li><a class="dropdown-item nav-link" href="{{url('protoAll_0_0_0')}}">{{ __('messages.protoAll') }}</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <div class="navbar-collapse collapse">
            <a id="navi_middle"
               style="margin-top: 55px; z-index: 999 !important; width: 400px; height: 130px; background-color: transparent"
               class="navbar-brand mx-auto" href="{{url('download')}}"></a>
        </div>
        <div class="navbar-collapse collapse mobile" id="navi_right" style="z-index: 888 !important;">
            <ul class="navbar-nav" style="margin-right: auto; margin-left: auto;">
                <li class="nav-item"><a class="nav-link" href="{{url('faq')}}">{{ __('messages.faq') }}</a></li>
                @guest
                    <li class="button nav-item" id="navi_login"><a class="nav-link" href="" data-bs-toggle="modal"
                                                                   data-bs-target="#modalLoginForm">{{ __('messages.login') }}</a>
                    </li>
                    <li class="button nav-item" id="navi_register"><a class="nav-link" href="" data-bs-toggle="modal"
                                                                      data-bs-target="#modalRegisterForm">{{ __('messages.register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="fas fa-user"></i><span class="username">{{ Auth::User()->login }}</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item nav-link" href="{{url('user')}}">{{ __('messages.user') }}</a></li>
                            <li><a class="dropdown-item nav-link" href="{{url('donation')}}">{{ __('messages.donate') }}</a></li>
                            <li><a class="dropdown-item nav-link"
                                   href="{{url('change-password')}}">{{ __('messages.changePwd') }}</a></li>
                            <li><a class="dropdown-item nav-link"
                                   href="{{url('change-mail')}}">{{ __('messages.changeMail') }}</a></li>
                            @if(auth()->user()->pincode != null )
                                <li><a class="dropdown-item nav-link"
                                       href="{{url('change-pin')}}">{{ __('messages.changePin') }}</a>
                                </li>
                            @endif
                            <li><a class="dropdown-item nav-link" href="{{url('forgot-pin')}}">{{ __('messages.forgotPin') }}</a>
                            </li>
                            @if(auth()->user()->question1 == null or auth()->user()->question2 == null or auth()->user()->question3 == null)
                                <li><a class="dropdown-item nav-link"
                                       href="{{url('add-question')}}">{{ __('messages.securityQuestion') }}</a></li>
                            @endif
                            <li><a class="dropdown-item nav-link" href="{{url('logoutGET')}}">{{ __('messages.logout') }}</a></li>
                        </ul>
                    </li>
                @endguest

                <li class="nav-item"><a class="nav-link" href="{{ url('locale/en') }}"><i
                            class="flag-icon flag-icon-gb"></i></a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('locale/de') }}"><i
                            class="flag-icon flag-icon-de"></i></a></li>

            </ul>
        </div>
    </div>
</div>
<style>
    p {
        text-align: center;
    }

    .navbar {
        background-color: rgba(1, 1, 1, 0.5);
        width: 100%;
        height: 75px;
    }

    .navi {
        z-index: 999 !important
    }

    .navbar-nav .dropdown:hover > ul {
        display: inherit;
    }

    .navbar-nav .dropdown {
        display: inline-block;
    }

    .navbar-nav .dropdown-menu {
        background: none;
        background-color: #00000091;
        border-radius: 0 !important;
    }

    .navbar-nav .dropdown-item:hover {
        background: none;
    }

    .nav-link {
        display: block;
        padding: 0 20px;
        color: white;
        font-size: 25px;
        line-height: 75px;
        white-space: nowrap;
    }

    .nav-link:hover {
        color: #b7934c;
        text-decoration: none !important
    }

    .nav-link:focus {
        color: #b7934c;
        text-decoration: none !important
    }

    .nav-item {
        padding-left: 15px;
        padding-right: 15px;
    }

    #navi_register:hover {
        background-color: #a2000080;
    }

    #navi_login:hover {
        background-color: #0c0c0cc2;
    }

    #navi_register {
        background-color: #ff00002e;
    }

    #navi_login {
        background-color: #0c0c0c60;
    }

    #navi_register a:hover {
        color: #b7934c;
    }

    #navi_middle:hover {
        background-image: url("images/navbar/download-norm.png");
    }

    #navi_right .username {
        text-transform: capitalize;
        margin-left: 10px;
    }

    #navi_middle {
        transform: translateX(-50%);
        left: 50%;
        position: absolute;
        background: url("images/navbar/download-hover.png") no-repeat top center;
        background-color: #121010;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    @media only screen and (max-width: 1920px) {
        .navbar {
            height: 50px;
        }

        .nav-link {
            font-size: 14px;
            line-height: 50px;
        }

        #navi_middle {
            width: 300px !important;
            height: 100px !important;
            margin-top: 45px !important;
        }
    }

    @media only screen and (max-width: 1400px) {
        .navbar {
            height: 50px;
        }

        .nav-link {
            font-size: 13px;
            line-height: 50px;
        }

        #navi_middle {
            width: 200px !important;
            height: 60px !important;
            margin-top: 10px !important;
        }
    }

    @media only screen and (max-width: 1090px) {
        .nav-link {
            font-size: 10px;
            backdrop-filter: blur(1px);
        }

        #navi_middle {
            display: none;
        }
    }
</style>
