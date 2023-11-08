<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A description of our website.">
    <link rel="stylesheet" type="text/css" href="recipe_style.css">
    <title>WWR</title> 
</head>
<body>
    <a href="home.html" target = "-blank" title = "Home">
        <img src="wwr.png" alt="Web Name" class="top">
    </a>
    <a href="login.html" target = "-blank" title = "Login">
        <img src="login.png" alt="login" class="Login">
    </a>
    <a href="register.html" target = "-blank" title = "Register">
        <img src="register.png" alt="register" class="Register">
    </a>
    <hr color="orange">
</body>

<body>

    <?php
$database_host = "dbhost.cs.man.ac.uk";
$database_user = "m25334kg";
$database_pass = "Recipe_22";
$database_name = "m25334kg";

$conn = mysqli_connect($database_host,$database_user,$database_pass);
if (!$conn)
    die("connection failed".mysqli_connect_error());
echo("all good");

function read()
{
    $sql = "select * from RECIPES";
    $pdo = new pdo ("mysql:host=dbhost.cs.man.ac.uk; dbname=2021_comp10120_r7","m25334kg","Recipe_22");
    $pdo -> setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $stmt -> setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $stmt -> fetch())
    {
        if (is_array($row))
        {
            foreach($row as $key=>$value)
            {
                if ($key=="IMAGE")
                    echo('<img src=\"data:image/jpeg;base64,".base64_encode($value)."\" width=\"100px\" height=\"100px\"\/>');
                else if (is_array($value))
                    foreach($value as $keyy=>$valuee)
                    {
                        echo("$keyy - $valuee");
                    }
                else
                echo("$key - $value<br>");
            }
        }
        else
        {
            echo("$row");
        }
        
    }
}


echo('<div class="Container">
        <h1 class="RecipeName">
            <em>Recipe Name</em>
        </h1>
        <hr>
        <img src="heart (1).png" alt="like" class="whiteheart" id="heartwhite" onclick="changePicture()" >
        <div id="heartred" style="width:20px;height:20px;float:left;"></div>
        <p class="likes">5,088</p>
        <div>
            <img src="sample.png" alt="Recipe Picture" class="sample">
        </div>
        <div>
            <p class="OtherInformation">');


read();

echo('</p> 
        </div>
        <p class = "Description">
            <b>Step1:</b> <!database> <img><!database></img>
        </p>
        <p>
        <p class="Description">
            <!database>
        </p>
    </div>
    <div class="Contect">
        <h1 class="Contectus">Contact us</h1><hr>
    </div>
</body>
');

?>

    
               <!--  Author :    <!database><br><br>
                Publish date :    <!database><br><br>
                Continent:    <!database><br><br>
                Meal type :    <!database><br><br>
                Ingredients:    <!database> 
             -->
<script>
    function changePicture(){
        var wheart = document.getElementById("heartwhite");
        wheart.remove();
        var rheart = document.createElement("img");
        rheart.src = "heartred (1).png";
        var myp = document.getElementById('heartred');
        myp.class="redheart";
        myp.appendChild(rheart);
    }
</script>

</html>

