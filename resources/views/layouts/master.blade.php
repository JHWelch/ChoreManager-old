<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChoreManager</title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <div class="bg-gray-200 h-screen" id="app">
        @include('layouts.header')
        
        <router-view></router-view>
    </div>
    <script src="/js/app.js"></script>
</body>
</html>