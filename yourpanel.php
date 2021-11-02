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
			<a href="#" class="brand-logo brand-text hide-on-med-and-down">heading</a>
            <ul id="nav-mobile" class="right">
                <li><a href="browse.php">Browse</a></li>
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
        posted questions list

        unanswered questions list

        list of answers contributed

        
    </div>
    <div class="fixed-action-btn">
        <!-- <h6>New</h6> -->
        <a href="compose.php" class="btn-floating btn-large red" >
            <i class="large material-icons">mode_edit</i>
        </a>
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