<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['plan_name'] ) )
{
  
  if( $_POST['plan_name']  )
  {
    
    $query = 'INSERT INTO plans (
       plan_name,
       target,
        installment,
       
        duration
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST[' plan_name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST[' target'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['installment'] ).'",
      
         "'.mysqli_real_escape_string( $connect, $_POST['  duration'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Plan has been added' );
    
  }
  
  header( 'Location: plans.php' );
  die();
  
}

include( 'includes/header.php' );

?>
<div class="container">
<h2>Add Plan</h2>

<form method="post">
  
  
<label for="plan_name">Title:</label>
  <?php
  
  $values = array( 'Gold', 'Platinium','Silver','Diamond' );
  
  echo '<select name="plan_name" id="plan_name">';
  foreach( $values as $key => $value )
  {
    echo '<option value="'.$value.'"';
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  
  ?>
  <br>

<label for="target">Target:</label>
  <input type="number" name="target" id="target">
    
  <br>
  
  
  
  <label for="installment">Installment:</label>
  <input type="number" name="installment" id="installment">
  
  <br>
  
  <label for="duration">Duration:</label>
  <input type="text" name="duration" id="duration">
  
  <br>
  
 
  
  
  
  <input type="submit" value="Add Plan">
  
</form>

<p><a href="plans.php"><i class="fas fa-arrow-circle-left"></i> Return to Plan List</a></p>

</div>
<?php

include( 'includes/footer.php' );

?>