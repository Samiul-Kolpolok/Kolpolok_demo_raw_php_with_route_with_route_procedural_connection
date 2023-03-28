<?php

echo "<pre>";

print_r($_POST);

//getting form input
$name = $_POST['name']?? null;
$email = $_POST['email']?? null;
$mobile = $_POST['mobile']??null;
$message = $_POST['message']??null;

if (!($name && $email && $mobile && $message)){

die('Data Required');
}

echo "</pre>";

//specify the server name and here it is localhost
$server_name = "localhost";

//specify the username - here it is root
$user_name = "root";

//specify the password - it is empty
$password = "";

// Creating the connection by specifying the connection details
$connection = mysqli_connect($server_name, $user_name, $password, "contact_db");
$connection2 = mysqli_connect($server_name, $user_name, $password, "db2");

// Checking the  connection for contact_db
if (!$connection) {
  die("Failed ". mysqli_connect_error());
}

//checking the connection for db2

if (!$connection2) {
  die("Failed ". mysqli_connect_error());
}

//echo "Connection established successfully";

//static data inserting
// $sql = "INSERT INTO contact_info (name, email, mobile, message) 
// values('S. M. SAMIUL ALAM', 'abc@gmail.com',123,'I am sami') ";

//Dynamically data inserting using form 

$sql = "INSERT INTO contact_info (name, email, mobile, message) 
 values('$name', '$email', $mobile, '$message')";

//for db_1
if (mysqli_query($connection, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}


//for db_2
$sql = "INSERT INTO contact_info_2 (name, email, mobile, message) 
 values('$name', '$email', $mobile, '$message')";

if (mysqli_query($connection2, $sql)) {
  $last_id = $connection2->insert_id; //To get last input id
  echo "New record created successfully. Last inserted ID is: " . $last_id;;
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection2);
}

// $sql_query= mysqli_query($connection,$sql);

// var_dump($sql_query);

?>