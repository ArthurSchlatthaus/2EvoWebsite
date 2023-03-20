<!DOCTYPE html>
<html lang="de" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{url('/images/2EvoLogo.png')}}">
    <title>2Evo</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="{{ asset('js/vendor/fontawesome.min.js') }}"></script>
    <script src="{{ asset('js/vendor/fontawesome_all.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.dataTables.min.js') }}"></script>
    <link href="{{ asset('css/vendor/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css" rel="stylesheet"/>
    <link href="{{ asset('css/vendor/jquery.dataTables.min.css') }}" rel="stylesheet">
    <style>
        @font-face {
            font-family: Trajan;
            src: url('fonts/Trajan Pro Regular.ttf') format('truetype');
        }

        @font-face {
            font-family: PTSerif;
            src: url('fonts/PTSerif-Regular.ttf') format('truetype');
        }

        @font-face {
            font-family: PTSerifBold;
            src: url('fonts/PTSerif-Bold.ttf') format('truetype');
        }
    </style>
</head>
<body class="d-flex flex-column h-100" style="font-family: PTSerif; background-color: #121010">
<header>
    @guest
        @include('elements.loginModal')
		@include('elements.registerModal')
    @endif
</header>
<main class="flex-shrink-0" style="height: 100%; min-height: 0;">
    @include('elements.navbar')
    <div class="top" style="height:200px; min-width:100% !important;">
        <img class="img-fluid" src="images/background/logo.png" alt="2EvoLogo" width="700"
             style="padding-top: 10%;margin-left: 10%;max-width: 90%">
        <div id="snackbarSuccess" style="width: 250px;">
            <div style="font-size: 10px">
                <p style="padding:14px;margin:-16px;background-color: #5c8a13;text-align: start !important;">{{ session()->get('message') }}</p>
                @if(isset($no_email) and $no_email)
                    <p style="text-align: start !important;padding-top: 24px">{{__('messages.no_email')}}</p>
                @endif
                @if(isset($no_question) and $no_question)
                    <p style="text-align: start !important;margin-bottom: 4px">{{__('messages.no_question')}}</p>
                @endif
            </div>
        </div>
        <div id="snackbarError" style="width: 250px;">
            <div style="font-size: 10px">
                <p style="text-align: start !important;">{{$errors->first()}}</p>
            </div>
        </div>
        @if(session()->has('message'))
            <script>
                var x = document.getElementById("snackbarSuccess");
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 10000);
            </script>
        @endif
        @if($errors->any())
            <script>
                var x = document.getElementById("snackbarError");
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 10000);
            </script>
        @endif
    </div>
    <div class="items"
         style=";width: 100%;display: flex;flex-direction: column;align-items: center;justify-content: center;min-height: 400px">
        @if(!empty($error))
            @include('elements.error')
        @endif
        @if(!empty($user_page))
            @include('elements.user')
        @endif
        @if(!empty($download_page))
            @include('elements.download')
        @endif
        @if(!empty($ranking_page_player))
            @include('elements.playerRanking')
        @endif
        @if(!empty($ranking_page_guild))
            @include('elements.guildRanking')
        @endif
            @if(!empty($ranking_page_minime))
            @include('elements.minimeRanking')
        @endif
        @if(!empty($start_page))
            @include('elements.statistic')
            @include('elements.news')
            @include('elements.startRanking')
        @endif
        @if(!empty($faq_page))
            @include('elements.faq')
        @endif
        @if(!empty($detailView))
            @include('elements.detalview')
        @endif
        @if(!empty($change_password))
            @include('elements.changePassword')
        @endif
        @if(!empty($change_mail))
            @include('elements.changeMail')
        @endif
        @if(!empty($add_question))
            @include('elements.addQuestion')
        @endif
        @if(!empty($change_pin))
            @include('elements.changePin')
        @endif
        @if(!empty($forgot_pin))
            @include('elements.forgotPin')
        @endif
        @if(!empty($security_question))
            @include('elements.securityQuestion')
        @endif
        @if(!empty($security_answer))
            @include('elements.securityAnswer')
        @endif
        @if(!empty($forget_password))
            @include('elements.forgotPassword')
        @endif
        @if(!empty($forget_password_link))
            @include('elements.forgotPasswordLink')
        @endif
        @if(!empty($proto))
            @include('elements.proto')
        @endif
        @if(!empty($protoAll))
            @include('elements.protoAll')
        @endif
        @if(!empty($mobdrop))
            @include('elements.mobDrop')
        @endif
        @if(!empty($donation_page))
            @include('elements.payment')
        @endif
    </div>

    <footer class="footer mt-auto">
        @include('elements.footer')
    </footer>
