<?php
require '../../db/dbConnection.php'; // Ensure database connection is established

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch & sanitize input data
    $id = mysqli_real_escape_string($conn, string: $_POST['edit_id']);
    $heading = mysqli_real_escape_string($conn, string: $_POST['product_id']);

// Video upload handling
$videoPath = ''; // Default empty video path
if (!empty($_FILES["food_video"]["name"])) {
    $uploadDir = "../../uploads/videos/"; // Directory to store videos
    $videoName = time() . "_" . basename($_FILES["food_video"]["name"]); // Unique video name
    $targetFilePath = $uploadDir . $videoName;
    $videoDbPath = "uploads/videos/" . $videoName; // Save path for DB

    // Allowed video formats
    $allowedTypes = ['mp4', 'avi', 'mov', 'mkv'];
    $videoFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    if (!in_array($videoFileType, $allowedTypes)) {
        echo json_encode(["status" => "error", "message" => "Only MP4, AVI, MOV, MKV formats allowed!"]);
        exit;
    }

    // Move uploaded file
    if (move_uploaded_file($_FILES["food_video"]["tmp_name"], $targetFilePath)) {
        $videoPath = $videoDbPath; // Update with new video path
    } else {
        echo json_encode(["status" => "error", "message" => "Video upload failed!"]);
        exit;
    }
}
if (empty($videoPath)) {
    echo json_encode(['status' => 'error', 'message' => 'Please upload a video.']);
    exit;
}

    // Update query
    if (empty($videoPath)) {
        // update only heading
        $query = "UPDATE `video` SET heading = '$heading' WHERE id = '$id'";
    } else {
        // update heading + new image
        $query = "UPDATE `video` SET heading = '$heading', video = '$videoPath' WHERE id = '$id'";
    }

    if (mysqli_query($conn, $query)) {
        echo json_encode(["status" => "success", "message" => "Video item updated successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Update failed: " . mysqli_error($conn)]);
    }
}
?>
