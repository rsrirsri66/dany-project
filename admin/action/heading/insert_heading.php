<?php
require '../../db/dbConnection.php'; // Ensure database connection is established

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, string: $_POST['name']);
    // $food_type = mysqli_real_escape_string($conn, $_POST['food_type']);
    // $category = mysqli_real_escape_string($conn, $_POST['category']);
    // $price = isset($_POST['price']) ? (float)$_POST['price'] : 0;

    // Check if the food name already exists
    $checkQuery = "SELECT id FROM heading WHERE heading = '$name'";
    $checkResult = mysqli_query($conn, $checkQuery);
    
    if (mysqli_num_rows($checkResult) > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Heading Name already exists!']);
        exit;
    }

    // Image upload handling
    // $imagePath = ''; // Default empty image path
    // if (!empty($_FILES["food_image"]["name"])) {
    //     $uploadDir = "../../uploads/"; // Directory to store images
    //     $imageName = time() . "_" . basename($_FILES["food_image"]["name"]); // Unique image name
    //     $targetFilePath = $uploadDir . $imageName;
    //     $imageDbPath = "uploads/" . $imageName; // Save path for DB

    //     // Allowed image formats
    //     $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    //     $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    //     if (!in_array($imageFileType, $allowedTypes)) {
    //         echo json_encode(["status" => "error", "message" => "Only JPG, PNG, GIF formats allowed!"]);
    //         exit;
    //     }

    //     // Move uploaded file
    //     if (move_uploaded_file($_FILES["food_image"]["tmp_name"], $targetFilePath)) {
    //         $imagePath = $imageDbPath; // Update with new image path
    //     } else {
    //         echo json_encode(["status" => "error", "message" => "Image upload failed!"]);
    //         exit;
    //     }
    // }

    // Insert into database
    // $query = "INSERT INTO food_tbl (food_name, food_type, category, price, food_image) 
    //           VALUES ('$food_name', '$food_type', '$category', '$price', '$imagePath')";

$query = "INSERT INTO heading (heading) 
              VALUES ('$name')";

    if (mysqli_query($conn, $query)) {
        echo json_encode(['status' => 'success', 'message' => 'Heading Added successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert Heading.']);
    }
}
?>
