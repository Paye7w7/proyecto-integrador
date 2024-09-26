
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Classic Hotel a Hotel Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classic Hotel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/chocolat.css" rel="stylesheet">
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
	<!-- start-smoth-scrolling -->
</head>
<body>
<!-- banner -->
<div class="banner">
	<div class="container">
		<div class="header-nav">
			<div class="logo">
				<h1><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></h1>
			</div>
			<div class="navigation">
				<span class="menu"><img src="images/menu.png" alt=""/></span>
				<nav class="cl-effect-11" id="cl-effect-11">
					<ul class="nav1">
						
						<li><a href="typography.html" ></a></li>
						<li><a href="lregistrohot.php" >Registra tu hotel</a></li>
						<li><a href="login.php">Inicia Sesión</a></li>
						<li><a href="register.php">Registrarse</a></li>
						

					</ul>
				</nav>
				<!-- script for menu -->
					<script> 
						$( "span.menu" ).click(function() {
						$( "ul.nav1" ).slideToggle( 300, function() {
						 // Animation complete.
						});
						});
					</script>
				<!-- //script for menu -->
				
			</div>
			<div class="social-icons">
				<ul>
					<li><a href="#" class="f1"></a></li>
					<li><a href="#" class="f2"></a></li>
					<li><a href="#" class="f3"></a></li>
					<li><a href="#" class="f4"></a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="banner-info">
			<script src="js/responsiveslides.min.js"></script>
			<script>
									// You can also use "$(window).load(function() {"
									$(function () {
									 // Slideshow 4
									$("#slider3").responsiveSlides({
										auto: true,
										pager: false,
										nav: false,
										speed: 500,
										namespace: "callbacks",
										before: function () {
									$('.events').append("<li>before event fired.</li>");
									},
									after: function () {
										$('.events').append("<li>after event fired.</li>");
										}
										});
										});
			</script>
			<div  id="top" class="callbacks_container">
				<ul class="rslides" id="slider3">
					<li>
						<div class="banner-text">
							<h3>Bienvenido</h3>
							<h4>Los mejores hoteles para ti y tu familia</h4>
						</div>
					</li>
					<li>
						<div class="banner-text">
							<h3>Bienvenido</h3>
							<h4>Para que te sientas como en casa</h4>
						</div>
					</li>
					<li>
						<div class="banner-text">
							<h3>Bienvenido</h3>
							<h4>Busca un hotel para tu comodidad</h4>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="banner-bottom">
			<div class="droop-down">
				<div class="droop">
					<div class="sort-by">
						<select class="sel">
							<option value="">ISLA DEL SOL</option>
							<option value="">COPACABANA</option>
							<option value="">DEP. LA PAZ</option>
							<option value="">DEP. COCHABAMBA</option>   
						</select>
					</div>
				</div>
				<div class="radio-btns">
					<div class="swit">								
						<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i></label> </div></div>
                        <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i></label> </div></div>							    
					</div>
				</div>
				<div class="search">
						<form action="search.php">
							<input type="submit" value="Buscar">
						</form>	
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<!-- //banner -->
<!-- banner-pos -->

<div class="banner-pos">
	<div class="container">
		<div class="banner-pos-grids">
			<h3>Sugerencias para ti en la Isla del Sol</h3>
			
			<div class="ban-pos-gridtwo l-grids">
				<div class="ban-pos-info l-grids">
					<figure class="effect-bubba">
							<img src="images/inti wayra.jpg" alt=""/>
							<figcaption>
								<h4>Hotel Inti Wayra</h4>
								<p>poner descripcion</p>																
							</figcaption>			
					</figure>
				</div>
			</div>	
			
			<div class="ban-pos-gridtwo l-grids">
				<div class="ban-pos-info l-grids">
					<figure class="effect-bubba">
							<img src="images/utawasa.jpg" alt=""/>
							<figcaption>
								<h4>Hotel Utawasa</h4>
								<p>descripcion</p>														
							</figcaption>			
					</figure>
				</div>
			</div>
			<div class="ban-pos-gridthree l-grids">
				<div class="ban-pos-info l-grids">
					<figure class="effect-bubba">
							<img src="images/jacha inti.jpg" alt=""/>
							<figcaption>
								<h4>Hotel Jacha Inti</h4>
								<p>descripcion</p>																
							</figcaption>			
					</figure>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<!-- 
 welcome
