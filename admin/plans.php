<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM plans
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Plan has been deleted' );
  
  header( 'Location:plans.php' );
  die();
  
}

include( 'includes/header.php' );

$query = 'SELECT *
  FROM plans
  ORDER BY id DESC';
$result = mysqli_query( $connect, $query );

?>
<div class="container">
<h2>Manage Plans</h2>

<table>
  <tr>
   
    <th align="center">ID</th>
    <th align="left">Title</th>
    <th align="center">Target</th>
    <th align="center">Installment</th>
    <th align="center">Duration</th>
   
    <th></th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left">
        <?php echo htmlentities( $record['plan_name'] ); ?>
        
      </td>
      <td align="center"><?php echo $record['target']; ?></td>
      <td align="center"><?php echo $record['installment']; ?></td>
      <td align="center"><?php echo $record['duration']; ?></td>

      <td align="center"><a href="plans_edit.php?id=<?php echo $record['id']; ?>">Edit<i class="fa fa-edit"></a></td>
      <td align="center">
        <a href="plans.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this plan?');">Delete<i class="fa fa-trash"></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="plans_add.php"><i class="fas fa-plus-square"></i> Add Plan</a></p>

  </div>
<?php

include( 'includes/footer.php' );

?>