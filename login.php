<!-- <?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: myntra.html");
}
?> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url(photos/imgN.jpg);
            background-size: cover;
        }

        .container2 {
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
        }

        @media only screen and (max-width: 767px) {

            .container2 {
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
    <div class="container2">


    <form action="login.php" method="post">
    <h1 style="text-align: center; color: red;">Login Form</h1>
        <?php
        if(isset($_POST["Login"])){        // fetching data on clicking on login button
            $Email=$_POST["Email"];
            $Password=md5($_POST["Password"]);
            require_once "database.php";

            $sql="SELECT * FROM login WHERE Email='$Email'";
            $result=mysqli_query($conn,$sql);
            // $user=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $user=mysqli_fetch_assoc($result);
            if($user){     
                // if we get any email in the table then check for password or display the error
                if(($Password===$user["Password"])){    
                    session_start();
                    $_SESSION["user"] = $user['SL_No'];
                    header("Location: myntra.html");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password doesnot Match!!!!!</div>";          // This is to apply html code 
                }
            }else{
                echo "<div class='alert alert-danger'>Email doesnot Match!!!!!</div>";          // This is to apply html code 
            }
        }
        ?>

            <div class="form-group">
                <input type="email" class="form-control" required name="Email" placeholder="Enter Email" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" class="form-control"required name="Password" placeholder="Enter Password" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="submit" name="Login" class="btn btn-primary" value="Login">             <!--Remember the type to be submit-->
            </div>
            <a href="registration.php">Registration links</a>
        </form>
    </div>
</body>
</html>