<?php
// Get a single record by student id from Database
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

include "config.php";
$data = json_decode(file_get_contents('php://input'), true);
$st_id = $data['student_id'];
$sql = " SELECT * from student_details WHERE student_id = $st_id;";
$result = mysqli_query($conn, $sql) or die("MYSQL Query Failed");

if (mysqli_num_rows($result) > 0) {
    // echo "records present";
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(array('message' => 'No record found', 'status' => false));
}
mysqli_close($conn);
?>
