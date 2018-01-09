<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini Library</title>
    <link rel="shortcut icon" href="img/ICON.png" />
    <meta name="description" content="Mini Library">
    <!-- Latest compiled and minified CSS for Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/main.css">
    <!--    Scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div>
        <nav class="navbar navbar-color">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">MiniLibrary</a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                   <?php
                    session_start();
                    if($_SESSION['sid'] != session_id()){
                        echo "<li><a href='login_view.php'>Login</a></li>";
                    } else {
                        echo "<li><a href='logout.php'>Logout</a></li>";
                         echo "<li><a href='admin_view.php'>Admin View</a></li>";
                    }
                    ?>
                    
                    
                     <li><a href="register.html">Register</a></li>
                </ul>
            </div>
        </nav>
    </div>
    
    <?php


include 'db_connection.php';
$conn= OpenCon();
$user = $_POST['user'];
$pass = $_POST['password'];
    
$sql="select * from login where user='$user'";
$result = mysqli_query($conn,$sql);
    
    if(mysqli_query($conn,$sql))
{
}
else
{
echo "sql error <br>";

}
    $count = mysqli_num_rows($result);
    
if($count == 1)
{
	$row = mysqli_fetch_array($result);
    echo "<br>";
	if(password_verify($pass,$row['password']))
	{
	
        session_start();
        $_SESSION['sid'] = session_id();
        
	    header("Location:admin_view.php");
	
	   
	} else {
        echo "wrong password";
    }

}

else 
{
    echo "enter valid username";
}
?>
</body>

</html>
