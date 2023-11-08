<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A description of our website.">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>WWR</title> 
</head>
<body>
    <a href="home.html" target = "-blank" title = "Home">
        <img src= "images/wwr.png" alt="Web Name" class="top">
    </a>
    <a href="login.html" target = "-blank" title = "Login">
        <img src= "images/login.png" alt="login" class="Login">
    </a>
    <a href="register.html" target = "-blank" title = "Register">
        <img src= "images/signin.png" alt="register" class="Register">
    </a>
    <hr color="orange">
</body>

<body>

<?php

function readName() {

    $database_host = "dbhost.cs.man.ac.uk";
    $database_user = "m25334kg";
    $database_pass = "Recipe_22";
    $database_name = "2021_comp10120_r7";

    $conn = mysqli_connect($database_host,$database_user,$database_pass,$database_name);
    if (!$conn)
        die("connection failed".mysqli_connect_error());
    $result = mysqli_query($conn,"SELECT * FROM RECIPES WHERE RECIPE_NAME = 'Boiled Eggs'");

    while($row = mysqli_fetch_array($result))
    {
        echo $row['RECIPE_NAME'];
    }
}

function readHeadInfo() {

    $database_host = "dbhost.cs.man.ac.uk";
    $database_user = "m25334kg";
    $database_pass = "Recipe_22";
    $database_name = "2021_comp10120_r7";

    $conn = mysqli_connect($database_host,$database_user,$database_pass,$database_name);
    if (!$conn)
        die("connection failed".mysqli_connect_error());
    $result = mysqli_query($conn,"SELECT * FROM RECIPES WHERE RECIPE_NAME = 'Boiled Eggs'");

    while($row = mysqli_fetch_array($result))
    {
        echo ($row['LIKES'].' ');
        echo ($row['AUTHOR_NAME'].' ');
        echo ($row['PUBLISH_DATE'].' ');
    }
}

/*function readImage() {

    $database_host = "dbhost.cs.man.ac.uk";
    $database_user = "m25334kg";
    $database_pass = "Recipe_22";
    $database_name = "2021_comp10120_r7";

    $conn = mysqli_connect($database_host,$database_user,$database_pass,$database_name);
    if (!$conn)
    die("connection failed".mysqli_connect_error());
    $result = mysqli_query($conn,"SELECT * FROM RECIPES WHERE RECIPE_NAME = 'Boiled Eggs'");

    while($row = mysqli_fetch_array($result))
    {
        echo $row['IMAGE'];
    }
}*/

function readImageInfo() {
        $sql = "select * from RECIPES where RECIPE_NAME = 'Boiled Eggs'";
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
                        print"<img src=\"data:image/jpeg;base64,".base64_encode($value)."\" width=\"800px\" height=\"580px\"\/>".'<br><br>';

                }
            }
        }

        $database_host = "dbhost.cs.man.ac.uk";
        $database_user = "m25334kg";
        $database_pass = "Recipe_22";
        $database_name = "2021_comp10120_r7";

        $conn = mysqli_connect($database_host,$database_user,$database_pass,$database_name);
        if (!$conn)
            die("connection failed".mysqli_connect_error());
            $result = mysqli_query($conn,"SELECT * FROM RECIPES WHERE RECIPE_NAME = 'Boiled Eggs'");
            while($row = mysqli_fetch_array($result)){
                echo ("Ingredients: ".$row['INGREDIENTS'].'<br><br>');
                echo ("Steps: ".$row['STEPS']);
            }
}

echo('<div class="Container">
        <h1 class="RecipeName">
            <em>');


readName();

echo('</em>
        </h1>
        <hr style = color:white>
        <img src="images/heart(1).png" alt="like" class="whiteheart" id="heartwhite" onclick="changePicture()" >
        <div id="heartred" style="width:20px;height:20px;float:left;"></div>
        <p class="likes">');

readHeadInfo();


echo('</p>
        <div>
            <p class="OtherInformation">');
        
readImageInfo();


echo('</p> 
        </div>
        </div>
        <div class="Contect">
            <h1 class="Contectus">Contact us</h1>
            <hr>
        </div>
        </body>');

?>

<script>
    function changePicture(){
        var wheart = document.getElementById("heartwhite");
        wheart.remove();
        var rheart = document.createElement("img");
        rheart.src = "images/heartred(1).png";
        var myp = document.getElementById('heartred');
        myp.class="redheart";
        myp.appendChild(rheart);
    }
</script>

</html>

