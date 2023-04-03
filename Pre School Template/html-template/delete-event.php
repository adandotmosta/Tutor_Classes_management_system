<?php


// Get the resource ID from the URL
$id = $_GET['id'];

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_tutoring_classes');

//create connection 
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check if the resource ID is provided in the URL
if (!isset($_GET['id'])) {
  // Redirect to the main page if no resource ID is provided
  header('Location: event.php');
  exit();
}
// Check if the connection is successful
if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}

// Delete the resource from the database
$sql = "DELETE FROM resources WHERE Resource_Id = $id";
if (mysqli_query($conn, $sql)) {
  // Redirect to the main page after the delete operation is completed
  header('Location: event.php');
  exit();
} else {
  echo "Error deleting resource: " . mysqli_error($conn);
}

?>
