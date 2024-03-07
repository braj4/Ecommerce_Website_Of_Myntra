<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: SeedX.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url(photos/imgN.jpg);
            background-size: cover;
            /* padding: 0px; */
            /* margin: 100px 450px; */
        }

        .container1 {
            /* max-width: 60px; */
            min-width: 50%;
            display: flex;
            text-align: center;
            justify-content: center;
            background-color: aliceblue;
            padding-top: 70px;
            padding-bottom: 70px;
            opacity: 0.8;
        }

        .form-control {
            margin: 10px 10px;
        }

        input {
            display: flex;
            text-align: center;
            justify-content: center;
            width: 100%;
            /* width: 400px; */
        }
        /* .btn{

        } */

        @media only screen and (max-width: 767px) {

            .container1 {
                width: 90%;
            }
        }

        @media only screen and (min-width: 1025px) {

            form {
                width: 70%;
            }
        }
        </style>
</head>

<body>
    <div class="container1">
        <form action="registration.php" method="post">
        <h1 style="text-align: center; color: red;">Registration Form</h1>
<?php
    //   print_r($_POST);
    if(isset($_POST["submit"])){     //  $_POST will fetch all the data from the input form when the submit button is clicked
        $Name=$_POST["Name"];
        $Email=$_POST["Email"];
        $Password=md5($_POST["Password"]);
        $ConfirmPassword=md5($_POST["ConfirmPassword"]);

        // $PasswordHash=password_hash($Password);  // This is to make the password encoded

        $errors=array();   // taking all the errors into the variable errors 

        if (empty($Name) OR empty($Email) OR empty($Password) OR empty($ConfirmPassword)) {
            array_push($errors,"All fields are required");
        }
        if (!filter_var($Email,FILTER_VALIDATE_EMAIL)) {
            array_push($errors,"Enter a valid email");
        }
        if (strlen($Password)<8) {
            array_push($errors,"Password must be altest 8 digits");
        }
        if ($Password!=$ConfirmPassword) {
            array_push($errors,"Password doesn't match");
        }

        require_once "database.php";                                  // Checking for duplicate emails
        $sql= "SELECT * FROM login WHERE Email = '$Email'";
        $result=mysqli_query($conn,$sql);
        $rowCount=mysqli_num_rows($result);
        if ($rowCount>0) {
            array_push($errors,"Email Already exists!!!!!");
        }

        if(count($errors)>0){
            foreach($errors as $error){
                echo "<div class='alert alert-danger'>$error</div>";
                '</br>';
            }
        }else{
            // Insert the data into the dataBase
            // require_once "database.php";
            // $sql= "INSERT INTO `login` (`Name`, `Email`, `Password`, `ConfirmPassword`, `Time`)
            // VALUES ('$Name', '$Email', '$Password', '$ConfirmPassword', current_timestamp())"; 

            // mysqli_query($conn,$sql);

                                         // These variables are present in the login tebles of the database
            $sql= "INSERT INTO `login` (`Name`, `Email`, `Password`, `ConfirmPassword`, `Time`)     
            VALUES ('$Name', '$Email', '$Password', '$ConfirmPassword', current_timestamp())";     // fetch data from above

            mysqli_query($conn,$sql);
        }
    }
?>
            <!-- <div id="abhi"></div> -->
            <div class="form-group">
                <input type="text" class="form-control" name="Name" placeholder="Fullname">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="Email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="Password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="ConfirmPassword" placeholder="Confirm Password">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>

            <p>If Already Registered?</p><a href="login.php">Login</a>
        </form>
    </div>
</body>

</html>

<!-- INSERT INTO `login` (`SL_No`, `Name`, `Email`, `Password`, `ConfirmPassword`, `Time`) VALUES ('1', 'Arnab chutiya.', 'email@gmail.com', 'India@5', 'India@5', '2023-04-04 19:28:54.000000'); -->