<!DOCTYPE html>
<html>




  <head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=640">

    <link rel="stylesheet" href="stylesheets/core.css" media="screen">
    <link rel="stylesheet" href="stylesheets/mobile.css" media="handheld, only screen and (max-device-width:640px)">
    <link rel="stylesheet" href="stylesheets/github-light.css">

    <script type="text/javascript" src="javascripts/modernizr.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="javascripts/headsmart.min.js"></script>

    <link rel="stylesheet" href="javascripts/Common/jquery-ui-themes-1.10.4/themes/pepper-grinder/jquery-ui.css"></link>
    <link rel="stylesheet" href="javascripts/Common/jquery-ui-themes-1.10.4/themes/pepper-grinder/jquery.ui.theme.css"></link>
    <link rel="stylesheet" href="javascripts/Common/jquery-ui-themes-1.10.4/themes/pepper-grinder/jquery-ui.min.css"></link>


    <script type="text/javascript" src="javascripts/Common/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="javascripts/Common/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
    <script type="text/javascript" src="javascripts/Common/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>

    <script type="php" src="..php/login.php"></script>


    <script type="text/javascript">
      $(document).ready(function () {
        $('#main_content').headsmart()
      })
    </script>


  <script>
  $(function() {
    $( "input[type=submit], b, button" )
      .button()
      .click(function( event ) {
      });

      $( "#slider" ).slider();

  });

  </script>
    <title>Log in - The Scholar's Ship</title>
  </head>

  <body>
    <div class="shell">
      <header>
        <a href="home.php">
        <span class="ribbon-outer">
          <span class="ribbon-inner"><h1>The Scholar&#39;s Ship</h1>
            <h2>Your go-to website for course textbooks</h2>
          </span>
          <span class="left-tail"></span>
          <span class="right-tail"></span>
        </span></a>
      </header>

<div >
      <section id="downloads">
        <span class="inner" >
          <div class="zip">
          </div>
          <div class="tgz">
          </div>
        </span>
      </section>
    </div>

<section id="main_content">


<?PHP
session_start();
if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
include_once 'connectDB.php';

if ($db_found) {

$username ="";
$error = "";

  if (isset($_POST['login'])) 
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $SQL = "SELECT * FROM user WHERE username='$username'";
    $result=mysqli_query($db_handle,$SQL);

    $row=mysqli_fetch_assoc($result);

     if($row['password']==$password)
     {
        $_SESSION['user'] = $row['username'];
        mysqli_close($db_handle);
        header('Location: home.php');
     }
     else
     {
            $error = "Information not correct";
     }
    }
    
  }


else {

print "Database NOT Found ";

}
?>

<form name="signup" method="post" action="login.php">
    <div style="position:absolute; top:50%; left:35%">

    <h1>
    Username </h1>
    <input type="text" name="username" size="20" value="<?PHP print $username ; ?>" >
    <br><br>

    <h1>Password</h1>
    <input type="password" name="password" size="20" style="" value="<?PHP print $password ; ?>"><br>

    <?php echo "$error";?>
    <br>
    <input type="submit" name="login" value="Log in" style="position:relative;left:28%;">

    <br>

    </div>
</form>
</section>


    <div style="position:absolute; width:100%; bottom:0; left:0%;">
      <footer>
        <span class="ribbon-outer">
          <span class="ribbon-inner" >
            <P>Made by Maimoona Khalid, Nashmia Riaz and Taha Raza</P>
          </span>
          <span class="left-tail"></span>
          <span class="right-tail"></span>
        </span>
      </footer>


    </div>




  </body>





</html>
