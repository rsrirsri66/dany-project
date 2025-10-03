<?php
require '../../db/dbConnection.php'; // Ensure database connection is established

$request = $_POST;
$search = ""; // Initialize variable to avoid undefined error

// Define table columns
$columns = ['id', 'name', 'email', 'mobile', 'address', 'message'];

// Base query
$sql = "SELECT `id`, `name`, `email`, `mobile`, `address`, `message` FROM `contacts` WHERE status ='Active'";

// Search filter
if (!empty($request['search']['value'])) {
    $search = mysqli_real_escape_string($conn, $request['search']['value']);
    $sql .= " AND (name LIKE '%$search%' OR mobile LIKE '%$search%')";
}

// Sorting (if provided by DataTables, else default to a.id DESC)
if (isset($request['order'][0]['column'])) {
    $columnIndex = $request['order'][0]['column']; // Column index
    $columnName = $columns[$columnIndex]; // Column name
    $columnSortOrder = $request['order'][0]['dir']; // asc/desc
    $sql .= " ORDER BY $columnName $columnSortOrder";
} else {
    $sql .= " ORDER BY id DESC"; // Default sorting when no order is given
}


// Pagination
$limit = $request['length'];
$start = $request['start'];
$sql .= " LIMIT $start, $limit";

// Fetch data
$result = mysqli_query($conn, $sql);
$data = [];
$i = $start + 1;

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        "serial_no" => $i++,
        "id" => $row['id'],
        "name" => $row['name'],
        "mobile" => $row['mobile'],
        "email" => $row['email'],
        "address" => $row['address'],
        "message" => $row['message'],
        "action" => '
            
            <button class="btn btn-sm text-danger" onclick="goDeleteEmployee(' . $row['id'] . ');"><i class="lni lni-trash"></i></button>'
    ];
}

// Total records count
$totalRecordsQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM contacts WHERE status = 'Active'");
$totalRecords = mysqli_fetch_assoc($totalRecordsQuery)['total'];

$filteredRecordsQuery = mysqli_query($conn, "SELECT
            COUNT(*) AS total
        FROM
            contacts  WHERE status = 'Active' AND (name LIKE '%$search%' OR mobile LIKE '%$search%')");

$filteredRecords = mysqli_fetch_assoc($filteredRecordsQuery)['total'];


// Response JSON
$response = [
    "draw" => intval($request['draw']),
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $filteredRecords, // Adjust if search filter is applied
    "data" => $data
];

echo json_encode($response);
?>
