<?PHP

$user_name = "root";
$password = "";
$database = "university";
$server = "127.0.0.1";

$db_handle = mysqli_connect($server, $user_name, $password);

$db_found = mysqli_select_db($db_handle,$database);

if ($db_found) {

$SQL = "INSERT INTO student (snum, sname, major, level, age) values (1, 'Nashmia', 'SE', 'UG', 20)";
$SQL2 = "SELECT * FROM student where sname='Nashmia'";

$result = mysqli_query($db_handle,$SQL);
$result2 = mysqli_query($db_handle,$SQL2);
while ( $db_field = mysqli_fetch_assoc($result2) ) {

print $db_field['snum'] . "<BR>";
print $db_field['sname'] . "<BR>";
print $db_field['major'] . "<BR>";
print $db_field['level'] . "<BR>";
print $db_field['age'] . "<BR>";

}

mysqli_close($db_handle);
}
else {

print "Database NOT Found ";

}

?>
