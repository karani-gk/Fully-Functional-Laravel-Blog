<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.container{
			text-align:center; 
			border-radius:10px;
			overflow: auto;
		  	margin: auto;
		  	position: absolute;
		  	top: 10; left: 0; bottom: 10; right: 0;
		}

		._body{
			background-color:#CFD1D0;
		}

		._header{
			background-color: #37B7C6;
			margin-top: 1em;
			margin-bottom: 1em;
			text-align: center;
		}

		.logo{
			padding-top:4em;
		}

		#button{
			background-color: #5668F7;
			font-size: 12px;
		    line-height: 22px;
		    color: #ffffff;
		    text-decoration: none;
		    text-decoration: none;
		    border-radius: 10px;
		    padding: 0.5em 5em;
		    border: 1px solid #37B7C6;
		    display: inline-block;
		    margin-bottom: 1.5em;
		    cursor: pointer;
		}

		@media (min-width: 1100px) {
		  	.container {
	        	width:50% !important; 
	       	}
		}
		@media (max-width: 1100px) {
		  	.container {
	        	width:90% !important; 
	       	}
		}
		@media (max-width: 480px) {
		  	.container {
	        	width:90% !important; 
	       	}
		}
	</style>
</head>

<body>

	<div class="container">

		<div class="_header">
			<table>
				<tr>
					<td>
						<p style="padding-right: 1em;">
							<img src="https://codewithkarani.tech/assets/images/logo.png" style="width:100%; ">
						</p>
					</td>
				</tr>
			</table>
		</div>

		<div class="_body" style="padding:1em 2em;">

		    <h2 style="color:#5668F7; padding:0em 1em;">You have a new comment at Code with Karani </h2>

		    <div style="text-align: left !important;">{!! $comment !!}</div>

		    <br/><br/>

		    <a href="https://codewithkarani.tech/collections/{{$post_id}}/article" target="_blank" id="button">View Comment in Site</a>

		    <div style="padding:1em 2em 0em 2em;">
		    	<hr/>
		    </div>
		    
		</div>

	</div>

</body>

</html>