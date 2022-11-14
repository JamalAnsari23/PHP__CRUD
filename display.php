<?php 
session_start();
echo "welcome".$_SESSION['user_name'];
?>
<html>
<head>
	<title>Display  </title>
	<style>
		body
		{
			background: greenyellow;
		}
		table
		{
			background: white;
		}
		.update, .delete{
			background: green;
			color: white;
			border: 0;
			outline: none;
			border-radius: 5px;
			height: 25px;
			width: 80px;
			font-weight: bold;
			cursor: pointer;
		}
		.delete{
			background: Red;
			
		}
	</style>
</head>
<?php 
include("db_connection.php");






$query = "Select * FROM form";
$data = mysqli_query($conn, $query);       // mysqli_query() is help us to execute query with two parameters   connection and query//

$total = mysqli_num_rows($data);          //mysqli_num_rows() is help us to know about how many are available in database//

$result = mysqli_fetch_assoc($data);       //mysqli_fetch_assoc() is help us to convert data into array form//

if($total != 0) 
{

	?>

	<h2 align="center"><mark>Display All Records</mark></h2>

	<center><table border="3" cellspacing="7" width="100%">
		<tr>
		<th width="4%">ID</th>
		<th width="4%">Images</th>
		<th width="8%">First Name</th>
		<th width="8%">last Name</th>
		<th width="8%">Password</th>
		<th width="8%">cpassword</th>
		<th width="8%">Gender</th>
		<th width="12">Email</th>
		<th width="10%">Phone</th>
		<th width="10%">Caste</th>
		<th width="10%">Languages</th>
		<th width="10%">Address</th>
		<th width="14%">operations</th>

	</tr>

	<?php
  
  while($result = mysqli_fetch_assoc($data))
  {
  			// $id=$result['id'];
  			// $fname=$result['fname'];
  			// $lname=$result['lname'];
  			// $password=$result['password'];
  			// $cpassword=$result['cpassword'];
     //    $gender=$result['gender'];
     //    $email=$result['email'];
     //    $phone=$result['phone'];
     //    $caste=$result['caste'];
     //    $language=$result['language'];
     //    $address=$result['address'];
  			


       echo "<tr>
    <td>".$result['id']."</td>


    <td><img src = '".$result['std_image']."' height='100px' width='100px'</td>


		<td>".$result['fname']."</td>
		<td>".$result['lname']."</td>
		<td>".$result['password']."</td>
		<td>".$result['cpassword']."</td>
		<td>".$result['gender']."</td>
		<td>".$result['email']."</td>
		<td>".$result['phone']."</td>
		<td>".$result['caste']."</td>
		<td>".$result['language']."</td>
		<td>".$result['address']."</td>
		<td>
		<a href='updateform_data.php?id=$result[id]'><input type = 'submit' value = 'Update' class ='update'></a>
		<a href='deleteform_data.php?id=$result[id]'><input type = 'submit' value = 'Delete' class ='delete' onclick = 'return checkdelete()'></a>
		</td>
	</tr>
	";
 
    }
}
else
{
  echo "No records found";
}




$userprofile = $_SESSION['user_name'];
if($userprofile == true)
{
  
}
else
{
	header('location:login.php');
}
?>
</table>
</center>

<a href="logout.php"><input type="submit" name="" value="LogOut" style="background: purple; color: white; height: 35px; width: 100px; margin-top: 25px; font-size: 18px; border: 0; border-radius: 5px; cursor: pointer;"></a>
</html>


<script>
	function checkdelete() 
	{
		return confirm('Are you sure to delete this record ?');
	}
</script>

