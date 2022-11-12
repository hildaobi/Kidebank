<?php

$connect = mysqli_connect( 
    "localhost", 
    "root", 
    "", 
    "kide_bank" 
);

mysqli_set_charset( $connect, 'UTF8' );