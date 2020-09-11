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
			background-color: #DF9851;
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

		    <h2 style="color:#ffffff; padding:0em 2em;">Thank you for leaving your thoughts.</h2>

		    <div style="text-align: left !important;">{!! $comment !!}</div>

		    <div style="padding:1em 4em 0em 4em;">
		    	<hr/>
		    </div>
		    
		</div>

		<br/>

		<div class="_body">
			<table>
				<tr>
					<td>
						<p>You are receiving this message because you commented on a post at <a href="https://codewithkarani.tech">Code with Karani</a></p>

						<p style="text-align: center; padding: 0em 1em; font-size: 0.9em;">
							<a target="_blank" href="https://codewithkarani.tech">@ Code with Karani</a> | <a target="_blank" href="tel:+254725307131">+254 725 30 71 31</a> | Website: <a target="_blank" href="https://codewithkarani.tech">https://codewithkarani.tech</a> | Email: <a target="_blank" href="mailto:support@codewithkarani.tech">support@codewithkarani.tech</a> | Nairobi, Kenya
						</p>
					</td>
				</tr>
			</table>
		</div>

	</div>

</body>

</html>