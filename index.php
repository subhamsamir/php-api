<?php
$request_method = $_SERVER['REQUEST_METHOD'];
$response = array();

switch ($request_method){
    case "GET":
        response(doGet());
    break;
    case "POST":
        doPost();
    break;
    case "PUT":
        doPut();
    break;
    case "DELETE":
        doDelete();
    break;
}

function doGet(){
    $dbconnect  = mysqli_connect("localhost", "root", "", "api");
    $query      = mysqli_query($dbconnect, "SELECT * FROM `emp`");
    while ($data = mysqli_fetch_assoc($query)){
        $response[] = array("emp_id"=>$data['id'], "emp_name"=>$data['emp_name']);
    }
    return $response;
    //echo json_encode($data);
    //echo "get method cal lled";
}

function doPost(){
    echo " post method called";
}

function doPut(){
    echo " put method called";
}

function doDelete()
{
    echo " Delete method called";
}

function response($response){
    echo json_encode($response);
}
?>