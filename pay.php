<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment GateWay</title>
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
        <form action="payScript.php" method="post">
            <!-- <div id="abhi"></div> -->
            <h1 style="text-align: center; color: red;">Checkout Form</h1>
            <div class="form-group">
                <!-- <label for="fname">Full Name</label> -->
                <input type="text" class="form-control" name="Name" placeholder="Fullname">
            </div>
            <div class="form-group">
                <!-- <label for="fname">Email</label> -->
                <input type="email" class="form-control" name="Email" placeholder="Email">
            </div>
            <div class="form-group">
                <!-- <label for="fname">Mobile</label> -->
                <input type="text" class="form-control" name="Mobile" placeholder="Mobile Number">
            </div>
            <div class="form-group">
                <!-- <label for="fname">Address</label> -->
                <input type="text" class="form-control" name="Address" placeholder="Address">
            </div>
            
            <input type="hidden" value="<?php echo 'OID'.rand(100,1000);?>" name="orderid">
            <input type="hidden" value="<?php echo 705;?>" name="amount">

            <div class="form-btn">
                <input type="submit" class="btn btn-success" value="Pay Now" name="submit">
            </div>

            <!-- <p>If Already Registered?</p><a href="login.php">Login</a> -->
        </form>
    </div>
</body>

</html>

<!-- INSERT INTO `login` (`SL_No`, `Name`, `Email`, `Password`, `ConfirmPassword`, `Time`) VALUES ('1', 'Arnab chutiya.', 'email@gmail.com', 'India@5', 'India@5', '2023-04-04 19:28:54.000000'); -->