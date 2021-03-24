<!DOCTYPE html >
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MageBit (Task_3) Aleks Hartmanis</title>

    <link href="css/nav.css" rel="stylesheet">
    <link href="css/welcome.css" rel="stylesheet">
</head>
    <body onload="validationemail()">

    <nav class="navbar">
        <div class="content">

            <div class="logo">
                <img src="../images/logo/Logo.png"> <p>pineapple.</p>
            </div>

            <ul class="menu-list">
                <li class="nav-item"><a  class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a  class="nav-link" href="#">How it works</a></li>
                <li class="nav-item"><a  class="nav-link" href="#">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="row">
        <div class="column-left">
            <div class="vertical-center">
                <p class="heading">Subscribe to newsletter</p>
                <p class="subheading">Subscribe to our newsletter and get 10% discount on pineapple glasses.</p>

                <form id="form" action="/subscription/store" method="post">
                    @csrf
                    <div class="email_main">
                        <div class="arrow_in_email_input">
                            <button id="arrow_no_js"> <img src="../images/icons/ic_arrow.png"> </button>
                            <button id="arrow" class="fa fa-arrow-right "></button>
                        </div>
                        <input type="text" id="email" name="email" value="{{old('email')}}" placeholder="Type your email address here…" oninput="validationemail()">
                        @if($errors)
                            @error('email')<small id="email_error" style="color: red" class="text-danger">{{ $message }}</small>@enderror
                        @endif
                        <span id="email_error" style="color: red; display: unset">  </span>
                    </div>

                    <p class="terms-text"> <input onchange="validationemail()" type="checkbox" id="myCheck" name="myCheck"> I agree to <a href="#" class="terms-text-href">terms of service</a> </p>
                    @if($errors)
                        @error('myCheck')<small id="checkbox_error" style="color: red" class="text-danger">{{ $message }}</small>@enderror
                    @endif
                    <span id="checkbox_error" style="color: red; display: unset" > </span>

                </form>

                <hr>

                <div class="media">
                    <a href="#" id="fb" class="fa fa-facebook-f fa-sm circle-icon"></a>
                    <a href="#" id="ig" class="fa fa-instagram fa-sm circle-icon"></a>
                    <a href="#" id="tw" class="fa fa-twitter fa-sm circle-icon"></a>
                    <a href="#" id="yt" class="fa fa-youtube fa-sm circle-icon"></a>
                </div>
            </div>
        </div>
        <div class="column-right">

        </div>
    </div>

    <script src="js/icons.js"></script>
    <script type="text/javascript" src="js/validation.js"></script>

    <noscript>
        <div style="padding-left: 5vw; padding-top:22vh; position: absolute">
            <span class="subheading" style="color:red">JavaScript is not enabled!</span>
        </div>
    </noscript>

    </body>
</html>
