<?php 
session_start();

	include("config.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Getting Information
        $FullName = $_POST['FullName'];
        $PatientUniqueNumber = $_POST['PatientUniqueNumber'];
        $Age = $_POST['Age'];
        $Gender = $_POST['Gender'];
        $Phone_No = $_POST['Phone_No'];
        $Location = $_POST['Location'];
 
		if(!empty($FullName) && !empty($PatientUniqueNumber) && !is_numeric($PatientUniqueNumber))
		{

			//save to database
			$query = "insert into patients (FullName,PatientUniqueNumber,Age,Gender,Phone_No,Location) values ('$FullName','$PatientUniqueNumber','$Age','$Gender','$Phone_No','$Location')";

			mysqli_query($conn, $query);

            echo "Personal Information Submitted Successfully";
			die;
		}else
		{
			echo "Error in the codes";
		}
	}
?>

