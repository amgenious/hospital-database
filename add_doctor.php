<?php 
session_start();

	include("config.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Getting Information
        $FullName = $_POST['FullName'];
        $UniqueNumber = $_POST['UniqueNumber'];
        $Gender = $_POST['Gender'];
        $Phone_No = $_POST['Phone_No'];
 
		if(!empty($FullName) && !empty($UniqueNumber) && !is_numeric($UniqueNumber))
		{

			//save to database
			$query = "insert into doctors (FullName,UniqueNumber,Gender,Phone_No) values ('$FullName','$UniqueNumber','$Gender','$Phone_No')";

			mysqli_query($conn, $query);

            echo "Forms Submitted Successfully";
			die;
		}else
		{
			echo "Error in the codes";
		}
	}
?>
