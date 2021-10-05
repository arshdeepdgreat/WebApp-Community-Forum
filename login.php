<?php
    include("templates/conn.php");
    include("templates/function.php");
    $msg="";
    $username="";
    $pass="";

    if (isset($_POST['submit'])){
        $username=getsafe($conn,$_POST['username']);
        $pass=getsafe($conn,$_POST['password']);
        $md5pass=md5($pass);
        
    $sql="SELECT * FROM `all_users` WHERE username ='$username' and password='$md5pass'";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    if($count==1){
        $_SESSION['USER_LOGIN']='yes';
        $_SESSION['USER_ID']=$row['user_id'];
        header('location:yourpanel.php');
        die();
    }
    else{
        $msg="Please re-enter the details correctly";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .phonebox{
            margin:0;
            padding: 0;
        }
        @media screen and (min-width: 600px) {
            form {
                max-width: 800px;
                margin: 6rem;
                margin-bottom: 0px;
                padding: 20px;
                margin-top: 5rem
            }
        }
        @media screen and (max-width: 600px) {
            form {
                max-width: 800px;
                margin-bottom: 0px;
                padding: 50px;
                margin-top: 1rem
            }
            .phonebox{
                margin-top:100px;
            }
        }
        
        .greenbg{
            background-color: #155252;
        }
        h4{
            background-color:black;
            padding:10px;
        }

        .blbox {
            padding-top:0.5rem;
        }
        label {
            font-size:18px; color:black;
        }
        .rd{
            color:red;
        }
        .dp{
            border-radius: 50%;
        }
    </style>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</head>
<body class="greenbg">
    <div class="container">
        <div class="greenbg phonebox">
             <br>
        </div>
        <div class="grey lighten-4 container z-depth-2">
            <h4 class="center white-text">
                Sign up
            </h4>
            <form id="form" method="POST" class="white">
                <div>
                    <label for="name">Username</label>
                    <input type="text" name="username" id="name" value=<?php echo $username?>>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value=<?php echo $pass?>>
                </div>
                <p>
                    <label>
                        <input type="checkbox" onclick="myFunction()"/>
                        <span>Show/Hide password</span>
                    </label>
                </p>
                <div class="center">
                    <button class="btn btn-primary" name="submit" value="submit" type="submit">Login</button>
                </div>
                <div id="error" class="rd"><?php echo $msg?></div>
            </form>
            <div class="blbox"></div>
            <div class="center">
                
                <p>Dont have an account?
                <a href="register.php">Create here</a></p>
            </div>
            <div class="blbox"></div>
        </div>
    </div>
    
</body>
</html>