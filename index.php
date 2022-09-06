<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <title>Hospital Patient Database</title>
<style>
    .header{
        background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(./images/th2.jpg);
        height: 100vh;
        background-size: cover;
        background-position: center;
    }

    .title{
        position: absolute;
        top: 35%;
        left: 50%;
        width: 100%;
        text-align: center;
        transform: translate(-50%,-50%);
        color: white;
        font-size: 70px;
    }

    .button{
        position: absolute;
        top: 62%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
    
    @media screen and (max-width:1227px){
        .button{
            display: flex;
            flex-direction: column;
        }
        .button .btn{
            margin-top: 10px;
            margin-bottom: 10px;
        }
    }
    @media screen and (max-width:525px){
        .title{
            top: 30%;
        }
    }
    .btn{
        border: 1px solid #fff;
        padding: 10px 30px;
        color: #fff;
        text-decoration: none;
        transition: 0.6s ease;
    }

    .btn:hover{
        background-color: #fff;
        color: #000;
    }
</style>
</head>

<body>
<div class="header">    
<h1 class="title">Welcome To A Hospital Database System.</h1>
<div class="button">
            <a href="admission.php" class="btn">Add Patient or Doctor to Database</a>
            <a href="retrieve.php" class="btn">To view the details of a patient or Doctor</a>
        </div>
    </div>        
</body>
</html>