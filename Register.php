<?php

include "connector.php";

if (isset($_POST['Username'])) {
	$Username = $_POST['Username'];
	$Password =($_POST['Password']);
    $error="";
if( strlen($Password) < 8 ) {
$error .= "<br>Password too short! 
";
}

if( strlen($Password) > 20 ) {
$error .= "<br>Password too long! 
";
}

if( !preg_match("#[0-9]+#", $Password) ) {
$error .= "<br>Password must include at least one number! 
";
}

if( !preg_match("#[a-z]+#", $Password) ) {
$error .= "<br>Password must include at least one letter! 
";
}

if( !preg_match("#[A-Z]+#", $Password) ) {
$error .= "<br>Password must include at least one CAPS! 
";
}

if( !preg_match("#\W+#", $Password) ) {
$error .= "<br>Password must include at least one symbol! 
";
}

if($error){
echo "Password validation failure(your choise is weak): $error";
exit(); 
}


        $sql= "INSERT INTO `users` (`Username`,`Password`) VALUES ('$Username','$Password')";
        $stmt=$conn->prepare( $sql );
		
  if( $stmt ){
            $result=$stmt->execute();

            $stmt->free_result();
            $stmt->close();
            $conn->close();
  if(!$sql ) {echo "<script> alert('Registration Failed');</script>";}else{
			echo "<script>alert('Registration Successfull');</script>";
	  header("Location: login.php");
                
            }
        }	}
?>
<!DOCTYPE html>
<html>
<head>
<link rel ="stylesheet" href ="style.css"/>
<link rel ="stylesheet" href ="login.css"/>
	<title>Registration</title>
    <style>
	body{
	background-image: url(../../../Users/ADMIN/Desktop/project/xampp/htdocs/402745074-dodge-challenger-wallpapers.jpg)
	}
	</style>
</head>
<body>		
<form class="modal-content animate" method="POST">        
		  <div class="container">
                <input type="text" name="Username" placeholder="Username" required>
		        <br>
		        <input type="Password" name="Password" id="inputPassword" placeholder="Password" required>
		        <br>
			    <button class="registerB" type="submit">Sign Up</button>
		        <button type="button" onClick="document.getElementById('id01').style.display='none'" class="cancelbtn"><a style="text-decoration:none;color:#ffffff;"  href="index.php">Cancel</a></button>
	      </div>
</form>
</body>
</html>
