<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        @csrf
        @vite('resources/css/app.css')

        <title>TodoToday</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    </head>
    <script src="https://unpkg.com/feather-icons"></script>
    <body class="antialiased bg-gray-200">
        @livewireScripts
        <nav class="bg-blue-900 text-white shadow-md">
          <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
              <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-900 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                  <span class="sr-only">Menu</span>
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                  </svg>
                </button>
              </div>
              <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0">
                  <h1 class="text-2xl font-semibold">TodoToday</h1>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-4">
                  <a href="/{{ $user_id ?? ''}}" class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">Início</a>
                  <a href="/about/{{ $user_id ?? ''}}" class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">Sobre</a>
                  <a href="/contact/{{ $user_id ?? ''}}" class="text-white hover:bg-blue-600 px-3 py-2 rounded-md text-sm font-medium">Contato</a>
                </div>
              </div>
            </div>
          </div>

          <div class="hidden sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
              <a href="/{{ $user_id ?? '' }}" class="text-white hover:bg-blue-600 block px-3 py-2 rounded-md text-base font-medium">Início</a>
              <a href="/about/{{ $user_id ?? '' }}" class="text-white hover:bg-blue-600 block px-3 py-2 rounded-md text-base font-medium">Sobre</a>
              <a href="/contact/{{ $user_id ?? '' }}" class="text-white hover:bg-blue-600 block px-3 py-2 rounded-md text-base font-medium">Contato</a>
            </div>
          </div>
        </nav>
        
        <div class="flex flex-row justify-center items-start mt-2 mb-10 mr-2 ml-2">
            @if (session()->has('user_data'))
              <livewire:user.info />
            @endif
            {{ $slot }}
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
          const menuButton = document.getElementById('mobile-menu-button');
          const mobileMenu = document.getElementById('mobile-menu');

          menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
          });
        </script>
        <script>
          feather.replace();
        </script>
    </body>
</html>
