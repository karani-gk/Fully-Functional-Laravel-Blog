<header class="header text-center">	    
    <h1 class="blog-name pt-lg-4 mb-0">
    	<a href="{{ route('/') }}">
    		<img class="profile-image mb-3 mx-auto" src="/assets/images/logo.png" alt="Code with Karani" style="width:8em;">
		</a>
	</h1>
    
    <nav class="navbar navbar-expand-lg navbar-dark" >
       
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div id="navigation" class="collapse navbar-collapse flex-column" >
			<div class="profile-section pt-3 pt-lg-0">
			    
			    <a href="{{ route('/') }}">
			    	<img class="profile-image mb-3 rounded-circle mx-auto" src="/assets/images/profile.png" alt="Code with Karani" >
			    </a>			
				
				<div class="bio mb-3">Connect with me</a></div><!--//bio-->
				<ul class="social-list list-inline py-3 mx-auto">
		            <li class="list-inline-item"><a href="https://www.linkedin.com/in/karani-gk/" target="_blank"><i class="fab fa-linkedin-in fa-fw"></i></a></li>
		            <li class="list-inline-item"><a href="https://github.com/karani-gk" target="_blank"><i class="fab fa-github fa-fw"></i></a></li>
		            <li class="list-inline-item"><a href="https://www.youtube.com/channel/UCzCGKkCBucv-SgQe83xCq_A" target="_blank"><i class="fab fa-youtube fa-fw"></i></a></li>
		            <li class="list-inline-item"><a href="https://twitter.com/gk_karani" target="_blank"><i class="fab fa-twitter fa-fw"></i></a></li>
		        </ul><!--//social-list-->
		        <hr> 
			</div><!--//profile-section-->
			
			<ul class="navbar-nav flex-column text-left">
				<li class="nav-item">
				    <a class="nav-link" href="{{ route('/') }}"><i class="fas fa-home fa-fw mr-2"></i>Home</a>
				</li>

				<li class="nav-item">
				    <a class="nav-link" href="{{ route('about') }}"><i class="fas fa-user fa-fw mr-2"></i>About Me</a>
				</li>

				<li class="nav-item">
				    <a class="nav-link" href="{{ route('contact-me') }}"><i class="fa fa-mobile fa-fw mr-2"></i>Contact Me</a>
				</li>

				<li class="nav-item">
				    <a class="nav-link" href="{{ route('categories') }}"><i class="fas fa-laptop fa-fw mr-2"></i>Categories</a>
				</li>
			</ul>

		</div>
	</nav>
</header>