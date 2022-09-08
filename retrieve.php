<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <title>Hospital Patient Database</title>
</head>
<body>

<a href="index.php">Home</a>
<br>
<br>
<div style="text-align:center; display:flex; flex-direction:column; justify-content:space around;">
<h1> A Hospital Database System</h1>
<br>
<p>TO REVEAL PATIENT'S DETAILS</p>
<br>
<div>
<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">PATIENT'S INFORMATION</button>
  <form class="dropdown-menu p-4" method="post">
  <p>Information</p>
    <div class="mb-3">
      <label for="exampleDropdownFormEmail2" class="form-label"></label>
      <input name="PatientUniqueNumber" type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Patient's Unique Number" required>
    </div>
        <button name="button12" value="button12" type="submit" class="btn btn-primary">Reveal</button>
    </form>
</div>  
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
}
?>   
<p>TO REVEAL DOCTOR'S DETAILS</p>
<br>
<div>
<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">DOCTOR'S INFORMATION</button>
  <form class="dropdown-menu p-4" method="post">
  <p>Doctor's Information</p>
    <div class="mb-3">
      <label for="exampleDropdownFormEmail2" class="form-label"></label>
      <input name="DocUniqueNumber" type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder=" Doctor's Unique Number" required>
    </div>
        <button name="button13" value="button13" type="submit" class="btn btn-primary">Reveal</button>
    </form>
</div>
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
            if ($result->num_rows > 0 and $result1->num_rows ){
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