<!DOCTYPE html>
<html lang="en"> 
    <head>
        
        <title>{{ $post->post_title }}</title>
        
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Geoffrey Karani">
        <meta name="description" content="Educative programming articles for ambitious developers who want to conquer the world with the next generation of software applications | Codewithkarani.tech">
        
        <meta name="keywords" content="laravel,php,api,django,mysql,database,jquery,json,ajax,bootstrap,javascript,html,css,wordpress,python,databases,
        software,software development,programming,computer programming,software engineering,software architect,perfect,skills,project,programmer,
        programming,app development,code,code with karani,karani,geoffrey,kamundi,geoffrey karani,geoffrey kamundi" />
        
        <meta itemprop="image" content="https://codewithkarani.tech/assets/images/blog/{{ $post->main_image }}" alt="Code with Karani" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <meta property="og:locale" content="en_US" />
        <meta property="og:url" content="https://codewithkarani.tech/collections/{{ $post->post_url }}" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="Code with Karani" />
        
        <meta property="og:image" content="https://codewithkarani.tech/assets/images/blog/{{ $post->main_image }}" />
        <meta property="og:image:alt" content="CODEWITHKARANI.COM" />
        <meta property="og:title" content="{{ $post->post_title }}" />
        <meta property="og:description" content="Educative programming articles for ambitious developers who want to conquer the world with the next generation of software applications | Codewithkarani.tech" />
        
        
        <meta property="fb:app_id" content="280431429827420" /> 
        <meta property="og:type" content="website" /> 
        <meta property="og:url" content="https://codewithkarani.tech/collections/{{ $post->post_url }}" /> 
        <meta property="og:title" content="{{ $post->post_title }}" />
        <meta property="og:image" content="https://codewithkarani.tech/assets/images/blog/{{ $post->main_image }}" />
                
        <meta property="og:description" content="Educative programming articles for ambitious developers who want to conquer the world with the next generation of software applications | Codewithkarani.tech" />
        
        
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@codewithkarani">
        <meta name="twitter:creator" content="@GeoffreyKamundi">
        <meta name="twitter:title" content="{{ $post->post_title }}">
        <meta name="twitter:description" content="Educative programming articles for ambitious developers who want to conquer the world with the next generation of software applications | Codewithkarani.tech">
        
        <meta name="twitter:image" content="https://codewithkarani.tech/assets/images/blog/{{ $post->main_image }}">
        
        
        <meta name="language" content="English">
        <meta name="coverage" content="Worldwide">
        <meta name="expires" content="never">
        <meta name="language" content="English">
        <meta name="audience" content="all">
        <meta name="web-type" content="normal">
        <meta name="doc-type" content="Web Page">
        <meta name="Rating" content="General">
        <meta name="Distribution" content="Global">
        <meta name="YahooSeeker" content="index, follow" />
        <meta name="msnbot" content="index, follow" />
        <meta name="allow-search" content="yes" />
        <meta name="DC.title" content="codewithkarani.tech | {{ $title }}">
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        
        <link rel="shortcut icon" href="/assets/images/favicon.png" alt="Code with Karani"> 
        
        <!-- FontAwesome JS-->
        <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>
        
        <!-- Theme CSS -->  
        <link id="theme-style" rel="stylesheet" href="/assets/css/theme-2.css">
        <link id="theme-style" rel="stylesheet" href="/assets/css/custom.css">

        <script data-ad-client="ca-pub-3125995890975970" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

        <script type="application/ld+json">
          {
            "@context" : "http://schema.org",
            "@type" : "Software Development",
            "name" : "Code with Karani",
            "url" : "https://codewithkarani.tech/",
            "sameAs" : [
              "https://twitter.com/GeoffreyKamundi",
              "https://www.facebook.com/Gheffs",
              "https://www.linkedin.com/in/gheffs/",
              "https://www.instagram.com/gkkamundi/"
              ],
            "address": {
              "@type": "PostalAddress",
              "streetAddress": "10772 Nairobi",
              "addressRegion": "NBI",
              "postalCode": "00400",
              "addressCountry": "KE"
            }
          }
          </script>

    </head> 

<body style="overflow-x: hidden !important;">

@include('templates.nav')

<style type="text/css">
    .comment-reply:hover{
        color:#17A2B8;
    }

    .comments-div{
        margin-left: 2em;
    }

    .comment-response{
        margin-left:2em;
        margin-bottom:2em;
        display: none;
    }
