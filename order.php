<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>NanoGrid</title>
</head>
<?php 
	$conn=mysqli_connect("localhost", "root", "", "shop");
		
?>	
	
<body>

	
<div class='loading'>
	<div id="floatingCirclesG">
		<div class="f_circleG" id="frotateG_01"></div>
		<div class="f_circleG" id="frotateG_02"></div>
		<div class="f_circleG" id="frotateG_03"></div>
		<div class="f_circleG" id="frotateG_04"></div>
		<div class="f_circleG" id="frotateG_05"></div>
		<div class="f_circleG" id="frotateG_06"></div>
		<div class="f_circleG" id="frotateG_07"></div>
		<div class="f_circleG" id="frotateG_08"></div>
	</div>
	
<?php
	
    header("refresh:3.5 ; url=index.php?clar=1");
	mysqli_close($conn);
?>
	
	
	
<g id='news_check'>	
Gratulacje !!!
<br>
Złożyłeś zamówienie <br>
</g>	
<x id='x2'>Za chwilę nastąpi przekierowanie do strony głównej.</x>	
</div>
<script type="text/javascript" src='jquery-2.2.0.js'></script>	
<style type="text/css">
.loading{
		text-align: center;
		font-size: 40px;
}
#x2{
	font-size: 25px;
	font-style: italic;
	color:lightgrey;
}	
#floatingCirclesG{
	position:relative;
	width:544px;
	height:544px;
	margin:auto;
	transform:scale(0.4);
		-o-transform:scale(0.4);
		-ms-transform:scale(0.4);
		-webkit-transform:scale(0.4);
		-moz-transform:scale(0.4);
}

.f_circleG{
	position:absolute;
	background-color:rgb(255,255,255);
	height:98px;
	width:98px;
	border-radius:51px;
		-o-border-radius:51px;
		-ms-border-radius:51px;
		-webkit-border-radius:51px;
		-moz-border-radius:51px;
	animation-name:f_fadeG;
		-o-animation-name:f_fadeG;
		-ms-animation-name:f_fadeG;
		-webkit-animation-name:f_fadeG;
		-moz-animation-name:f_fadeG;
	animation-duration:1.04s;
		-o-animation-duration:1.04s;
		-ms-animation-duration:1.04s;
		-webkit-animation-duration:1.04s;
		-moz-animation-duration:1.04s;
	animation-iteration-count:infinite;
		-o-animation-iteration-count:infinite;
		-ms-animation-iteration-count:infinite;
		-webkit-animation-iteration-count:infinite;
		-moz-animation-iteration-count:infinite;
	animation-direction:normal;
		-o-animation-direction:normal;
		-ms-animation-direction:normal;
		-webkit-animation-direction:normal;
		-moz-animation-direction:normal;
}

#frotateG_01{
	left:0;
	top:221px;
	animation-delay:0.39s;
		-o-animation-delay:0.39s;
		-ms-animation-delay:0.39s;
		-webkit-animation-delay:0.39s;
		-moz-animation-delay:0.39s;
}

#frotateG_02{
	left:64px;
	top:64px;
	animation-delay:0.52s;
		-o-animation-delay:0.52s;
		-ms-animation-delay:0.52s;
		-webkit-animation-delay:0.52s;
		-moz-animation-delay:0.52s;
}

#frotateG_03{
	left:221px;
	top:0;
	animation-delay:0.65s;
		-o-animation-delay:0.65s;
		-ms-animation-delay:0.65s;
		-webkit-animation-delay:0.65s;
		-moz-animation-delay:0.65s;
}

#frotateG_04{
	right:64px;
	top:64px;
	animation-delay:0.78s;
		-o-animation-delay:0.78s;
		-ms-animation-delay:0.78s;
		-webkit-animation-delay:0.78s;
		-moz-animation-delay:0.78s;
}

#frotateG_05{
	right:0;
	top:221px;
	animation-delay:0.91s;
		-o-animation-delay:0.91s;
		-ms-animation-delay:0.91s;
		-webkit-animation-delay:0.91s;
		-moz-animation-delay:0.91s;
}

#frotateG_06{
	right:64px;
	bottom:64px;
	animation-delay:1.04s;
		-o-animation-delay:1.04s;
		-ms-animation-delay:1.04s;
		-webkit-animation-delay:1.04s;
		-moz-animation-delay:1.04s;
}

#frotateG_07{
	left:221px;
	bottom:0;
	animation-delay:1.17s;
		-o-animation-delay:1.17s;
		-ms-animation-delay:1.17s;
		-webkit-animation-delay:1.17s;
		-moz-animation-delay:1.17s;
}

#frotateG_08{
	left:64px;
	bottom:64px;
	animation-delay:1.3s;
		-o-animation-delay:1.3s;
		-ms-animation-delay:1.3s;
		-webkit-animation-delay:1.3s;
		-moz-animation-delay:1.3s;
}



@keyframes f_fadeG{
	0%{
		background-color:rgb(148,12,148);
	}

	100%{
		background-color:rgb(255,255,255);
	}
}

@-o-keyframes f_fadeG{
	0%{
		background-color:rgb(148,12,148);
	}

	100%{
		background-color:rgb(255,255,255);
	}
}

@-ms-keyframes f_fadeG{
	0%{
		background-color:rgb(148,12,148);
	}

	100%{
		background-color:rgb(255,255,255);
	}
}

@-webkit-keyframes f_fadeG{
	0%{
		background-color:rgb(148,12,148);
	}

	100%{
		background-color:rgb(255,255,255);
	}
}

@-moz-keyframes f_fadeG{
	0%{
		background-color:rgb(148,12,148);
	}

	100%{
		background-color:rgb(255,255,255);
	}
}
	
</style>
	
</body>
</html>