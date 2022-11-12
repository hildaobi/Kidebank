<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: payments.php' );
  die();
  
}

if( isset( $_POST['amount'] ) )
{
  
  if( $_POST['amount']  )
  {
    
    $query = 'UPDATE payments SET
      amount= "'.mysqli_real_escape_string( $connect, $_POST['amount'] ).'",
      target = "'.mysqli_real_escape_string( $connect, $_POST['target'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Payment has been updated' );
    
  }

  header( 'Location: payments.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM payments
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: payments.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>
<div class="container">
<h2>Edit Plan</h2>

<form method="post">


  <label for="amount">Amount:</label>
  <input type="number" name="amount" id="amount" value="<?php echo htmlentities( $record['amount'] ); ?>">
  <br>  


  <label for="target">Target:</label>
  <input type="number" name="target" id="target" value="<?php echo htmlentities( $record['target'] ); ?>">
    

 <br>
  
  <input type="submit" value="Edit Payment">
  
</form>

<p><a href="payments.php"><i class="fas fa-arrow-circle-left"></i> Return to Payment List</a></p>

</div>
<?php

include( 'includes/footer.php' );

?>