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
    <a href="doctor.php">Doctor</a>
    <div class="container">
        <div class="row">
        <div class="dropdown">
  
            <div class="col-md-12" style="text-align:center; display:flex; flex-direction:column; justify-content:space around;">
                <h1> A Hospital Database System</h1>
                <br>
                <p>Patient's Form</p>
<!-- THIS CODE IS TO ADD PATIENT'S PERSONAL,MEDICAL,TEST,  DELETE AND COST RECORDS -->
                <br>
                <h2>TO ADD PATIENT</h2>
                <br>
                <div>
<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">PERSONAL INFORAMTION</button>
  <form class="dropdown-menu p-4" method="post">
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
    <button type="submit" name="button1" value="button1" class="btn btn-primary">Submit</button>
  </form>
</div>
<br>
<?php 
if (array_key_exists('button1',$_POST)){
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
}
?>

<br>
<div>
<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">MEDICAL INFORMATION</button>
  <form class="dropdown-menu p-4" method="post">
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
    <button type="submit" name="button2" value="button2" class="btn btn-primary">Submit</button>
  </form>
</div>
<br>
<?php 
if(array_key_exists('button2',$_POST)){
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
}
?>
<br>
<div>
<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">TEST RECORDS</button>
  <form class="dropdown-menu p-4" method="post">
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
    <button type="submit" name="button3" value="button3" class="btn btn-primary">Submit</button>
  </form>
</div>
<br>
<?php 
if(array_key_exists('button3',$_POST)){
include("config.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Getting Information
        $PatientUniqueNumber = $_POST['PatientUniqueNumber'];
        $TestName = $_POST['TestName'];
        $Date = $_POST['Date'];
        $Results = $_POST['Results'];
        $Recommendations = $_POST['Recommendations'];
 
		if(!empty($PatientUniqueNumber) && !is_numeric($PatientUniqueNumber))
		{

			//save to database
			$query = "insert into `test` (PatientUniqueNumber, TestName, `Date`, Results, Recommendations) values ('$PatientUniqueNumber','$TestName','$Date','$Results','$Recommendations')";

			mysqli_query($conn, $query);

            echo "Test Records Submitted Successfully";
			die;
		}else
		{
			echo "Error in the codes";
		}
	}
}
?>
<br>
<div>
<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">COST RECORDS</button>
  <form class="dropdown-menu p-4" method="post">
  <p>Cost Records</p>
    <div class="mb-3">
      <label for="exampleDropdownFormEmail2" class="form-label"></label>
      <input name="PatientUniqueNumber" type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Patient's Unique Number" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="FullName" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Patient's Full Name" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="TotalCost" type="number" class="form-control" id="exampleDropdownFormPassword2" placeholder="Patient's Total Cost" required>
    </div>
    <button type="submit" name="button4" value = "button4" class="btn btn-primary">Submit</button>
  </form>
</div>
<br>
<?php 
if(array_key_exists('button4',$_POST)){
include("config.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Getting Information
        $PatientUniqueNumber = $_POST['PatientUniqueNumber'];
        $FullName = $_POST['FullName'];
        $TotalCost = $_POST['TotalCost'];
 
		if(!empty($PatientUniqueNumber) && !is_numeric($PatientUniqueNumber))
		{

			//save to database
			$query = "insert into cost (PatientUniqueNumber, FullName, TotalCost) values ('$PatientUniqueNumber','$FullName','$TotalCost')";

			mysqli_query($conn, $query);

            echo "Cost Records Submitted Successfully";
			die;
		}else
		{
			echo "Error in the codes";
		}
	}
}
?>
<br>
<div>


<h2>TO EDIT PATIENT</h2>
                <br>
                <div>
<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">PERSONAL INFORAMTION</button>
  <form class="dropdown-menu p-4" method="post">
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
    <button type="submit" name = "button5" value="button5"  class="btn btn-primary">Update</button>
  </form>
</div>
<br>
<?php 
if(array_key_exists('button5',$_POST)){
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

			//update database
           $query= "UPDATE patients SET FullName='$FullName',PatientUniqueNumber='$PatientUniqueNumber',Age='$Age',Gender='$Gender',Phone_No='$Phone_No', Location='$Location' WHERE PatientUniqueNumber='$PatientUniqueNumber'";

			mysqli_query($conn, $query);

            echo "Records Updated Successfully";
			die;
		}else
		{
			echo "Error in the codes";
		}
	}
}
?>
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
    <button type="update" name="button6" value="button6" class="btn btn-primary">Update</button>
  </form>
