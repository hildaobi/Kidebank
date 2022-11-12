<?php
include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );
  
//session

if( isset( $_POST['email'] ) )
{
  
  $query = 'SELECT *
    FROM client_user
    WHERE email = "'.$_POST['email'].'"
    AND password = "'.$_POST['password'] .'"
    AND active = "Yes"
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  
  if( mysqli_num_rows( $result ) )
  {
    
    $record = mysqli_fetch_assoc( $result );
    
    $_SESSION['id'] = $record['id'];
    $_SESSION['email'] = $record['email'];
	$_SESSION['first'] = $record['first'];
	$_SESSION['last'] = $record['last'];
	
    header( 'Location: profile2.php' );
    die();
    
  }
  else
  {
    
    set_message( 'Incorrect email and/or password' );
    
    header( 'Location: login.html' );
    die();
    
  } 


  
}




?>

