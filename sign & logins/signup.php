<?php
$conn = new mysqli("localhost", "root", "", "maash_logistics");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $query = "INSERT INTO users (full_name, email, password) VALUES ('$fullname', '$email', '$password')";
  if ($conn->query($query)) {
    echo "Signup successful. Please <a href='login.html'>Login</a>";
  } else {
    echo "Error: " . $conn->error;
  }
}
?>