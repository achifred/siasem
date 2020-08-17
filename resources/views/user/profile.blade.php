@extends('layout.profilelayout')
    @section('content')
    @extends('layout.navbar')

    <section id="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    
                        <div align="center">
                        <img src="{{$user[0]->picture?URL::to($user[0]->picture):URL::asset('/img/profile.svg')}}" class="user-image" alt="">
                        </div>
                        <div align="center">
                            <h4>{{$user[0]->username}}</h4>
                            <p>{{$user[0]->profile_slug}}</p>
                            @if ($user[0]->role=="creator")
                            <h4><i class="fa fa-podcast"></i>{{count($userpodcasts)}}</h4>
                            @else
                                
                            @endif
                            
                        </div>
             
                     
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <a class="nav-link active" id="published-tab" data-toggle="tab" href="#userpodcast" role="tab" aria-controls="userpodcast" aria-selected="true">Podcasts</a>
                            </li>
                           
                            
                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="userpodcast" role="tabpanel" aria-labelledby="userpodcast-tab">
                                <div class="row">
                            
                               
                                    @foreach ($userpodcasts as $item)
                                    <div class="col-lg-3 col-md-4 mt-2">
                                      <div class="story-container" >
                                        <img  src="{{$item->cover_art?URL::to($item->cover_art): URL::asset('img/tape.jpg') }}"  alt="" class="card-img-top podcast-img">
                                        
                                        <div class="">
                                         
                                        <p class="card-text ml-2">{{$item->description}}</p>
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
                            
                            
                          </div>
                        
                    </div>
                </div>
            </div>
        </div>
       </section>

@endsection