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

    $sql2="SELECT * FROM `category`";
    $res2=mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_all($res2, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compose</title>
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
    <div class="row">
    <h2 class="white-text" style="text-align:center;">All Categories</h2>
    <?php foreach($row2 as $cat){ ?>
            <div class="col s6 md3">
  				    <div class="card">
                      <center>
                        <div class="card-content">
                          <h3><?php print_r($cat['cat_name']); ?></h3>
                          <div>
                          <br>
                          <a href="all-q.php?cat_id=<?php echo $cat['cat_id']?>" class="btn brand z-depth-0">View more...</a>
                          </div>
                        </div>
                        </center>
                    </div>
            </div>
        <?php } ?>
    </div>
    </div> 
