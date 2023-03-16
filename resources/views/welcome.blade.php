<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Landing Page</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       
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
            .container-fluid{
                position: relative;
                margin: 0;
                padding: 0;
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
            img.logoimg {
                margin-left: 15px;
                padding-bottom: 7px;
            }
            .reg{
                font-size: 18px;
                color: antiquewhite;
                position:absolute;
                top: 22px;
                right: 35px;
                background-color: #990f02;
                padding: 3mm;  
                font-weight: bold;
                border-style: solid;
                border-color: #990f02;
            }
            a:link { 
                text-decoration: none; 
            }
            a:visited { 
                text-decoration: none; 
            }
            a:hover.login{ 
                text-decoration: none; 
                color: #990f02;
                transition: 0.5s;
            }
            a:hover.reg{ 
                text-decoration: none; 
                background-color: #212121;
                border-style: solid;
                border-color: #990f02;
                transition: 0.5s;
            }
            a:active { 
                text-decoration: none;
            }
            .container-fluid img{
                width: 40mm;
                height: 20mm;
            }
            .nav{
                padding-top: 4mm;
                padding-bottom: 2mm;
                background-color: #212121;
            }
            .footer{          
                position: relative;
                background-color: #990f02;
                font-size: 14px;
                color: white;
                padding: 10px;
            }
            .body{
                width: 100%;
                height: 100vh;
                background-image: url('images/bk2.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
                   <!-- background-image:url({{url('images/bk.png')}}); -->
    <body class="antialiased">

        <!--footer-->
        <footer>
            <div class="footer">
                <div class="row m-0 p-0 text-center">                    
                    <div class="col-md-4"><i class="fa-solid fa-location-dot"></i> VLC Tower One, Gran Via, Cagayan de Oro City, Misamis Oriental</div>
                    <div class="col-md-4"><i class="fa-regular fa-envelope"></i> info@obxsolution.com</div>
                    <div class="col-md-4"><i class="fa-solid fa-business-time"></i> 09:00 am - 05:00 pm</div>
                </div>
            </div>
        </footer>

        <!--nav-->
        <div class="container-fluid">
            <nav class="nav">
                <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
                    <a href="/">
                        <img src="images/logo2.png" alt="logo" class="logoimg">
                    </a>
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

            <!--body-->
            <div class="body">        
            </div>
        </div>

        <!--bootstrap script-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
