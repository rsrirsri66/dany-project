<?php
require '../../db/dbConnection.php'; // Ensure database connection is established

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $heading_id = mysqli_real_escape_string($conn, string: $_POST['product_id']);
    // $name = mysqli_real_escape_string($conn, string: $_POST['name']);





    // Check if the food name already exists
//     $checkQuery = "SELECT
//     a.name AS model_name,
//     b.name AS product_name
// FROM
//     `model` AS a
// LEFT JOIN product AS b
// ON
//     a.product_id = b.id
// WHERE
//     a.name = '$name' AND b.id = $product_id AND a.status = 'Active';";
//     $checkResult = mysqli_query($conn, $checkQuery);
    
//     if (mysqli_num_rows(result: $checkResult) > 0) {
//         echo json_encode(['status' => 'error', 'message' => 'Model Name already exists!']);
        
//         exit;
//     }



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

 

$query = "INSERT INTO `video`(
    `heading`,
    `video`
)
VALUES(
    '$heading_id',
    '$videoPath'
)";

    if (mysqli_query($conn, $query)) {
        echo json_encode(['status' => 'success', 'message' => 'Image Added successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert Image.']);
    }
}
?>
