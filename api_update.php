<?php
// Updating a record in database
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

include "config.php";
$data = json_decode(file_get_contents('php://input'), true);
$student_id = $data['student_id'];
$student_name = $data['student_name'];
$age = $data['age'];
$sql = "UPDATE student_details SET student_name = '{$student_name}', age = {$age} WHERE student_id = {$student_id};" or die("MYSQL Query Failed");
$result = mysqli_query($conn, $sql);

if ($result) {
    echo json_encode(array('message' => 'Record Updated SuccessFully', 'status' => true));
} else {
    echo json_encode(array('message' => 'Record Updation Failed', 'status' => false));
}
mysqli_close($conn);
