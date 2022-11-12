<!DOCTYPE html>
<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php');

//session_start();

if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: login.html');
}
  
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: login.html");
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
<body>
    
    <div class="content">
  
        <!-- Creating notification when the
                user logs in -->
         
        <!-- Accessible only to the users that
                have logged in already -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
  
        <!-- information of the user logged in -->
        <!-- welcome message for the logged in user -->
        <?php  if (isset($_SESSION['email'])) : ?>
             
 
 
            <p id="welcome">
                Welcome 

               <span id="name"> <strong>
                    <?php echo $_SESSION['first'].'<span>, </span>'.$_SESSION['last']; ?>
					
        </span></strong>
            </p>
			<?php
			$query= "SELECT  
			target,
			amount, 
			(target - amount) AS balance
			FROM payments
			WHERE  user_id= '".$_SESSION['id']."'";
			 $result= mysqli_query($connect,$query);
             ?>

               <div class="wrapper">
                <?php
               echo "<table>
			   <tr>
               <th>Target Amount</th>
			   <th>Amount Payed</th>
			   <th>Balance</th>
			  
				</tr>";
				

				 while($row = mysqli_fetch_array($result)) {
					
                
			echo "<tr>";
			echo "<td>" . $row['target'] . "</td>";
			echo "<td>" . $row['amount'] . "</td>";
			echo "<td>" . $row['balance'] . "</td>";
			
		}

		echo "</tr>";
		echo "</table>";
        ?>
        </div>

			
			<button  id= "paybtn">Make Payement</button>
 

                <a href="index.html?logout='1'" style="color: red;">
                    Click here to Logout
                </a>
            
			<?php endif ?>
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