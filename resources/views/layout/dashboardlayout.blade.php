@extends('layout.adminlayout')

@section('content')
    

@include('layout.adminnavbar')
  
  <div class="container-fluid">
    <div class="row">
     @include('layout.adminsidebar')
  
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mt-5" >
        
        
        @yield('dashboardContent')
  
    
      </main>
    </div>
  </div>
@endsection