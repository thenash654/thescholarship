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
    <script type="text/javascript">

      $(document).ready(function () {
        $('#main_content').headsmart()
      
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
    <title>Home Page - The Scholar's Ship</title>
  </head>

  <body>
    <!-- <a id="forkme_banner" href="https://github.com/thenash654/thescholarship">View on GitHub</a> -->
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
          <div class="zip"><em><?php
        session_start();
        include_once 'connectDB.php';

        if(!isset($_SESSION['user']))
        {
         header("Location: index.php");
        }
        $uname = $_SESSION['user'];
        $res=mysqli_query($db_handle,"SELECT * FROM user WHERE username='$uname'");
        $userRow=mysqli_fetch_assoc($res);
        echo $userRow['username']; ?></em>
          </div>
          <div class="tgz"><em>
        &nbsp;<a href="logout.php?logout" style="color:#00e6e6;">Sign Out</a></em>
          </div>
        </span>
      </section>
    </div>


      <span class="banner-fix"></span>

      <section id="main_content">
        <h1 align="center" style="font-size: 20px;"> Home Page </h1>
        <!-- <br> -->
        <form name="signup" method="post" action="home.php">
        <input type="text"  name="searchname" style="position:relative; width:60%; left:12%; height:20px;" >
        <input type="submit" name="search" value="Search" style="position:relative; left:70px; text-size 10px'">
      </form>
        <br>
        <?php
        include_once 'connectDB.php';
        if (isset($_POST['search'])) 
        {
          $bookname = $_POST['searchname']; 
          $SQL = "SELECT * from book where book_name LIKE '%$bookname%' Order by book_name desc";
        }
        else{
          $SQL = "SELECT * from book Order by book_name ";}

        $result = mysqli_query($db_handle,$SQL);
        while ( $db_field = mysqli_fetch_assoc($result) ) {
           $url = "bookinfo.php?bookname=".$db_field['book_name'];?>
           <a href="<?php print $url; ?>">  
            <?php
            echo $db_field['book_name'] . "<BR>";
        
        }
        ?>
      </a>
    </section>

    

    </div>


  </body><div style="position:relative; width:100%; bottom:0px; left:0%;">
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
</html>
