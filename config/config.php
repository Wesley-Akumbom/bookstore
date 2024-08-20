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

$secret_key = "sk_test_51PppnT02HblluFdfu1TrsQdYzZfcryxKbjYNWi3nPBCeqVdCVZwAVcE2Q6lI4rMJgd3g53oX0B61oon3GQxBxuk700sbz7LbFS";

// if ($conn){
//     echo "db connected successfully";
// } else {
//     echo "error in db connection";
// }
