<?php
include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );


/*echo '<pre>';
print_r($_POST);
echo '</pre>';*/
 
//checks if email variable exist if it does it stores them in the post variable else  set the variable to nothing
 //otherwise inline if statement 
  $email = isset($_POST['fmail'])? $_POST['fmail'] : '' ;
  
  $subject = isset($_POST['fsubj'])? $_POST['fsubj'] : '' ;
  $message = isset($_POST['fmsg'])? $_POST['fmsg'] : '' ;
  

  $email_error= '';
 
  $subject_error= '';
  $message_error= '';

 

  // checking if form is submitted
  if (count($_POST))
  {
    //creating a counter variable
    $errors = 0;
    //form validation
   
   if ($email == '')
    {
        $errors ++;
        $email_error = 'Space cannot be blank';
    }
    if ($subject== '')
    {
        $errors ++;
        $subject_error = 'Space cannot be blank';
    }
    
    if ($message== '')
    {
        $errors ++;
        $message_error = 'Space cannot be blank';
    }
    
    // sending form content to database if content passes validation
    //addslashes function use  to prevent sql injections
    

    if ($errors == 0)
    {
      $query = 'INSERT INTO contacts (
        
        email,
        subject,
        message
      ) VALUES (
         
         "'.addslashes($email).'",
         "'.addslashes($subject).'",
        "'.addslashes($message).'")';
          


         $result= mysqli_query($connect,$query) ;
         header('Location: thankyou.html');
         die();
      }
         

        
  }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css"
        integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
    <link rel="stylesheet" href="admin/css/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <header class="header">
        <nav class="topnav">
            <div id="logo">
                <h1>
                    <span class="Kide">Kide Bank</span>
                    <span class="piggy"><i class='fas fa-piggy-bank'></i></span>
                </h1>
            </div>
            <ul>
                <li class="nav-item"><a href="index.html">Home</a></li>
                <li class="nav-item"><a href="register.html">Apply</a></li>
                <li class="nav-item"><a href="plans.html">Choose Plan</a></li>
                <li class="nav-item"><a href="login.html">Profile</a></li>
                <li class="nav-item"><a href="faq.html">FAQ</a></li>
                <li class="nav-item"><a href="contact.php">Contact</a></li>
            </ul>
            <div class="hamburger" id="hamburger">
                <i class='fas fa-align-justify'></i>
            </div>
        </nav>
    </header>
    <div class="banner">
        <img class="banner_img" src="images/piggy.jpg" alt="image depicting community" width="150px">
    </div>
    <hr>
    <div  >
        <form method="post" id="contact" >
            
            <h2>Contact Us</h2>
            <div class="group_info" >
                
                <label for="fmail">Email</label>
                <input type="text" name="fmail" id="fmail">
                <br>
                <label for="fsubj">Subject</label>
                <input type="text" name="fsubj" id="fsubj">
                <br>
                <label for="fmsg">Your Message</label>
                <br>
                <textarea name="fmsg" id="fmsg" cols="50" rows="10"></textarea>
                <br>
                <input type="submit" value="Send Message" id="button">
        </form>
    </div>
    <footer class="footer">
        <div class="footer_socials">
            <ul>
                <li><i class='fab fa-linkedin'></i>linkedin</li>
                <li><i class='fab fa-facebook'></i>facebook</li>
                <li> <i class='fab fa-twitter'></i>twitter</li>
                <li><i class='fab fa-instagram'></i>instagram</li>
            </ul>
        </div>
        <div class="footer_nav">
            <ul >
                <li>Terms of Use</li>
                <li>Contact Us</li>
            </ul>
        </div>
        <div id="footer_copy">
            <p>&copy;2022 Hilda Obioma. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>