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
<div class="paymentwrapper">
            <?php
			$query= "SELECT target
            FROM payments
			WHERE  user_id= '".$_SESSION['id']."'";
			 $result= mysqli_query($connect,$query);
            
            if( mysqli_num_rows( $result ) ){
                
                $record = mysqli_fetch_assoc( $result );
                ?>
                <div class="paymentdiv"><?php
                echo "<span class='span'>Your Target </span> " .$record['target'];}
                ?>
              </div>  

              <?php
                
                $search= "SELECT SUM(amount)  AS total 
            FROM payments
			WHERE  user_id= '".$_SESSION['id']."'";
			 $result= mysqli_query($connect,$search);     
        
        if( mysqli_num_rows( $result ) ){
                
                $record = mysqli_fetch_assoc( $result );
                ?>
                <div class="paymentdiv"><?php
                echo "<span class='span'>Total Payment </span> " .$record['total'];}
                ?>
              </div> 
              
              
                


              <?php
                 $search= "SELECT  target,(target-SUM(amount)) As balance
                 FROM payments
                 WHERE  user_id= '".$_SESSION['id']."'";
                  $result= mysqli_query($connect,$search);     
             
             if( mysqli_num_rows( $result ) ){
                     
                     $record = mysqli_fetch_assoc( $result );
                     ?>
                     <div class="paymentdiv"><?php
                     echo "<span class='span'>Your Balance </span> " .$record['balance'];}
                     ?>
                   </div> 
             </div>
                
                
                <?php
                
                $search= "SELECT amount
            FROM payments
			WHERE  user_id= '".$_SESSION['id']."'";
			 $result= mysqli_query($connect,$search);?>      
        
             <div class="wrapper">
             <?php
            echo "<table>
            <tr>
            
            <th>Amount Payed</th>
          
           
             </tr>";
             

              while($row = mysqli_fetch_array($result)) {
                 
             
         echo "<tr>";
        
         echo "<td>" . $row['amount'] . "</td>";
       
         
     }

     echo "</tr>";
     echo "</table>";
     ?>


            
            
          
       
                   
                   <button  id= "paybtn">Make Payement</button>
        
       
                       <a href="index.html?logout='1'" style="color: red;">
                           Click here to Logout
                       </a>
                   
                   <?php endif ?>