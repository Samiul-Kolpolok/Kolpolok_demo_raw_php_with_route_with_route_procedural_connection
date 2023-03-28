<?php

echo "<pre>";


//getting form input
$ID = $_GET['id']?? null;

if (!($ID)){

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
$connection2 = mysqli_connect($server_name, $user_name, $password, "db2");


//for db_2
$sql = "DELETE FROM contact_info_2 WHERE id=$ID";

if (mysqli_query($connection2, $sql)) {
 echo 'successfully delelted';
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($connection2);
}

?>