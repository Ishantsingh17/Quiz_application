<?php
/*
this files contains databse configuration assuming you are running mysql using user "root" and password ""

*/

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'login');

//try connecting to database
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
if($conn==false){
    die('Error:  cannot connect to database');
}
?>