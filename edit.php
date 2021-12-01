<?php
    include("templates/conn.php");
    include("templates/function.php");
    $message="";
    
    $name="";
    $password="";
    $mailid="";

    $uid=$_SESSION['USER_ID'];
    if ($_SESSION['USER_LOGIN']!='yes' or $_SESSION['USER_ID']=="")
    {
        header("location:logout.php");
    }
    $sql1="SELECT * FROM `all_users` WHERE user_id ='$uid'";
    $res=mysqli_query($conn,$sql1);
    $urow = mysqli_fetch_array($res, MYSQLI_ASSOC);
    // print_r($urow);

    if (isset($_POST['submit'])){
        $name=getsafe($conn,$_POST['name']);
        $password=getsafe($conn,$_POST['password']);
        $mailid=getsafe($conn,$_POST['email']);
        if((md5($password)==$urow['password'])){
            $sql2="UPDATE `all_users` SET `email_id`='$mailid',`name`='$name'
            WHERE `user_id`=$uid";
            mysqli_query($conn,$sql2);
            $message="Details Updated Check in your panel";
            
            header('Location:yourpanel.php');
        }
        else{
            $message="Check the password";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="templates/style.css">
</head>
<body class="greenbg">
    <div class="center-screen">
    <div class="preloader-wrapper big active">
      <div class="spinner-layer spinner-blue">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>
    </div>
    <div class="content">
    <nav class="black z-depth-0" style="padding-right: 30px;padding-left: 80px;">
		<div>
			<a href="#" class="brand-logo brand-text hide-on-med-and-down">Community Forum</a>
            <ul id="nav-mobile" class="right">
                <li><a href="edit.php">Edit Details</a></li>
                <li class="active"><a href="yourpanel.php">Your Panel</a></li>
				<li><a href="logout.php" class="btn brand z-depth-0">Logout</a></li>
		    </ul>

            </div>
            <br>
    </nav>
    <div class="container">
        <div class="grey lighten-4 container z-depth-3">
            <h4 class="center white-text">
                Edit Details
            </h4>
            <div class="center">
                <img src=<?php echo $urow['dp_image'] ?> class="dp" width="30%">
            </div>
            <div class="container">
                <form method="post">
                    <div>
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="<?php print_r($urow['name']); ?>"></input>
                    </div>

                    <div>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value=<?php echo $urow['email_id'] ?>>
                    </div>

                    <div>
                        <label for="password">Enter Password if you want to change details:</label>
                        <input type="password" name="password" id="password" value=''>
                    </div>    
                    <div class="center">
                        <button class="btn btn-primary" type="submit" name="submit" value="submit">Submit</button>
                    </div>

                    <div id="error" style="color: red;"><?php 
                    echo $message;
                    ?></div>
                </form>
                <div class="blbox"></div>
            </div>
        </div>
    </div>
    </div>
    <script>
        document.querySelector('.content').style.display="none"

        setTimeout(() => {
            document.querySelector('.content').style.display="block"
            document.querySelector('.center-screen').style.display="none"
        }, 2000);
    </script>
</body>
</html>