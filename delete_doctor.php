<?php 
session_start();

	include("config.php");


	if($_SERVER['REQUEST_METHOD'] == "POST"){
        //Getting Unique Number
        $UniqueNumber = $_POST['UniqueNumber'];

        if(!empty($UniqueNumber)){
            //delete from database
            $query = "delete from doctors where UniqueNumber = '$UniqueNumber'";
            mysqli_query($conn, $query);

            echo "Deleted Successfully";
			die;
        }else{
            echo "Delete not Successful";
        }

    }


 ?>   