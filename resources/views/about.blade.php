@extends('layout.layout')
    @section('content')
    @extends('layout.navbar')
   
            
                <section  >
                    <div class="intro">
                      
                        <div class=" ">
                            @include('layout.error')
                            <div class="container">
                            <div class="  row" >
                                <div class="col-lg-6 col-md-6  intro-container">
                                    <h2 class="intro-headline ">
                                     Let's Help You Chase Away Some of Your Stress
                                    </h2>
                                    <p class="font-weight-bolder" style="font-size: 20px">We help you release stress by discusing issues that affect us all in a more funny way  <br></p>
                                    <a title="Let's get talking" class="btn  btn-lg contactbtn btns" href="{{URL::to('/contact')}}">Talk to Us</a>
                                    <a title="See the list of discusions we had" class="btn  btn-lg btnl " href="{{URL::to('/podcasts')}}"  >See Podcasts</a>

                                    
                                </div>
                            
                                <div class="col-lg-6 col-md-6  intro-img-container">
                                    <img class="intro-img" src="{{URL::asset('img/discuss.svg')}}" alt="">
                                    
                                </div>
                            
                            </div>
                        </div>
                        </div>
                    </div>
                </section>
               
  <section>
      <div class="container">
         <div class="row">
             <div class="col-lg-6">
                <p style="font-size: 20px">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic labore ipsa mollitia ullam ea eius rerum a iure vero quae cupiditate ad sint at tenetur asperiores placeat harum, atque modi?
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus, ullam delectus maxime laudantium facilis odio quaerat exercitationem sapiente, molestias praesentium ducimus quisquam, earum nulla quidem sint consequuntur dolorum velit? Excepturi.
      
                </p>
             </div>
            
         </div>
      </div>
  </section>
       
<section>
    <div class="container">
        <h3 class="text-center">Meet the Team</h3>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-4">
                <div class=" container team-container" >
                    <img  src="{{URL::asset('img/fred.jpg') }}"  alt="" class="card-img-top ">
                    
                    <div class="">
                     <h4>Fred Achi(Co-Founder)</h4>
                    <p class="card-text mb-5">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, fugiat temporibus dolore, atque sapiente iure debitis ab dolor labore cum inventore quos ratione laborum vel doloremque voluptas nisi ipsum officia!</p>
                    
                     
                    </div>
                  </div>
           
            </div>
        </div>
    </div>
</section>
          
       
       
        
        

      
  @endsection
