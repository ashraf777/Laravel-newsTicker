<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<link href="{{ asset('css/webticker.css')}}" rel="stylesheet" type="text/css" media="screen">
<script type="text/javascript" src="{{ asset('js/jquery.webticker.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#webticker").webTicker();
	// $("#webticker2").webTicker({duplicate:true, speed: 40, direction: 'right', rssurl:'http://yourwebsite.com/rss/', rssfrequency:1, startEmpty:false, hoverpause:false});	
	
	$("#stop").click(function(){
		$("#webticker").webTicker('stop');
	});
	
	$("#continue").click(function(){
		$("#webticker").webTicker('cont');
	});
});
</script>

</head>

<body>
<div class="container">
	<div class="row">
		<div class="navbar navbar-fixed-bottom" style="margin: 0 auto -20px;">		
		<div class="col-md-12">
			<div class="breaking-news" style="font-size: 17px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspব্রেকিং</div>
			<div>
				<br>			
				<ul id="webticker">
				@foreach ($newsTicker as $tricker)	
					<li id='item1'>
						<span class="red-color">|</span>&nbsp&nbsp&nbsp&nbsp<b>{{ $tricker->title }}</b>
					</li>
				@endforeach
				</ul>
				<br>
			</div>
		</div>
		</div>
	</div>
</div>
</body>
</html>




