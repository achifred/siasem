<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block  sidebar collapse sidebar-bg" >
  
  <div class="sidebar-sticky  " >
     
      <ul class="nav flex-column  ">
        @if (auth()->user()->role=="creator")
        <li class="nav-item ">
          <a class="nav-link ul-items badge-pill " href="{{URL::to('/dashboard')}}">
            <span ><i class="fa fa-chart-pie mr-3" ></i></span>
            Dashboard <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link ul-items badge-pill" href="{{URL::to('/dashboard/podcast')}}">
            <span ><i class="fa fa-file mr-3" ></i></span>
            Podcasts
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link ul-items badge-pill" href="{{URL::to('/dashboard/podcast/create')}}">
            <span ><i class="fa fa-plus mr-3" ></i></span>
            Create Podcast
          </a>
        </li>
        @else
            
        @endif
        
       
        <li class="nav-item">
          <a class="nav-link ul-items badge-pill" href="{{URL::to('/dashboard/favourite')}}">
            <span ><i class="fa fa-info-circle mr-3" ></i></span>
            Liked Podcasts
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link ul-items badge-pill" href="{{URL::to('/dashboard/history')}}">
            <span ><i class="fa fa-info-circle mr-3" ></i></span>
            History
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link ul-items badge-pill" href="{{URL::to('/dashboard/profile')}}">
            <span ><i class="fa fa-user mr-3" ></i></span>
            Profile
          </a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link ul-items badge-pill" href="{{URL::to('/')}}">
            <span ><i class="fa fa-home mr-3" ></i></span>
            Home
          </a>
        </li>
        <div class="text-white">
          <hr style="color: red">
        </div>
        <li class="nav-item">
          <a class="nav-link ul-items badge-pill" href="{{URL::to('/logout')}}">
            <span ><i class="fa fa-power-off mr-3" ></i></span>
            Sign Out
          </a>
        </li>
        
      </ul>

     
    
    </div>
  </nav>