<?php 
session_start();

	include("config.php");

?>

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

 <style>


 </style>   
</head>
<body>
    <a href="index.php">Home</a>
    <div class="container">
        <div class="row">
        <div class="dropdown">
  
            <div class="col-md-12" style="text-align:center; display:flex; flex-direction:column; justify-content:space around;">
                <h1> AmGenious Hospital Database System</h1>
                <br>
                <p>Patient's Form</p>
                <br>
                <h2>TO ADD PATIENT</h2>
                <br>
                <div>
<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">PERSONAL INFORAMTION</button>
  <form class="dropdown-menu p-4" method="post" action="add_patient.php">
  <p>Personal Information</p>
    <div class="mb-3">
      <label for="exampleDropdownFormEmail2" class="form-label"></label>
      <input name="FullName" type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="fullname" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="PatientUniqueNumber" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Patient's Unique Number" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="Age" type="number" class="form-control" id="exampleDropdownFormPassword2" placeholder="Age" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="Gender" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Gender" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="Phone_No" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Patient's Phone Number" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="Location" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Location" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<br>
<div>
<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">MEDICAL INFORMATION</button>
  <form class="dropdown-menu p-4" method="post" action="#">
  <p>Medical Information</p>
    <div class="mb-3">
      <label for="exampleDropdownFormEmail2" class="form-label"></label>
      <input name="PatientUniqueNumber" type="text" class="form-control" id="" placeholder="Patient's Unique Number" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="DocUniquenNumber" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Doctor's Unique Number" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="Illness" type="number" class="form-control" id="exampleDropdownFormPassword2" placeholder="Illness" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="Admitted" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Admitted to Ward. Yes/No" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="RoomNumber" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Ward Number" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="Tests" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Was tests conducted? Yes/No" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<br>
<?php 
 include("config.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Getting Information
        $PatientUniqueNumber = $_POST['PatientUniqueNumber'];
        $DocUniqueNumber = $_POST['DocUniqueNumber'];
        $Illness = $_POST['Illness'];
        $Admitted = $_POST['Admitted'];
        $RoomNumber = $_POST['RoomNumber'];
        $Tests = $_POST['Tests'];
 
		if(!empty($PatientUniqueNumber) && !is_numeric($PatientUniqueNumber))
		{

			//save to database
			$query = "insert into `patients-doctors` (PatientUniqueNumber, DocUniqueNumber, Illness, Admitted, RoomNumber, Tests) values ('$PatientUniqueNumber','$DocUniqueNumber','$Illness','$Admitted','$RoomNumber','$Tests')";

			mysqli_query($conn, $query);

            echo "Medical Records Submitted Successfully";
			die;
		}else
		{
			echo "Error in the codes";
		}
	}
?>
<div>
<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">TEST RECORDS</button>
  <form class="dropdown-menu p-4" method="post" action="test.php">
  <p>Test Records</p>
    <div class="mb-3">
      <label for="exampleDropdownFormEmail2" class="form-label"></label>
      <input name="PatientUniqueNumber" type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Patient's Unique Number" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="TestName" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Name of test" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="Date" type="date" class="form-control" id="exampleDropdownFormPassword2" placeholder="Name of test" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="Results" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Results. Either Positive/Negative" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="Recommendations" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Recommedations" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<br>
<div>
<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">COST RECORDS</button>
  <form class="dropdown-menu p-4" method="post" action="cost.php">
  <p>Cost Records</p>
    <div class="mb-3">
      <label for="exampleDropdownFormEmail2" class="form-label"></label>
      <input name="PatientUniqueNumber" type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Patient's Unique Number" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="FullName" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Patient's Unique Number" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="TotalCost" type="number" class="form-control" id="exampleDropdownFormPassword2" placeholder="Patient's Total Cost" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<br>
<div>


                <!-- <p>TO DELETE PATIENT</p>
                <br>
                <form method="post" action="delete_patient.php">
                    <input  name="PatientUniqueNumber" type="text" placeholder="Patient's Unique Number" required>
                    <button type="submit">Delete</button>
                </form>
                <br> -->
                <!-- <br>
                <p>TO EDIT PATIENT</p>
                <form method="post" action="update_patient.php">
                    <div style="display: flex; flex-direction:column;align-items: center;">
                    <input name="FullName" type="text" placeholder="fullname" required>
                    <input name="UniqueNumber" type="text" placeholder="Unique Number" required>
                    <input name="Age" type="number" placeholder="age" required>
                    <input name="Gender" type="text" placeholder="gender" required>
                    <input name="Phone_No" type="text" placeholder="tel number" required>
                    <input name="Location" type="text" placeholder="location" required>
                    <button type="submit">Update</button>
                </div>
                </form>
                <br>
                <br>
                <p>Doctors Form</p>
                <br>
                <p>TO ADD DOCTOR</p>
                <form method="post" action="add_doctor.php">
                    <div style="display: flex; flex-direction:column;align-items: center;">
                    <input name="FullName" type="text" placeholder="fullname" required>
                    <input name="UniqueNumber" type="text" placeholder="Unique Number" required>
                    <input name="Gender" type="text" placeholder="gender" required>
                    <input name="Phone_No" type="text" placeholder="tel number" required>
                    <button type="submit">Submit</button>
                </div>
                </form>
                <br>
                <p>TO EDIT DOCTOR</p>
                <form method="post" action="update_doctor.php">
                    <div style="display: flex; flex-direction:column;align-items: center;">
                    <input name="FullName" type="text" placeholder="fullname" required>
                    <input name="UniqueNumber" type="text" placeholder="Unique Number" required>
                    <input name="Gender" type="text" placeholder="gender" required>
                    <input name="Phone_No" type="text" placeholder="tel number" required>
                    <button type="submit">Update</button>
                </div>
                </form>
                <br>
                <p>TO DELETE DOCTOR</p>
                <br>
                <form method="post" action="delete_doctor.php">
                    <input type="text" name="UniqueNumber" placeholder="Unique Number" required>
                    <button type="submit">Delete</button>
                </form> -->
            </div>
        </div>
    </div>
    
</body>
</html>