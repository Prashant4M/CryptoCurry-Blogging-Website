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
		$data1="SELECT COUNT(heading) FROM blogs GROUP BY user_id HAVING user_id='$name'";
		$result1=$connection->query($data1);
		}
?>
<!DOCTYPE HTML>

<html>
<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/profile.css" type="text/css">
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
	<div>
		<?php if(!empty($r['ImagePath'])){ ?>
  <img src="<?php echo $r['ImagePath']?>" alt="Image Not available" style="width:100%">
	<?php }
	 else{?>
		<div style="background-color:grey;width:100%;"></div>
	<?php }?>
  </div>
	<p style="color:black">Name</p>
  <p style="margin-top:-20px"><strong style="color:black"><?php echo $r['user_id']?></strong></p>
   <p>Email</p>
	<p style="margin-top:-20px"><strong style="color:black"><?php echo $r['email']?></strong></p>
	
	<?php }?>
	<?php
		while($r1=$result1->fetch_assoc()){
	?>
	<p>No. of Blogs Posted</p>
	<p style="margin-top:-20px"><strong style="color:black"><?php echo $r1['COUNT(heading)']?></strong></p>
	<?php }?>
  <a href="#"><i class="fa fa-dribbble"></i></a> 
  <a href="#"><i class="fa fa-twitter"></i></a> 
  <a href="#"><i class="fa fa-linkedin"></i></a> 
<a href="#"><i class="fa fa-facebook"></i></a> 
	<a href="editprofile.php"><p><button>EDIT PROFILE</button></p></a>
</div>

	
    <footer id="footer">
        <div class="inner">
            <h2>Contact Us</h2>

            <form action="feedback.php" method="post">
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
    </footer>
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
