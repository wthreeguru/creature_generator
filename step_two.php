<?php
session_start();
date_default_timezone_set('America/Toronto');
	// Harvest variables
	$desc_id = (rand(1,4));
	$pic_id = (rand(1,4));
	$name = $_SESSION["name"];
	$creature_type = $_SESSION["creature_type"];
	
	// creature name extension and desciptions
	if ($creature_type == "alien") {
		$creature_type_extension = "zula";
		$arrayId = array("", 
			"has the ability to walk while leaning on his right side. It's great for avoiding those left sided mosquitoes.", // desc_id 1
			"is not feeling very well today, but a quick trip to the doctor should straighten out this situation.", 
			"has the power to sleep for extremely long periods of time. His motto, Do it Tomorrow!", 
			"is running upside down. He's great for climing trees.");
		
		$arrayAlt = array("", 
			$name.$creature_type_extension, 
			$name.$creature_type_extension, 
			$name.$creature_type_extension,
			 $name.$creature_type_extension);
		
		$arrayTitle = array("", 
			$name.$creature_type_extension, 
			$name.$creature_type_extension, 
			$name.$creature_type_extension, 
			$name.$creature_type_extension);
		
		$arrayImgWidth = array("", "300", "300", "300", "300");
		$arrayImgHeight = array("", "300", "300", "300", "300");
	} else if ($creature_type == "robot") {
		$creature_type_extension = "-bot";
		$arrayId = array("", 
			"can go her homework while sleeping on her side. What a great gift.", // desc_id 1
			"always says Hello! while lifting her right hand. She wants to stand out in a crowd.", 
			"can walk on the side of a building. Look out Spiderman.", 
			"can walk with her hands, sometimes we all need to rest our feet.");
		
		$arrayAlt = array("", 
			$name.$creature_type_extension, 
			$name.$creature_type_extension, 
			$name.$creature_type_extension, 
			$name.$creature_type_extension);
		
		$arrayTitle = array("", 
			$name.$creature_type_extension, 
			$name.$creature_type_extension, 
			$name.$creature_type_extension, 
			$name.$creature_type_extension);
		
		$arrayImgWidth = array("", "300", "300", "300", "300");
		$arrayImgHeight = array("", "300", "300", "300", "300");
	}
	
	$array_text = $arrayId[$desc_id];
	$arrayAlt = $arrayAlt[$pic_id];
	$arrayTitle = $arrayTitle[$pic_id];
	$arrayImgWidth = $arrayImgWidth[$pic_id];
	$arrayImgHeight = $arrayImgHeight[$pic_id];
	
	
////-------------------------------------------------------------------------------
//// START MAIL FUNCTION
//
//	$message_body = "<p>Name: {$name}!</p><br><p>Creature Type: {$creature_type}</p><br><p><div>{$array_text}</div></p>";
//	
//	// PHPMailer
//	require '../vendor/PHPMailerAutoload.php';
//	
//	$mail = new PHPMailer;
//	
//	$mail->isSMTP();                                      	// Set mailer to use SMTP
//	$mail->Host = 'webmail.websitename.ca';  				// Specify main and backup SMTP servers
//	$mail->SMTPAuth = true;                               	// Enable SMTP authentication
//	$mail->Username = 'test@websitename.ca';                // SMTP username
//	$mail->Password = 'oYqo4345&^%0!3';                		// SMTP password
//	$mail->SMTPSecure = 'tls';                            	// Enable TLS encryption, `ssl` also accepted
//	$mail->Port = 587;                                    	// TCP port to connect to
//	
//	$mail->setFrom('info.www110_a1@senecacollege.ca', 'Creature Creation');
//	$mail->addAddress('eric.chen@senecacollege.ca', 'Eric Chen');     // Add a recipient
//	
//	$mail->isHTML(true);                                  // Set email format to HTML
//	
//	$mail->Subject = 'Creature Creation website';
//	$mail->Body    = $message_body;
//	
//	if(!$mail->send()) {
//		echo 'Message could not be sent.';
//		//echo 'Mailer Error: ' . $mail->ErrorInfo;
//	} else {
//		echo 'Message has been sent';
//	}
//
////-------------------------------------------------------------------------------

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Seneca College Creature Creator</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- add nav to page -->
<?php include 'inc_nav.php' ?>
<!-- add headers to page -->
<?php include "inc_heading.php"?>

<div class="container">
	<div class="row">
		<div class="text-center col-md-12">
			<div class="well">
                <p>Thanks <?php echo $name; ?>,<br> 
                    Do you know what todays date is?<br>
                    Today is <?php echo date('l F jS, Y');?>, and we are getting ready for Christmas.<br>
                    But don't worry <?php echo $name; ?>, we have created your own personal <?php echo strtoupper($creature_type) ?>.<br> 
                    If you want to see it, <a id="open_slidepanel" href="#">click here</a> 
                </p>
			</div>
		</div>
	</div>
	<div id="slidepanel" class="row">
        <div class="col-sm-12 col-md-6 col-lg-4 text-center">
			<img class="img-responsive img-thumbnail" src="images/<?php echo $creature_type.$pic_id; ?>.jpg" width="<?php echo $arrayImgWidth ?>" height="<?php echo $arrayImgHeight ?>" alt="<?php echo $arrayAlt ?>" title="<?php echo $arrayTitle ?>">
        </div>
        <div class="col-sm-12 col-md-6 col-lg-8">
			<h2><?php echo $name; ?><?php echo $creature_type_extension ?></h2>
          	<p><?php echo $name.$creature_type_extension ?>, <?php echo $array_text ?></p>
		</div>
	</div>
</div>

<!-- add footer to page --> 
<?php include 'inc_footer.php' ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#open_slidepanel").click(function () {
                $("#slidepanel").slideDown(2000);
            });
        });
    </script>
</body>
</html>
