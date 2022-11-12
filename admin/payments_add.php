<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();


if( isset( $_POST['target'] ) )
{
  
  if( $_POST['target']  )
  {
    
    $query = 'INSERT INTO payments (
       amount,
       target
        
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['amount'] ).'",
       
         "'.mysqli_real_escape_string( $connect, $_POST['target'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Payment has been added' );
    
  }
  
  header( 'Location: payments.php' );
  die();
  
}

include( 'includes/header.php' );

?>
<div class="container">
<h2>Add Payment</h2>

<form method="post">
  

<label for="amount">Amount:</label>
  <input type="number" name="amount" id="amount">
  
  <br>
  

<label for="target">Target:</label>
  <input type="number" name="target" id="target">
  
  
  
 
  
  <br>
  
  <input type="submit" value="Add Payment">
  
</form>

<p><a href="payments.php"><i class="fas fa-arrow-circle-left"></i> Return to Payment List</a></p>

</div>
<?php

include( 'includes/footer.php' );

?>