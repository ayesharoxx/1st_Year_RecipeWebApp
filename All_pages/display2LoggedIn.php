<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A description of our website.">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Roboto+Serif:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styleContinent.css">
    <script src="https://kit.fontawesome.com/6dc91c15de.js" crossorigin="anonymous"></script>
    <title>WWR</title> 
</head>
<style>a{text-decoration: none;}</style>
<body>
    <div class = "topNavHeader">
        <?php
            $username = $_GET['username'];
            echo('<a href="mainPageLoggedIn2.php?username='.$username.'">');
            echo('
                    <img src="www1.png" alt="Web Name">
                </a>
                <div class = "searchBar">
                    <form action = "display2LoggedIn.php?username='.$username.'" method = "POST">
                        <input class = "inputStyle" type="text" placeholder="Search.." size=50% name="keyword">
                        <button class = "inputStyle" type = "submit">Search</button>
                    </form>
                </div>');
        ?>

    
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
    <?php
            echo('<div class = "loginRegister">');
        
            $database_host = "dbhost.cs.man.ac.uk";
            $database_user = "m25334kg";
            $database_pass = "Recipe_22";
            $database_name = "m25334kg";
            $username=$_GET['username'];

            $conn = mysqli_connect($database_host,$database_user,$database_pass);
            

            echo ('<div class = "topRecipes">');
            

            // $sql = "select RECIPE_ID, IMAGE, RECIPE_NAME  from RECIPES where RECIPE_ID between 1 and 5";
            $sql = "select USER_ID  from USER where USER_NAME= :user";
            $pdo = new pdo ("mysql:host=dbhost.cs.man.ac.uk; dbname=2021_comp10120_r7","m25334kg","Recipe_22");
            $pdo -> setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([
                'user' => $username
                ]);
            $stmt -> setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt -> fetch();

            $user_id = $row['USER_ID'];
            echo(' 
                <button onclick="window.location.href=\'upload_page.php?user_id='.$user_id.'&user_name='.$username.'\';" class = "inputStyle" type="=button">Upload</button>
                <button onclick="window.location.href=\'display_me.php?user_id='.$user_id.'&user_name='.$username.'\';" class = "inputStyle" type="=button">View My Recipes</button>
                <button onclick="window.location.href=\'mainPage.php\';" class = "inputStyle" type="=button">Log Out</button>
            ');
            echo('</div></div>');
        ?>
    </div>

  
</body>
<br><br>
<body>
    
    <?php

$database_host = "dbhost.cs.man.ac.uk";
$database_user = "m25334kg";
$database_pass = "Recipe_22";
$database_name = "m25334kg";
$keyword = $_POST['keyword'];
$username=$_GET['username'];

echo('<div class="container">
        <div class="box-1">
            <div class="Breakfast">
                <h1>
                    '.$keyword.'
                </h1>
            </div>
            <div class="allBreakfast">
                <p>');

$conn = mysqli_connect($database_host,$database_user,$database_pass);
if (!$conn)
    die("connection failed".mysqli_connect_error());
//echo("all good");

function read()
{
    $username=$_GET['username'];

    $keyword = $_POST['keyword'];
    $sql = "select RECIPE_ID, RECIPE_NAME,AUTHOR_NAME, AUTHOR_NOTES, MEAL_TYPE,KEYWORDS, IMAGE from RECIPES where KEYWORDS= :key";
    $pdo = new pdo ("mysql:host=dbhost.cs.man.ac.uk; dbname=2021_comp10120_r7","m25334kg","Recipe_22");
    $pdo -> setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([
                        'key' => $keyword
                    ]);
    $stmt -> setFetchMode(PDO::FETCH_ASSOC);

    echo('<form action="displayRecipeLoggedIn.php">');

    while ($row = $stmt -> fetch())
    {
        echo('<a href = "displayRecipeLoggedIn.php?recipeID='.$row['RECIPE_ID'].'&username='.$username.'">');
                echo('<div class = "recipeList">');
                echo('<img class = "eachImage" src="data:image/png;base64,'.base64_encode($row['IMAGE']).'">');

                echo('<div class = "recipeData">');
                echo('<h2 class = "recipeNameTitle">'.ucfirst($row['RECIPE_NAME']).'</h2>');
                echo('<p>Author: '.ucfirst($row['AUTHOR_NAME']).'</p>');
                echo('<p>Notes: '.ucfirst($row['AUTHOR_NOTES']).'</p>');
                echo('<p>Meal Type: '.ucfirst($row['MEAL_TYPE']).'</p>');
                echo('</div>');
                echo('</div>');
                echo('</a>');
            

                
            
        }
        
    }
    echo('</form>');


read();

                ?>
                </p> 
            </div>
        </div>
    </div>
</body>




</html>

    

                