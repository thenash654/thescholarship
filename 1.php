<!DOCTYPE html>
<html>




  <body>

<?PHP

$user_name = "root";
$password = "";
$database = "users";
$server = "127.0.0.1";

$db_handle = mysqli_connect($server, $user_name, $password);

$db_found = mysqli_select_db($db_handle,$database);

if ($db_found) {

$username ="default";


if (isset($_POST['signup'])) {

$username = $_POST['username'];
$password = $_POST['password'];

print $username;
print $password;
$SQL = "INSERT INTO USERINFO (username, password) values('$username', '$password')";
$result = mysqli_query($db_handle,$SQL);


}



mysqli_close($db_handle);
}
else {

print "Database NOT Found ";

}

?>


<form name="signup" method="post" action="1.php">
    <div style="position:absolute; top:45%; left:45%">

      <h1>
    Username </h1>
    <input type="text" name="username" size="20" value="<?PHP print $username ; ?>" >

    <br><br>

    <h1>Password</h1>
    <input type="password" name="password" size="20" style="" value="<?PHP print $password ; ?>"><br><br>

<input type="submit" name="signup" value="Sign up" style="position:relative;left:28%;">

    <br>

    </div>
</form>


  </body>
</html>
