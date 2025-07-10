<?php
include('session_check.php');
$conn = new mysqli("localhost", "root", "", "maash_logistics");
$tracking = $_GET['tracking'] ?? '';
$sql = "SELECT * FROM shipments WHERE tracking_number = '$tracking' AND user_id = " . $_SESSION['user_id'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $shipment = $result->fetch_assoc();
  echo "<h3>Shipment Status: " . $shipment['status'] . "</h3>";
} else {
  echo "No shipment found or you don't have access.";
}
?>