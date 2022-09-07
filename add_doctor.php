<?php 
session_start();

	include("config.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Getting Information
        $FullName = $_POST['FullName'];
        $PatientUniqueNumber = $_POST['PatientUniqueNumber'];
        $Gender = $_POST['Gender'];
        $Phone_No = $_POST['Phone_No'];
 
		if(!empty($FullName) && !empty($PatientUniqueNumber) && !is_numeric($PatientUniqueNumber))
		{

			//save to database
			$query = "insert into doctors (FullName,PatientUniqueNumber,Gender,Phone_No) values ('$FullName','$PatientUniqueNumber','$Gender','$Phone_No')";

			mysqli_query($conn, $query);

            echo "Forms Updated Successfully";
			die;
		}else
		{
			echo "Error in the codes";
		}
	}
?>
