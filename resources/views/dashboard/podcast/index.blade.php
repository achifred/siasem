@extends('layout.dashboardlayout')

@section('dashboardContent')

<section >
    <div class="container-fluid mt-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="published-tab" data-toggle="tab" href="#published" role="tab" aria-controls="published" aria-selected="true">Published</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#unpublished" role="tab" aria-controls="unpublished" aria-selected="false">Unpublished</a>
            </li>
            
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="published" role="tabpanel" aria-labelledby="published-tab">
                <div class="row">
            
               
                    @foreach ($publishedpodcasts as $item)
                    <div class="col-lg-3 col-md-4 col-sm-4">
                        <div class="story-container" >
                            <img  src="{{ $item->cover_art?URL::to($item->cover_art): URL::asset('img/tape.jpg') }}"  alt="" class="card-img-top podcast-img">
                            
                            <div class="">
                             
                            <p class="card-text">{{$item->description}}</p>
                             <div class="d-flex justify-content-around">
                                <a href="{{URL::to('/podcast/listen/'.$item->id)}}" class="btn btn-sm btnn"><i class="fa fa-play"></i> Play</a>
                                <button type="button" class="btn btn-sm btnn">
                                    <i class="fa fa-music"></i> <span class="badge badge-light">{{$item->plays}}</span>
                                    <span class="sr-only">number of plays</span>
                                  </button>
                                <button type="button" class="btn btn-sm btnn">
                                <i class="fa fa-heart"></i> <span class="badge badge-light">{{$item->likes}}</span>
                                  <span class="sr-only">number of likes</span>
                                </button>
                             </div>
                             <div class="d-flex justify-content-around mt-1">
                              
                                 <a title="update" href="{{URL::to('/dashboard/podcast/edit/'.$item->id)}}" class="btn btn-sm btn-secondary">
                                     <i class="fa fa-edit"></i> 
                                    
                                 </a>
                                 <a title="delete" href="{{URL::to('/dashboard/podcast/delete/'.$item->id)}}" class="btn btn-sm btn-danger">
                                 <i class="fa fa-trash"></i> 
                                  
                                 </a>
                              </div>
                            </div>
                          </div>
                   
                    </div>
                    @endforeach
                        
                       
                        
                    
                </div>
            </div>
            <div class="tab-pane fade" id="unpublished" role="tabpanel" aria-labelledby="unpublished-tab">
                <div class="row">
            
               
                    @foreach ($unpublishedpodcasts as $item)
                    <div class="col-lg-3 col-md-4 col-sm-4">
                        <div class="story-container" >
                            <img  src="{{$item->cover_art?URL::to($item->cover_art): URL::asset('img/tape.jpg') }}"  alt="" class="card-img-top podcast-img">
                            
                            <div class="">
                             
                            <p class="card-text">{{$item->description}}</p>
                            <div class="d-flex justify-content-around">
                              <a href="{{URL::to('/podcast/listen/'.$item->id)}}" class="btn btn-sm btnn"><i class="fa fa-play"></i> Play</a>
                                 <button type="button" class="btn btn-sm btnn">
                                     <i class="fa fa-music"></i> <span class="badge badge-light">{{$item->plays}}</span>
                                     <span class="sr-only">number of plays</span>
                                   </button>
                                 <button type="button" class="btn btn-sm btnn">
                                 <i class="fa fa-heart"></i> <span class="badge badge-light">{{$item->likes}}</span>
                                   <span class="sr-only">number of likes</span>
                                 </button>
                              </div>

                             <div class="d-flex justify-content-around mt-1">
                             <a title="publish" href="{{URL::to('/dashboard/podcast/publish/'.$item->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> </a>
                                <a title="update" href="{{URL::to('/dashboard/podcast/edit/'.$item->id)}}" class="btn btn-sm btn-secondary">
                                    <i class="fa fa-edit"></i> 
                                   
                                </a>
                                <a title="delete" href="{{URL::to('/dashboard/podcast/delete/'.$item->id)}}" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i> 
                                 
                                </a>
                             </div>
                            </div>
                          </div>
                   
                    </div>
                    @endforeach
                        
                       
                       
                    
                </div>
            </div>
            
          </div>
        
    </div>
   </section>
    
@endsection