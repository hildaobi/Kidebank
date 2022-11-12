<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: plans.php' );
  die();
  
}

if( isset( $_POST['plan_name'] ) )
{
  
  if( $_POST['plan_name']  )
  {
    
    $query = 'UPDATE plans SET
      plan_name= "'.mysqli_real_escape_string( $connect, $_POST['plan_name'] ).'",
      target = "'.mysqli_real_escape_string( $connect, $_POST['target'] ).'",
      installment= "'.mysqli_real_escape_string( $connect, $_POST['installment'] ).'",
  
     duration= "'.mysqli_real_escape_string( $connect, $_POST['duration'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Plan has been updated' );
    
  }

  header( 'Location: plans.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM plans
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: plans.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>
<div class="container">
<h2>Edit Plan</h2>

<form method="post">
<label for="plan_name">Title:</label>
  <?php
  
  $values = array( 'Gold', 'Platinium', 'Silver', 'Diamond' );
  
  echo '<select name="plan_name" id="plan_name">';
  foreach( $values as $key => $value )
  {
    echo '<option value="'.$value.'"';
    if( $value == $record['plan_name'] ) echo ' selected="selected"';
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  
  ?>
  
  <br>
  
  <label for="target">Target:</label>
  <input type="number" name="target" id="target" value="<?php echo htmlentities( $record['target'] ); ?>">
    
  <br>
  
  <label for="installment">Installment:</label>
  <input type="number" name="installment" id="installment" value="<?php echo htmlentities( $record['installment'] ); ?>">
    
  <br>
  <label for="duration">Duration:</label>
  <input type="text" name="duration" id="duration" value="<?php echo htmlentities( $record['duration'] ); ?>">
    
 <br>
  
  <input type="submit" value="Edit Plan">
  
</form>

<p><a href="plans.php"><i class="fas fa-arrow-circle-left"></i> Return to Plan List</a></p>

</div>
<?php

include( 'includes/footer.php' );

?>