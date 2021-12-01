<?php
include("templates/conn.php");
include("templates/function.php");
    $uid=$_SESSION['USER_ID'];
    if ($_SESSION['USER_LOGIN']!='yes' or $_SESSION['USER_ID']=="")
    {
        header("location:logout.php");
    }
    $sql1="SELECT * FROM `all_users` WHERE user_id ='$uid'";
    $res=mysqli_query($conn,$sql1);
    $urow = mysqli_fetch_array($res, MYSQLI_ASSOC);
    if(isset($_GET['q_id'])){
        $sql2="SELECT * FROM `answers` WHERE `q_id`=$_GET[q_id]";
        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_array($res2,MYSQLI_ASSOC);

        $sql3="SELECT * FROM `questions` WHERE `q_id`=$_GET[q_id]";
        $res3=mysqli_query($conn,$sql3);
        $rowq=mysqli_fetch_array($res3,MYSQLI_ASSOC);

        if(mysqli_num_rows($res2)!=1){
            header("location:all-q.php");
        }
    }
    else{
        header("location:all-q.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>
    <link rel="stylesheet" href="../templates/stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .phonebox {
            margin: 0;
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

            .phonebox {
                margin-top: 100px;
            }
        }

        .greenbg {
            background-color: #155252;
        }

        h4 {
            background-color: black;
            padding: 10px;
            margin-bottom: 0px;
        }
        .boxup{
            background-color: black;
            padding: 10px;
        }
        p{
            margin-top: 0px;
        }

        .blbox {
            padding-top: 0.5rem;
        }

        label {
            font-size: 18px;
            color: black;
        }

        .rd {
            color: red;
        }

        .dp {
            border-radius: 50%;
        }
    </style>

</head>
<body class="greenbg">
    <nav class="black z-depth-0" style="padding-right: 30px;padding-left: 80px;">
		<div>
			<a href="all-q.php" class="brand-logo brand-text hide-on-med-and-down">Go back</a>
            <ul id="nav-mobile" class="right">
                <li><a href="all-q.php">Browse</a></li>
                <li><a href="categories.php">Categories</a></li>
                <li class="active"><a href="yourpanel.php">Your Panel</a></li>
				<li><a href="logout.php" class="btn brand z-depth-0">Logout</a></li>
		    </ul>
        </div>
        <br>
    </nav>
    <div class="container">
        <div class="greenbg phonebox">
            <br>
        </div>
        <div class="grey lighten-4 z-depth-2">
            <div class="center white-text">
                <h4>
                    Question: <?php echo $rowq['Question'] ;?>
                </h4>
                <p class="boxup">
                    Posted By <?php echo $rowq['author'];?>
                    on <?php echo $rowq['posted_timestamp']; ?>
                </p>
            </div>
            <div class="container">
                <h3>Answer: </h3>
                <h5><?php echo $row2['answer'];?></h5>
                <br>
            </div>
                <h5 class="boxup white-text center"> Answer Posted by <?php echo $row2['author'];?> on <?php echo $row2['posted_timestamp'];?> </h5>

