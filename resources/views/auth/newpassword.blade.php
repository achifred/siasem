@extends('layout.authlayout')
    @section('content')
    @extends('layout.navbar')
   
            
                
        
            
    <div class="container mt-5">
        <h3 class="text-center font-weight-bolder text-capitalize">Enter your new password</h3>
        @include('layout.error')
        <div class="row justify-content-center">
           <div class="col-lg-5 col-md-5">
           <form action="{{URL::to('/reset/password')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                 
                </div>
                <div class="form-group">
                  <label for="newpassword">New Password</label>
                  <input type="password" class="form-control" name="newpassword" id="newpassword" required>
                </div>
               
                <button type="submit" class="btn btnn">Reset Password</button> 
              </form>
           <div class="d-flex mt-3">
            <h4>Don't have an account?</h4><a href="{{URL::to('/signup')}}" class="ml-2">Sign Up</a>
           </div>
           </div>
        </div>
    </div>
        
                
               
           
        
        

      
  @endsection
