<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mainpage</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Roboto+Serif:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styleContinent.css">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A description of our website.">
    <script src="https://kit.fontawesome.com/6dc91c15de.js" crossorigin="anonymous"></script>
    <title>WWR</title> 
</head>
<body>
    <div class = "topNavHeader">
        <?php
            $username = $_GET['username'];
            echo('<a href="mainPageLoggedIn2.php?username='.$username.'">');
            echo('<img src = www1.png>
        </a>
        <div class = "searchBar">
            <form action = "display2LoggedIn.php?username='.$username.'" method = "POST">
                  <input class = "inputStyle" type="text" placeholder="Search.." size=50% name="keyword">
                  <button class = "inputStyle" type = "submit">Search</button>
            </form> 
        </div>')
        ?>
        
            
        <!-- <div class = "loginRegister">
            <button onclick="window.location.href='register.php';" class = "inputStyle" type="=button">Register</button>
            <button onclick="window.location.href='login.php';" class = "inputStyle" type="=button">Login</button>
        </div> -->
        <?php
                echo('<div class = "loginRegister">');
                $username = $_GET['username'];
                $database_host = "dbhost.cs.man.ac.uk";
            $database_user = "m25334kg";
            $database_pass = "Recipe_22";
            $database_name = "m25334kg";

            $conn = mysqli_connect($database_host,$database_user,$database_pass);
            // if (!$conn)
            //     die("connection failed".mysqli_connect_error());
            // echo("all good");
            echo ('<div class = "topRecipes">');


            $sql = "select USER_ID from USER where user_name= :user";
            $pdo = new pdo ("mysql:host=dbhost.cs.man.ac.uk; dbname=2021_comp10120_r7","m25334kg","Recipe_22");
            $pdo -> setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([
                'user' => $username]);
            $stmt -> setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt -> fetch();
            $user_id = $row['USER_ID'];
                echo(' <button onclick="window.location.href=\'upload_page.php?user_id='.$user_id.'&user_name='.$username.'\';" class = "inputStyle" type="=button">Upload</button>
                    <button onclick="window.location.href=\'display_me.php?user_id='.$user_id.'&user_name='.$username.'\';" class = "inputStyle" type="=button">View My Recipes</button>
            <button onclick="window.location.href=\'mainPage.php\';" class = "inputStyle" type="=button">Log Out</button>
        </div></div>');
            ?>
    </div>

    <div class = "menuButtonBar">
    <?php
        $username = $_GET['username'];
        echo('
        <a href="displayMealTypeLoggedIn.php?mealType=Breakfast&username='.$username.'">
        <button class= "menubutton", type="button">Breakfast</button>
        </a>
        <a href="displayMealTypeLoggedIn.php?mealType=Lunch&username='.$username.'">
        <button class= "menubutton", type="button">Lunch</button>
        </a>
        <a href="displayMealTypeLoggedIn.php?mealType=Dinner&username='.$username.'">
        <button class= "menubutton", type="button">Dinner</button>
        </a>
        <a href="displayMealTypeLoggedIn.php?mealType=Snacks&username='.$username.'">
        <button class= "menubutton", type="button">Snacks</button>
        </a>
        <a href="displayMealTypeLoggedIn.php?mealType=Dessert&username='.$username.'">
            <button class= "menubutton", type="button">Dessert</button>
        </a>
        ');
    ?>
    </div>

<style>a{text-decoration: none;}</style>


    
    <?php
        $username = $_GET['username'];

        $mealType = $_GET['mealType'];
        $username = $_GET['username'];
        $database_host = "dbhost.cs.man.ac.uk";
        $database_user = "m25334kg";
        $database_pass = "Recipe_22";
        $database_name = "m25334kg";
        $conn = mysqli_connect($database_host,$database_user,$database_pass);
        if (!$conn)
            die("connection failed".mysqli_connect_error());
        echo('<br><br>');
        echo('<div class="container">');
        // echo('<div class="box-1">');
        echo('<div class="Breakfast">');
        echo('<h1>'.$mealType.'</h1>');
        echo('</div>');
        echo('<div class="allBreakfast">');

        function retrieveContinentNamefromID($continentID){
            $sql = "select CONTINENT_NAME from CONTINENTS WHERE CONTINENT_ID=".$continentID;
            $pdo = new pdo ("mysql:host=dbhost.cs.man.ac.uk; dbname=2021_comp10120_r7","m25334kg","Recipe_22");
            $pdo -> setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([]);
            $stmt -> setFetchMode(PDO::FETCH_ASSOC);
            while($row = $stmt -> fetch()){
                echo($row['CONTINENT_NAME']);
            }
        }

        function read()
        {
            $mealType = $_GET['mealType'];
            $username=$_GET['username'];
            $sql = "select RECIPE_ID, RECIPE_NAME,AUTHOR_NAME, AUTHOR_NOTES, CONTINENT_ID,KEYWORDS, IMAGE from RECIPES WHERE MEAL_TYPE=\"".$mealType."\"";
            $pdo = new pdo ("mysql:host=dbhost.cs.man.ac.uk; dbname=2021_comp10120_r7","m25334kg","Recipe_22");
            $pdo -> setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([]);
            $stmt -> setFetchMode(PDO::FETCH_ASSOC);

            while($row = $stmt -> fetch()){
                echo('<a href = "displayRecipeLoggedIn.php?recipeID='.$row['RECIPE_ID'].'&username='.$username.'">');
                echo('<div class = "recipeList">');
                echo('<img class = "eachImage" src="data:image/png;base64,'.base64_encode($row['IMAGE']).'">');

                echo('<div class = "recipeData">');
                echo('<h2 class = "recipeNameTitle">'.ucfirst($row['RECIPE_NAME']).'</h2>');
                echo('<p>Author: '.ucfirst($row['AUTHOR_NAME']).'</p>');
                echo('<p>Notes: '.ucfirst($row['AUTHOR_NOTES']).'</p>');
                echo('<p>Continent: ');
                retrieveContinentNamefromID($row['CONTINENT_ID']);
                echo('</p>');
                echo('</div>');
                echo('</div>');
                echo('</a>');
            }
        }
        read();
    ?>
            <!-- </div> -->
        </div>
    </div>
</body>

</html>
