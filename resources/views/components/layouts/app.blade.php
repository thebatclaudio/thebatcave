<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', config('metadata.title'))</title>

    <script src="{{ asset('build/public/particles/particles.min.js') }}"></script>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    <script data-navigate-once>
        particlesJS.load('particles-js', '/build/public/particles/particles.json');
    </script>
</head>
<body>

@persist('menu')
<livewire:menu></livewire:menu>
@endpersist

<div class="container mx-auto">
{{ $slot }}
</div>

@persist('particles')
<div id="particles-js"></div>
@endpersist

</body>
</html>
