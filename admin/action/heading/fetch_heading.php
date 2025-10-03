<?php
require '../../db/dbConnection.php'; // Ensure database connection is established

$request = $_POST;

// Define table columns
$columns = ['id', 'heading'];

// Base query
$sql = "SELECT `id`, `heading` FROM `heading` WHERE status='Active'";

// Search filter
if (!empty($request['search']['value'])) {
    $search = mysqli_real_escape_string($conn, $request['search']['value']);
    $sql .= " AND (name LIKE '%$search%')";
}

// Sorting
$columnIndex = $request['order'][0]['column']; // Column index
$columnName = $columns[$columnIndex]; // Column name
$columnSortOrder = $request['order'][0]['dir']; // asc/desc
$sql .= " ORDER BY $columnName $columnSortOrder";

// Pagination
$limit = $request['length'];
$start = $request['start'];
$sql .= " LIMIT $start, $limit ";

// Fetch data
$result = mysqli_query($conn, $sql);
$data = [];
$i = $start + 1;

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [
            "serial_no" => $i++,
            "name" => $row['heading'],
            "id" => $row['id'],
            // "food_type" => $row['food_type'],
            // "category" => $row['category'],
            // "price" => number_format($row['price'], 2), // ✅ Ensuring decimal format
            // "food_image" => '<img src="'.$row['food_image'].'" class="img-thumbnail" width="50" height="50">', // Add Image
            "action" => '
                <button class="btn btn-sm text-warning" onclick="goEdit(' . $row['id'] . ');" data-bs-toggle="modal" data-bs-target="#editFoodModal"><i class="lni lni-pencil"></i></button>
                <button class="btn btn-sm text-danger" onclick="goDeleteEmployee(' . $row['id'] . ');"><i class="lni lni-trash"></i></button>'
        ];
    }



// Total records count
$totalRecordsQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM heading WHERE STATUS = 'Active'");
$totalRecords = mysqli_fetch_assoc($totalRecordsQuery)['total'];

// Response JSON
$response = [
    "draw" => intval($request['draw']),
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalRecords, // Adjust if search filter is applied
    "data" => $data
];

echo json_encode($response);
?>
