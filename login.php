<?php
include_once 'config/config1.php';
include_once 'classes/classUser.php';

$user = new User();

//Checks for the users input if it is exactly the same as it is in the database
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($email1,$password);
	if($login){
		header("location: index.php");
	}else{
		?>
        <div id='error_notif'>Wrong email or password.</div>
        <?php
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
    <title> Melrose Blooms and Events Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
</head>
<body>
<div id="brand-block">
    <img src="images/Logo.png">
</div>
<div id="login-block">
	<h3>Sign In</h3>
	<form method="POST" action="" name="login">
	<div>
		<input type="text" class="input" required name="email1" placeholder="Username"/>
	</div>
	<div>
		<input type="password" class="input" required name="password" placeholder="Password"/>
	</div>
	<div>
		<input type="submit" name="submit" value="Log-in"/>
	</div>
	</form>
</div>
</body>
</html>