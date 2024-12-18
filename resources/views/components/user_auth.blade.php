
@if (Route::has('login'))
<nav class="max-mx-3 flex flex-1 justify-end">
    @auth
    @include('layouts.navigation')

    @else
        <x-nav-link
            href="{{ route('login') }}"
            class=
        >
            Log in
        </x-nav-link>
           
    @endauth
</nav>
@endif