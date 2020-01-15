<?php
$request_method = $_SERVER['REQUEST_METHOD'];
$response = array();

switch ($request_method){
    case "GET":
        response(doGet());
    break;
    case "POST":
        response(doPost());
    break;
    case "PUT":
        doPut();
    break;
    case "DELETE":
        doDelete();
    break;
}

function doGet(){
    if (@$_GET['id']){
        @$id = $_GET['id'];
        $where = "WHERE `id`=".$id;
    }
    else {
    $id = 0;
    $where = "";
    }
    $dbconnect  = mysqli_connect("localhost", "root", "", "api");
    $query      = mysqli_query($dbconnect, "SELECT * FROM `emp`".$where);
    while ($data = mysqli_fetch_assoc($query)){
        $response[] = array("emp_id"=>$data['id'], "emp_name"=>$data['emp_name']);
    }
    return $response;
    //echo json_encode($data);
    //echo "get method cal lled";
}

function doPost()
{
   if ($_POST)
   {
       $dbconnect   =   mysqli_connect("localhost", "root", "", "api");
       $query       =   mysqli_query($dbconnect, "INSERT INTO `emp` (`emp_name`, `emp_status`) VALUES ('" . $_POST['emp_name'] . "','".$_POST['emp_status']."')");
   if ($query == true)
   {
       $response = array("message"=>"success");
   }
   else {
        $response = array("message"=>"failed");
        }
     echo " post method called";
}
return $response;
}

function doPut(){
    echo " put method called";
}

function doDelete()
{
    echo " Delete method called";
}

function response($response){
    echo json_encode(array ("status"=>"200","data"=>$response));
}
?>