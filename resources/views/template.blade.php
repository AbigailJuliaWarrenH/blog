<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.header')
    <title>{{ config('app.name', 'Pâtisserie') }}</title>
</head>
<body>
	@include('partials.nav')
    @yield('content')
    @include('partials.scripts')
</body>
</html>
