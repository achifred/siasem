<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Siasem-Relax for a moment</title>
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://kit.fontawesome.com/353c6e4283.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" />
        <!-- Styles -->
       
    </head>
    <body >
        
       <div id="listen" >
        @yield('content')
       </div>


       
	<!--script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js" ></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script-->
	<script src="https://cdn.plyr.io/3.6.2/plyr.polyfilled.js"></script>
	
		<script src="{{ URL::asset('js/app.js') }}"></script>
		<!--script src="{{ URL::asset('js/main.js') }}"-->
			
        </script>
        
        @yield('script')

        @yield('scripts')
    
    </body>
    </html>