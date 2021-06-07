<?php 

    $dba['host'] = "localhost";
    $dba['username'] = "root";
    $dba['password'] = "";
    $dba['dbname'] = "cwa";

    foreach($dba as $key => $value){
        define( strtoupper($key), $value );
    }

    $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);

    if($connection){
      //  echo "We are connected";
    }
    
    
    
?>