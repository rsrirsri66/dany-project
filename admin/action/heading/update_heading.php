<?php
require '../../db/dbConnection.php'; // Ensure database connection is established

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch & sanitize input data
    $id = mysqli_real_escape_string($conn, string: $_POST['edit_id']);
    $name = mysqli_real_escape_string($conn, string: $_POST['name']);
    // $food_type = mysqli_real_escape_string($conn, $_POST['food_type']);
    // $category = mysqli_real_escape_string($conn, $_POST['category']);
    // $price = isset($_POST['price']) ? (float) $_POST['price'] : 0;

    // Check if food name already exists for another record
    $checkQuery = "SELECT id FROM heading WHERE heading = '$name' AND id != '$id'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        echo json_encode(["status" => "error", "message" => "Heading name already in use!"]);
        exit;
    }

    // Fetch existing image path before updating
    // $oldImageQuery = "SELECT food_image FROM product WHERE id = '$id'";
    // $oldImageResult = mysqli_query($conn, $oldImageQuery);
    // $oldImageRow = mysqli_fetch_assoc($oldImageResult);
    // $oldImagePath = $oldImageRow['food_image']; // Path of existing image

    // Handle Image Upload (Optional)
    // if (!empty($_FILES["food_image"]["name"])) {
    //     $uploadDir = "../../uploads/"; // Directory to store images
    //     $imageName = time() . "_" . basename($_FILES["food_image"]["name"]); // Unique image name
    //     $targetFilePath = $uploadDir . $imageName;
    //     $imageDbPath = "uploads/" . $imageName; // Path to save in DB

    //     // Allowed image formats
    //     $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    //     $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    //     if (!in_array($imageFileType, $allowedTypes)) {
    //         echo json_encode(["status" => "error", "message" => "Only JPG, PNG, GIF formats allowed!"]);
    //         exit;
    //     }

    //     // Move uploaded file
    //     if (move_uploaded_file($_FILES["food_image"]["tmp_name"], $targetFilePath)) {
    //         // Delete old image (if exists and not default image)
    //         if (!empty($oldImagePath) && file_exists("../../../" . $oldImagePath)) {
    //             unlink("../../../" . $oldImagePath);
    //         }
    //         $imagePath = $imageDbPath; // Update with new image path
    //     } else {
    //         echo json_encode(["status" => "error", "message" => "Image upload failed"]);
    //         exit;
    //     }
    // } else {
    //     $imagePath = $oldImagePath; // Keep old image if no new upload
    // }

    // Update food details
    $query = "UPDATE heading SET 
              heading = '$name'
              WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo json_encode(["status" => "success", "message" => "Heading item updated successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Update failed: " . mysqli_error($conn)]);
    }
}
?>