</style>
    
    <div class="main-wrapper">
	    	    
    <article class="about-section py-5">
	    <div class="container">
		    <h2 class="title mb-3">{{ $post->post_title }}</h2>
		    <div class="row">
		    	<div class="col-md-12">
		    		{!! $post->body !!}
		    		<div class="meta mb-1">
		    			<span class="date"><a href="#">{{ $post->category }}</a></span>
		    			<span class="date">Published {{ date('M d, Y', strtotime( $post->created_at )) }}</span>
		    			<span class="time">{{ $post->read_duration }} min read</span>
		    			<span class="comment"><span class="comment-count">{{ $commentCount }}</span> comments</span>

                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" target="_blank" style="padding: 0em 2em;">
                           <i class="fab fa-facebook fa-fw" style="font-size: 1.5em; color:#0D8CF0;"></i>
                        </a>

                        <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}" target="_blank">
                            <i class="fab fa-twitter fa-fw" style="font-size: 1.5em;"></i>
                        </a>

		    		</div>

		    	</div>
		    </div>
	    </div>
    </article>



    <div class="row" style="padding:0.5em 2em;">
    	<div class="col-md-10 offset-md-1">

            <div class="row">
                <div class="col-md-6">
                    <hr/>
                    <p class="text-left" style="font-size: 1.2em;">LEAVE A COMMENT</p>
                    <hr/>
                    <div class="row">

                        <input type="hidden" value="{{ $post->id }}" id="post_id" class="form-control">

                        <div class="col-md-6">
                            <label>NAME</label>
                            <span style="color:red; font-size: 1em;">*</span>
                            <input type="text" id="comment_name" class="form-control" placeholder="Enter your name (required)">
                        </div>
                        <div class="col-md-6">
                            <label>EMAIL</label>
                            <span style="color:red; font-size: 1em;">*</span>
                            <input type="text" id="comment_email" class="form-control" placeholder="Enter your email address (required)">
                        </div>
                    </div>

                    <br/>

                    <div class="row">
                        <div class="col-md-12">
                            <textarea id="comment_body" class="form-control"></textarea>
                        </div>
                    </div>

                    <br/>

                    <div class="alert alert-danger" id="data-missing" role="alert" style="display:none;">
                        Please fill out all the fields before sending your comment.
                    </div>

                    <div class="alert alert-danger" id="invalid-cemail" role="alert" style="display:none;">
                        Please use a valid email address.
                    </div>

                    <div class="alert alert-success good-content" role="alert" style="display:none;">
                        Thank you for leaving your feedback. If need be, we shall revert via <span id="comm_email"></span>.
                    </div>

                    <div class="alert alert-danger" id="exists" role="alert" style="display:none;">
                        This comment is already submitted.
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" id="send_comment" class="btn btn-info btn-block">SEND COMMENT</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                    <hr/>
                    <p>COMMENTS (<span class="comment-count">{{ $commentCount }}</span>)</p>
                    <hr/>

                    <div style="max-height: 350px; overflow-x: auto;" id="ajax_comments">
                        @foreach( $comments as $comment )

                            <?php
                                $subComments = DB::table('comment_response')
                                    ->where('comment_id', $comment->id)
                                    ->orderBy('id', 'DESC')
                                    ->get();
                            ?>

                            <div class="item mb-2 post-item" style="border:1px solid #5BC3D5; border-radius: 10px; margin-right:0.5em;">
                                <div class="media">
                                    <div class="media-body">
                                        <i style="font-size: 1.2em; color: #5BC3D5;" class="fa fa-comment-dots"></i>
                                        <span style="color:#5BC3D5; font-style: italic; font-size: 0.8em;">{{ $comment->full_name }}:</span>
                                        <span class="intro" style="font-size: 0.9em;">{{ $comment->comment }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="comments-div">
                                <div class="meta mb-1">
                                    <span class="date comment-reply" id="comment_reply-{{$comment->id}}" style="cursor: pointer;">Reply</span>
                                    <!-- <span class="comment"><a href="#">Share</a></span> -->
                                </div>
                            </div>

                
                            <div class="comment-response" id="comment_res-{{$comment->id}}" style="margin-right:0.5em;">

                                <input type="hidden" class="form-control" id="clicked-comment-id-{{$comment->id}}">

                                <label>Full Name</label>
                                <span style="color:red; font-size: 1em;">*</span>
                                <input type="text" id="reply_name-{{$comment->id}}" class="form-control" maxlength="50" placeholder="Enter your name (required)">

                                
                                <label>Message</label>
                                <span style="color:red; font-size: 1em;">*</span>
                                <textarea id="reply_message-{{$comment->id}}" class="form-control" maxlength="500" placeholder="Enter message to join the discussion"></textarea>
                                
                                <br/>

                                <div class="alert alert-danger" id="data-missing-{{$comment->id}}" role="alert" style="display:none;">
                                    Provide both name and message.
                                </div>

                                <div class="alert alert-success good-content-{{$comment->id}}" role="alert" style="display:none;">
                                    Your contribution has been posted.
                                </div>

                                <div class="alert alert-danger" id="exists-{{$comment->id}}" role="alert" style="display:none;">
                                    You already sent this message.
                                </div>

                                <button type="button" class="btn btn-info btn-xs send_reply" id="send_reply-{{$comment->id}}">Comment</button>
                            </div>

                            @foreach( $subComments as $subComment )
                                <div style="margin-left:3em;">
                                    <div class="item mb-2 post-item" style="border:1px solid #BE25FF; border-radius: 10px; margin-right:0.5em;">
                                        <div class="media">
                                            <div class="media-body">
                                                <i style="font-size: 1.2em; color: #BE25FF;" class="fa fa-comments"></i>
                                                <span style="color:#BE25FF; font-style: italic; font-size: 0.8em;">{{ $subComment->name }}:</span>
                                                <span class="intro" style="font-size: 0.9em;">{{ $subComment->comment }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        @endforeach
                    </div>
                </div>
            </div>

    	</div>
    </div>


    @if( !$relatedPosts->isEmpty() )
    <div class="row text-center" style="padding:0.5em 2em;">
    	<div class="col-md-8 offset-md-2">
    		<hr/>
    		<p class="text-center" style="font-size: 1.2em;">RELATED ARTICLES</p>
    		<hr/>

    		<div class="row">
    			@foreach($relatedPosts as $post)
    				<div class="col-md-4 post-item">
    					<a href="{{ route('details', $post->post_url) }}">
	    					<img src="/assets/images/blog/{{ $post->main_image }}" alt="image" style="height:100px;display: block;margin: 0 auto;">
	    					{{ $post->post_title }}
	    				</a>
    				</div>
    			@endforeach
    		</div>
    	</div>
    </div>
    @endif
    
@include('templates.newsletter')
@include('templates.footer')