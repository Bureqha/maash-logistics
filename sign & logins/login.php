<?php
session_start();
$conn = new mysqli("localhost", "root", "", "maash_logistics");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = "SELECT * FROM users WHERE email = '$email'";
  $result = $conn->query($query);
  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      header("Location: dashboard.html");
    } else {
      echo "Invalid credentials.";
    }
  } else {
    echo "User not found.";
  }
}
?>