<?php
require '../../db/dbConnection.php'; // Ensure database connection is established

$request = $_POST;

// Define table columns (must match query select aliases)
$columns = ['image_id', 'heading_name'];

// Base query
$sql = "SELECT
    a.id AS image_id,
    b.heading AS heading_name,
    a.image,
    a.image_status
FROM
    `images` AS a
LEFT JOIN heading AS b
ON
    a.heading = b.id
WHERE
    a.status = 'Active'";

// Search filter
if (!empty($request['search']['value'])) {
    $search = mysqli_real_escape_string($conn, $request['search']['value']);
    $sql .= " AND (b.heading LIKE '%$search%')";
}

// Sorting
$columnIndex = $request['order'][0]['column']; // Column index
$columnName = $columns[$columnIndex]; // Column name
$columnSortOrder = $request['order'][0]['dir']; // asc/desc
$sql .= " ORDER BY $columnName $columnSortOrder";

// Pagination
$limit = intval($request['length']);
$start = intval($request['start']);
$sql .= " LIMIT $start, $limit";

// Fetch data
$result = mysqli_query($conn, query: $sql);
$data = [];
$i = $start + 1;

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        "serial_no" => $i++,
        "heading"   => $row['heading_name'],
        "image"   => $row['image'],
        "id"        => $row['image_id'],
        "action"    => '
            <button class="btn btn-sm text-warning" onclick="goEdit(' . $row['image_id'] . ');" data-bs-toggle="modal" data-bs-target="#editFoodModal"><i class="lni lni-pencil"></i></button>
            <button class="btn btn-sm text-danger" onclick="goDeleteEmployee(' . $row['image_id'] . ');"><i class="lni lni-trash"></i></button>
            <button class="btn btn-sm text-info" onclick="toggleStatus(' . $row['image_id'] . ', \'' . $row['image_status'] . '\')">
            <i class="lni lni-eye"></i>
        </button>'
    ];
}

// Total records count
$totalRecordsQuery = mysqli_query($conn, "SELECT
    COUNT(*) as total
FROM
    `images` AS a
LEFT JOIN heading AS b
ON
    a.heading = b.id
WHERE
    a.status = 'Active'");
$totalRecords = mysqli_fetch_assoc($totalRecordsQuery)['total'];

// Response JSON
$response = [
    "draw" => intval($request['draw']),
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalRecords, // (if needed, update with search filtering count)
    "data" => $data
];

echo json_encode($response);
?>