</main>

</body>
</html>
<style>
    main {
        background: url("images/background/top-background.png") no-repeat top center;
        background-color: #121010;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: contain;
    }

    .items {
        background: url("images/ranking/background.png") no-repeat bottom center;
        -webkit-background-size: auto;
        -moz-background-size: auto;
        -o-background-size: auto;
        background-size: auto;
    }

    footer {
        background-color: #a5722c;
    }


    @media only screen and (min-width: 3500px) {
        .top {
            height: 1300px !important;
        }

        .items {
            min-height: 600px !important;
        }
    }

    @media (min-width: 3200px) and (max-width: 3500px) {
        .top {
            height: 1200px !important;
        }

        .items {
            min-height: 600px !important;
        }
    }

    @media (min-width: 2800px) and (max-width: 3200px) {
        .top {
            height: 1100px !important;
        }

        .items {
            min-height: 600px !important;
        }
    }


    @media (min-width: 2300px) and (max-width: 2800px) {
        .top {
            height: 1000px !important;
        }

        .items {
            min-height: 600px !important;
        }
    }

    @media (min-width: 1900px) and (max-width: 2300px) {
        .top {
            height: 850px !important;
        }

        .items {
            min-height: 600px !important;
        }
    }

    @media (min-width: 1000px) and (max-width: 1900px) {
        .top {
            height: 700px !important;
        }

        .items {
            min-height: 600px !important;
        }
    }

    @media (min-width: 660px) and (max-width: 1000px) {
        .top {
            height: 600px !important;
        }

        .items {
            min-height: 600px !important;
        }
    }

    html {
        overflow: scroll;
        overflow-x: hidden;
    }

    ::-webkit-scrollbar {
        width: 0; /* Remove scrollbar space */
        background: transparent; /* Optional: just make scrollbar invisible */
    }

    #snackbarSuccess {
        visibility: hidden;
        background-color: #7db81f;
        color: #fff;
        padding: 16px;
        position: absolute;
        top: 10%;
        right: 0;
        z-index: 1;
        font-size: 17px;
    }

    #snackbarError {
        visibility: hidden;
        background-color: red;
        color: #fff;
        padding: 16px;
        position: absolute;
        top: 10%;
        right: 0;
        z-index: 1;
        font-size: 17px;
    }

    #snackbarSuccess.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 9.5s;
        animation: fadein 0.5s, fadeout 0.5s 9.5s;
    }

    #snackbarError.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 9.5s;
        animation: fadein 0.5s, fadeout 0.5s 9.5s;
    }

    @-webkit-keyframes fadein {
        from {
            right: 0;
            opacity: 0;
        }
        to {
            right: 30px;
            opacity: 1;
        }
    }

    @keyframes fadein {
        from {
            right: 0;
            opacity: 0;
        }
        to {
            right: 30px;
            opacity: 1;
        }
    }

    @-webkit-keyframes fadeout {
        from {
            right: 30px;
            opacity: 1;
        }
        to {
            right: 0;
            opacity: 0;
        }
    }

    @keyframes fadeout {
        from {
            right: 30px;
            opacity: 1;
        }
        to {
            right: 0;
            opacity: 0;
        }
    }
</style>
