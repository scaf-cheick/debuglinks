<!DOCTYPE html>
<html lang="en">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>@section('title')DebugLinks | The best way to debug your code @show</title>

        <meta property="og:title" content="@section('title')DebugLinks | The best way to debug your code @show" />
        <meta name="description" content="@section('description')DebugLinks | The best way to debug your code.@show">
        <meta property="og:url" content="@section('url')https://www.debuglinks.com @show" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="@section('image'){{asset('uploads/others/banner.png')}}@show"/>
        <meta property="og:copyright" content="DebugLinks" />
        <meta property="og:developer_lead" content="SOURGOU Franck" />
        <meta name="author" content="Sourgou Franck - f.sourgou@fasonumerique.com">
        <meta property="og:site_name" content="debuglinks.com" />

        <link href="{{asset('materialize/css/aos.min.css')}}" type="text/css" rel="stylesheet"/>
        <link href="{{asset('materialize/css/materialize.min.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="{{asset('materialize/css/style.css')}}" type="text/css" rel="stylesheet"/>
        <link href="{{asset('materialize/iconfont/material-icons.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link rel="shortcut icon" href="{{asset('uploads/others/favicon.png')}}">

        
    </head>

    <body class="fontfamily">

        @include('layouts.partials._nav-front')

            @include('layouts.partials._flotting-btn')

        <main>
            @yield('content')
        </main>


        @include('layouts.partials._footer-front')

        @include('layouts.partials._modal-thread-add')


        <script src="{{asset('materialize/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('materialize/js/aos.min.js')}}"></script>
        <script src="{{asset('materialize/js/materialize.min.js')}}"></script>
        <script src="{{asset('materialize/js/scrypt.js')}}"></script>
        

        @stack('js')
        @stack('notification')

    </body>
</html>