@include('templates.header')
@include('templates.nav')
    
    <div class="main-wrapper">
	    	    
    <article class="about-section py-5" style="height: 100vh; display: flex; align-items: center;">
	    <div class="container">
		    <h2 class="title mb-3 mt-5" style="color:red;">Fatal error encountered!</h2>
		    
		    <p style="font-size: 1.5em; ">Sorry, there was a fatal error while processing your request!</p>

		    <p style="font-size: 1.2em;">Please inform the developer on:
		    	<p><a target="_blank" href="mailto:support@codewithkarani.tech">support@codewithkarani.tech</a></p>
		    	<p>OR</p>
		    	<p><a target="_blank" href="tel:+254725307131">+254 725 30 71 31</a></p>
		   	</p>

	    </div>
    </article><!--//about-section-->
    
@include('templates.newsletter')
@include('templates.footer')