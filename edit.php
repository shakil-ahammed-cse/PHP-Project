<?php
include 'db.php';
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM registrations WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $registration = $conn->real_escape_string($_POST['registration']);
    $session = $conn->real_escape_string($_POST['session']);

    $sql = "UPDATE registrations SET name='$name', registration='$registration', session='$session' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Registration</h1>
        <form method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="registration">Registration No.</label>
                <input type="text" id="registration" name="registration" value="<?php echo $row['registration']; ?>" required>
            </div>
            <div class="form-group">
                <label for="session">Session</label>
                <input type="text" id="session" name="session" value="<?php echo $row['session']; ?>" required>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>

