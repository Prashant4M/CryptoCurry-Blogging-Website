<?php
		session_start();
		require_once "config.php";
		if(!isset($_SESSION["user_name"])){
        header('Location:Signup.php');
		}
		else{
			$name=$_SESSION['user_name'];
		$data="SELECT * FROM users WHERE user_id='$name'";
		$result=$connection->query($data);
		}
?>
<!DOCTYPE HTML>

<html>
<head>
    <title>Make Changes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/makechanges.css" type="text/css">
	<link rel="stylesheet" href="assets/css/main.css" type="text/css">
</head>

<body class="subpage" style="background-color:white">
    <!-- Header -->

    <header id="header" class="alt">
        <div class="logo">
            <a href="Blog.php">Home</a>
        </div><a href="#menu"><span>Menu</span></a>
    </header><!-- Nav -->

    <nav id="menu">
        <ul class="links">
						<li><a href="profile.php">Your Profile</a></li>
			<li><a href="modifyblog.php">Edit Your Blogs</a></li>
			<li><a href="logout.php">Logout</a></li>
		
		</ul>
    </nav>
	
	
	<!-- Personalized Content of the user-->

	<?php
		while($r=$result->fetch_assoc()){
	?>
<div class="card">
   <form action="commitchanges.php" method="POST" enctype="multipart/form-data">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" value="<?php echo $r['user_id'];?>">
			<label for="mail">Email</label>
			<input type="email" name="mail" id="mail" value="<?php echo $r['email'];?>">
			<label for="pwd">Password</label>
			<input type="password" name="pwd" id="pwd" value="<?php echo $r['pwd'];?>">
			<div style="padding:2px;background-color: grey;border-radius:15px;margin-top:10px;cursor:pointer;width:180px;height:35px;margin-left: 50px;">
			<label for="pic" style="color:white;margin-left:10px;cursor:pointer">CHOOSE PICTURE</label>
			</div>
			<input type="file" name="pic" id="pic" style="margin-left:50px;visibility:hidden;">
			<input type="submit" value="COMMIT CHANGES" style="margin-left:-180px">
	 </form>
<?php }?>

  <!--  <footer id="footer">
        <div class="inner">
            <h2>Contact Us</h2>

            <form action="#" method="post">
                <div class="field half first">
                    <label for="name">Name</label> <input name="name" id="name" type="text" placeholder="Name">
                </div>

                <div class="field half">
                    <label for="email">Email</label> <input name="email" id="email" type="email" placeholder="Email">
                </div>

                <div class="field">
                    <label for="message">Message</label> 
                    <textarea name="message" id="message" rows="6" placeholder="Message">
</textarea>
                </div>

                <ul class="actions">
                    <li><input value="Send Message" class="button alt" type="submit"></li>
                </ul>
            </form>

            <ul class="icons">
                <li><a href="#" class="icon round fa-twitter"><span class="label">Twitter</span></a></li>

                <li><a href="#" class="icon round fa-facebook"><span class="label">Facebook</span></a></li>

                <li><a href="#" class="icon round fa-instagram"><span class="label">Instagram</span></a></li>
            </ul>

            <div class="copyright">
                &copy; CryptoCurry. Designers: <a href="mailto:kannunathani@gmail.com" style="text-decoration:none"><b>Sahil</b> &</a><a href="mailto:it1707.iiitbhopal@gmail.com" style="text-decoration:none"> <b>Prashant</b></a>. Images: <a href="https://unsplash.com">Unsplash</a>.
            </div>
        </div>
    </footer>-->
	<!-- Scripts -->
    <script src="assets/js/jquery.min.js" type="text/javascript">
</script><script src="assets/js/jquery.scrolly.min.js" type="text/javascript">
</script><script src="assets/js/jquery.scrollex.min.js" type="text/javascript">
</script><script src="assets/js/skel.min.js" type="text/javascript">
</script><script src="assets/js/util.js" type="text/javascript">
</script><script src="assets/js/main.js" type="text/javascript">
</script>
</body>
</html>
