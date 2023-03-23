<?php session_start(); 
ini_set('mysql.connect_timeout', 300);
ini_set('default_socket_timeout', 300);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
    <style>
    body{
        background-color: rgba(0,41,107,1);
    }
    .container{
            display: border solid black;
            width: 50%;
        }
    .text {
    position: absolute;
    top: 10%; 
    right: 50%;
    transform: translate(50%,-50%);
    text-transform: uppercase;
    font-family: verdana;
    font-size: 3em;
    font-weight: 700;
    color: #FFD700;
    text-shadow: 1px 1px 1px #919191,
        1px 2px 1px #919191,
        1px 3px 1px #919191,
        1px 4px 1px #919191,
        1px 5px 1px #919191,
        1px 6px 1px #919191,
        1px 7px 1px #919191,
        1px 8px 1px #919191,
        1px 9px 1px #919191,
        1px 10px 1px #919191,
    1px 18px 6px rgba(16,16,16,0.4),
    1px 22px 10px rgba(16,16,16,0.2),
    1px 25px 35px rgba(16,16,16,0.2),
    1px 30px 60px rgba(16,16,16,0.4);
    }
   
    .v102_142 {
    width: 709px;
    height: 510px;
    background: rgba(251,80,18,0.8999999761581421);
    opacity: 1;
    position: absolute;
    top: 281px;
    left: 366px;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
    overflow: hidden;
    }
    .v102_379 {
    width: 709px;
    height: 448px;
    background: rgba(225,221,221,1);
    opacity: 1;
    position: absolute;
    top: 353px;
    left: 366px;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
    overflow: hidden;
    }
    </style>
</head>
<body>
<center>
<span class="text ">    
<div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <img src="Logo.PNG" alt="Flowers in Chania"style="width:140px;height:70px;">
            <a class="navbar-brand"  font-weight=  Bold  style="color:white; font-weight: 700; font-size: 30px;">
            ELEVATOR  MANAGE
            </a>
 </center>
    <div class="v102_142" color= rgba(255,251,251,0.8999999761581421) font-weight=  Bold>
    <h3 class="mt-4 mb-2 text-light"> LOGIN</h3>
    </div>
    <div class="v102_379">
    <br>
        <form action="login_db.php" method="post">
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label for="username" class="form-label">  Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">  Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" name="signin" class="btn btn-primary">Sign In</button>
        </form>   
        <br>
        </div>
        
</body>


</html>