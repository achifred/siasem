@extends('layout.dashboardlayout')

@section('dashboardContent')

<div class="container">
    @include('layout.error')
    <h3 class="text-center font-weight-bolder">Add a New Podcast</h3>
    <div class="row justify-content-center">
      
       <div class="col-lg-5 col-md-5">
       <form action="{{URL::to('/dashboard/podcast')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
              <label for="description">Podcast Title</label>
              <input type="text" class="form-control" name="description" id="description" required>
             
            </div>
            <div class="form-group">
              <label for="category_id">Select Category</label>
              <select type="text" class="form-control" name="category_id" id="category_id" required>
                <option ></option>
              @foreach ($categories as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            
              @endforeach

            </select>
             
            </div>
            <div class="form-group">
              <label for="cover_art">Cover Art</label>
              <input type="file" class="form-control-file" name="cover_art" id="cover_art" required>
            </div>
              <div class="form-group">
                <label for="audio">Select Audio File</label>
                <input type="file" class="form-control-file" name="audio" id="audio" required>
              </div>
            <button type="submit" class="btn btns">Add Podcast</button>
          </form>
       </div>
    </div>
   
</div>
    
@endsection