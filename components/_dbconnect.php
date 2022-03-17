<?php
$username="root";
$password="";
$servername="localhost";
$database="users";
$conn=mysqli_connect($servername,$username,$password,$database);
if($conn){
    echo "success";
}else{
    die("error".mysqli_connect_error($conn));
}

?>