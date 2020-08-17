@extends('layout.dashboardlayout')

@section('dashboardContent')

<div class="container">
    @include('layout.error')
    <h3 class="text-center font-weight-bolder">Update Podcast</h3>
    <div class="row justify-content-center">
      
       <div class="col-lg-5 col-md-5">
       <form action="{{URL::to('/dashboard/podcast/update/'.$podcast[0]->id)}}" method="POST" enctype="multipart/form-data">
        
        @csrf
            <div class="form-group">
              <label for="description">Podcast Title</label>
            <input type="text" class="form-control" name="description" id="description" value="{{$podcast[0]->description}}" required>
             
            </div>
            <div class="form-group">
              <label for="category">Select Category</label>
              <select type="text" class="form-control" name="category_id" id="category"  required>
                  <option value="{{$podcast[0]->category_id}}">{{$podcast[0]->name}}</option>
                @foreach ($categories as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
              
                @endforeach

              </select>
            </div>
            <div class="form-group">
              <label for="cover_art">Select Cover art</label>
           @if ($podcast[0]->cover_art==" ")
               
           @else
           <img src="{{$podcast[0]->cover_art}}" alt="" style="width:50px; height:50px">
           @endif
              <input type="file" class="form-control-file" name="cover_art" id="cover_art" >
              
            </div>
            <input type="hidden" name="old_cover_art" value="{{$podcast[0]->cover_art}}" >
              <div class="form-group">
                <label for="audio">Select Audio File</label>
                <input type="file" class="form-control-file" name="audio" id="audio" >
              </div>
            <button type="submit" class="btn btns">Update Podcast</button>
          </form>
       </div>
    </div>
   
</div>
    
@endsection