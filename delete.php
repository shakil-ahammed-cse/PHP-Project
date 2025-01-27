<?php
include 'db.php';
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$sql = "DELETE FROM registrations WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: view.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