</div>
<br>
<?php 
if(array_key_exists('button6',$_POST)){
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

			//update database
      $query= "UPDATE `patients-doctors` SET PatientUniqueNumber='$PatientUniqueNumber',DocUniqueNumber='$DocUniqueNumber', Illness='$Illness', Admitted='$Admitted', RoomNumber='$RoomNumber', Tests='$Tests' WHERE PatientUniqueNumber='$PatientUniqueNumber'";
			
			mysqli_query($conn, $query);

            echo "Medical Records Updated Successfully";
			die;
		}else
		{
			echo "Error in the codes";
		}
	}
}
?>
<br>
<div>
<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">TEST RECORDS</button>
  <form class="dropdown-menu p-4" method="post">
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
    <button type="sumbmit" name="button7" value="button7" class="btn btn-primary">Update</button>
  </form>
</div>
<br>
<?php 
if(array_key_exists('button7',$_POST)){
include("config.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Getting Information
        $PatientUniqueNumber = $_POST['PatientUniqueNumber'];
        $TestName = $_POST['TestName'];
        $Date = $_POST['Date&Time'];
        $Results = $_POST['Results'];
        $Recommendations = $_POST['Recommendations'];
 
		if(!empty($PatientUniqueNumber) && !is_numeric($PatientUniqueNumber))
		{

			//save to database
      $query= "UPDATE `test` SET PatientUniqueNumber='$PatientUniqueNumber',TestName='$TestName', Date='$Date', Results='$Results', Recommendations='$Recommendations' WHERE PatientUniqueNumber='$PatientUniqueNumber'";

			mysqli_query($conn, $query);

            echo "Test Records Updated Successfully";
			die;
		}else
		{
			echo "Error in the codes";
		}
	}
}
?>
<br>
<div>
<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">COST RECORDS</button>
  <form class="dropdown-menu p-4" method="post">
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
    <button type="update" name="button8" value="button8"class="btn btn-primary">Update</button>
  </form>
</div>
<br>
<?php 
if(array_key_exists('button8',$_POST)){
include("config.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Getting Information
        $PatientUniqueNumber = $_POST['PatientUniqueNumber'];
        $FullName = $_POST['FullName'];
        $TotalCost = $_POST['TotalCost'];
 
		if(!empty($PatientUniqueNumber) && !is_numeric($PatientUniqueNumber))
		{

			//update database
      $query= "UPDATE `cost` SET PatientUniqueNumber='$PatientUniqueNumber',FullName='$FullName', TotalCost='$TotalCost' WHERE PatientUniqueNumber='$PatientUniqueNumber'";

			mysqli_query($conn, $query);

            echo "Cost Records Updated Successfully";
			die;
		}else
		{
			echo "Error in the codes";
		}
	}
}
?>
<br>
<!-- <h2>TO DELETE PATIENT AND RECORDS</h2> -->
<br>
<!-- <div>
<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">DELETE PATIENT AND RECORDS</button>
  <form class="dropdown-menu p-4" method="post">
  <p>Cost Records</p>
    <div class="mb-3">
      <label for="exampleDropdownFormEmail2" class="form-label"></label>
      <input name="PatientUniqueNumber" type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="Patient's Unique Number" required>
    </div>
    <button type="submit" name="button9" value="button9" class="btn btn-primary">Delete</button>
  </form>
</div>
<br> -->
<?php 
if(array_key_exists('button9', $_POST)){
	include("config.php");


	if($_SERVER['REQUEST_METHOD'] == "POST"){
        //Getting Unique Number
        $PatientUniqueNumber = $_POST['PatientUniqueNumber'];

        if(!empty($PatientUniqueNumber)){
            //delete from database
            $query = "delete from patients where PatientUniqueNumber = '$PatientUniqueNumber'";
            $query1 = "delete from cost where PatientUniqueNumber = '$PatientUniqueNumber'";
            $query2 = "delete from `patients-doctors` where PatientUniqueNumber = '$PatientUniqueNumber'";
            $query3 = "delete from test where PatientUniqueNumber = '$PatientUniqueNumber'";

            mysqli_query($conn,$query);
            mysqli_query($conn,$query1);
            mysqli_query($conn,$query2);
            mysqli_query($conn,$query3);

            echo "Deleted Successfully";
			die;
        }else{
            echo "Delete not Successful";
        }

    }
  }
 ?> 
           
          </div>
        </div>
    </div>
    
</body>
</html>