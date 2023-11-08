  <?php
$database_host = "dbhost.cs.man.ac.uk";
$database_user = "m25334kg";
$database_pass = "Recipe_22";
$database_name = "m25334kg";

$conn = mysqli_connect($database_host,$database_user,$database_pass);
if (!$conn)
    die("connection failed".mysqli_connect_error());
mysqli_select_db($conn,"2021_comp10120_r7");
?>