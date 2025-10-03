<?php
require '../../db/dbConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $status = ($_POST['status'] === 'Active') ? 'Active' : 'Inactive';

    $query = "UPDATE video SET video_status = '$status' WHERE id = $id";
    if ($conn->query($query)) {
        echo json_encode(["status" => "success", "message" => "Status updated"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed: " . $conn->error]);
    }
}
?>
