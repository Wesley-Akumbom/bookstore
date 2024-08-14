<?php 


//host 
$host = "localhost";

//dbname
$dbname = "Bookstore";

//username
$user = "root";

//password
$pass = '';

//create PDO instance

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($conn){
    echo "db connected successfully";
} else {
    echo "error in db connection";
}
