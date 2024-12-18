<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="font-sans dark:bg-gray-900">
        <div class="flex items-center justify-center flex-col">
          <div class="card md:card-side">
            <figure class="flex justify-center items-center">
                <a href="/" class="block max-xl:hidden max-md:max-w-sm">
                    <x-application-logo/>
                </a>
            </figure>
            <div class="card-body">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                  
                </h2>
                <div class=" ">
                  {{ $slot }}
                </div>
            </div>
          </div>
        </div> 
    </body>

</html>
