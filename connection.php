<?php
$server='localhost';
$username='carbonara';
$password='';
$database='crud_php';

if(isset($_POST))

//Create Connection
$conn=new mysqli($server,$username,$password,$database);

if($conn){
// echo 'Server Connected Success';
}else{
    die("Connection Failed".mysqli_connect_error());
}
?>