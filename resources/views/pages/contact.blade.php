@include('templates.header')
@include('templates.nav')
    
    <div class="main-wrapper">
	    	    
    <article class="about-section py-5" style="min-height: 100vh; display: flex; align-items: center;">
	    <div class="container">

	    	<div class="row">
	    		<div class="col-md-12">
	    			<h2 class="title mb-3">Contact Me</h2>

		    @if (Session::has('success'))
		       <div class="alert alert-success" role="alert">
		       		<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		           	{{Session::get('success')}}
		       </div>
		  	@endif
		    
		    	<form action="{{ route('sendmail') }}" method="post">
		    		{{ csrf_field() }}
					    <div class="row">
					    	<div class="col-md-12">
					    		<label>FULL NAME</label>
					    		<span style="color:red; font-size: 1em;">*</span>
					    		<input type="text" name="contact_name" class="form-control" placeholder="Enter your full name (required)" maxlength="50" required>
					    	</div>
					    </div>

					    <br/>

					    <div class="row">
					    	<div class="col-md-6">
					    		<label>EMAIL</label>
					    		<span style="color:red; font-size: 1em;">*</span>
					    		<input type="email" name="contact_email" class="form-control" placeholder="Enter your full email address (required)" maxlength="50" required>
					    	</div>

					    	<div class="col-md-6">
					    		<label>PHONE</label>
					    		<input type="text" name="contact_phone" class="form-control" placeholder="Enter your full phone number (optional)" maxlength="10">
					    	</div>
					    </div>

					    <br/>

					    <div class="row">
					    	<div class="col-md-12">
					    		<label>MESSAGE</label>
					    		<span style="color:red; font-size: 1em;">*</span>
					    		<textarea type="text" name="contact_body" class="form-control" placeholder="How can I help you? (required)" maxlength="500" required></textarea>
					    	</div>
					    </div>

					    <br/>

					    <div class="row">
					    	<div class="col-md-12">
					    		<button tyle="submit" class="btn btn-info btn-block">SEND MESSAGE</button>
					    	</div>
					    </div>

					</form>
	    		</div>
	    	</div>

			<hr/>

			<div class="row">
				<div class="col-md-12">
					<div class="meta mb-1">
                        <span class="date"><a href="#">+254 725 30 71 31</a></span>
                        <span class="date">support@codewithkarani.tech</span>
                    </div>
				</div>
			</div>

			<hr/>

	    </div>
    </article>
    
@include('templates.newsletter')
@include('templates.footer')

