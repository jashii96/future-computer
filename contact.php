<?php

if(!$_POST) exit;

// Email address verification, do not edit.
function isEmail($email) {
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");
$first_name     = $_POST['first_name'];
$last_name     = $_POST['last_name'];
$email    = $_POST['email'];
$phone    = $_POST['phone'];
$comments = $_POST['comments'];

if(trim($first_name) == '') {
	echo '<div class="error_message">Attention! You must enter your name.</div>';
	exit();
}  else if(trim($email) == '') {
	echo '<div class="error_message">Attention! Please enter a valid email address.</div>';
	exit();
} else if(!isEmail($email)) {
	echo '<div class="error_message">Attention! You have enter an invalid e-mail address, try again.</div>';
	exit();
}

if(trim($comments) == '') {
	echo '<div class="error_message">Attention! Please enter your message.</div>';
	exit();
}

if(get_magic_quotes_gpc()) {
	$comments = stripslashes($comments);
}


// Configuration option.
// Enter the email address that you want to emails to be sent to.
// Example $address = "joe.doe@yourdomain.com";

//$address = "example@themeforest.net";
$address = "info@fcrou.com";


// Configuration option.
// i.e. The standard subject will appear as, "You've been contacted by John Doe."

// Example, $e_subject = '$name . ' has contacted you via Your Website.';

$e_subject = 'You\'ve been contacted by ' . $first_name . '.';


// Configuration option.
// You can change this if you feel that you need to.
// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

$e_body = "You have been contacted by $first_name. $first_name selected service of $select_service, their additional message is as follows. Customer max budge is $select_price, for this project." . PHP_EOL . PHP_EOL;
$e_content = "\"$comments\"" . PHP_EOL . PHP_EOL;
$e_reply = "You can contact $first_name via email, $email or via phone $phone";

$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

$headers = "From: $email" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

if(mail($address, $e_subject, $msg, $headers)) {

	// Email has sent successfully, echo a success page.
	echo ('<!DOCTYPE html>
	<html lang="en">
	<head>
	<!-- basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- mobile metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<!-- site metas -->
	<title>Future Computer</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- site icons -->
	<link rel="icon" href="images/fevicon/fevicon.png" type="image/gif" />
	<!-- bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<!-- Site css -->
	<link rel="stylesheet" href="css/style.css" />
	<!-- responsive css -->
	<link rel="stylesheet" href="css/responsive.css" />
	<!-- colors css -->
	<link rel="stylesheet" href="css/colors1.css" />
	<!-- custom css -->
	<link rel="stylesheet" href="css/custom.css" />
	<!-- wow Animation css -->
	<link rel="stylesheet" href="css/animate.css" />
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		  <![endif]-->
	</head>
	<body id="default_theme" class="it_service service">
	<!-- loader -->
	<div class="bg_load"> <img class="loader_animation" src="images/loaders/loader_1.png" alt="#" /> </div>
	<!-- end loader -->
	<!-- header -->
	<header id="default_header" class="header_style_1">
	  <!-- header top -->
	  <div class="header_top">
		<div class="container">
		  <div class="row">
			<div class="col-md-8">
			  <div class="full">
				<div class="topbar-left">
				  <ul class="list-inline">
					<li> <span class="topbar-label"><i class="fa  fa-home"></i></span> <span class="topbar-hightlight">51 Pani market Uditnagar Rourkela-76901</span> </li>
					<li> <span class="topbar-label"><i class="fa fa-envelope-o"></i></span> <span class="topbar-hightlight"><a href="mailto:fcrourkela@gmail.com">fcrourkela@gmail.com</a></span> </li>
				  </ul>
				</div>
			  </div>
			</div>
			<div class="col-md-4 right_section_header_top">
			  <div class="float-left">
				<div class="social_icon">
				  <ul class="list-inline">
					<li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook" target="_blank"></a></li>
					<li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+" target="_blank"></a></li>
					<li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter" target="_blank"></a></li>
					<li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn" target="_blank"></a></li>
					<li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram" target="_blank"></a></li>
				  </ul>
				</div>
			  </div>
			  <div class="float-right">
				<div class="make_appo"> <a class="btn white_btn" href="make_appointment.html">Mail For support</a> </div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <!-- end header top -->
	  <!-- header bottom -->
	  <div class="header_bottom">
		<div class="container">
		  <div class="row">
			<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
			  <!-- logo start -->
			  <div class="logo"> <a href="it_home.html"><img src="images/logos/logo.jpg" alt="logo" /></a> </div>
			  <!-- logo end -->
			</div>
			<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
			  <!-- menu start -->
			  <div class="menu_side">
				<div id="navbar_menu">
				  <ul class="first-ul">
					<li> <a href="it_home.html">Home</a>
					  
					</li>
					<li><a href="it_tally.html">Tally</a></li>
					<li> <a class="active" href="it_software.html">Software</a>
					  
					</li>
					
					<li> <a href="it_shop.html">Shop</a>
					  
					</li>
					<li> <a href="it_about.html">About Us</a>
					  
					</li>
				  </ul>
				</div>
				<div class="search_icon">
				  <ul>
					<li><a href="#" data-toggle="modal" data-target="#search_bar"><i class="fa fa-search" aria-hidden="true"></i></a></li>
				  </ul>
				</div>
			  </div>
			  <!-- menu end -->
			</div>
		  </div>
		</div>
	  </div>
	  <!-- header bottom end -->
	</header>
	<!-- end header -->
	<!-- inner page banner -->
	<div id="inner_banner" class="section inner_banner_section">
	  <div class="container">
		<div class="row">
		  <div class="col-md-12">
			<div class="full">
			  <div class="title-holder">
				<div class="title-holder-cell text-left">
				  <h1 class="page-title">Response Submitted Successfully!!!</h1>
				  <ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li class="active"></li>
				  </ol>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	<div class="section padding_layout_1">
	  <div class="container">
		<div class="row">
		  <div class="col-md-12">
			<div class="full">
			  <div class="main_heading text_align_left">
				<h2 style="text-align: center;">Email Sent Successfully!!!</h2>
				<p>Thank you <strong>$first_name</strong>, your message has been submitted to us.</p>
			  </div>
			</div>
		  </div>
		</div>
		</div>
	  </div>
	
	<!-- Modal -->
	<div class="modal fade" id="search_bar" role="dialog">
	  <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
		  </div>
		  <div class="modal-body">
			<div class="row">
			  <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2 col-xs-10 col-xs-offset-1">
				<div class="navbar-search">
				  <form action="#" method="get" id="search-global-form" class="search-global">
					<input type="text" placeholder="Type to search" autocomplete="off" name="s" id="search" value="" class="search-global__input">
					<button class="search-global__btn"><i class="fa fa-search"></i></button>
					<div class="search-global__note">Begin typing your search above and press return to search.</div>
				  </form>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	<!-- End Model search bar -->
	<!-- footer -->
	<footer class="footer_style_2">
	  <div class="container-fuild">
		<div class="row">
		  <div class="map_section">
			<div id="map"></div>
		  </div>
		  <div class="footer_blog">
			<div class="row">
			  <div class="col-md-6">
				<div class="main-heading left_text">
				  <h2>Future Computer Upadates</h2>
				</div>
				<p>Coming Soon</p>
				<ul class="social_icons">
				  <li class="social-icon fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				  <li class="social-icon tw"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				  <li class="social-icon gp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
				</ul>
			  </div>
			  <div class="col-md-6">
				<div class="main-heading left_text">
				  <h2>Additional links</h2>
				</div>
				<ul class="footer-menu">
				  <li><a href="it_about.html"><i class="fa fa-angle-right"></i> About us</a></li>
				  <li><a href="it_term_condition.html"><i class="fa fa-angle-right"></i> Terms and conditions</a></li>
				  <li><a href="it_privacy_policy.html"><i class="fa fa-angle-right"></i> Privacy policy</a></li>
				  <li><a href="it_news.html"><i class="fa fa-angle-right"></i> News</a></li>
				  <li><a href="it_contact_2.html"><i class="fa fa-angle-right"></i> Contact us</a></li>
				</ul>
			  </div>
			  <div class="col-md-6">
				<div class="main-heading left_text">
				  <h2>Services</h2>
				</div>
				<ul class="footer-menu">
				  <li><a href="it_data_recovery.html"><i class="fa fa-angle-right"></i> Data recovery</a></li>
				  <li><a href="it_computer_repair.html"><i class="fa fa-angle-right"></i> Computer repair</a></li>
				  <li><a href="it_mobile_service.html"><i class="fa fa-angle-right"></i> Mobile service</a></li>
				  <li><a href="it_network_solution.html"><i class="fa fa-angle-right"></i> Network solutions</a></li>
				  <li><a href="it_techn_support.html"><i class="fa fa-angle-right"></i> Technical support</a></li>
				</ul>
			  </div>
			  <div class="col-md-6">
				<div class="main-heading left_text">
				  <h2>Contact us</h2>
				</div>
				<p> Shop No.:- 51 Pani market Uditnagar Rourkela-769012<br>
				  <span style="font-size:18px;"><a href="tel:9338264515">9338264515</a></span></p>
				<div class="footer_mail-section">
				  <form>
					<fieldset>
					<div class="field">
					  <input placeholder="Email" type="text">
					  <button class="button_custom"><i class="fa fa-envelope" aria-hidden="true"></i></button>
					</div>
					</fieldset>
				  </form>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="cprt">
			<p>FutureComputer © Copyrights 2021 Design & Developed by MJD</p>
		  </div>
		</div>
	  </div>
	</footer>
	<!-- end footer -->
	<!-- js section -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- menu js -->
	<script src="js/menumaker.js"></script>
	<!-- wow animation -->
	<script src="js/wow.js"></script>
	<!-- custom js -->
	<script src="js/custom.js"></script>
	<script>
	
		  // This example adds a marker to indicate the position of Bondi Beach in Sydney,
		  // Australia.
		  function initMap() {
			var map = new google.maps.Map(document.getElementById("map"), {
			  zoom: 11,
			  center: {lat: 22.2269, lng: 84.8399},
			  styles: [
				   {
					 elementType: "geometry",
					 stylers: [{color: "#fefefe"}]
				   },
				   {
					 elementType: "labels.icon",
					 stylers: [{visibility: "off"}]
				   },
				   {
					 elementType: "labels.text.fill",
					 stylers: [{color: "#616161"}]
				   },
				   {
					 elementType: "labels.text.stroke",
					 stylers: [{color: "#f5f5f5"}]
				   },
				   {
					 featureType: "administrative.land_parcel",
					 elementType: "labels.text.fill",
					 stylers: [{color: "#bdbdbd"}]
				   },
				   {
					 featureType: "poi",
					 elementType: "geometry",
					 stylers: [{color: "#eeeeee"}]
				   },
				   {
					 featureType: "poi",
					 elementType: "labels.text.fill",
					 stylers: [{color: "#757575"}]
				   },
				   {
					 featureType: "poi.park",
					 elementType: "geometry",
					 stylers: [{color: "#e5e5e5"}]
				   },
				   {
					 featureType: "poi.park",
					 elementType: "labels.text.fill",
					 stylers: [{color: "#9e9e9e"}]
				   },
				   {
					 featureType: "road",
					 elementType: "geometry",
					 stylers: [{color: "#eee"}]
				   },
				   {
					 featureType: "road.arterial",
					 elementType: "labels.text.fill",
					 stylers: [{color: "#3d3523"}]
				   },
				   {
					 featureType: "road.highway",
					 elementType: "geometry",
					 stylers: [{color: "#eee"}]
				   },
				   {
					 featureType: "road.highway",
					 elementType: "labels.text.fill",
					 stylers: [{color: "#616161"}]
				   },
				   {
					 featureType: "road.local",
					 elementType: "labels.text.fill",
					 stylers: [{color: "#9e9e9e"}]
				   },
				   {
					 featureType: "transit.line",
					 elementType: "geometry",
					 stylers: [{color: "#e5e5e5"}]
				   },
				   {
					 featureType: "transit.station",
					 elementType: "geometry",
					 stylers: [{color: "#000"}]
				   },
				   {
					 featureType: "water",
					 elementType: "geometry",
					 stylers: [{color: "#c8d7d4"}]
				   },
				   {
					 featureType: "water",
					 elementType: "labels.text.fill",
					 stylers: [{color: "#b1a481"}]
				   }
				 ]
			});
	
			var image = "images/it_service/location_icon_map_cont.png";
			var beachMarker = new google.maps.Marker({
			  position: {lat: 40.645037, lng: -73.880224},
			  map: map,
			  icon: image
			});
		  }
		</script>
	<!-- google map js -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
	<!-- end google map js -->
	<!-- zoom effect -->
	<script src="js/hizoom.js"></script>
	<script>
			$(".hi1").hiZoom({
				width: 300,
				position: "right"
			});
			$(".hi2").hiZoom({
				width: 400,
				position: "right"
			});
		</script>
	</body>
	</html>
	');
    
} else {

	echo 'ERROR!';

}