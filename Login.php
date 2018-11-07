<?php
include "connector.php";

session_start();
if (isset($_POST['username'])){
	
	$Username=$_POST['username'];
    $Password=$_POST['password'];
	
	$sql = "SELECT * FROM users WHERE username='$Username' AND password='$Password'";
	
	$re = mysqli_query($conn, $sql);

	if (mysqli_num_rows($re)){

	$_SESSION['username'] = $Username;
	
	echo "<br>Login Successful";}else echo "<b><br>Wrong credentials</b>";
	echo "<br> Username: ".$Username;
	
}
?>

<html>
<body >
<h1>LOGIN</h1>
<Form method="POST">
<div>
Username: 
<input placeholder="UserName" name="username" type="text" ></div><br>
<div>
Password: 
<input placeholder="Password" name="password" type="password" ></div><br>
<button type="submit">Log in</button>
</Form>

</body>
</html>
