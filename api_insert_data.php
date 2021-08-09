<?php
// Insert a record in Database
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

include "config.php";
$data = json_decode(file_get_contents('php://input'), true);
$student_name = $data['student_name'];
$age = $data['age'];
$sql = "INSERT INTO student_details(student_name,age) VALUES('{$student_name}',{$age});";
$result = mysqli_query($conn, $sql) or die("MYSQL Query Failed");

if ($result) {
    echo json_encode(array('message' => 'Record Inserted SuccessFully', 'status' => true));
} else {
    echo json_encode(array('message' => 'Record Insertion Failed', 'status' => false));
}
mysqli_close($conn);
