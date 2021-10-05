<?php
    // TODO: make a nav bar
    // details on your panel with edit profile
    include("templates/conn.php");
    include("templates/function.php");
    $errorname="";
    $errpass="";
    $message="";

    $name="";
    $username="";
    $password="";
    $c_password="";
    $dob="";
    $mailid="";
    if (isset($_POST['submit'])){
        $name=getsafe($conn,$_POST['f_name']);
        $username=getsafe($conn,$_POST['u_name']);
        $password=getsafe($conn,$_POST['password']);
        $c_password=getsafe($conn,$_POST['c_password']);
        $dob=getsafe($conn,$_POST['dob']);
        $mailid=getsafe($conn,$_POST['mail-id']);

        $user_profile_pic=$_FILES['user_profile_pic'];
        $picname=$user_profile_pic['name'];
        $pictemp=$user_profile_pic['tmp_name'];
        $picer=$user_profile_pic['error'];
        $k=explode('.',$picname);
        $ext= strtolower(end($k));
        $valids=array('png','jpg','jpeg');
        if (in_array($ext,$valids)){
            $finaldest='templates/images/'.$picname;
            move_uploaded_file($pictemp,$finaldest);
        }

        $sql1="SELECT * FROM `all_users` WHERE username = '$username' ";
        $res1=mysqli_query($conn,$sql1);
        $count=mysqli_num_rows($res1);
        if($count>0){
            $errorname="USERNAME IS TAKEN BY ANOTHER USER";
            $username="";
        }
        if($password!=$c_password)
        {
            $errpass="Passwords dont match";
            $password=$c_password='';
        }
        $c_password=md5($password);

        if($errorname=="" && $errpass==""){
            $sql2="INSERT INTO `all_users`(`username`, `email_id`, `password`, `name`, `DOB`, `dp_image`) 
            VALUES ('$username','$mailid','$c_password','$name','$dob','$finaldest')";
            $res2=mysqli_query($conn,$sql2);
            $message=" Your username is '$username' and you can login now ";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="templates/style.css">
    <style>
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
                padding: 10px;
                margin-top: 1rem
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
    <!-- nav bar browse + about + login -->
    <div class="container">
        <div class=" grey lighten-4 container z-depth-2">
            <h3><?php echo $message?></h3>
            <h4 class="center white-text">
                Register Here
            </h4>
            <form id="form" method="POST" class="white" enctype="multipart/form-data">
                <div>
                    <label  for="first_Name">Name</label>
                    <input placeholder="Eg: John" type="text" id="first_name" name="f_name" value=<?php echo $name?>>
                </div>
                <div>
                    <label  for="name">Username</label>
                    <input type="text" name="u_name" id="name" value=<?php echo $username?>>
                    <p class="error"><?php echo $errorname?></p>
                </div>
                <div>
                    <label  for="password">Password</label>
                    <input type="password" name="password" id="password" value=<?php echo $password?>>
                </div>
                <p>
                    <label>
                        <input type="checkbox" onclick="myFunction()"/>
                        <span>Show/Hide password</span>
                    </label>
                </p>
                <div>
                    <label  for="c_password">Confirm Password</label>
                    <input type="password" name="c_password" id="c_password" value=<?php echo $c_password?>>
                    <p class="error"><?php echo $errpass?></p>
                </div>
                <div>
                    <label  for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob" value=<?php echo $dob?>>
                </div>
                <div>
                    <label  for="mail-id">Email</label>
                    <input type="email" name="mail-id" id="mail-id" value=<?php echo $mailid?>>
                </div>
                <br>
                <label style="font-size:18px; color:black;">Profile Photo</label>
                    <input type="file" name="user_profile_pic" value=''>
                <br><br>
                <div class="center">
                    <button class="btn btn-primary" type="submit" name="submit" value="submit">Submit</button>
                </div>
                <div id="error" style="color: red;"></div>
            </form>
            
            <div class="blbox"></div>
            <div class="center">
                <p>Already have an account?
                <a href="login.php">Login here</a></p>
            </div>
            <div class="blbox"></div>
        </div>
    </div>
    
</body>
</html>