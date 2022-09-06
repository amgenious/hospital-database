<?php 
session_start();

	include("config.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Getting Information
        $FullName = $_POST['FullName'];
        $UniqueNumber = $_POST['UniqueNumber'];
        $Age = $_POST['Age'];
        $Gender = $_POST['Gender'];
        $Phone_No = $_POST['Phone_No'];
        $Location = $_POST['Location'];
 
		if(!empty($FullName) && !empty($UniqueNumber) && !is_numeric($UniqueNumber))
		{

			//save to database
           $query= "UPDATE patients SET FullName='$FullName',UniqueNumber='$UniqueNumber',Age='$Age',Gender='$Gender',Phone_No='$Phone_No', Location='$Location' WHERE UniqueNumber='$UniqueNumber'";

			mysqli_query($conn, $query);

            echo "Records Updated Successfully";
			die;
		}else
		{
			echo "Error in the codes";
		}
	}
?>