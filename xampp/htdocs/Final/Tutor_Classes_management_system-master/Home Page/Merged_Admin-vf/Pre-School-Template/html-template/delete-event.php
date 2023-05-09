<?php


// Get the resource ID from the URL
$id = $_GET['id'];



//create connection 
include 'connexion.php';

// Check if the resource ID is provided in the URL
if (!isset($_GET['id'])) {
  // Redirect to the main page if no resource ID is provided
  header('Location: event.php');
  exit();
}
// Check if the connection is successful
if (!$db) {
  die('Connection failed: ' . mysqli_connect_error());
}

// Delete the resource from the database
$sql = "DELETE FROM resources WHERE Resource_Id = $id";
if (mysqli_query($db, $sql)) {
  // Redirect to the main page after the delete operation is completed
  header('Location: event.php');
  exit();
} else {
  echo "Error deleting resource: " . mysqli_error($db);
}

?>
