<?php 

error_reporting(0);    // error_reporting() is use for removing error on screen not warning//
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "learn_crud";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if($conn)
    {
    	// echo "mysqli_connect successfully";
    }
    else
    {
    	echo "mysqli_connect unsuccesful".mysqli_connect_error();      

    	// mysqli_connect_error() is help us to show  error on screen// 
    }
?>