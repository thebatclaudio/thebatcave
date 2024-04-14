<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'thebatclaud.io - claudio la barbera' }}</title>

    <script src="{{ asset('assets/particles.min.js') }}"></script>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])

    <script data-navigate-once>
        particlesJS.load('particles-js', '/assets/particles.json');
    </script>
</head>
<body>

<livewire:menu></livewire:menu>

<div id="logo-container">
    <h1 id="logo">the<span>bat</span>claud.<span>io</span></h1>
</div>

<div class="content">
{{ $slot }}
</div>

@persist('particles')
<div id="particles-js"></div>
@endpersist

</body>
</html>
