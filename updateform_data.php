<?php 
session_start();
echo "welcome".$_SESSION['user_name'];
?>
<?php
include ('db_connection.php');
 
$id= $_GET['id'];

$query ="SELECT * FROM FORM WHERE id='$id'";
$data = mysqli_query($conn, $query);


$result = mysqli_fetch_assoc($data);

$language = $result['language'];
$language1 = explode(",", $language);   //that fn is use for strings convert into array//

 $userprofile = $_SESSION['user_name'];
         if($userprofile == true)
         {
  
         }
         else
         {
         	header('location:login.php');
         }

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>update form data</title>
</head>
<body>

	<div class="container">
		<form action="#" method="POST">
		<div class="title">
			 <mark>Update Student Details</mark>
		</div>

		<div class="form">
		<div class="input_field">
			<label>First Name</label>
			<input type="text" value="<?php echo $result['fname']; ?>" class="input" name="fname" required>
		</div>

		<div class="input_field">
			<label>Last Name</label>
			<input type="text" value="<?php echo $result['lname']; ?>" class="input" name="lname" required>
		</div>

		<div class="input_field">
			<label>Password</label>
			<input type="Password" value="<?php echo $result['password']; ?>" class="input" name="password" required>
		</div>

		<div class="input_field">
			<label>Confirm Password</label>
			<input type="Password" value="<?php echo $result['cpassword']; ?>" class="input" name="conpassword" required>
		</div>

		<div class="input_field">
			<label>Gender</label>
			<div  class="custom_select">
			<select name="gender" required>
				<!-- <option value="not_selected">Select</option> -->
				<option value="">Select</option>

				<option value="Male"
					<?php 
					if($result['gender'] == 'Male')
					{
						echo "selected";
					}
					?>
				>
				Male</option>
				<option value="Female"
					<?php 
					if($result['gender'] == 'Female')
					{
						echo "selected";
					}
					?>
				>
				Female</option>
				<option value="TransGender"
					<?php 
					if($result['gender'] == 'TransGender')
					{
						echo "selected";
					}
					?>
				>
				TransGender</option>

			</select>
			</div>
		</div>

		<div class="input_field">
			<label>Email</label>
			<input type="text" value="<?php echo $result['email']; ?>" class="input" name="email" required>
		</div>

		<div class="input_field">
			<label>Phone</label>
			<input type="text" value="<?php echo $result['phone']; ?>" class="input" name="phone" required>
		</div>

		<div class="input_field">
			<label style="margin-right: 95px;">Caste</label>


			<input type="radio"  name="radio" value="General" required

				 
            <?php  
              if($result['caste'] == "General")
              {
              	echo "checked";
              }
            ?>
			>
			<label style="margin-left: 5px;">General</label>


			<input type="radio"  name="radio" value="OBC" required
				<?php  
              if($result['caste'] == "OBC")
              {
              	echo "checked";
              }
            ?>
			>
			<label style="margin-left: 5px;">OBC</label>


			<input type="radio"  name="radio" value="SC" required

 				<?php  
              if($result['caste'] == "SC")
              {
              	echo "checked";
              }
            ?>
			>
			<label style="margin-left: 5px;">SC</label>


			<input type="radio"  name="radio" value="ST" required

				<?php  
              if($result['caste'] == "ST")
              {
              	echo "checked";
              }
            ?>
			>
			<label style="margin-left: 5px;">ST</label>


		</div>


		<div class="input_field">
			<label style="margin-right: 70px;">Language</label>


			<input type="checkbox"  name="language[]" value="English"
				<?php 
			if(in_array('English',$language1))
			{
				echo "checked";
			}

			?>
			>
		
			<label style="margin-left: 5px;">English</label>


			<input type="checkbox"  name="language[]" value="Hindi"
			<?php 
			if(in_array('Hindi',$language1))
			{
				echo "checked";
			}
			?>
			>
			<label style="margin-left: 5px;">Hindi</label>


			<input type="checkbox"  name="language[]" value="Urdu"
			<?php 
			if(in_array('Urdu',$language1))
			{
				echo "checked";
			}
			?>
			>
			
			<label style="margin-left: 5px;">Urdu</label>

			
		</div>

		<div class="input_field">
			<label>Address</label>
			<textarea class="textarea" name="address" required>
				<?php
				 echo $result['address'];
				 ?>
			</textarea>
		</div>

		<div class="input_field terms">
			<label class="check">
				<input type="checkbox" required>
				<span class="checkmark"></span>	
			</label>
			<p>Agree to terms and conditions</p>
		</div>

		<div class="input_field">
			<input type="submit" value="Update" class="btn" name="update">
		</div>


	</div>
	</form>

</div>

</body>
</html>

          <?php 


       
         



         if($_POST['update'])
         {
         	$fname   = $_POST['fname'];
         	$lname   = $_POST['lname'];
         	$pwd     = $_POST['password'];
         	$cpwd    = $_POST['conpassword'];
         	$gender  = $_POST['gender'];
         	$email   = $_POST['email'];
         	$phone   = $_POST['phone'];
         	$caste   = $_POST['radio'];
         	$lang = $_POST['language'];
         	$lang1 = implode(",",$lang);
         	$address = $_POST['address'];

         	// if($fname != "" && $lname != "" && $pwd != "" && $cpwd != "" && $gender != "" && $email != "" && $phone != "" && $address !="")
             
             //here we use form validation for if the user not fill form fully//
        // {

         // $query = "INSERT INTO FORM (fname,lname,password,cpassword,gender,email,phone,address) values('$fname','$lname','$pwd','$cpwd','$gender','$email','$phone','$address')";

         	$query = "UPDATE form SET fname='$fname',lname='$lname',password='$pwd',cpassword='$cpwd',gender='$gender',email='$email',phone='$phone',caste='$caste',language='$lang1',address='$address' WHERE id=$id";


         $data = mysqli_query($conn,$query);

         if($data)
         {
           echo "<script>alert('Record Updated Sucessfully')</script>";
           ?>


            <meta http-equiv = "refresh" content = "0 ; url =http://localhost/crud/display.php" />


           <?php 
         }
         else
         {
         	echo "Record Update failed!";
         }
          

        }

          
        // else
        // {
        	// echo "please fill the form first then click Register!";
        	// echo "<script>alert('Fill the form first');</script>";
        // }

       // }



         ?>