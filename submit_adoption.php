<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pet Adoption Form</title>
    <link rel="stylesheet" href="styles_adoption.css" />
  </head>
  <nav>
    <header>
      <div class="logo">Purrfect Match</div>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php">Adoption Process</a></li>
        <li><a href="pets.html">Pets</a></li>
        <li><a href="indexcon.html">About</a></li>
      </ul>
    </header>
  </nav>
  <body>

    <section class="adoption-form">
      <h1>Pet Adoption Application</h1>
      <form action="" method="POST">
        <label for="full-name">Full Name:</label>
        <input type="text" id="full-name" name="full_name" required />

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required />

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required />

        <label for="preferred-pet">Preferred Pet:</label>
        <select id="preferred-pet" name="preferred_pet" required>
          <option value="Bini Maloi">Bini Maloi</option>
          <option value="Cardo Dalisay">Cardo Dalisay</option>
          <option value="Chai Chai">Chai Chai</option>
          <option value="Queenie">Queenie</option>
          <option value="Yohan">Yohan</option>
          <option value="Primo">Primo</option>
        </select>

        <label for="reason">Why do you want to adopt?</label>
        <textarea id="reason" name="reason" rows="4" required></textarea>

        <button type="submit" name="enter" class="button">Submit Application</button>
      </form>
    </section>

    <footer>
      <p>&copy; 2025 Purrfect. All rights reserved.</p>
    </footer>
    <?php
$servername = "localhost"; // MySQL server IP
$username = "root"; // username
$password = ""; // password
$dbname = "purrfect_pets"; // name of database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
if(isset($_POST['enter'])){
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
    echo "<script> alert('Your application has been submitted successfully!')</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the connection
  $conn->close();
}
?>
  </body>
</html>

