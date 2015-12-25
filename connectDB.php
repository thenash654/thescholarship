<?PHP

$user_name = "root";
$password = "";
$database = "the_scholar_ship";
$server = "127.0.0.1";

$db_handle = mysqli_connect($server, $user_name, $password);

$db_found = mysqli_select_db($db_handle,$database);

?>