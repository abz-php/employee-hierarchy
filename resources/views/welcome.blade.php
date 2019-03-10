<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            {{--<div class="content">--}}
                {{--<div class="title m-b-md">--}}
                    {{--Laravel--}}
                {{--</div>--}}

                {{--<div class="links">--}}
                    {{--<a href="https://laravel.com/docs">Documentation</a>--}}
                    {{--<a href="https://laracasts.com">Laracasts</a>--}}
                    {{--<a href="https://laravel-news.com">News</a>--}}
                    {{--<a href="https://nova.laravel.com">Nova</a>--}}
                    {{--<a href="https://forge.laravel.com">Forge</a>--}}
                    {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
                {{--</div>--}}
            {{--</div>--}}


        </div>

        <div class="container" id="app">
            {{--<ul>--}}
                {{--@foreach(\App\Models\Employee::whereNull('chief_id')->with('subordinatesRecursive')->get() as $e)--}}
                    {{--{{dd($e->toArray())}}--}}
                    {{--<li>{{$e->first_name}}</li>--}}
                    {{--@if(count($e->subordinatesRecursive))--}}
                        {{--<ul>--}}
                            {{--@foreach($e->subordinatesRecursive as $ee)--}}
                            {{--<li>{{$ee->first_name}}</li>--}}
                                {{--@if(count($ee->subordinatesRecursive))--}}
                                    {{--<ul>--}}
                                        {{--@foreach($ee->subordinatesRecursive as $eee)--}}
                                            {{--<li>{{$eee->first_name}}</li>--}}
                                        {{--@endforeach--}}
                                    {{--</ul>--}}
                                {{--@endif--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--@endif--}}
                {{--@endforeach--}}
            {{--</ul>--}}
            <employees-tree></employees-tree>
        </div>

        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
