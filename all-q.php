<!-- similar working to product page 
/=> all questions
/cat-id =>questions in that id

filter option of answered unanswered all -->

<?php
    include("templates/conn.php");
    include("templates/function.php");
    $he='';
    $uid=$_SESSION['USER_ID'];
    if ($_SESSION['USER_LOGIN']!='yes' or $_SESSION['USER_ID']=="")
    {
        header("location:logout.php");
    }

    $sql1="SELECT * FROM `all_users` WHERE user_id ='$uid'";
    $res=mysqli_query($conn,$sql1);
    $urow = mysqli_fetch_array($res, MYSQLI_ASSOC);

    if(isset($_GET['cat_id'])){
        $c=$_GET['cat_id'];
        $sql= "SELECT * FROM `questions` WHERE `cat_id`='$c' ORDER BY `posted_timestamp` asc ";
        $res=mysqli_query($conn,$sql); 
        $prods=mysqli_fetch_all($res,MYSQLI_ASSOC);
        $sql1="SELECT `cat_name` from `category` where `cat_id`='$c'";
        $res1=mysqli_query($conn,$sql1);
        $prods1=mysqli_fetch_array($res1,MYSQLI_ASSOC);
        $count=mysqli_num_rows($res1);
        if($count<1){
            header("location:user_categories.php");
        }
        else{
            $he ="in ".$prods1['cat_name']." category";
        }
        // print_r($prods);
    }
    else{
        $sql= "SELECT * FROM `product` WHERE `status`=1 ORDER BY `product_name` asc ";
        $res=mysqli_query($conn,$sql);
        $prods=mysqli_fetch_all($res,MYSQLI_ASSOC);
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
    <section>
    <div class="row">
    <h2 class="white-text" style="text-align:center;">Questions <?php echo $he ;?></h2>
        <?php foreach($prods as $p){ ?>
            <div class="col s12 md6">
  				    <div class="card">
                      <center>
                        <div class="card-content">
                          <h3>Q: <?php print_r($p['Question']); ?></h3>
                          <div>
                          <h5>Asked By: <?php echo($p['author'])?></h5>
                          <br>

                          <!-- if answered view full post else answer now -->
                          <a href="#" class="btn brand z-depth-0">View Full Post</a>
                          
                          </div>
                        </div>
                        </center>
                    </div>
            </div>
        <?php } ?>  
    </div>
    </section>