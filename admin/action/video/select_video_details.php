<?php
require '../../db/dbConnection.php'; // Ensure database connection

if (isset($_POST['id'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['id']);
    
    $query = "SELECT id, name FROM model WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        echo json_encode(["status" => "success", "data" => $product]);
    } else {
        echo json_encode(["status" => "error", "message" => "Model not found"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}
