 <!Doctype html>
<html>
<head>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'>
    </script>
</head>
<body>
<h1 class="adminh1">Website Admin</h1>
<header class="page-header">
<nav>
<ul id="dashboard">
  <li>
    <a href="payments.php"><i class='far fa-credit-card'></i>
      Manage Payments
    </a>
  </li>
  <li>
    <a href="plans.php"><i class='far fa-clipboard'></i>
      Manage Plans
    </a>
  </li>
  <li>
    <a href="contribution.php"><i class="fas fa-piggy-bank"></i>
      Manage Contributions
    </a>
  </li>
  <li>
    <a href="users.php"><i class='fas fa-user-circle'></i>
      Manage Users
    </a>
  </li>
  <li>
    <a href="logout.php"><i class="fas fa-sign-out"></i>
      Logout
    </a>
  </li>
</ul>
</nav>
</header>

<?php

include( 'includes/footer.php' );

?>
  
  <?php if(isset($_SESSION['id'])): ?>

    <p style="padding: 0 1%; text-align: center;">
      <a href="dashboard.php">Dashboard</a> | 
      <a href="logout.php">Logout</a>
    </p>
  
  <?php endif; ?>
  
  
  
  <?php echo get_message(); ?>
  <div style="max-width: 1500px; margin: auto; padding: 0 1%;">
  