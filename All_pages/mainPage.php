<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mainpage</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Roboto+Serif:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="buttonstyle.css">
     <script src="https://kit.fontawesome.com/e60c7d5ec4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
    <h1 title="World Wide Food"></h1>

   
    <div class = "topNavHeader">
        <a href="mainPage.php">
            <img src = www1.png>
        </a>
        <div class = "searchBar">
            <form action = "display2.php" method = "POST">
                  <input class = "inputStyle" type="text" placeholder="Search.." size=50% name="keyword">
                  <button class = "inputStyle" type = "submit">Search</button>
            </form> 
        </div>
        <div class = "loginRegister">
            <button onclick="window.location.href='register.php';" class = "inputStyle" type="=button">Register</button>
            <button onclick="window.location.href='login.php';" class = "inputStyle" type="=button">Login</button>
        </div>
    </div>

    </div>
    </div>
     <div class = "menuButtonBar">
        <a href="displayMealType.php?mealType=Breakfast">
        <button class= "menubutton", type="button">Breakfast</button>
        </a>
        <a href="displayMealType.php?mealType=Lunch">
        <button class= "menubutton", type="button">Lunch</button>
        </a>
        <a href="displayMealType.php?mealType=Dinner">
        <button class= "menubutton", type="button">Dinner</button>
        </a>
        <a href="displayMealType.php?mealType=Snacks">
        <button class= "menubutton", type="button">Snacks</button>
        </a>
        <a href="displayMealType.php?mealType=Dessert">
            <button class= "menubutton", type="button">Dessert</button>
        </a>
    </div>
    <h1 style = "padding-left: 70px; padding-right: 12px; padding-top: 16px; padding-bottom: 8px; text-decoration: underline;">Unsure What Recipe to Choose?</h1>
    <br><br>


    <?php
        

       
           function read()
        {
            $database_host = "dbhost.cs.man.ac.uk";
            $database_user = "m25334kg";
            $database_pass = "Recipe_22";
            $database_name = "m25334kg";

            $conn = mysqli_connect($database_host,$database_user,$database_pass);
            

            echo ('<div class = "topRecipes">');
            

            // $sql = "select RECIPE_ID, IMAGE, RECIPE_NAME  from RECIPES where RECIPE_ID between 1 and 5";
            $sql = "select RECIPE_ID, IMAGE, RECIPE_NAME  from RECIPES order by RAND() limit 5";
            $pdo = new pdo ("mysql:host=dbhost.cs.man.ac.uk; dbname=2021_comp10120_r7","m25334kg","Recipe_22");
            $pdo -> setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute();
            $stmt -> setFetchMode(PDO::FETCH_ASSOC);
            while ($row = $stmt -> fetch())
            {
                
                    foreach($row as $key=>$value)
                    {
                        if($key == "RECIPE_ID"){
                            echo('<a href = "displayRecipe.php?recipeID='.$value.'">');
                            echo('<div class = "recipes">');
                        }
                        else if ($key=="IMAGE"){
                            echo('<img class = "eachImage" src="data:image/png;base64,'.base64_encode($value).'">');
                        }
                        else if ($key == "RECIPE_NAME"){
                            echo('<p class = "recipeName">'.$value.'</p>');
                        }
                    }
                
                echo('</div></a>');
            }
            echo('</div>');
        }
        read();
       

?>  

    <br><br><br>
    <div class="container">
         <h1 style = "padding-left: 70px; padding-right: 12px; padding-top: 16px; padding-bottom: 8px; text-decoration: underline;">Choose a Continent to display it's Recipes</h1>
        <img class="wmap" src="worldmap.jpg">
        <a href="displayContinent.php?continentID=3">
        <button class= "btn NAmerica", style= "background-color:#0492c2" type="=button">North America</button>
        </a>
        <a href="displayContinent.php?continentID=4">
        <button class= "btn SAmerica", style= "background-color:#5dbb63" type="=button">South America</button>
        </a>
        <a href="displayContinent.php?continentID=1">
        <button class= "btn Asia", style= "background-color:#7a4988" type="=button">Asia</button>
        </a>
        <a href="displayContinent.php?continentID=2">
        <button class= "btn Europe", style= "background-color:#f25278" type="=button">Europe</button>
        </a>
        <a href="displayContinent.php?continentID=5">
        <button class= "btn Africa", style= "background-color:rgb(255,165,0);" type="=button">Africa</button>
        </a>
        <a href="displayContinent.php?continentID=6">
        <button class= "btn Australia", style= "background-color:#019799" type="=button">Australia</button>
    </a>

    </div>


    <div  class = "bottomContactFooter">
        <!-- <h1 style = "padding-left: 70px; padding-right: 12px; padding-top: 16px; padding-bottom: 8px; text-decoration: underline;">Contact Us</h1>
        <div class = "mails">
            <p style = "margin: 0; padding-left: 70px; padding-bottom: 4px ;font-weight: bold;">Email: abcdef@placeholder.com</p>
            <p style = "margin: 0; padding-right: 300px; padding-bottom: 4px ;font-weight: bold;">Slow Mail: 123 Imaginary Road, Fake Town, Fictitious Country</p>
        </div>
        <div class = "mails">
            <p style = "margin: 0; padding-left: 70px; font-weight: bold;">Phone: +44 7891234567</p>
        </div> -->
        <h1 style = "padding-left: 5%; padding-right: 12px; padding-bottom: 8px; text-decoration: underline;">Contact Us</h1>
        <div class = "mails">
            <p style = "margin: 0; padding-left: 5%; padding-bottom: 4px ;font-weight: bold;">Email: abcdef@placeholder.com</p>
            <p style = "margin: 0; padding-right: 10%; padding-bottom: 4px ;font-weight: bold;">Slow Mail: 123 Imaginary Road, Fake Town, Fictitious Country</p>
        </div>
        <div class = "mails">
            <p style = "margin: 0; padding-left: 5%; font-weight: bold;">Phone: +44 7891234567</p>
        </div>
    </div>    
 
</body>
</html>
