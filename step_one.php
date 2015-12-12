<?php
// Start the session
session_start();

// clear all
$name = $creature_type = $error = "";

// to display errors
$form_validated = false;

if (isset($_POST["name"])){
    if($_POST["name"] == ""){
	$error = "* Please check your name input <br>";
    } 

    if(!isset($_POST["creature_type"])){
    $error = $error . "* Please choose a creature type <br/>";
    }
    else{
        $creature = $_POST["creature_type"];
        if ($creature == "alien"){
            $alien_checked = "checked";
        }
        else if ($creature == "robot"){
            $robot_checked = "checked";
        }
    }

    if ($error == ""){
		
        $form_validated = true;
    }
}
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

<?php
 if (!$form_validated) 
 { 
?>

<div class="container">
	<div class="row">
        <div class="col-sm-12 col-md-10 col-lg-1"></div>
        <div class="col-sm-12 col-md-10 col-lg-10">
            <p>Step right up, step right up! Learn your creature-name in 3 short steps!</p>
            <h4>Tell us who you are, start with your name</h4>
            <form id="frm_data" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <p>
                        <input type="text" name="name" class="form-control" id="name" placeholder="name">
                    </p>
                </div>
                <fieldset>
                    <legend>Choose your creature type:</legend>
                    <p>
                        <input type="radio" name="creature_type" value="alien" id="alien">
                        <label for="alien">Alien</label>
                    </p>
                    <p>
                        <input type="radio" name="creature_type" value="robot" id="robot">
                        <label for="robot">Robot</label>
                    </p>
                </fieldset>
                <?php echo $error; ?>
                    <p>
                        <input type="submit" class="btn btn-primary" value="Go to step 2 (if you dare)">
                        <input type="reset" class="btn btn-danger">
                    </p>
            </form>
        </div>
        <div class="col-sm-12 col-md-10 col-lg-1"></div>
</div>
</div>

<!-- add footer to page --> 
<?php include 'inc_footer.php' ?>

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>

<?php 
	} else {
	// set session variables from form
	$name = strtolower(strip_tags($_POST["name"]));
	$name = ucfirst($name);
	$_SESSION["name"] = $name;
	$_SESSION["creature_type"] = $_POST["creature_type"];
	header('location:step_two.php');
 } 
 ?>
 
</body>
</html>
