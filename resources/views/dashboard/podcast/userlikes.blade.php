@extends('layout.dashboardlayout')

@section('dashboardContent')

<section id="all-podcast">
    <div class="container mt-2">
    <h3 style="color: #243447">{{count($userlikes)<=0?"Sorry no podcasts in favourite":"Your Favourite Podcasts"}}</h3>
        <div class="row">
          @foreach ($userlikes as $item)
          <div class="col-lg-3 col-md-3">
            <div class="story-container" >
              <img  src="{{$item->cover_art?URL::to($item->cover_art): URL::asset('img/tape.jpg') }}"  alt="" class="card-img-top podcast-img">
              
              <div class="">
               
              <p class="card-text ">{{$item->description}}</p>
               <div class="d-flex justify-content-around">
                  <a title="play audio" href="{{URL::to('/podcast/listen/'.$item->id)}}" class="btn btn-sm btnn "><i class="fa fa-play"></i> Play</a>
                  <button type="button" class="btn btn-sm btnn">
                      <i class="fa fa-music"></i> <span class="badge badge-light">{{$item->plays}}</span>
                      <span class="sr-only">number of plays</span>
                    </button>
                    <button title="total likes"  class="btn btn-sm btnn">
                      <i class="fa fa-heart"></i> <span class="badge badge-light">{{$item->likes}}</span>
                        <span class="sr-only">number of likes</span>
                      </button>
               </div>
               
              </div>
            </div>
         
          </div>
          @endforeach
            
        </div>
    </div>
   </section>
    
@endsection