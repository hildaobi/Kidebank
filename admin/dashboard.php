<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

?>
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