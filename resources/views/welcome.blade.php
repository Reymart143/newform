<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Landing Page</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */*,
            html{
                line-height:1.5;
                -webkit-text-size-adjust:100%;
                -moz-tab-size:4
                ;tab-size:4;
                font-family:Figtree, sans-serif;
                font-feature-settings:normal
            }
            body{
                margin:0;
                line-height:inherit;
            }
            .container{
                position: relative;
            }
            .login{   
                margin-left: 88%;
                font-size: 19px;
                padding-right: 5mm;
                color: antiquewhite;
                position:absolute;
                top: 33px;
                right: 150px;
            }
            .reg{
                font-size: 18px;
                color: antiquewhite;
                position:absolute;
                top: 22px;
                right: 35px;
                background-color: red;
                padding: 3mm;  
                font-weight: bold;
            }
            a:link { 
                text-decoration: none; 
            }
            a:visited { 
                text-decoration: none; 
            }
            a:hover { 
                text-decoration: none; 
            }
            a:active { 
                text-decoration: none;
            }
            .container img{
                width: 40mm;
                height: 20mm;

            }
            .body img{
                width: 100%;
                height: 100%;
            }
            .nav{
                padding-top: 4mm;
                padding-bottom: 2mm;
                background-color: #212121;
            }
        </style>
    </head>
                   <!-- background-image:url({{url('images/bk.png')}}); -->
    <body class="antialiased">
        <div class="container">
            <nav class="nav">
                <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
                    <img src="images/logo2.png" alt="logo">
                    @if (Route::has('login'))
                        <div class="navbutt">
                            @auth
                                <a href="{{ url('/home') }}" class="home">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="login">Login</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="reg">REGISTER</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </nav>
            <div class="body">
                <img src="images/bk.png" alt="logo">
            </div>
        </div>
    </body>
</html>
