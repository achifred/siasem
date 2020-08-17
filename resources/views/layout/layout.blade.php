<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Siasem-Relax for a moment</title>
        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://kit.fontawesome.com/353c6e4283.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <!-- Styles -->
       
    </head>
    <body>
        
       <div >
        @yield('content')
       </div>


       <footer class="footer footer-bg mt-5 ">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<h4 class="text-center font-weight-bolder mt-3" >Quick Links</h4>
					<ul class="navbar-nav text-center ">
					<li class="nav-item" ><a class="nav-link " href="{{URL::to('/podcasts')}}">Podcasts</a></li>
						
						<li class="nav-item"><a class="nav-link " href="{{URL::to('/contact')}}">Contact Us</a></li>
						<li class="nav-item "><a class="nav-link " href="{{URL::to('/about')}}">About Us</a></li>
						
					</ul>
				</div>
				<div class="col-lg-4 col-md-4" align="center">
					<h4 class="text-center font-weight-bolder mt-3" >Follow Us</h4>
					<p>
						<a class=" " href="https://web.facebook.com/mdain/" target="_blank">  Facebook</a>
					</p>
        			<p>
						<a class=" " href="https://twitter.com/mdain" target="_blank"> Twitter</a>
					</p>
        			<p>
						<a class=" " href=" https://www.linkedin.com/company/10888332/admin/" target="_blank"> Linkedin</a>
					</p>
				</div>
				
				<div class="col-lg-4 col-md-4 " >
					<h2 class="text-center mt-3" >Siasem</h2>
					<div class=" d-flex flex-row justify-content-center">
						
						<div class="">
							<p>info@siasem.com</p>
						</div>
					</div>
					<div class=" d-flex flex-row justify-content-center">
						
						<div class="">
							<p>0548480707</p>
						</div>
					</div>
					
					<div class=" d-flex flex-row justify-content-center">
						
						<div class="">
							<p>GE-263-2093, 
							 Accra.<br> Ghana, West Africa.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom row align-items-center">
				<p class="footer-text m-0 col-lg-6 col-md-12  text-center">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. </p>
				<div class="col-lg-6 col-md-6 social-link  " >
					<a class="  " href="#" > Privacy Policy</a>
					<a class=" ml-3" href="#" >Terms of Use</a>
				</div>
			</div>
		</div>
	</footer>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js" ></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	
	
		<script src="{{ URL::asset('js/app.js') }}"></script>
		<script src="{{ URL::asset('js/main.js') }}">
			
		</script>
    </body>
    </html>