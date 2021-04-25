<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: l.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; 
            
            text-align: center;
            background-image: url(stadium.jpg);
        color: black;
        background-size: 100% 720px;
    background-repeat: no-repeat;
    margin: 0 auto; }
    .my-5{
        color: black;

    }
    .button{
        background-color: blueviolet;
        text-decoration-color: black;
        margin-top: 10px;
        height: 40px;
        width: 200px;
        border-radius: 8px;
        
         }
    a{
        color: black;
      
       
    }
    
    </style>
</head>
<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
        </p>
        <!-- <input src="http://localhost/i.php" type="button" name="Vote" class="button" value="Vote" onclick="http://localhost/i.php"> -->

        <a href="http://localhost/i.php"> <button type="button" class="button">Vote<span></span></button></a>

</body>
</html>