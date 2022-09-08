<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <title>Hospital Patient Database</title>
</head>
<body>

<a href="index.php">Home</a>
<br>
<br>
<p>TO REVEAL PATIENT'S DETAILS</p>
<br>
    <form method="post">
        <input type="text" name="PatientUniqueNumber" placeholder="Patient's Unique Number" required>
        <button name="button12" value="button12" type="submit">Reveal</button>
    </form>
<br> 
<?php 
session_start();
if(array_key_exists('button12',$_POST)){
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
            if ($result->num_rows > 0 or $result1->num_rows or $result2->num_rows or $result3->num_rows){
                //Output the data
                while($row = $result->fetch_assoc() or $row1 = $result1->fetch_assoc() or $row2 = $result2->fetch_assoc() or $row3 = $result3->fetch_assoc()){
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
}
?>   
<p>TO REVEAL DOCTOR'S DETAILS</p>
<br>
    <form method="post">
        <input type="text" name="DocUniqueNumber" placeholder=" Doctor's Unique Number" required>
        <button name="button13" value="button13"type="submit">Reveal</button>
    </form>

<?php 
if(array_key_exists('button13',$_POST)){
    include("config.php");
    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Getting Information
        $DocUniqueNumber = $_POST['DocUniqueNumber'];
 
		if(!empty($DocUniqueNumber) && !is_numeric($DocUniqueNumber))
		{

			//retrieve from database
           $query= "SELECT * FROM doctors WHERE DocUniqueNumber = '$DocUniqueNumber'";
           $query1 = "SELECT * FROM `patients-doctors` WHERE DocUniqueNumber = '$DocUniqueNumber'";

            $result1 = $conn->query($query1);
            $result = $conn->query($query);
            if ($result->num_rows > 0 or $result1->num_rows ){
                //Output the data
                while($row = $result->fetch_assoc() or $row1 = $result1->fetch_assoc()){
            echo "  Full Name: " . $row["FullName"].  "<br>";
            echo "  Doctor Unique Number: " . $row["DocUniqueNumber"].  "<br>";
            echo "  Gender: " . $row["Gender"].  "<br>";
            echo "  Assigned Patient Number: " . $row1["PatientUniqueNumber"].  "<br>";

        }
        }
		}else
		{
			echo "Error in the codes";
		}
	}
}
?>
</body>
</html>