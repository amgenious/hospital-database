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
           $query= "UPDATE doctors SET FullName='$FullName',UniqueNumber='$UniqueNumber',Gender='$Gender',Phone_No='$Phone_No' WHERE UniqueNumber='$UniqueNumber'";

			mysqli_query($conn, $query);

            echo "Records Updated Successfully";
			die;
		}else
		{
			echo "Error in the codes";
		}
	}
?>