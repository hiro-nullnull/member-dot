<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    @if(env('APP_ENV') !== 'local')
    <link rel="stylesheet" href="vue/css/app.css">
    </link>
    @endif
</head>

<body>
    <div id="app" class="flex-center position-ref full-height topIndex">
        アバウトについて
    </div>
</body>

<script type="text/javascript" src="{{ $_SERVER["APP_URL"] }}:9001/js/chunk-vendors.js"></script>
<script type="text/javascript" src="http://localhost:9001/js/app.js"></script>

@if (env('APP_ENV') !== 'local')
<script type="text/javascript" src="vue/js/app.js"></script>
<script type="text/javascript" src="vue/js/chunk-vendors.js"></script>
@endif

</html>
