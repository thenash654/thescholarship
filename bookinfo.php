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
        $bookname = $_GET['bookname'];
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
        <!-- <br> -->
        <?PHP 
        echo "<h1 align='center' style='font-size: 20px;''>".$bookname."</h1><BR>"; ?>
        <form name="vote" method="post" action="bookinfo.php?bookname=<?PHP print $bookname; ?>">
        <input type="submit" value="UPVOTE" name="up-btn" style="position:relative; left:150px; text-size 10px'">
        <input type="submit" value="DOWNVOTE" name="down-btn" style="position:relative; left:160px; text-size 10px'">
        <form>
        <br><br>
        <?php

        include_once 'connectDB.php';

        $res=mysqli_query($db_handle,"SELECT user_ID FROM user WHERE username='$uname'");
        $userID=mysqli_fetch_assoc($res);
        $userID= $userID['user_ID'];

        $res=mysqli_query($db_handle,"SELECT book_ID FROM book WHERE book_name='$bookname'");
        $bookID=mysqli_fetch_assoc($res);
        $bookID= $bookID['book_ID'];


        if (isset($_POST['up-btn'])) 
        {
          $check = "SELECT * from voted_on where book_ID='$bookID' and user_ID='$userID' and has_voted=0";
          $rescheck = mysqli_query($db_handle, $check);
          while($query=mysqli_fetch_assoc($rescheck))
          {
            
            $upvotes = mysqli_query($db_handle,"SELECT upvotes from book where book_ID = '$bookID'");
            $upvoteresult = mysqli_fetch_assoc($upvotes);
            $upvoteresult = $upvoteresult['upvotes'];
            $update = "UPDATE voted_on set has_voted=1 where user_id='$userID' and book_ID = '$bookID' ";
            mysqli_query($db_handle, $update);
            $update = "UPDATE book set upvotes=$upvoteresult+1 where book_name = '$bookname' ";
            mysqli_query($db_handle, $update);
          }
        }
        if (isset($_POST['down-btn'])) 
        {
          $check = "SELECT * from voted_on where book_ID='$bookID' and user_ID='$userID' and has_voted=0";
          $rescheck = mysqli_query($db_handle, $check);
          while($query=mysqli_fetch_assoc($rescheck))
          {
            
            $downvotes = mysqli_query($db_handle,"SELECT downvotes from book where book_ID = '$bookID'");
            $downvoteresult = mysqli_fetch_assoc($downvotes);
            $downvoteresult = $downvoteresult['downvotes'];
            $update = "UPDATE voted_on set has_voted=1 where user_id='$userID' and book_ID = '$bookID' ";
            mysqli_query($db_handle, $update);
            $update = "UPDATE book set downvotes=$downvoteresult+1 where book_name = '$bookname' ";
            mysqli_query($db_handle, $update);
          }
        }

        $SQL = "SELECT * from book b LEFT JOIN download_links d ON b.book_ID=d.book_ID  where book_name like '%$bookname%'";
        $SQL2 = "SELECT * from book b left join wrote w on b.book_ID=w.book_ID left join author a on a.author_ID=w.author_ID where book_name like '%$bookname%'";
        $result = mysqli_query($db_handle,$SQL);
        $result2 = mysqli_query($db_handle, $SQL2);
        $db_field = mysqli_fetch_assoc($result);
        echo "<h1>Votes: </h1>";echo $db_field['upvotes']-$db_field['downvotes']."<BR>";
        echo "<h1>Author: </h1>";

        while ($db_field2 = mysqli_fetch_assoc($result2))
        {
          print $db_field2['Author_name']."<BR>";
        }
        print "<BR>";
        print "<h1>Summary:</h1> ".$db_field['summary']."<BR><BR>";
        if (isset($_POST['download'])) 
        {
          mysqli_query($db_handle,"INSERT INTO views(book_ID,USER_ID) values('$bookID','$userID')");

          ob_start(); // ensures anything dumped out will be caught

          // do stuff here
          $url = $db_field['link']; // this can be set based on whatever

          // clear out the output buffer
          while (ob_get_status()) 
          {
              ob_end_clean();
          }

          // no redirect
          header( "Location: $url" );
        }
        ?>
        <form name="download" method="post" action="bookinfo.php?bookname=<?PHP print $bookname; ?>">
        <input type="submit" name="download" value="Download" style="position:elative; left:40%;" ></form>
        <br></section>


    </div>


  </body>
    <div style="position:relative; width:100%; bottom:0px; left:0%;">
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
