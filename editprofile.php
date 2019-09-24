<html>
<head>
</head>
<body onload="myFunction();">
<script>
function myFunction(){
    var curpwd = prompt("Enter your current Password");
    document.getElementById("reason").value = curpwd;
   document.getElementById("form").submit();
}
</script>
<form id="form" action="matchUserCredentials.php" method="POST">
    <input type="hidden" id="reason" name="pwd">
</form>
</body>
</html>