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
    $( "input[type=submit], a, button" )
      .button()
      .click(function( event ) {
      });

      $( "#slider" ).slider();

  });

  </script>
    <title>Sign up- The Scholar's Ship</title>
  </head>

  <body>
    <div class="shell">
      <header>
        <span class="ribbon-outer">
          <span class="ribbon-inner">
            <h1>The Scholar&#39;s Ship</h1>
            <h2>Your go-to website for course textbooks</h2>
          </span>
          <span class="left-tail"></span>
          <span class="right-tail"></span>
        </span>
      </header>

<div style="width:100%">
      <section id="downloads">
        <span class="inner" >
          <div class="zip">
          </div>
          <div class="tgz">
          </div>
        </span>
      </section>
    </div>


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
<?PHP
session_start();if(isset($_SESSION['user'])!="")
{
 header("Location: index.php");
}
include_once 'connectDB.php';

if ($db_found) {

$username ="";
$error = "";

  if (isset($_POST['signup'])) 
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $error;
    $SQL = "INSERT INTO user (username, password) values('$username', '$password')";
     if(mysqli_query($db_handle,$SQL))
     {
      ?>
            <script type="text/javascript">alert('successfully registered ');</script>
            <?php
            header('Location: index.php');
            mysqli_close($db_handle);
     }
     else
     {
            $error = "Username already taken.";
     }
    }
    
  }


else {

print "Database NOT Found ";

}
?>




<form name="signup" method="post" action="signup.php">
    <div style="position:absolute; top:45%; left:45%">

      <h1>
    Username </h1>
    <input type="text" name="username" size="20" value="<?PHP print $username ; ?>" >
    <?php echo "$error";?>
    <br><br>

    <h1>Password</h1>
    <input type="password" name="password" size="20" style="" value="<?PHP print $password ; ?>"><br><br>

    <input type="submit" name="signup" value="Sign up" style="position:relative;left:28%;">

    <br>

    </div>
</form>

<text value="<?php echo "$error";?>"> </text>
</html>
