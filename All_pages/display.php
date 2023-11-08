<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A description of our website.">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/6dc91c15de.js" crossorigin="anonymous"></script>
    <title>WWR</title> 
</head>
<style>a{text-decoration: none;}</style>
<body>
    <div class="search-bar">
        <input class="search-txt" type="text" name="" placeholder="Find your recipe">
        <a class="search-btn" href="#">
            <i class="fa-solid fa-magnifying-glass"></i>
        </a>
    </div>
    <a href="homepage.html">
        <img src="images/wwr.png" alt="Web Name">
    </a>
    <!--<div class="login" id="login">
        <a href="loginpage.html">
            <img src="images/login.png" alt="loginpage">
        </a>
    </div>
    <div class="signin" id="signin">
        <a href="signinpage.html">
            <img src="images/signin.png" alt="signinpage">
        </a>
    </div>-->
    <div class="login" id="login">
        <button class="btn-1">
            <a href="loginPage">LOGIN</a>
        </button>
        <button class="btn-2">
            <a href="signinPage">SIGNIN</a>
        </button>
    </div>
    <!--<div class="contact">
        <button>
            <a href="mailto:wwrcontact@gmail.com">Contact us</a>
        </button> 
    </div>-->
</body>
<body>
    <div class="container">
        <div class="box-1">
            <div class="Breakfast">
                <h1>
                    Breakfast
                </h1>
            </div>
            <div class="allBreakfast">
                <p>
                <?php

                $database_host = "dbhost.cs.man.ac.uk";
                $database_user = "m25334kg";
                $database_pass = "Recipe_22";
                $database_name = "m25334kg";

                $conn = mysqli_connect($database_host,$database_user,$database_pass);
                if (!$conn)
                    die("connection failed".mysqli_connect_error());
                //echo("all good");

                function read()
                {
                    $sql = "select RECIPE_NAME,CONTINENT_ID from RECIPES";
                    $pdo = new pdo ("mysql:host=dbhost.cs.man.ac.uk; dbname=2021_comp10120_r7","m25334kg","Recipe_22");
                    $pdo -> setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                    $stmt = $pdo -> prepare($sql);
                    $stmt -> execute();
                    $stmt -> setFetchMode(PDO::FETCH_ASSOC);

                    echo('<form action="recipe.php" method="POST">');
                    echo('<input type="submit" value="VIEW"><br><br>');
                    while ($row = $stmt -> fetch())
                    {
                        echo('<input type="radio" name="recipe" value='.$row['CONTINENT_ID'].'>'.$row['RECIPE_NAME'].'<br><br>');
                    }
                    echo('</form>');
                }

                read();

                ?>
                </p> 
            </div>
        </div>
    </div>
</body>
</html>