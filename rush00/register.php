<?php
session_start();
include('config.php');
if ($_SESSION['whoami'] != "" || !empty($_SESSION['whoami'])) {
	redirect('index.php');
}
if ($_GET['s'] <> "") {
	$err_msg = "\n<font color=\"#ff666\">" . $_GET['s'] . "\n</font><br>";
}
else
	$err_msg = "";
session_start();
$n1  = mt_rand(0,10);
$n2  = mt_rand(0,10);
$fig = array('zero','one','two','three','four','five','six','seven','eight','nine','ten');
$result = $n1 + $n2;
$sentence = $fig[$n1] . ' plus ' . $fig[$n2];

$captcha_label = "<label for='captcha' >How much does ".$sentence." make?</label>";
$_SESSION['captcha'] = $result;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>42Shop: Create your account</title>
		<link href="css/main.css" rel="stylesheet" type="text/css" media="all">
	</head>
<div id="header">
<h1>42Shop</h1>
</div>

<div id="nav">
	<?php if (get_user_type($_SESSION['whoami'], $users_file) == 'admin') { echo "<b><a href='admin.php'>Admin</a></b>"; } ?>
	<?php if ($account) { echo $account; } ?>
	<a href="index.php?page=products">Products</a>
	<a href="index.php?page=checkout">Checkout</a>
	<?php echo $log; ?>
</div>
<div id="section">
			<form class="Absolute-Center" action="register_check.php" method="POST">
				<?php echo $err_msg; ?>
				Choose an username: <input type="text" name="login" />
				<br />
				First name: <input type="text" name="fn" /> Last name: <input type="text" name="ln" />
				<br />
				Create a password: <input type="password" name="passwd" />
				<br />
				Confirm your password: <input type="password" name="repasswd" />
				<br />
				Enter your email address: <input type="text" name="email" />
				<br /><!-- is not a valid email address -->
				Enter your physical address: <input type="text" name="address" />
				<br />
				<?php echo $captcha_label." </label><input  type='text' name='captcha'  value=''/><br />";?>
				<br />

<input type="checkbox" name="spam" value="agreed">Subscribe to our newsletter<br>
<input type="checkbox" name="terms" value="agreed"><b>I have read and accepted the privacy policy</b><br>
				<input type="submit" name="submit" value="OK" />
			</form>
</div>
<div id="footer">
Copyright 2018 © copran, fdraghic
</div>
</body>
</html>
<?php
$_SESSION['page'] = "register.php";
?>
