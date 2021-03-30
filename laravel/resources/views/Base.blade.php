<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>メンバー紹介</title>

    <!-- nes.css -->
    <link href="https://unpkg.com/nes.css@latest/css/nes.min.css" rel="stylesheet"/>

    <style>
        @font-face {
            font-family: 'MyFont';
            src: url(assets/font/PixelMplus/PixelMplus12-Regular.ttf);
        }

        body {
            font-family: MyFont;
        }
    </style>

    @if(env('APP_ENV') !== 'local')
        <link rel="stylesheet" href="assets/vue/css/app.css">
        </link>
    @endif
</head>

<body id="body">
<div id="app" class="contentContainer">
    <div class="contentContainer__body">
        @yield('body')
    </div>
</div>


@if (env('APP_ENV') === 'local')
    <script type="text/javascript" src="http://localhost:9001/js/chunk-vendors.js"></script>
    <script type="text/javascript" src="http://localhost:9001/js/app.js"></script>
@else
    <script type="text/javascript" src="assets/vue/js/app.js"></script>
    <script type="text/javascript" src="assets/vue/js/chunk-vendors.js"></script>
@endif
</body>

</html>
