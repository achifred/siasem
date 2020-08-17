<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand text-uppercase  font-weight-bolder" href="{{URL::to('/')}}" style="color:#243447">
    Siasem
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse  justify-content-end" id="navbarTogglerDemo02">
      <ul class="navbar-nav  "align="right">
        <li class="nav-item  ">
          <a class="nav-link" href="{{URL::to('/podcasts')}}">Podcasts</a>
          </li>
         
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Category</a>
            <div class="dropdown-menu">
              @foreach (App\Category::all() as $item)
            <a class="dropdown-item" href="{{URL::to('/podcasts/'.$item->name)}}">{{$item->name}}</a>
              @endforeach
              
              
              
            </div>
          </li>
      
          <li class="nav-item  ">
            <a class="nav-link" href="{{URL::to('/about')}}">About Us</a>
            </li>
        <li class="nav-item  ">
        <a class="nav-link" href="{{URL::to('/')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        
        
       @if(auth()->guest())
       <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/login')}}">Login</a>
      </li> 
      @else
      <li class="nav-item btn-rotate dropdown">
        <a
            class="nav-link dropdown-toggle"
            href="http://example.com"
            id="navbarDropdownMenuLink"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
        >
            <i class="fa fa-user-circle"></i>
            
        </a>
        <div
            class="dropdown-menu dropdown-menu-right"
            aria-labelledby="navbarDropdownMenuLink"
        >
            <a class="dropdown-item" href="{{ auth()->user()->role=="creator"?URL::to('/dashboard'):URL::to('/dashboard/profile')}}">{{ auth()->user()->role=="creator"?"Dashboard":"Profile"}}</a>
            <a class="dropdown-item" href="{{URL::to('/podcast/likes')}}">Liked Podcasts</a>
            <a class="dropdown-item" href="{{URL::to('/podcast/history')}}">History</a>
            <a class="dropdown-item" href="{{URL::to('/logout')}}">Log Out</a>
            
        </div>
    </li>
       
       @endif
       
        
      </ul>
      
    </div>
  </nav>
  
</div>