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
    $sql="SELECT * FROM `questions` WHERE q_id=$_GET[q_id]";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
    if(isset($_POST['submit'])){
        $ans=getsafe($conn,$_POST['Answer']);
        $author=getsafe($conn,$_POST['Author']);

        $sql2="INSERT INTO `answers`(`q_id`, `author`, `answer`,`user_id`)
         VALUES ($_GET[q_id],'$author','$ans','$uid')";
        $res2=mysqli_query($conn,$sql2);
        
        echo $sql3="SELECT * from `answers` WHERE `q_id`= $_GET[q_id]";
        $res3=mysqli_query($conn,$sql3);
        print_r($row3=mysqli_fetch_array($res3, MYSQLI_ASSOC));

        echo $sql4="UPDATE `questions` SET `status`=$row3[ans_id] WHERE `q_id`=$_GET[q_id]";
        mysqli_query($conn,$sql4);

        header("location: all-q.php");

    }
}
else{
    header('location:yourpanel.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Answer</title>
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
<body>
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
        <div class="greenbg phonebox">
            <br>
        </div>
        <div class="grey lighten-4 z-depth-2">
            <h4 class="center white-text">
                Compose Answer
            </h4>
            <form id="form" method="POST" class="white">
                <div>
                    <h2>Question: <?php echo $row['Question']?></h2>
                </div>
                <div class="row">
                    <div class="col s6">
                        <span>
                            <label for="Author">Post Answer as</label>
                            <select name="Author" id="Author" class="browser-default" required>
                                <option value="" disabled selected>Choose your option</option>
                                <option value="Anonymous">Anonymous</option>
                                <option value="<?php echo htmlspecialchars($urow['name']);?>"><?php echo htmlspecialchars($urow['name']);?></option>
                            </select>
                        </span>
                    </div>
                </div>
                <div>
                    <label for="Answer">Type Your Answer here (400 chars only)</label>
                    <textarea id="Answer" name="Answer" rows="10" cols="50" maxlength="400"></textarea>
                </div>
                <div class="blbox"></div>
                <div class="center">
                    <button class="btn btn-primary" name="submit" value="submit" type="submit">Post to platform</button>
                </div>
            </form>
        </div>
    </div>
    <div class="blbox">
        <br>
        <br>
    </div>
</body>
</html>