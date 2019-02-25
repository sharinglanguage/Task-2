<?php
/*
we can create the table from the Console or directly in the database using SQL.
This way we can just run this file on the browser.
I have chosen to create the field id which will be the primary key and will be unique for each row or user (it should actually match the IDs of the imported file, but just in case a second file is imported after).
Email field is unique, so that if there is a second file to import, we make sure there are no duplicated values stored in teh database

*/
include('conexioninclude.php');
 
$query="CREATE TABLE employeeinfo(
id INT AUTO_INCREMENT PRIMARY KEY,
first_name VARCHAR(30) NOT NULL,
last_name VARCHAR(30) NOT NULL,
email VARCHAR(50),
gender VARCHAR(6),
ip_address VARCHAR(30),
country VARCHAR(30),
UNIQUE (email)
)";
if (mysqli_query($con, $query)) {
    echo "Table import created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conexion);
}

?>