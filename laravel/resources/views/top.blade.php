<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- nes.css -->
    <link href="https://unpkg.com/nes.css@latest/css/nes.min.css" rel="stylesheet" />

    <style>
        html,
        body,
        pre,
        code,
        kbd,
        samp {
            font-family: "font-family you want to use";
        }

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

<body>
    <div id="app" class="flex-center position-ref full-height topIndex">
        <div class="content">
            Welcome to Laravel
            これどうなん？
            <button type="button" class="nes-btn is-primary">ボタン</button>
        </div>
    </div>


    <script type="text/javascript" src="{{ $_SERVER["APP_URL"] }}:9001/js/chunk-vendors.js"></script>
    <script type="text/javascript" src="http://localhost:9001/js/app.js"></script>

    @if (env('APP_ENV') !== 'local')
    <script type="text/javascript" src="assets/vue/js/app.js"></script>
    <script type="text/javascript" src="assets/vue/js/chunk-vendors.js"></script>
    @endif
</body>

</html>
