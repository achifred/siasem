@extends('layout.authlayout')
    @section('content')
    @extends('layout.navbar')
   
            
                
        
            
            
            <div class="container">
                <h3 class="text-center font-weight-bolder text-capitalize">Enter Your Email </h3>
                @include('layout.error')
                <div class="row justify-content-center">
                    
                    <div class="col-lg-5 col-md-5">
                    <form action="{{URL::to('/reset/mail')}}" method="POST" enctype="multipart/form-data">
                     @csrf
                         <div class="form-group">
                           <label for="email">Email</label>
                           <input type="email" class="form-control" name="email" id="email" required>
                          
                         </div>
                         
                         <button type="submit" class="btn btnn">Submit</button> 
                       </form>
                    <div class="d-flex">
                     <h6>Don't have an account?</h6><a href="{{URL::to('/signup')}}" class="ml-2">Sign Up</a>
                    </div>
                    </div>
                 </div>
            </div>
                
        
                
               
           
        
        

      
  @endsection
