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
                Compose a Question
            </h4>
            <form id="form" method="POST" class="white">
                <div>
                    <label for="question">Question</label>
                    <input type="text" name="question" id="question" value="">
                </div>
                <div class="row">
                    <div class="col s6">
                        <span>
                            <label for="Author">Author</label>
                            <select name="Author" id="Author" class="browser-default">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="Anonymous">Anonymous</option>
                                <option value="echo name">echo name</option>
                            </select>
                        </span>
                    </div>
                   
                    <div class="col s12 m6">
                        <label for="category">Category</label>
                        <input type="text" name="category" id="category">

                        <!-- <label style="font-size:18px; color:black;">Category</label> -->
                        <!-- <select name="Category" class="browser-default">
                            <?php //while($f1 = mysqli_fetch_array($res3)):; ?>
                            <option value="<?php echo $f1[0];?>">
                                <?php //echo $f1[1];?>
                            </option>
                            <?php //endwhile; ?>
                        </select> -->
                    </div>
                    
                </div>
               
                <div class="blbox"></div>
                <div class="center">
                    <button class="btn btn-primary" name="submit" value="submit" type="submit">Post to platform</button>
                </div>
        </div>
        <div id="error" class="rd">
            <?php //echo $msg?>
        </div>
        </form>
    </div>
    <div class="blbox"></div>
    </div>
</body>
</html>