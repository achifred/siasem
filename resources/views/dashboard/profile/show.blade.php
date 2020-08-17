@extends('layout.dashboardlayout')

@section('dashboardContent')

<section id="">
    <h3>Profile</h3>
   <div class="row">
       <div class="col-lg-4 col-md-4">
        <div class="card">
           <div align="center">
           <img src="{{$user[0]->picture?URL::to($user[0]->picture):URL::asset('/img/profile.svg')}}" class="user-image" alt="">
           </div>
           <div align="center">
               <h4>{{$user[0]->username}}</h4>
               <h4>{{$user[0]->email}}</h4>
           </div>

        </div>
        <div class="mt-5" align="left">
        <form action="{{URL::to('/profile/avatar/update')}}" method="POST" enctype="multipart/form-data">
                @csrf
            
            
              <div class="form-group">
                <label for="picture">Change Profile Picture</label>
                <input type="file" class="form-control-file" name="picture" id="picture" required align="center">
              </div>
            <button type="submit" class="btn btnn">change Picture</button>
            </form>
 
         </div>
       </div>
       <div class="col-lg-4 col-md-4" >
       <form action="{{URL::to('/profile/update')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username" value="{{$user[0]->username}}" required>
         
        </div>
        
          <div class="form-group">
            <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" value="{{$user[0]->email}}" required>
          </div>
          <div class="form-group">
            <label for="profile_slug">Bio</label>
          <textarea type="text" class="form-control" name="profile_slug" id="profile_slug" required>{{$user[0]->profile_slug}}</textarea>
          </div>
        <button type="submit" class="btn btns">Update Details</button>
    </form>
    </div>
   </div>
   </section>
    
@endsection