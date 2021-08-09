<?php
// Used for storing MYSQL server configuration files
define("hostname","localhost");
define("username","root");
define("password","");
define("db_name","student_db");

$conn = mysqli_connect(hostname,username,password,db_name);
if($conn){
//  echo "Success";
}

else
echo "Connection to db failed!";
