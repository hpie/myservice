<?php

//define('USERNAME','s7hpiein_rmsauser');
//define('PASSWORD','Hp!#Rm%aD*');
//define('DATABASE','s7hpiein_rmsa');

 if($_SERVER['HTTP_HOST']=='localhost'){
    define('USERNAME','root');
    define('PASSWORD','');
    define('DATABASE','myservice');
 }
 else{
    define('USERNAME','s7hpiein_myservice');
    define('PASSWORD','hp#t@xD8');
    define('DATABASE','s7hpiein_myservice');
 }
// SQL server connection information
$sql_details = array(
    'user' => USERNAME,
    'pass' => PASSWORD,
    'db' => DATABASE,
    'host' => 'localhost'
);

