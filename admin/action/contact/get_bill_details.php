<?php
require '../../db/dbConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bill_id'])) {
    $bill_id = intval($_POST['bill_id']);

    // Fetch Customer Details
    $customerQuery = mysqli_query($conn, "SELECT
    c.name,
    c.mobile,
    c.gst,
    c.address,
    b.total_amount,
    b.date,
    b.valid_until_date,
    b.sub_total_amount,
    b.gst_amount,
    b.transport,
    b.class_extra,
    b.quotation_no
FROM
    quotations AS b
LEFT JOIN customer AS c
ON
    b.customer_id = c.id
WHERE
    b.id = $bill_id");
    $customer = mysqli_fetch_assoc($customerQuery);

    // Fetch Product Details
    $productQuery = mysqli_query($conn, "SELECT
    b.name AS product_name,
    c.name AS model_name,
    a.design,
    a.width_one,
    a.width_two,
    a.height_one,
    a.height_two,
    a.width_feet,
    a.height_feet,
    a.square_feet,
    a.quantity,
    a.total_square_feet,
    a.amount,
    a.total_amount AS product_total_amount
FROM
    `quotation_item` AS a
LEFT JOIN product AS b
ON
    a.product_id = b.id
LEFT JOIN model AS c
ON
    a.model_id = c.id
WHERE
    a.quotation_id = $bill_id");

    $products = [];
    while ($row = mysqli_fetch_assoc( $productQuery)) {
        $products[] = $row;
    }

    echo json_encode([
        "status" => "success",
        "customer" => $customer,
        "products" => $products
    ]);
} else {
    echo json_encode(["status" => "error"]);
}
?>
