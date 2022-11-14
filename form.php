?php
include ('db_connection.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form </title>
</head>
<body>

	<div class="container">
		<form action="#" method="POST" enctype="multipart/form-data">
		<div class="title">
			<mark>Registration Form</mark>
		</div>

		<div class="form">

			<div class="input_field">
			<label>Upload Image</label>
			<input type="file" name="uploadfile" style=" width: 100%;">
		</div>


		<div class="input_field">
			<label>First Name</label>
			<input type="text" class="input" name="fname" required>
		</div>

		<div class="input_field">
			<label>Last Name</label>
			<input type="text" class="input" name="lname" required>
		</div>

		<div class="input_field">
			<label>Password</label>
			<input type="Password" class="input" name="password" required>
		</div>

		<div class="input_field">
			<label>Confirm Password</label>
			<input type="Password" class="input" name="conpassword" required>
		</div>

		<div class="input_field">
			<label>Gender</label>
			<div  class="custom_select">
			<select name="gender" required>
				<!-- <option value="not_selected">Select</option> -->
				<option value="">Select</option>

				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option value="TransGender">TransGender</option>

			</select>
			</div>
		</div>

		<div class="input_field">
			<label>Email</label>
			<input type="text" class="input" name="email" required>
		</div>

		<div class="input_field">
			<label>Phone</label>
			<input type="text" class="input" name="phone" required>
		</div>

		<div class="input_field">
			<label style="margin-right: 95px;">Caste</label>
			<input type="radio"  name="radio" value="General" required><label style="margin-left: 5px;">General</label>
			<input type="radio"  name="radio" value="OBC" required><label style="margin-left: 5px;">OBC</label>
			<input type="radio"  name="radio" value="SC" required><label style="margin-left: 5px;">SC</label>
			<input type="radio"  name="radio" value="ST" required><label style="margin-left: 5px;">ST</label>
		</div>

		<div class="input_field">
			<label style="margin-right: 70px;">Language</label>
			<input type="checkbox"  name="language[]" value="English"><label style="margin-left: 5px;">English</label>
			<input type="checkbox"  name="language[]" value="Hindi"><label style="margin-left: 5px;">Hindi</label>
			<input type="checkbox"  name="language[]" value="Urdu"><label style="margin-left: 5px;">Urdu</label>
			
		</div>

		<div class="input_field">
			<label>Address</label>
			<textarea class="textarea" name="address" required></textarea>
		</div>

		<div class="input_field terms">
			<label class="check">
				<input type="checkbox" required>
				<span class="checkmark"></span>	
			</label>
			<p>Agree to terms and conditions</p>
		</div>

		<div class="input_field">
			<input type="submit" value="Register" class="btn" name="register">
		</div>


	</div>
	</form>

</div>

</body>
</html>

          <?php 
         if($_POST['register'])
         {


         	
			$filename = $_FILES["uploadfile"]["name"];
			$tempname = $_FILES["uploadfile"]["tmp_name"];
			$folder = "images/".$filename;
			move_uploaded_file($tempname, $folder);






         	$fname   = $_POST['fname'];
         	$lname   = $_POST['lname'];
         	$pwd     = $_POST['password'];
         	$cpwd    = $_POST['conpassword'];
         	$gender  = $_POST['gender'];
         	$email   = $_POST['email'];
         	$phone   = $_POST['phone'];
         	$caste   = $_POST['radio'];
         	$lang   = $_POST['language'];
         	$lang1 = implode(",",$lang);    //that is use for array convert into strings//
         	$address = $_POST['address'];


         	// if($fname != "" && $lname != "" && $pwd != "" && $cpwd != "" && $gender != "" && $email != "" && $phone != "" && $address !="")
             
             //here we use form validation for if the user not fill form fully//
        // {

         $query = "INSERT INTO FORM (std_image,fname,lname,password,cpassword,gender,email,phone,caste,language,address) values('$folder','$fname','$lname','$pwd','$cpwd','$gender','$email','$phone','$caste','$lang1','$address')";
         $data = mysqli_query($conn,$query);
         if($data)
         {
           echo "<script> alert('Data inserted into database successfully')</script>";
         }
         else
         {
         	echo "Data inserted failed!";
         }




     }
        // else
        // {
        	// echo "please fill the form first then click Register!";
        	// echo "<script>alert('Fill the form first');</script>";
        // }

       // }
         ?>