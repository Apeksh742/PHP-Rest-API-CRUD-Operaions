<?php
// Delete a record by student id from Database
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

include "config.php";
$data = json_decode(file_get_contents('php://input'), true);
$student_id = $data['student_id'];
$sql = "DELETE FROM student_details WHERE student_id = {$student_id};" or die("MYSQL Query Failed");
$result = mysqli_query($conn, $sql);

if ($result) {
    echo json_encode(array('message' => 'Record Deleted SuccessFully', 'status' => true));
} else {
    echo json_encode(array('message' => 'Record Deletion Failed', 'status' => false));
}
mysqli_close($conn);
