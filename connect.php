<?php
include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );

/*echo '<pre>';
print_r($_POST);
echo '</pre>';*/
 
//checks if email variable exist if it does it stores them in the post variable else  set the variable to nothing
 //otherwise inline if statement 
  
  $firstname = isset($_POST['first'])? $_POST['first'] : '' ;
  $lastname = isset($_POST['last'])? $_POST['last'] : '' ;
  $address = isset($_POST['address'])? $_POST['address'] : '' ;
  $postcode = isset($_POST['postcode'])? $_POST['postcode'] : '' ;
  $phone = isset($_POST['phone'])? $_POST['phone'] : '' ;
  $dob = isset($_POST['dob'])? $_POST['dob'] : '' ;
  $email = isset($_POST['email'])? $_POST['email'] : '' ;
  $password = isset($_POST['password'])? $_POST['password'] : '' ; 
  $accname = isset($_POST['acc_name'])? $_POST['acc_name'] : '' ;
  $accno = isset($_POST['acc_no'])? $_POST['acc_no'] : '' ;
  $bank = isset($_POST['bank_name'])? $_POST['bank_name'] : '' ;
  





  $firstname_error= '';
  $lastname_error= '';
  $address_error= '';
  $postcode_error= '';
  $phone_error= '';
  $dob_error= '';
  $email_error= '';
  $password_error= '';
  $accname_error= '';
  $accno_error= '';
  $bank_error= '';
  
  
  //$duration_error= '';

 

  // checking if form is submitted
  if (count($_POST))
  {
    //creating a counter variable
    $errors = 0;
    //form validation
    if ($firstname == '')
    {
        $errors ++;
        $firstname_error = 'Space cannot be blank';
    }
    if ($lastname == '')
    {
        $errors ++;
        $lastname_error = 'Space cannot be blank';
    }
    
    if ($address == '')
    {
        $errors ++;
        $address_error = 'Space cannot be blank';
    }
    if ($postcode == '')
    {
        $errors ++;
        $postcode_error = 'Space cannot be blank';
    }
    if ($phone == '')
    {
        $errors ++;
        $phone_error = 'Space cannot be blank';
    }
    if ($dob == '')
    {
        $errors ++;
        $dob_error = 'Space cannot be blank';
    }
   
   if ($email == '')
    {
        $errors ++;
        $email_error = 'Space cannot be blank';
    }
    if ($password== '')
    {
        $errors ++;
        $password_error = 'Space cannot be blank';
    }
    if ($accname == '')
    {
        $errors ++;
        $accname_error = 'Space cannot be blank';
    }
   
   if ($accno == '')
    {
        $errors ++;
        $accno_error = 'Space cannot be blank';
    }
    if ($bank== '')
    {
        $errors ++;
        $bank_error = 'Space cannot be blank';
    }
   
    
    
    // sending form content to database if content passes validation
    //addslashes function use  to prevent sql injections
//if ($errors == 0)
    

    if ($errors == 0)
    {
      $query = 'INSERT INTO client_user (
        first,
        last,
        address,
        postcode,
        phone,
        dob,
        email,
        password
      ) VALUES (
        
         "'.addslashes($firstname).'",
         "'.addslashes($lastname).'",
         "'.addslashes($address).'",
         "'.addslashes($postcode).'",
         "'.addslashes($phone).'",
         "'.addslashes($dob).'",
         "'.addslashes($email).'",
         "'.addslashes($password).'")';
          //echo "your form has been submitted";
         $result= mysqli_query($connect,$query) ;
      
      if ($result){

            $insert = 'INSERT INTO banks (
                acc_no,
                acc_name,
                bank_name
                ) VALUES (
                "'.addslashes($accname).'",
                "'.addslashes($bank).'",
                "'.addslashes($accno).'")';

          $output= mysqli_query($connect,$insert);
          header('Location:index.html');
          die();
        }
            
    }
    else{ 
        echo "form not submitted successfully";
    }

  }  

 /*if(mail == true ) {
     echo '<script>alert("Email send!");</script>';
}*/
?>