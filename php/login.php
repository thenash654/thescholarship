<html>
<head>
<?PHP
$username ="default";


if (isset($_POST['login'])) {

  $username = $_POST['username'];

  print $username;

}
else {
  $username ="";

}


?>
</head>
</html>
