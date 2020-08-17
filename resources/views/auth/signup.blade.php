@extends('layout.authlayout')
    @section('content')
    @extends('layout.navbar')
   
    <div class="container">
        <h3 class="text-center font-weight-bolder">Sign Up</h3>
        @include('layout.error')
        <div class="row justify-content-center">
           <div class="col-lg-5 col-md-5">
           <form action="{{URL::to('/signup')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                 
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                   
                  </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" required>
                </div>
               
                <button type="submit" class="btn btn-primary">Sign Up</button>
              </form>
           <div class="d-flex">
            <h4>Already have an account?</h4><a href="{{URL::to('/login')}}" class="btn btn-outline-primary">Log In</a>
           </div>
           </div>
        </div>
    </div>
                
  
  @endsection
