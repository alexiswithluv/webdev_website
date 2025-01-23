<?php
$servername = "localhost"; // or your MySQL server IP
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$dbname = "purrfect_pets"; // name of your database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$preferred_pet = $_POST['preferred_pet'];
$reason = $_POST['reason'];

// Prepare SQL query to insert data into the database
$sql = "INSERT INTO adoption_applications (full_name, email, phone, preferred_pet, reason)
        VALUES ('$full_name', '$email', '$phone', '$preferred_pet', '$reason')";

// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Your application has been submitted successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
