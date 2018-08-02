<?php
session_start();
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = $_SESSION["email"];
    $email_subject = "Message from Website";
    echo $_SESSION["name"];
    echo $_SESSION["email"];
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_SESSION["name"]) ||
        !isset($_SESSION["email"])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_SESSION["name"]; // required
    $email_from = $_SESSION["email"]; // required
    $comments = $_SESSION["course"]; // required

    if ($comments == "Hist") {
      $url = "https://www.youtube.com/playlist?list=PLF4DFAB80C2018F85";
    }

    if ($comments == "Art") {
      $url = "http://www.learner.org/courses/globalart/";
    }

    if ($comments == "Eco") {
      $url = "https://www.youtube.com/playlist?list=PL303D52E352C0B7D9&feature=plcp";
    }
 
    if ($comments == "film") {
      $url = "https://www.youtube.com/playlist?list=PL303D52E352C0B7D9&feature=plcp";
    }
 
    if ($comments == "lang") {
      $url = "https://www.youtube.com/playlist?list=PL303D52E352C0B7D9&feature=plcp";
    }
 
    if ($comments == "law") {
      $url = "https://www.youtube.com/playlist?list=PL303D52E352C0B7D9&feature=plcp";
    }
 
    if ($comments == "lit") {
      $url = "https://www.youtube.com/playlist?list=PL303D52E352C0B7D9&feature=plcp";
    }
 
    if ($comments == "phil") {
      $url = "https://www.youtube.com/playlist?list=PL303D52E352C0B7D9&feature=plcp";
    }
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Comments: ".clean_string($url)."\n";
 
// create email headers
$headers = 'From: OChe < i@ocheben.com >'."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 <html>
	<head>
		<title>Apple World</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html" class="icon  fa-apple" >Apple World</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>
								<a href="#" class="icon fa-angle-down">Products</a>
								<ul>
									<li><a href="iphone.html">iPhone</a></li>
									<li><a href="ipad.html">iPad</a></li>
									<li><a href="mac.html">Mac</a></li>
									<li>
										<a href="access.html">Accessories</a>
										
									</li>
								</ul>
							</li>
							<li><a href="services.html">Services</a></li>
						</ul>
					</nav>
				</header>
<!-- Four -->
				<section id="four" class="wrapper style4 special" style="background: url(images/back3.png); background-size: cover">
					<div class="container 75%">
						<header class="major">
							<h2>Thank you for contacting us.<br>We will be in touch with you shortly</h2>
						</header>
						
                        <div class="row uniform">
								<div class="12u">
									<ul class="actions">
										<li><a href="index.html" class="button fit">Back to Home</a></li>
									</ul>
								</div>
							</div>
					</div>
				</section>
 
<?php
 

?>