<div class="welcome">
	<div class="container">
		<h2 class="tittle-one">WELCOME</h2>
		<div class="welcome-grids">
			<div class="col-md-4 welcome-left">
				<ul>
					<li><a href="#">Lorem Ipsum is not simply random text.</a></li>
					<li><a href="#">There are many variations of passages.</a></li>
					<li><a href="#">The standard chunk of Lorem Ipsum.</a></li>
				</ul>
			</div>
			<div class="col-md-4 welcome-middle">
				<ul>
					<li><a href="#">Lorem Ipsum is not simply random text.</a></li>
					<li><a href="#">There are many variations of passages.</a></li>
					<li><a href="#">The standard chunk of Lorem Ipsum.</a></li>
				</ul>
			</div>
			<div class="col-md-4 welcome-right">
				<ul>
					<li><a href="#">Lorem Ipsum is not simply random text.</a></li>
					<li><a href="#">There are many variations of passages.</a></li>
					<li><a href="#">The standard chunk of Lorem Ipsum.</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
		<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium 
		doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore 
		veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
	</div>
</div> 
-->
<!-- facilities -->
<div class="facilities">
	<div class="container">
		<h3>Sugerencias en para ti en Copacabana</h3>
		<div class="ban-pos-gridtwo l-grids">
			<div class="ban-pos-info l-grids">
				<figure class="effect-bubba">
						<img src="images/coita.jpg" alt=""/>
						<figcaption>
							<h4>Hotel Inti Wayra</h4>
							<p>poner descripcion</p>																
						</figcaption>			
				</figure>
			</div>
		</div>
		<div class="ban-pos-gridtwo l-grids">
			<div class="ban-pos-info l-grids">
				<figure class="effect-bubba">
						<img src="images/copa.jpg" alt=""/>
						<figcaption>
							<h4>Hotel Utawasa</h4>
							<p>descripcion</p>														
						</figcaption>			
				</figure>
			</div>
		</div>
		<div class="ban-pos-gridthree l-grids">
			<div class="ban-pos-info l-grids">
				<figure class="effect-bubba">
						<img src="images/copaa.jpg" alt=""/>
						<figcaption>
							<h4>Hotel Jacha Inti</h4>
							<p>descripcion</p>																
						</figcaption>			
				</figure>
			</div>
		</div>
		<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //facilities -->
<!-- facilities -->
<div class="facilities">
	<div class="container">
		<h3>Sugerencias en para ti en el departamento de La Paz</h3>
		<div class="ban-pos-gridtwo l-grids">
			<div class="ban-pos-info l-grids">
				<figure class="effect-bubba">
						<img src="images/inti wayra.jpg" alt=""/>
						<figcaption>
							<h4>Hotel Inti Wayra</h4>
							<p>poner descripcion</p>																
						</figcaption>			
				</figure>
			</div>
		</div>
		<div class="ban-pos-gridtwo l-grids">
			<div class="ban-pos-info l-grids">
				<figure class="effect-bubba">
						<img src="images/utawasa.jpg" alt=""/>
						<figcaption>
							<h4>Hotel Utawasa</h4>
							<p>descripcion</p>														
						</figcaption>			
				</figure>
			</div>
		</div>
		<div class="ban-pos-gridthree l-grids">
			<div class="ban-pos-info l-grids">
				<figure class="effect-bubba">
						<img src="images/jacha inti.jpg" alt=""/>
						<figcaption>
							<h4>Hotel Jacha Inti</h4>
							<p>descripcion</p>																
						</figcaption>			
				</figure>
			</div>
		</div>
		<div class="clearfix"></div>
		</div>
	</div>
</div>

<!--apartado de opciones como pie de pagina-->
	<div class="footer">
		<div class="container">				 	
			<div class="col-md-3 ftr_navi ftr">
				<h3>NAVIGATION</h3>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="typography.html">Services</a></li>						
					<li><a href="booking.html">Booking</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</div>
			<div class="col-md-3 ftr_navi ftr">
					 <h3>FACILITIES</h3>
					 <ul>
						 <li><a href="#">Double bedrooms</a></li>
						 <li><a href="#">Single bedrooms</a></li>
						 <li><a href="#">Royal facilities</a></li>						
						 <li><a href="#">Connected rooms</a></li>
					 </ul>
			</div>
			<div class="col-md-3 ftr_navi ftr">
				<h3>GET IN TOUCH</h3>
				<ul>
					<li>Ola-ola street jump,</li>
					<li>260-14 City, Country</li>
					<li>+62 000-0000-00</li>
				</ul>
			</div>
			<div class="col-md-3 ftr-logo">
				<a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Classic Hotel</a>
				<ul>
					<li><a href="#" class="f1"> </a></li>
					<li><a href="#" class="f2"> </a></li>
					<li><a href="#" class="f3"> </a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

 
<div class="copy-right">
	<div class="container">
			<p> &copy; 2015 Classic Hotel. All Rights Reserved | Design by  <a href="http://w3layouts.com/"> W3layouts</a></p>
	</div>
</div>
 
	<script src="js/bootstrap.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


</body>
</html>