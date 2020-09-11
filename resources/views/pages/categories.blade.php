@include('templates.header')
@include('templates.nav')
    
    <div class="main-wrapper">
	    	    
    <article class="about-section py-5" style="min-height: 100vh; display: flex; align-items: center;">
	    <div class="container">
		    <h2 class="title mb-3 mt-5">Categories</h2>
		    
		    <div class="row">
			    @foreach($categories as $category)
			    	<?php
			    		$articleCount = \DB::table('posts')
			    			->where('category_id', $category->id)
			    			->count();

			    		if( $articleCount == 0 ){
			    			$gkMessage = 'Coming up';
			    		}elseif( $articleCount == 1 ){
			    			$gkMessage = $articleCount . ' Article';
			    		}else{
			    			$gkMessage = $articleCount . ' Articles';
			    		}
			    	?>
			    	<div class="col-md-3">
			    		<div class="card mt-3 technology_card shadow mb-1 bg-white rounded">
						  <div class="card-body">
						    <h5 class="card-title text-center">{{ $category->category }}
						    	<br/><span style="font-size: 0.6em; font-weight: normal;">{{ $gkMessage }} </span>
						    </h5>
						  </div>
						</div>
			    	</div>
			    @endforeach
			</div>

	    </div>
    </article>
    
@include('templates.newsletter')
@include('templates.footer')