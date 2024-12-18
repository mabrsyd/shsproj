<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100 dark:bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="img/shs.png">
    <title>Solo Home Service</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full ">

<div class="min-h-full">
    <x-Navbar></x-Navbar>

    <main class="dark:bg-gray-900">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{ $slot }}
      </div>
      <a href="https://uns.id/shs" target="_blank">
        <img class="fixed bottom-4 right-4 w-16 h-16 z-10" src="{{ asset('img/whatsapp.png') }}" alt="whatsapp">
      </a>
    </main>
  </div>
  
  <x-footer></x-footer>

</body>
</html>