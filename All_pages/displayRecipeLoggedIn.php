
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mainpage</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Roboto+Serif:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
    <h1 title="World Wide Food"></h1>

   
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
        </div>');
        ?>
            
        <!-- <div class = "loginRegister">
            <button onclick="window.location.href='register.php';" class = "inputStyle" type="=button">Register</button>
            <button onclick="window.location.href='login.php';" class = "inputStyle" type="=button">Login</button>
        </div> -->
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

 
    <?php
$database_host = "dbhost.cs.man.ac.uk";
$database_user = "m25334kg";
$database_pass = "Recipe_22";
$database_name = "m25334kg";
$conn = mysqli_connect($database_host,$database_user,$database_pass);
if (!$conn)
    die("connection failed".mysqli_connect_error());


function read()

{
    $recipeID = $_GET['recipeID'];
    $username = $_GET['username'];
    // echo($recipeID);
    $sql = "select * from RECIPES where RECIPE_ID=".$recipeID;
    $pdo = new pdo ("mysql:host=dbhost.cs.man.ac.uk; dbname=2021_comp10120_r7","m25334kg","Recipe_22");
    $pdo -> setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $stmt -> setFetchMode(PDO::FETCH_ASSOC);

    echo('<div class = "OtherInformation">');
    while ($row = $stmt -> fetch())
    {
        if (is_array($row))
        {
            foreach($row as $key=>$value)
            {
                if(($value != null) && ($key != 'AUTHOR_ID')){
                    if ($key=='RECIPE_NAME')
                    {
                        echo('<h1 class="RecipeName"><em>'.ucfirst($value).'</em></h1>');
                    }
                    else if ($key=="IMAGE")
                        print"<img class = \"RecipeImage\" src=\"data:image/jpeg;base64,".base64_encode($value)."\" \/><br>";
                }
            }
        }        
    }

    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $stmt -> setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $stmt -> fetch())
    {
        
        if (is_array($row))
        {
            foreach($row as $key=>$value)
            {
                if(($value != null) && ($key != 'AUTHOR_ID') && ($key != 'RECIPE_ID')&& ($key != 'IMAGE')&& ($key != 'RECIPE_NAME')){
                    if(($key != 'IMAGE') && ($key != 'RECIPE_NAME') && ($key != 'CONTINENT_ID')){
                        echo('<p class = "SubTitle">'.$key.'</p>');
                    }
                    if ($key == 'CONTINENT_ID'){
                        echo('<p class = "SubTitle">CONTINENT NAME</p>');
                        $sql2 = "select CONTINENT_NAME from CONTINENTS where CONTINENT_ID=".$value;
                        $pdo2 = new pdo ("mysql:host=dbhost.cs.man.ac.uk; dbname=2021_comp10120_r7","m25334kg","Recipe_22");
                        $pdo2 -> setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                        $stmt2 = $pdo2 -> prepare($sql2);
                        $stmt2 -> execute();
                        $stmt2 -> setFetchMode(PDO::FETCH_ASSOC);
                        $row2 = $stmt2 -> fetch();
                        echo(': '.$row2['CONTINENT_NAME'].'<br>');
                    }                  
                    else if($key == 'STEPS'){
                        echo('<br>');
                        $array = str_split($value);
                        foreach ($array as $char) {
                            if($char == "\n"){
                                echo('<br>');
                            }
                            else{
                                echo($char);
                            }
                        }
                        echo('<br>');
                    }
                    else{
                        echo(": $value<br>");
                    }
                }
            }
        }
        else
        {
            echo("$row");
        }
        
        
    }
    echo('</div>');
}





read();



?>
</div>

<div  class = "bottomContactFooter">
    <h1 style = "padding-left: 70px; padding-right: 12px; padding-top: 16px; padding-bottom: 8px; text-decoration: underline;">Contact Us</h1>
    <div class = "mails">
        <p style = "margin: 0; padding-left: 70px; padding-bottom: 4px ;font-weight: bold;">Email: abcdef@placeholder.com</p>
        <p style = "margin: 0; padding-right: 300px; padding-bottom: 4px ;font-weight: bold;">Slow Mail: 123 Imaginary Road, Fake Town, Fictitious Country</p>
    </div>
    <div class = "mails">
        <p style = "margin: 0; padding-left: 70px; font-weight: bold;">Phone: +44 7891234567</p>
    </div>
</div>    

        
</body>
</html>

