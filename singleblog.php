<?php
		session_start();
		require_once "config.php";
		if(!isset($_SESSION["user_name"])){
        header('Location:Signup.php');
		}
		else{
		$head=$_GET['blogHeading'];
		$data="SELECT * FROM blogs where heading=$head";
		$result=$connection->query($data);
		}
?>
<!DOCTYPE HTML>

<html>
<head>
    <title><?php echo $head?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/singleblog.css" type="text/css">
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
			<li><a href="profile.php">Your Profile</a></li>
			<li><a href="modifyblog.php">Edit Your Blogs</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
    </nav>
	
	
	<!-- Personalized Content of the user-->

     <div class="card3">
            <h2>Hey <?php echo $_SESSION["user_name"]?>!!</h2>
    </div><br><br>

    <div class="row">
        <div class="leftcolumn">
			<?php while($r=$result->fetch_assoc()){?>
            <div class="card1">
                <div class="content">
					<h5><?php $b = $r['Date'];
							$a = strtotime($b);
							echo  getdate($a)['weekday']." ";
							echo getdate($a)['mday']." ";
							echo getdate($a)['month']." ";
							echo getdate($a)['year']." "; ?>
							By <?php echo $r['user_id']?></h5>
                    <h1><?php echo $r['heading'];?></h1>
                    <p><?php echo $r['content'];?></p>
                </div>
            </div>
			<?php }?>
        </div>

        <div class="rightcolumn">
            <div class="card2">
				<?php
				$name=$_SESSION['user_name'];
				$otherBlogs="SELECT * FROM blogs WHERE user_id!='$name'";
				$s=$connection->query($otherBlogs);
				?>
				<h3>Other users Blog</h3>
				<hr>
				<?php
				while($blogs=$s->fetch_assoc()){
				?>
				<h5><a href="singleblog.php?blogHeading='<?php echo $blogs['heading'];?>'"><?php echo $blogs['heading']?></a></h5>
				By <?php echo $blogs['user_id'];?><hr>
				<?php }?>
			</div>
        </div>
    </div>
<?php
	$res="SELECT * FROM comments WHERE heading=$head";
	$data=$connection->query($res);
?>
<?php while($single=$data->fetch_assoc()){?>
<div style="padding:10px;">
	<hr>
	<h5><?php $b = $single['time'];
		$a = strtotime($b);
		echo getdate($a)['mday']." ";
		echo getdate($a)['month']." ";
		echo getdate($a)['year']." ";
		echo getdate($a)['hours'].":";
		echo getdate($a)['minutes'];?>
		By <?php echo $single['commented_by'];?></h5>
	<p><?php echo $single['comment'];?></p>
	
</div>
<?php }?>
			<div class="blog">
				<div class="inner2">
					<form action="PostComment.php?blogHeading=<?php echo $head?>" method="POST">
					<label for="content">Comment</label>
					<textarea name="contentText" id="content" placeholder="Comment" style="padding:0 20px;" cols="50" rows="7"></textarea>
					<input type="submit" value="POST COMMENT" style="margin-top:10px">
					</form>
				</div>
			</div>
    <footer id="footer">
        <div class="inner">
            <h2>Contact Me</h2>

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
                &copy; CryptoCurry. Designers: <a href="mailto:kannunathani@gmail.com" style="text-decoration:none"><b>Sahil</b></a> &<a href="mailto:it1707.iiitbhopal@gmail.com" style="text-decoration:none"> <b>Prashant</b></a>. Images: <a href="https://unsplash.com">Unsplash</a>.
            </div>
        </div>
    </footer><!-- Scripts -->
    <script src="assets/js/jquery.min.js" type="text/javascript">
</script><script src="assets/js/jquery.scrolly.min.js" type="text/javascript">
</script><script src="assets/js/jquery.scrollex.min.js" type="text/javascript">
</script><script src="assets/js/skel.min.js" type="text/javascript">
</script><script src="assets/js/util.js" type="text/javascript">
</script><script src="assets/js/main.js" type="text/javascript">
</script>
</body>
</html>
