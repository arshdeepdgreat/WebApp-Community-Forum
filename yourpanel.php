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
    <link rel="stylesheet" href="templates/style.css">
</head>
<body class="greenbg">
    <nav class="black z-depth-0">
        <div class="container">
            <a href="#" class="brand-logo brand-text">heading</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li><a href="logout.php" class="btn brand z-depth-0">Logout</a></li>
            </ul>
        </div>
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
            </div>
        </div>
    </div>
</body>
</html>