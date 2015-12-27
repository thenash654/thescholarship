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
        <a href="home.php">
        <span class="ribbon-outer">
          <span class="ribbon-inner"><h1>The Scholar&#39;s Ship</h1>
            <h2>Your go-to website for course textbooks</h2>
          </span>
          <span class="left-tail"></span>
          <span class="right-tail"></span>
        </span></a>
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
        <h1 align="center" style="font-size: 20px;"> Book Information </h1>
        <!-- <br> -->
        <input type="text" id="search" style="position:relative; width:60%; left:12%; height:20px;">
        <input type="submit" id="search-btn" style="position:relative; left:70px; text-size 10px'">
        <br><br>
        <?php
        $bookname = $_GET['bookname'];
        include_once 'connectDB.php';

        $SQL = "SELECT * from book b LEFT JOIN download_links d ON b.book_ID=d.book_ID  where book_name like '%$bookname%'";
        $SQL2 = "SELECT * from book b left join wrote w on b.book_ID=w.book_ID left join author a on a.author_ID=w.author_ID where book_name like '%$bookname%'";
        $result = mysqli_query($db_handle,$SQL);
        $result2 = mysqli_query($db_handle, $SQL2);
        $db_field = mysqli_fetch_assoc($result);
        echo "<h1>Name: </h1>".$db_field['book_name']."<BR><BR>";
        echo "<h1>Author: </h1>";
        while ($db_field2 = mysqli_fetch_assoc($result2))
        {
          print $db_field2['Author_name']."<BR>";
        }print "<BR>";
        print "<h1>Summary:</h1> ".$db_field['summary']."<BR><BR>";
        print "<a href=".$db_field['link'].">Download link</a><BR>";
        
        ?><br></section>


    </div>


  </body>
    <div style="position:absolute; width:100%; bottom:0px; left:0%;">
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
