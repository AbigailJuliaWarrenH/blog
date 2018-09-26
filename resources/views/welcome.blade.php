<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Pâtisserie</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Annie+Use+Your+Telescope|Give+You+Glory|Homemade+Apple" rel="stylesheet">

        {{-- fontawesome --}}

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #fff;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background-image: url("{{ asset('images/waffle-heart.jpg') }}");
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center; 
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

           /* .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }*/

            .m-b-md {
                margin-bottom: 30px;
            }

            .cover {
            background-color: #31c695d3;
            }

            #landfont {
                font-family: 'Homemade Apple', cursive;
            }

            .quote {
                font-family: 'Give You Glory', cursive;
                color: #ffe5a2;
                padding: 20px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                /*font-size: 20px;    */
            }

            .sub{
                font-family: 'Give You Glory', cursive;
                color: #52260b;
                padding: 20px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .fas {
                color: #fff;
                font-size: 50px;
                padding: 10px;
            }

            /*extra small devices*/
            @media only screen and (max-width: 575.98px){

            } 
            /*end of small devices*/

            /*small devices*/
            @media only screen and (min-width: 576px) and (max-width: 767.98px){

            }
            /*end of small devices*/

            @media only screen and (max-width: 767.9px) {
                #landfont {
                    font-size: 15vw;
                }
                .sub {

                }
            }

            @media only screen and (min-width: 768px) and (max-width: 991.98px) {
                #landfont {
                    font-size: 12vw;
                }
            }

            @media only screen and (min-width: 992px) and (max-width: 1199.98px){

            }

            @media only screen and (min-width: 1200px){

            }


        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links" id="home">
                    @auth
                        <a href="{{ url('/home') }}"><i class="fas fa-home"></i> {{-- <img src="images/home-sketch"> --}}</a>
                    @else
                        <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i></a>
                        <a href="{{ route('register') }}"><i class="fas fa-pen"></i></a>
                    @endauth
                </div>
            @endif

            <div class="row">
                <div class="col content">
                    <div class="cover">
                            

                        <div class="quote">

                            <p>"You learn a lot about someone 
                             <br>   
                           when you share a meal together."
                             <br>   
                             -Anthony Bourdain
                            </p>
                            {{-- <a href="https://laravel.com/docs">Documentation</a>
                            <a href="https://laracasts.com">Laracasts</a>
                            <a href="https://laravel-news.com">News</a>
                            <a href="https://forge.laravel.com">Forge</a>
                            <a href="https://github.com/laravel/laravel">GitHub</a> --}}
                        </div>
                        <div class="title m-b-md" id="landfont">
                            Pâtisserie
                        </div>
                          <div class="sub">

                            <p>Bakers, Pastry Chefs and Baking Enthusiasts <br> Online Community</p>
                         
                            {{-- <a href="https://laravel.com/docs">Documentation</a>
                            <a href="https://laracasts.com">Laracasts</a>
                            <a href="https://laravel-news.com">News</a>
                            <a href="https://forge.laravel.com">Forge</a>
                            <a href="https://github.com/laravel/laravel">GitHub</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
