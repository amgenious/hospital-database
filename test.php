<?php 
session_start();
include("config.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Getting Information
        $PatientUniqueNumber = $_POST['PatientUniqueNumber'];
        $TestName = $_POST['TestName'];
        $Date_Time = $_POST['Date&Time'];
        $Results = $_POST['Results'];
        $Recommendations = $_POST['Recommendations'];
 
		if(!empty($PatientUniqueNumber) && !is_numeric($PatientUniqueNumber))
		{

			//save to database
			$query = "insert into `test` (PatientUniqueNumber, TestName, `Date&Time`, Results, Recommendations) values ('$PatientUniqueNumber','$TestName','$Date_Time','$Results','$Recommendations')";

			mysqli_query($conn, $query);

            echo "Test Records Submitted Successfully";
			die;
		}else
		{
			echo "Error in the codes";
		}
	}
?>