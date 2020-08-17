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
                                     Let's Get Talking
                                    </h2>
                                    <p class="font-weight-bolder" style="font-size: 20px">Have a suggestion that could improve this platform? Do you have any topic suggestion or You just want to Talk  <br> We are Just a call or mail away</p>
                                    
                                    <a title="See the list of discusions we had" class="btn  btn-lg btnl " href="{{URL::to('/podcasts')}}"  >See Podcasts</a>

                                    
                                </div>
                            
                                <div class="col-lg-6 col-md-6  intro-img-container">
                                    <img class="intro-img" src="{{URL::asset('img/convo.svg')}}" alt="">
                                    
                                </div>
                            
                            </div>
                        </div>
                        </div>
                    </div>
                </section>
               
                <section class="mt-5" id="contact" >
                    <div class="container">
                        <h3 class="text-capitalize text-center font-weight-bolder">Send us a message</h3>
                        <div class="row mt-3">
                            
                            <div class="col-lg-5 col-md-5">
                                
                                <p style="font-size: 18px">
                                 Send us an email, give us a call, or send a brief message and let's get talking. 
                                </p>
                                       
                                        
                                        <div class="single-contact-address d-flex flex-row">
                                            
                                            <div class="contact-details">
                                                <h5> <i class="fa fa-envelope"></i> info@siasem.com</h5>
                                            </div>
                                        </div>
                                        <div class="single-contact-address d-flex flex-row">
                                            
                                            <div class="contact-details">
                                                <h5> <i class="fas fa-phone"></i> 0548480707</h5>
                                            </div>
                                        </div>
                                        <div class="single-contact-address d-flex flex-row">
                                            
                                            <div class="contact-details">
                                                <h5> <i class="fas fa-map-marker-alt"></i> GE-263-2093</h5>
                                                <p> Accra, Ghana.</p>
                                            </div>
                                        </div>
                                        
                                
                            </div>
                            <div class="col-lg-7 col-md-7">
                                
                            <form action="{{URL::to('/enqueries')}}" method="POST">
                                @csrf
                                    <div class="form-group">
                                      
                                      <input type="email" name="email" class="form-control" placeholder="Email Adrress" >
                                      
                                    </div>
                                    <div class="form-group">
                                      
                                      <input type="text" name="full_name" class="form-control" placeholder="Your name">
                                    </div>
                                    <div class="form-group ">
                                      <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                                    
                                    </div>
                                    <div class="form-group ">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                                      
                                      </div>
                                      <div class="form-group ">
                                        <textarea type="text" name="message" class="form-control" rows="10" placeholder="Your message"></textarea>
                                      
                                      </div>
                                    <button type="submit" class="btn btnn">Send</button>
                                  </form>
                            </div>
                        </div>
                    </div>
        
                </section>
          
       
       
        
        

      
  @endsection
