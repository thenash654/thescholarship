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
        <br>
        <?php
        // echo $_GET['bookname'];
        $bookname = $_GET['bookname'];
        include_once 'connectDB.php';

        $SQL = "SELECT * from book b LEFT JOIN download_links d ON b.book_ID=d.book_ID LEFT JOIN wrote w ON b.book_ID=w.book_ID left join author a on w.Author_ID = a.author_ID where book_name='$bookname'";
        $SQL2 = "SELECT * from book b left join wrote w on b.book_ID=w.book_ID left join author a on a.author_ID=w.author_ID where book_name='$bookname'";
        $result = mysqli_query($db_handle,$SQL);
        $result2 = mysqli_query($db_handle, $SQL2);
        $db_field = mysqli_fetch_assoc($result);
        print "<h1>Name: </h1>".$db_field['book_name']."<BR>";
        Echo "<h1>Author: </h1>";
        while ($db_field2 = mysqli_fetch_assoc($result2))
        {
          print $db_field2['Author_name']."<BR>";
        }
        print "<h1>Summary:</h1> ".$db_field['summary']."<BR>";
        print "<a href=".$db_field['link'].">Download link</a><BR>";
        
        
        //echo $var_value; 
        ?>
<!-- <a id="log-in" href=""><img src="images\Log in.jpg" style="width:177px; height:92.75px; position:relative;left:70px  "></a> -->
<!-- <a id="sign-up" href=""><img src="images\Sign up.jpg" style="width:177px; height:92.75px; position:relative; left:70px "></a> -->

<!-- <a id="welcome-to-github-pages" class="anchor" href="#welcome-to-github-pages" aria-hidden="true"><span class="octicon octicon-link"></span></a>Welcome to GitHub Pages.</h3>

<p>This automatic page generator is the easiest way to create beautiful pages for all of your projects. Author your page content here <a href="https://guides.github.com/features/mastering-markdown/">using GitHub Flavored Markdown</a>, select a template crafted by a designer, and publish. After your page is generated, you can check out the new <code>gh-pages</code> branch locally. If you’re using GitHub Desktop, simply sync your repository and you’ll see the new branch.</p>

<h3>
<a id="designer-templates" class="anchor" href="#designer-templates" aria-hidden="true"><span class="octicon octicon-link"></span></a>Designer Templates</h3>

<p>We’ve crafted some handsome templates for you to use. Go ahead and click 'Continue to layouts' to browse through them. You can easily go back to edit your page before publishing. After publishing your page, you can revisit the page generator and switch to another theme. Your Page content will be preserved.</p>

<h3>
<a id="creating-pages-manually" class="anchor" href="#creating-pages-manually" aria-hidden="true"><span class="octicon octicon-link"></span></a>Creating pages manually</h3>

<p>If you prefer to not use the automatic generator, push a branch named <code>gh-pages</code> to your repository to create a page manually. In addition to supporting regular HTML content, GitHub Pages support Jekyll, a simple, blog aware static site generator. Jekyll makes it easy to create site-wide headers and footers without having to copy them across every page. It also offers intelligent blog support and other advanced templating features.</p>

<h3>
<a id="authors-and-contributors" class="anchor" href="#authors-and-contributors" aria-hidden="true"><span class="octicon octicon-link"></span></a>Authors and Contributors</h3>

<p>You can <a href="https://github.com/blog/821" class="user-mention">@mention</a> a GitHub username to generate a link to their profile. The resulting <code>&lt;a&gt;</code> element will link to the contributor’s GitHub Profile. For example: In 2007, Chris Wanstrath (<a href="https://github.com/defunkt" class="user-mention">@defunkt</a>), PJ Hyett (<a href="https://github.com/pjhyett" class="user-mention">@pjhyett</a>), and Tom Preston-Werner (<a href="https://github.com/mojombo" class="user-mention">@mojombo</a>) founded GitHub.</p>

<h3>
<a id="support-or-contact" class="anchor" href="#support-or-contact" aria-hidden="true"><span class="octicon octicon-link"></span></a>Support or Contact</h3>

<p>Having trouble with Pages? Check out our <a href="https://help.github.com/pages">documentation</a> or <a href="https://github.com/contact">contact support</a> and we’ll help you sort it out.</p> -->
      </section>


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
