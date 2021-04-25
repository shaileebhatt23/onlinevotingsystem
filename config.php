 <?php
$db_user = "root";
$db_pass = "";
$db_name = "register";
$db_host = "localhost";

$db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


 ?>