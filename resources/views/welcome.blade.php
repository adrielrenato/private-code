<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Agenda</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

         <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            .centralize {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 1000;
                display: flex;
                align-items: center;
                padding-top: 1rem;
                padding-bottom: 1rem;
                background-color: #f0f3f4;
            }
        </style>
    </head>
    <body>
        <div class="centralize">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <h1><strong>Agenda</strong></h1>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center">
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a class="btn btn-primary" href="{{ url('/home') }}">Ir para agenda</a>
                                @else
                                    <a class="btn btn-secondary" href="{{ route('login') }}">Entrar</a>
            
                                    @if (Route::has('register'))
                                        <a class="btn btn-primary" href="{{ route('register') }}">Cadastrar-se</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
