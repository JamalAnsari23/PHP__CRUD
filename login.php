<?php 
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="login_style.css">
	<title>Login And Registration</title>
</head>
<body>
     
     <form action="#" method="POST">
	<div class="center">
		<h1><mark>Login</mark></h1>

		<div class="form">
			
			<label>Username</label>
			<br>
			<input type="text" name="username" class="textfiled" placeholder="Enter Username">
			
			<label>Password</label>
			<br>
			<input type="text" name="password" class="textfiled" placeholder="Enter Password">
			

			<div class="forgetpass"><a href="#" class="link" onclick="message()">Forget Password ?</a></div>
            <br>
			<input type="submit" name="login" class="btn" value="Login">
            <br>
			<div class="signup">New Member ? <a href="form.php" class="link">Sign Up Here ?</a></div>
			<br>
			
		</div>
	</div>
             </form>

	<script type="text/javascript">
		function message()
		{
			alert('Toh password yaad karo');
		}
	</script>

</body>
</html>

<?php 

include("db_connection.php");
if(isset($_POST['login']))
{
	$username = $_POST['username'];
	$pwd = $_POST['password'];

	$query = "SELECT * FROM form WHERE email ='$username' && password = '$pwd'";
	$data = mysqli_query($conn, $query);

	 $total = mysqli_num_rows($data);
	 if ($total == 1) 
	 {
	 	$_SESSION['user_name']=$username;
	 	header('location:display.php');
	 }
	 else
	 {
	 	echo "login failed";
	 }
	 
}

?>