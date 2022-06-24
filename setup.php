<?php
$roomname = $_POST['roomname'];
$roompassword = $_POST['roompassword'];

$conn = new mysql('localhost','root','127.0.0.1','setupdatabase');
if($conn->connect_error){
    die('connection failed: ' .$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into room entry(roomname,roompassword)
    values(?,?)");
    $stmt->bind_param("ss",$roomname, $roompassword);
    $stmt->execute();
    echo "login successful...";
    $stmt->close();
    $conn->close();
}

?>