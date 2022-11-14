<?php 
 include ("db_connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Display 2</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <style type="text/css">
    tr:nth-child(even){
      background-color: deepskyblue;
    }
  </style>
    <!-- Here we Add fontawesome -->
    <script src="https://kit.fontawesome.com/f3e8fc9f1d.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="btn btn-primary my-5 mx-5"><a href="user.php" class="text-light">Add user</a></div>
           <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">FName</th>
      <th scope="col">LName</th>
      <th scope="col">Password</th>
      <th scope="col">CPassword</th>
      <th scope="col">Gender</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th> 
      <th scope="col">Language</th>
      <th scope="col">Address</th>
      <th scope="col">Operations</th>



    </tr>
  </thead>
  <tbody>
  	<?php 
  	include'db_connection.php';
  	$sql= "select * from form";
  	$result=mysqli_query($conn,$sql);
  	if($result){
  		
  		while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
  			$fname=$row['fname'];
  			$lname=$row['lname'];
  			$password=$row['password'];
  			$cpassword=$row['cpassword'];
        $gender=$row['gender'];
        $email=$row['email'];
        $phone=$row['phone'];
        $language=$row['language'];
        $address=$row['address'];


        
  			echo '<tr>
      <td>'.$id.'</td>
      <td>'.$fname.'</td>
      <td>'.$lname.'</td>
      <td>'.$password.'</td>
      <td>'.$cpassword.'</td>
      <td>'.$gender.'</td>
      <td>'.$email.'</td>
      <td>'.$phone.'</td>
      <td>'.$language.'</td>
      <td>'.$address.'</td>

      
       <td>
  	<button class="btn btn-primary"><a href="updateform_data.php?id='.$id.'" class="text-light">Update</a></button>
  	<button class="btn btn-danger"><a href="delete.php?id='.$id.'" class="text-light">Delete</a></button>

  </td>

    </tr>';
  		}
  		

  	}
  	?>
 
  </tbody>
</table>
  </body>
</html>


