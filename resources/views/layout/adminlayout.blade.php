<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Siasem-Dashboard</title>
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
        
        <link href="{{ URL::asset('css/dashboard.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://kit.fontawesome.com/353c6e4283.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
 
        <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <!-- Styles -->
        
    </head>
    <body>
        
       <div >
        @yield('content')
       </div>

      

        <script src="{{ URL::asset('js/app.js') }}"></script>
        <script src="{{ URL::asset('js/dashboard.js') }}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    
    </body>
    </html>