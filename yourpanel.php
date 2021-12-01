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


    $sql2="SELECT * FROM `questions` WHERE user_id ='$uid'";
    $res2=mysqli_query($conn,$sql2);
    $allq=mysqli_fetch_all($res2,MYSQLI_ASSOC);

    $sql3="SELECT * FROM `answers` WHERE user_id ='$uid'";
    $res3=mysqli_query($conn,$sql3);
    $alla=mysqli_fetch_all($res3,MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="templates/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
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
                <li><a href="all-q.php">Browse</a></li>
                <li><a href="categories.php">Categories</a></li>
                <li class="active"><a href="yourpanel.php">Your Panel</a></li>
				<li><a href="logout.php" class="btn brand z-depth-0">Logout</a></li>
		    </ul>

            </div>
            <br>
    </nav>
    <div class="container">
        <div class="grey lighten-4 container z-depth-3">
            <h4 class="center white-text">
                Personal Details
            </h4>
            <div class="center">
                <img src=<?php echo $urow['dp_image'] ?> class="dp" width="30%">
            </div>
            <div class="container">
                <table>
                    <th>Field</th>
                    <th>Details</th>

                    <tr>
                        <td>Name: </td>
                        <td><?php echo $urow['name'] ?></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><?php echo $urow['email_id'] ?></td>
                    </tr>
                    <tr>
                        <td>Date of Birth: </td>
                        <td><?php echo $urow['DOB'] ?></td>
                    </tr>
                </table>
                <div class="blbox"></div>
                <div class="center"><a href="edit.php" class="btn brand z-depth-0">Edit Details</a></div>
                <div class="blbox"></div>

            </div>
        </div>
        
        <div class="grey lighten-4 z-depth-3">
            <h4 class="center white-text">
                Posted Questions
            </h4>
                <table>
                    <th>Sno</th>
                    <th>Question</th>
                    <th>Category</th>
                    <th>Posted on</th>
                    <th>Status</th>
                    <?php $i=1?>

                    <?php foreach($allq as $q){ ?>
                        <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $q['Question']?></td>
                            <td><?php 
                                $sql3="SELECT * FROM `category` where cat_id = $q[cat_id]";
                                $res3=mysqli_query($conn,$sql3);
                                $row3=mysqli_fetch_array($res3,MYSQLI_ASSOC);
                                echo $row3['cat_name'];
                            ?></td>
                            <td><?php echo $q['posted_timestamp']?></td>
                            <td><?php if($q['status']) echo "Answered";
                                      else echo "Unanswered";
                                      ?><td>
                        </tr>
                    <?php } ?>
                </table>

            </div>
        </div>

        <div class="container grey lighten-4 z-depth-3">
            <h4 class="center white-text">
                Answers contributed
            </h4>
                <table>
                    <th>Sno</th>
                    <th>Question</th>
                    <th>Posted on</th>
                    <th>Answer</th>
                    <?php $i=1?>

                    <?php foreach($alla as $a){ ?>
                        <tr>
                            <td><?php echo $i++?></td>
                            <td><?php $sql4="SELECT * FROM `questions` where q_id='$a[q_id]'";
                            $res4=mysqli_query($conn,$sql4);
                            $row4=mysqli_fetch_array($res4,MYSQLI_ASSOC);
                            echo $row4['Question'];?></td>
                            <td><?php echo $a['posted_timestamp']?></td>
                            <td><?php echo $a['answer']?></td>

                        </tr>
                    <?php } ?>
                </table>

            </div>
        </div>        
    </div>
    <div class="fixed-action-btn">
        <!-- <h6>New</h6> -->
        <a href="compose.php" class="btn-floating btn-large red" >
            <i class="large material-icons">mode_edit</i>
        </a>
    </div>
</div>
<div class="blbox"><br></div>
    <script>
        document.querySelector('.content').style.display="none"

        setTimeout(() => {
            document.querySelector('.content').style.display="block"
            document.querySelector('.center-screen').style.display="none"
        }, 2000);
    </script>
</body>
</html>