<?php
require '../../db/dbConnection.php'; // Ensure database connection is established

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, string: $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $inrest = mysqli_real_escape_string($conn, $_POST['inrest']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    

    // Check if the food name already exists
    $checkQuery = "INSERT INTO `contacts`(
    `name`,
    `email`,
    `mobile`,
    `inrest`,
    `message`
)
VALUES(
    '$name',
    '$email',
    '$inrest',
    '$mobile',
    '$message'
)";

    if (mysqli_query($conn, $checkQuery)) {
        echo json_encode(['status' => 'success', 'message' => 'Contact Added successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert Contact.']);
    }
}
?>
