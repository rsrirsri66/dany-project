<?php
require '../../db/dbConnection.php'; // Ensure database connection is established

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch & sanitize input data
    $id = mysqli_real_escape_string($conn, string: $_POST['edit_id']);
    $heading = mysqli_real_escape_string($conn, string: $_POST['product_id']);

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



    // Update query
    if (empty($imagePath)) {
        // update only heading
        $query = "UPDATE `images` SET heading = '$heading' WHERE id = '$id'";
    } else {
        // update heading + new image
        $query = "UPDATE `images` SET heading = '$heading', image = '$imagePath' WHERE id = '$id'";
    }

    if (mysqli_query($conn, $query)) {
        echo json_encode(["status" => "success", "message" => "Image item updated successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Update failed: " . mysqli_error($conn)]);
    }
}
?>
