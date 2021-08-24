<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

	<!-- Styles -->
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">

	@livewireStyles

	<!-- Scripts -->
	<script src="{{ mix('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src=https://code.jquery.com/ui/1.11.3/jquery-ui.min.js></script>
        <script src="https://cdn.jsdelivr.net/jquery.ui.timepicker.addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>

    </head>
    <body class="font-sans antialiased">
	<x-jet-banner />

	<div class="min-h-screen bg-gray-100">
	    @livewire('navigation-menu')

	    <!-- Page Heading -->
	    @if (isset($header))
		<header class="bg-white shadow">
		    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
			{{ $header }}
		    </div>
		</header>
	    @endif

	    <!-- Page Content -->
	    <main>
		{{ $slot }}
	    </main>
	</div>

	@stack('modals')
	@stack('scripts')
	@livewireScripts
    </body>
</html>
