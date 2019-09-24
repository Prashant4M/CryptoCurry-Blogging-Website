<?php
		session_start();
		require_once "config.php";
		if(!isset($_SESSION["user_name"])){
        header('Location:Signup.php');
		}
?>
<?php
	if(isset($_POST['update'])){
		$oldheading=$_GET['heading'];
		$oldcontent=$_GET['content'];
		$newHeading=$_POST['headingText'];
		$newContent=$_POST['contentText'];
		$update="UPDATE blogs SET heading='$newHeading',content='$newContent',Date=now() WHERE heading='$oldheading' AND content='$oldcontent'";
		if($connection->query($update)){
			echo '<script>alert("Updated Successfully");window.location.href="Blog.php";</script>';
		}
		else{
			echo '<br/><a href="javascript:self.history.back();">Go Back</a>';
		}
	}
?>
<!DOCTYPE HTML>

<html>
<head>
    <title>Edit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/modifyblog.css" type="text/css">
</head>

<body class="subpage">
    <!-- Header -->

    <header id="header" class="alt">
        <div class="logo">
            <a href="Blog.php">Home</a>
        </div><a href="#menu"><span>Menu</span></a>
    </header><!-- Nav -->

    <nav id="menu">
        <ul class="links">
			<li><a href="logout.php">Logout</a></li>
			<li><a href="profile.php">Your Profile</a></li>
			<li><a href="modifyblog.php">Edit Your Blogs</a></li>
		</ul>
    </nav>
	
	
	<!-- Personalized Content of the user-->

    <div class="card3">
            <h2>Hey <?php echo $_SESSION["user_name"]?>!!</h2>
    </div><br><br>
	<h3>Blogs to Explore</h3><hr>
    <div class="row">
        <div class="leftcolumn">
			<div id="blog">
				<div class="inner2">
					<form action="edit.php?heading=<?php echo $_GET['heading']?>&user=<?php echo $_SESSION['user_name']?>&content=<?php echo $_GET['content']?>" method="POST">
					<label for="heading">Title</label>
					<input name="headingText" type="text" value="<?php echo $_GET['heading']?>" id="heading" placeholder="Title" style="padding:0 20px;width:80%;"><br>
					<label for="content">Tell us what is it all About</label>
					<textarea name="contentText" id="content" placeholder="Content" style="padding:0 20px;" cols="50" rows="7"><?php echo $_GET['content']?></textarea>
					<input type="submit" value="SAVE CHANGES" name="update" style="margin-top:10px">
					</form>
				</div>
			</div>
        </div>
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
                &copy; CryptoCurry. Designers: <a href="mailto:kannunathani@gmail.com" style="text-decoration:none"><b>Sahil</b> &</a><a href="mailto:it1707.iiitbhopal@gmail.com" style="text-decoration:none"> <b>Prashant</b></a>. Images: <a href="https://unsplash.com">Unsplash</a>
            </div>
        </div>
    </footer>
	<!-- Scripts -->
	</script>
    <script src="assets/js/jquery.min.js" type="text/javascript">
</script><script src="assets/js/jquery.scrolly.min.js" type="text/javascript">
</script><script src="assets/js/jquery.scrollex.min.js" type="text/javascript">
</script><script src="assets/js/skel.min.js" type="text/javascript">
</script><script src="assets/js/util.js" type="text/javascript">
</script><script src="assets/js/main.js" type="text/javascript">
</script>
</body>
</html>
