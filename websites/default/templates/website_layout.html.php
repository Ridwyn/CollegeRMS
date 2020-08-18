
<!DOCTYPE html>
<html>
<head>
   
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="/website.css" />
     <title><?php echo $title ?></title>
</head>

<body>
    <header>
        <div class="header" >
        <img  class="logo"src="/images/woodlands_logo.jpg" alt="logo" >
        <h1>Woodlands University College</h1>
        

    
        <form action="#">
            <input type="text" name="search" placeholder="Search for anything" />
            <input type="submit" name="submit" value="Search" />
        </form>
        </div>

    </header>

  
 <?php require 'website_nav.html.php'?>

 
 <main class= <?php echo $mainClass  ?>>  
    <!--This is the main content for each page-->
    <?php echo $output  ?>
</main>
<footer>
 <ul class="footer-list">
     <li>Contact us at:</li>
     <li>Email: woodlandsuniversitycollege@temp.com</li>
     <li>Telephone: 01234 567890</li>
 </ul>

    &copy; Cloud Solutions 2020
</footer>

</body>

</html>