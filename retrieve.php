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
    <form method="post" action="reveal_patient.php">
        <input type="text" name="PatientUniqueNumber" placeholder="Patient's Unique Number" required>
        <button type="submit">Reveal</button>
    </form>
<br>    
<p>TO REVEAL DOCTOR'S DETAILS</p>
<br>
    <form method="post" action="#">
        <input type="text" name="DocUniqueNumber" placeholder=" Doctor's Unique Number" required>
        <button type="submit">Reveal</button>
    </form>

<?php 

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
            if ($result->num_rows > 0 and $result1->num_rows ){
                //Output the data
                while($row = $result->fetch_assoc()and $row1 = $result1->fetch_assoc()){
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
?>
</body>
</html>