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



    
    // Image upload handling
    $imagePath = ''; // Default empty image path
    if (!empty($_FILES["food_image"]["name"])) {
        $uploadDir = "../../uploads/images/"; // Directory to store images
        $imageName = time() . "_" . basename($_FILES["food_image"]["name"]); // Unique image name
        $targetFilePath = $uploadDir . $imageName;
        $imageDbPath = "uploads/images/" . $imageName; // Save path for DB

        // Allowed image formats
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        if (!in_array($imageFileType, $allowedTypes)) {
            echo json_encode(["status" => "error", "message" => "Only JPG, PNG, GIF formats allowed!"]);
            exit;
        }

        // Move uploaded file
        if (move_uploaded_file($_FILES["food_image"]["tmp_name"], $targetFilePath)) {
            $imagePath = $imageDbPath; // Update with new image path
        } else {
            echo json_encode(["status" => "error", "message" => "Image upload failed!"]);
            exit;
        }
    }

 

$query = "INSERT INTO `images`(
    `heading`,
    `image`
)
VALUES(
    '$heading_id',
    '$imagePath'
)";

    if (mysqli_query($conn, $query)) {
        echo json_encode(['status' => 'success', 'message' => 'Image Added successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert Image.']);
    }
}
?>
