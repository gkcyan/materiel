<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo_agro.png') }}" />

        <title>{{ config('app.name', 'MTM') }}</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                
            }
            .selector-for-some-widget {
                box-sizing: content-box;
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
            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
               
            }

            .title {
                font-size: 84px;
               
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
               
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        @livewireStyles
    </head>

    <body>
                
         <div class="flex-center position-ref full-height">
             <div class="row">
                @if (Route::has('login'))
                    <div class="top-left links">
                        <a href="{{ url('/') }}"> <img src="{{ asset('assets/images/logo.jpg') }}" class="img-fluid" alt="logo entreprise"></a>
                    
                    </div>
                    <div class="top-right links">
                                        
                        @auth
                            <a href="{{ url('/home') }}">@lang('messages.Home')</a>|
                            <a href="{{ url('locale/fr') }}">@lang('messages.Francais')</a> |
                                <a href="{{ url('locale/en') }}">@lang('messages.Anglais')</a>
                        @else
                        <a href="{{ url('locale/fr') }}">@lang('messages.Francais')</a> |
                        <a href="{{ url('locale/en') }}">@lang('messages.Anglais')</a></small></a>
    
                        @endauth
                    
                    </div>
                @endif

                <div class="content">
                    <div class="row m-b-md">
                        <div class="shadow-lg p-3 mb-5 bg-white rounded">

                            <div class="links">
                                <a href=""> @lang('messages.planteur') </a>|
                                <a href=""> @lang('messages.assitant_agricole')</a>|
                                <a href=""> @lang('messages.transporteur') </a>|
                                <a href=""> @lang('messages.carburant') </a>|
                                <a href=""> @lang('messages.maintenancier') </a>|
                                <a href=""> @lang('messages.pont_bascule')</a>|
                                <a href=""> @lang('messages.acheteur') </a>|
                                <a href=""> @lang('messages.fournisseur') </a>|
                                <a href=""> @lang('messages.facturier')</a>|
                                <a href=""> @lang('messages.vente')</a>
                                </br></br></br>
                            </div>
                    
                            <div class="row">
                                    <div class="col-sm-9 col-md-9"><img src="{{ asset('assets/images/background.png') }}" class="img-fluid " alt="Responsive image"></div> 
                                    
                                    <div class=" col-md-3 text-center">
                                        @if (!Auth::guest())
                                        <blockquote class="blockquote">
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                        </blockquote>
                                        @else
                                        <div class="shadow-lg p-3 mb-5 bg-white rounded">
                            
                                            <img src="{{ asset('assets/images/logo_agro.png') }}" class="img-fluid" alt="Responsive image">
                                            @yield('content')
                                           
                                        </div>
                                        @endif
                                    </div>

                            </div>   
                        </div>
                    </div>
                        <footer class="main-footer" style="max-height: 100px;text-align: center">
                            <strong>Copyright © 2020 <a href="#"><img src="{{ asset('assets/images/logo_copy.png') }}" class="img-fluid" alt="Responsive image"></a></strong> All rights reserved. | KeaDouan
                        </footer>
                </div>
              </div>
            </div>
        
        
        @livewireScripts
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>


</body>
</html>
