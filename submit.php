<?php
include 'db.php';
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $conn->real_escape_string($_POST['name']);
    $registration = $conn->real_escape_string($_POST['registration']);
    $session = $conn->real_escape_string($_POST['session']);

    // Insert data into the database
    $sql = "INSERT INTO registrations (name, registration, session) VALUES ('$name', '$registration', '$session')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to view.php after successful registration
        header("Location: view.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>