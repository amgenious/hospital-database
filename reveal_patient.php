<?php 
session_start();

	include("config.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Getting Information
        $PatientUniqueNumber = $_POST['PatientUniqueNumber'];
 
		if(!empty($PatientUniqueNumber) && !is_numeric($PatientUniqueNumber))
		{

			//retrieve from database
           $query= "SELECT * FROM patients WHERE PatientUniqueNumber = '$PatientUniqueNumber'";
           $query1 = "SELECT * FROM `patients-doctors` WHERE PatientUniqueNumber = '$PatientUniqueNumber'";
           $query2 = "SELECT * FROM cost WHERE PatientUniqueNumber = '$PatientUniqueNumber'";
           $query3 = "SELECT * FROM test WHERE PatientUniqueNumber = '$PatientUniqueNumber'";

           $result3 = $conn->query($query3);
           $result2 = $conn->query($query2);
           $result1 = $conn->query($query1);
            $result = $conn->query($query);
            if ($result->num_rows > 0 and $result1->num_rows and $result2->num_rows and $result3->num_rows){
                //Output the data
                while($row = $result->fetch_assoc() and $row1 = $result1->fetch_assoc() and $row2 = $result2->fetch_assoc() and $row3 = $result3->fetch_assoc()){
            echo "  Full Name: " . $row["FullName"].  "<br>";
            echo "  Unique Number: " . $row["PatientUniqueNumber"].  "<br>";
            echo "  Age: " . $row["Age"].  "<br>";
            echo "  Gender: " . $row["Gender"].  "<br>";
            echo "  Phone Number: " . $row["Phone_No"].  "<br>";
            echo "  Location: " . $row["Location"].  "<br>";
            echo "  Assigned Doctor's Unique Number: " . $row1["DocUniqueNumber"].  "<br>";
            echo "  Illness: " . $row1["Illness"].  "<br>";
            echo "  Admitted: " . $row1["Admitted"].  "<br>";
            echo "  RoomNumber: " . $row1["RoomNumber"].  "<br>";
            echo "  Test: " . $row1["Tests"].  "<br>";
            echo "  Test Name: " . $row3["TestName"].  "<br>";
            echo "  Test Results: " . $row3["Results"].  "<br>";
            echo "  Test Recommendations: " . $row3["Recommendations"].  "<br>";
            echo "  Total Cost: " . $row2["TotalCost"].  "<br>";
        }
        }
		}else
		{
			echo "Error in the codes";
		}
	}
?>