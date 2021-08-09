<?php
// Performing Search Query on Database
include "config.php";
header("Content-Type: application/json");
header("Access-Control-Origin: *");
header("Access-Control-Allow_methods: POST");
header("Access-Control-Allow_Headers: Access-Control-Allow_Headers,Content-Type,Access-Control-Allow_methods,Authorization,X-Requested-With");

$data = json_decode(file_get_contents("php://input"), true);
$search = $data["search"];
$sql = "SELECT * FROM student_details WHERE student_name LIKE '%{$search}%';";
$result = mysqli_query($conn, $sql) or die("Search failed");
if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(array('message' => 'No result found', 'status' => false));
}
