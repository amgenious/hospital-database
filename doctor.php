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
    <a href="admission.php">Patient</a>
    <div class="container">
        <div class="row">
        <div class="dropdown">
  
            <div class="col-md-12" style="text-align:center; display:flex; flex-direction:column; justify-content:space around;">
                <h1> A Hospital Database System</h1>
                <br>
                <p>Doctor's Form</p>
<!-- THIS CODE IS TO ADD DOCTOR'S INFORMATION -->
                <br>
                <h2>TO ADD DOCTOR</h2>
                <br>
                <div>
<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">INFORMATION</button>
  <form class="dropdown-menu p-4" method="post">
  <p>Information</p>
    <div class="mb-3">
      <label for="exampleDropdownFormEmail2" class="form-label"></label>
      <input name="FullName" type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="fullname" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="DocUniqueNumber" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Doctor's Unique Number" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="Gender" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Gender" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="Phone_No" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Phone Number" required>
    </div>
    <button type="submit" name="button10" value="button1" class="btn btn-primary">Submit</button>
  </form>
</div>
<br>
<?php 
if (array_key_exists('button10',$_POST)){
	include("config.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Getting Information
        $FullName = $_POST['FullName'];
        $DocUniqueNumber = $_POST['DocUniqueNumber'];
        $Gender = $_POST['Gender'];
        $Phone_No = $_POST['Phone_No'];
 
		if(!empty($FullName) && !empty($DocUniqueNumber) && !is_numeric($DocUniqueNumber))
		{

			//save to database
			$query = "insert into doctors (FullName,DocUniqueNumber,Gender,Phone_No) values ('$FullName','$DocUniqueNumber','$Gender','$Phone_No')";

			mysqli_query($conn, $query);

            echo "Doctor's Information Submitted Successfully";
			die;
		}else
		{
			echo "Error in the codes";
		}
	}
}
?>
<br>
<h2>TO EDIT DOCTOR</h2>
<br>
<div>
<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside"> INFORAMATION</button>
  <form class="dropdown-menu p-4" method="post">
  <p> Information</p>
    <div class="mb-3">
      <label for="exampleDropdownFormEmail2" class="form-label"></label>
      <input name="FullName" type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="fullname" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="DocUniqueNumber" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Doctor's Unique Number" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="Gender" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Gender" required>
    </div>
    <div class="mb-3">
      <label for="exampleDropdownFormPassword2" class="form-label"></label>
      <input name="Phone_No" type="text" class="form-control" id="exampleDropdownFormPassword2" placeholder="Doctor's Phone Number" required>
    <button type="submit" name = "button11" value="button5"  class="btn btn-primary">Update</button>
  </form>
</div>
<br>
<?php 
if(array_key_exists('button11',$_POST)){
	include("config.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Getting Information
        $FullName = $_POST['FullName'];
        $DocUniqueNumber = $_POST['DocUniqueNumber'];
        $Gender = $_POST['Gender'];
        $Phone_No = $_POST['Phone_No'];
 
		if(!empty($FullName) && !empty($DocUniqueNumber) && !is_numeric($DocUniqueNumber))
		{

			//save to database
			$query= "UPDATE doctors SET FullName='$FullName',DocUniqueNumber='$DocUniqueNumber',Gender='$Gender',Phone_No='$Phone_No' WHERE DocUniqueNumber='$DocUniqueNumber'";

			mysqli_query($conn, $query);

            echo "Doctor's Forms Updated Successfully";
			die;
		}else
		{
			echo "Error in the codes";
		}
	}
}
?>
<br>