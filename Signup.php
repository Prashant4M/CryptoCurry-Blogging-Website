<html>
	<head>
		<title>Signup||Login</title>
		<link rel="stylesheet" href="assets/css/style.css">
		<script src="assets/js/script.js"></script>
	</head>
	<body background="img1.jpg">
		<?php
		require_once "config.php";
		$nameErr = $emailErr= $passwordErr=$cpasswordErr="";
		$name = $email = $password =$regStatus= "";

		if (isset($_POST['submit'])) {
		if (empty($_POST["Uname"])) {
			$nameErr = "Name is required";
		} else {
			$name = test_input($_POST["Uname"]);
    if (!preg_match("/^[a-zA-Z_]*$/",$name)) {
      $nameErr = "Only letters and Underscores allowed"; 
    }
  }
  
  if (empty($_POST["mail"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["mail"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email"; 
    }
  } 
if(!empty($_POST["pwd"]) && ($_POST["pwd"] == $_POST["cnfpwd"])) {
    $password = test_input($_POST["pwd"]);
    $cpassword = test_input($_POST["cnfpwd"]);
    if (strlen($_POST["pwd"]) < '8') {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
}
elseif(!empty($_POST["pwd"])) {
    $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
} else {
     $passwordErr = "Please enter password ";
}
if($nameErr=="" && $emailErr=="" && $passwordErr=="" && $cpasswordErr==""){
$ins="INSERT INTO users(user_id,pwd,email) VALUES ('$name','$password','$email')";
$connection->query($ins);
echo '<script>';
echo 'alert("';
echo 'Registered Successfully';
echo '");';
echo '</script>';
$name = $email = $password ="";
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
	<form action="auth.php" method="POST">
	<div class="login-wrap">
		
		<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="name">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" name="pwd" data-type="password">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
			</div>
	</form>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" name="Uname" type="text" class="input" value="<?php echo $name;?>"><p style="color:red"><?php echo $nameErr;?></p>
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" name="pwd" class="input" data-type="password" value="<?php echo $password;?>"><p style="color:red"><?php echo $passwordErr;?></p>
				</div>
				<div class="group">
					<label for="cnfpass" class="label">Repeat Password</label>
					<input id="cnfpass" name="cnfpwd" type="password" class="input" data-type="password" onkeyup="validate();"><p style="color:red"><?php echo $cpasswordErr;?></p>
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" name="mail" type="email" class="input" value="<?php echo $email;?>"><p style="color:red"><?php echo $emailErr;?></p>
				</div>
				<div class="group">
					<input type="submit" name='submit' class="button" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
					<h3 style="color:white"><a href="index.html">Home</a></h3>
				</div>
			</div>
		</div>
	</div>
</div>
	</form>
	</body>
</html>