<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM payments
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Payment has been deleted' );
  
  header( 'Location: payments.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT 
  id,
  target,
  amount,
  (target - amount) AS balance
  FROM payments';
$result = mysqli_query( $connect, $query );

?>
<div class="container">
<h2>Manage Payments</h2>

<table>
  <tr>
   
    <th align="center">ID</th>
    <th align="left">Amount Payed</th>
    <th align="center">Target</th>
    <th align="center">Balance</th>
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left"><?php echo $record['amount']; ?></td>
      <td align="center"><?php echo $record['target']; ?></td>
      <td align="center"><?php echo $record['balance']; ?></td>
      <td align="center"><a href="payments_edit.php?id=<?php echo $record['id']; ?>">Edit<i class="fa fa-edit"></i></a></td>
      <td align="center">
        <a href="payments.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this payment?');">Delete<i class="fa fa-trash"></i></a>
      </td>
      </tr>
  <?php endwhile; ?>
</table>

<p><a href="payments_add.php"><i class="fas fa-plus-square"></i> Add Payment</a></p>

</div>
<?php

include( 'includes/footer.php' );

?>