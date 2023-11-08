<?php
  session_start();
  if(isset($_SESSION['username'])){

  }
  else{
    header('location:login.php');
  }

?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A description of our website.">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <title>WWR</title> 
    <style type="text/css">
        /*div {
            width: 320px;
            height: 200px;
            padding: 10px;
            border: 10px whitesmoke;
            background: orange;
            margin: 10;
            text-align: center;
        }*/

        
    </style>
</head>


<body> 

    <div class = "topNavHeader">
        <a href="mainPage.php">
            <img src = www1.png>
        </a>

        
    </div>

    <div class="uploadtext">
        <h1>Upload Recipe</h1>
    </div>
    

        
            <?php
                function display_form()
                {
                    $userid = $_GET['user_id'];
                    $username = $_GET['user_name'];
                    echo('
                    <form method = \'POST\' enctype="multipart/form-data" action = "upload_page.php?author_name='.$username.'&author_id='.$userid.'">
                    <div class="columns">
            
                        <div class="column1">
                            <div class = "imageUploadCSS">
                                <div class="drag-area">
                                    <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                    <label for = "image"> Upload an Image:</label>
                                    <input type="file" name="image" id = "image" value="pictures">
                                </div>
                                <script src="script.js"></script>
                                
                            </div>
                        </div>
                        <div class="column2">
                        <div class = "verticalInformation">
                            <label class = "labelCSS" for = "recipe_name"> Recipe Name: </label>
                            <input class = "tbCSS" type="text" name="recipe_name" id = "recipe_name">

                        </div>'.
                        // <div class = "verticalInformation">
                        //     <label class = "labelCSS" for = "author_name"> Author Name: </label>
                        //     <input class = "tbCSS" type="text" name="author_name" id = "author_name">
                        // </div>
                        // <div class = "verticalInformation">
                        //     <label class = "labelCSS" for = "author_id"> Enter your user id: </label>
                        //     <input class = "tbCSS" type="text" name="author_id" id = "user_id">
                        // </div>
                        '<div class = "verticalInformation">
                            <label class = "labelCSS" for = "author_notes"> Author Notes: </label>
                            <input class = "tbCSS" type="text" name="author_notes" id = "notes">
                        </div>
                        <div class = "verticalInformation">
                            <label class = "labelCSS" for = "meal_type"> Meal Type: </label>
                            <!--<input class = "tbCSS" type="text" name="meal_type" id = "meal_type">-->
                            <select class = "tbCSS" name="meal_type" id="meal_type">
                                <option value="">Select one...</option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Lunch">Lunch</option>
                                <option value="Dinner">Dinner</option>
                                <option value="Snack">Snack</option>
                            </select>
                        </div>
                        <div class = "verticalInformation">
                            <label class = "labelCSS" for = "continent"> Continent: </label>  <!-- // find a way to convert to continent id from name of continent. Maybe try radio buttons -->
                            <!-- <input class = "tbCSS" class = "inputBoxes" type="text" name="continent" id = "continent"> -->
                            <select class = "tbCSS" name="continent" id="continent">
                                <option value="">Select one...</option>
                                <option value="Africa">Africa</option>
                                <option value="Asia">Asia</option>
                                <option value="Australia">Australia</option>
                                <option value="Europe">Europe</option>
                                <option value="North America">North America</option>
                                <option value="South America">South America</option>                                
                            </select>
                        </div>
                        <div class = "verticalInformation">
                            <label class = "labelCSS" for = "keywords"> Enter one keyword: </label>
                            <input class = "tbCSS" type="text" name="keywords" id = "keywords">
                        </div>
                        <div class = "verticalInformation">
                            <label class = "labelLongCSS" for = "ingredients"> Enter ingredients: </label>
                            <textarea class = "tbLongCSS" name="ingredients" id = "ingredients" rows="10" cols="30"></textarea>
                        </div>
                        <div class = "verticalInformation">
                            <label class = "labelLongCSS" for = "steps"> Enter steps: </label>
                            <textarea class = "tbLongCSS" name="steps" id = "steps" rows="10" cols="30"></textarea>
                        </div>



                        <input class = "submitBox" type="submit" name="Submit"><br>
                        </div>
                    </form>
                    ');
                }

                function getID()
                {

                    $database_host = "dbhost.cs.man.ac.uk";
                    $database_user = "m25334kg";
                    $database_pass = "Recipe_22";
                    $database_name = "m25334kg";

                    $conn = mysqli_connect($database_host,$database_user,$database_pass);
                    $sql = 'select RECIPE_ID from RECIPES';
                    $pdo = new pdo ("mysql:host=dbhost.cs.man.ac.uk; dbname=2021_comp10120_r7","m25334kg","Recipe_22");
                    $pdo -> setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                    $stmt = $pdo -> prepare($sql);
                    $stmt -> execute([]);
                    $stmt -> setFetchMode(PDO::FETCH_ASSOC);
                    $id = 0;
                    while ($row = $stmt -> fetch())
                    {
                        $id2 = $row['RECIPE_ID'];
                        if ($id2>$id)
                        {
                            $id = $id2;
                        }
                    }

                    $id = $id+1;
                    return $id;
                    mysqli_close($conn);

                }

                function getContID($nameIn)
                {
                    $database_host = "dbhost.cs.man.ac.uk";
                    $database_user = "m25334kg";
                    $database_pass = "Recipe_22";
                    $database_name = "m25334kg";

                    $conn = mysqli_connect($database_host,$database_user,$database_pass);

                    $sql = 'select CONTINENT_ID, CONTINENT_NAME from CONTINENTS';
                    $pdo = new pdo ("mysql:host=dbhost.cs.man.ac.uk; dbname=2021_comp10120_r7","m25334kg","Recipe_22");
                    $pdo -> setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                    $stmt = $pdo -> prepare($sql);
                    $stmt -> execute([]);
                    $stmt -> setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $stmt -> fetch())
                    {
                        $name = $row['CONTINENT_NAME'];
                        if ($name==$nameIn)
                        return $row['CONTINENT_ID'];
                    }

                    return null;
                    mysqli_close($conn);


                }


                function upload()
                {
                    $database_host = "dbhost.cs.man.ac.uk";
                    $database_user = "m25334kg";
                    $database_pass = "Recipe_22";
                    $database_name = "m25334kg";


                    $name = $_POST['recipe_name'];
                    $auth_name = $_GET['author_name'];
                    $auth_id = $_GET['author_id'];
                    $notes = $_POST['author_notes'];
                    $meal = $_POST['meal_type'];
                    $ing = $_POST['ingredients'];
                    $steps = $_POST['steps'];
                    $keyword = $_POST['keywords'];
                    $cont_id = getContID($_POST['continent']);
                    $rec_id = getID();
                    $date = date("Y-m-d");
                    //$img = $_FILES['image'];
                    $file = file_get_contents($_FILES['image']['name']);

                    $sql = 'insert into RECIPES (recipe_name, author_name, author_id, author_notes,meal_type,ingredients,steps,keywords,CONTINENT_ID, RECIPE_ID, publish_date,image) values(:name,:auth_name,:auth_id,:notes,:meal,:ing,:steps,:keyword,:cont_id,:rec_id,:date,:image)';
                    $pdo = new pdo ("mysql:host=dbhost.cs.man.ac.uk; dbname=2021_comp10120_r7","m25334kg","Recipe_22");
                    $pdo -> setAttribute (PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                    $stmt = $pdo -> prepare($sql);
                    $stmt -> execute([
                    'name' => $name,
                    'auth_name' => $auth_name,
                    'auth_id' => $auth_id,
                    'notes' => $notes,
                    'meal' => $meal,
                    'ing' => $ing,
                    'steps' => $steps,
                    'keyword' => $keyword,
                    'cont_id' => $cont_id,
                    'rec_id' => $rec_id,
                    'date' => $date,
                    'image' => $file
                    ]);
                    // recipe_id, publish_date2, image, continent id
                }

                if (empty($_POST))
                {
                    display_form();
                }
                else
                {
                    echo('<div>
                        <a href="mainPage.php">
                            <button class = "uploadedButton" type = "button">Recipe Uploaded</button></a>

                        </div>');
                        upload();
                    }

                ?>
            
        </div>
           
    </div>

    <div  class = "bottomContactFooter">
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
