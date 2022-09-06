<?php 
session_start();
include("config.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Getting Information
        $PatientUniqueNumber = $_POST['PatientUniqueNumber'];
        $FullName = $_POST['FullName'];
        $TotalCost = $_POST['TotalCost'];
 
		if(!empty($PatientUniqueNumber) && !is_numeric($PatientUniqueNumber))
		{

			//save to database
			$query = "insert into cost (PatientUniqueNumber, FullName, TotalCost) values ('$PatientUniqueNumber','$FullName','$TotalCost')";

			mysqli_query($conn, $query);

            echo "Cost Records Submitted Successfully";
			die;
		}else
		{
			echo "Error in the codes";
		}
	}
?>