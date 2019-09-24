<?php
		session_start();
		require_once "config.php";
		if(!isset($_SESSION["user_name"])){
        header('Location:Signup.php');
		}
		else{
			$name=$_SESSION['user_name'];
		$data="SELECT * FROM blogs WHERE user_id='$name'";
		$result=$connection->query($data);
		}
?>
<!DOCTYPE HTML>

<html>
<head>
    <title>Edit||Update Blog</title>
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
			<?php while($r=$result->fetch_assoc()){?>
            <div class="card1">
                <div class="image"><img src="images/blogging.png" style="padding-top:45px"></div>
                <div class="content">
					<h5><?php $b = $r['Date'];
							$a = strtotime($b);
							echo  getdate($a)['weekday']." ";
							echo getdate($a)['mday']." ";
							echo getdate($a)['month']." ";
							echo getdate($a)['year']." "; ?>
							By <?php echo $r['user_id']?></h5>
                    <h1><a href="singleblog.php?blogHeading='<?php echo $r['heading'];?>'"><?php echo $r['heading'];?></a></h1>
                    <p><?php echo $r['content'];?></p>
					
					<a href="edit.php?heading=<?php echo $r['heading']?>&user=<?php echo $_SESSION['user_name']?>&content=<?php echo $r['content']?>"><button>EDIT</button></a>
					<a href="delete.php?heading=<?php echo $r['heading']?>&user=<?php echo $_SESSION['user_name']?>" onClick="return confirm('Are you sure you want to delete?')"><button>DELETE</button></a>
					<hr>
                </div>
            </div>
			<?php }?>
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
	<script>
		function edit(heading,content){
	document.getElementById("heading").value=heading;
    document.getElementById("content").value=content;
}
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
