<?php


include 'db_connection.php';
$conn= OpenCon();

$user = $_POST['user'];
$pass = $_POST['password'];
$hashed=password_hash($pass, PASSWORD_DEFAULT);

$sql="insert into login values('$user','$hashed')";


if(mysqli_query($conn,$sql))
{
echo "Success";

}
else
{

echo "not worked";

}



?>
