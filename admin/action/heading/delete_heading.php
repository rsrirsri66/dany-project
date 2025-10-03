<?php 
require '../../db/dbConnection.php'; // Ensure database connection is established

$response = ['success' => false, 'message' => 'Something went wrong!'];

if (isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];

    $queryDel = "UPDATE `heading` SET `status`='Inactive' WHERE id ='$id'";
    $reDel = mysqli_query($conn, $queryDel);

    if ($reDel) {
        $response['success'] = true;
        $response['message'] = "Heading details have been deleted successfully!";
    } else {
        $response['message'] = "Error: " . mysqli_error($conn);
    }
}

header('Content-Type: application/json');
echo json_encode($response);
exit();

?>