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
    <?php
        session_start();
        if($_SESSION['sid']!=session_id()){
            header("location:login_view.php");
        }
    ?>
        
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
    <div class="container">
        <div class="row">
        <?php
        session_start();
        if($_SESSION['sid']!=session_id()){
            header("location:login_view.php");
        }
        ?>
    
    <h1> Admin View - 
    	<?php
    			if(isset($_POST['course'])){ 
				echo "Insert Reference Book for ".$_POST['course'];
				}else if(isset($_POST['update_id'])){
				echo "Update Reference Book for ".$_POST['update_id'];
				} else {
				echo "Insert Reference Book for ".$_POST['course_id'];
				}
		 ?>
	 </h1>
	 
	 
	  <form action="insert_view.php" method="post">
	  	<div class="form-group">
	  		Course:
	  		 <select name="course_id">
	  		<?php
	  		
    	 		include 'db_connection.php';
    	 		
	  			if(isset($_POST['course'])){
				$course = $_POST['course'];
				} else {
				$course = $_POST['update_id'];
				}
	  			
			  	$conn = OpenCon();
			  	$course_join = "SELECT course_name, course_id FROM course ORDER BY course_name";
			  	$course_res = mysqli_query($conn, $course_join);
			  	if ($course_res) {
			  		if(mysqli_num_rows($course_res)> 0){
			  			 while($row = mysqli_fetch_array($course_res)){
			  			 	if($row['course_id'] == $course){
			  			 	echo "<option selected value=".$row['course_id'].">" . $row['course_name']. "</option>";
			  			 	} else {
							echo "<option value=".$row['course_id'].">" . $row['course_name']. "</option>";
							}
						}
					}
			  	
			  	} else {
    				echo "Error: " . $book_join . "<br>" . mysqli_error($conn);
				}

				CloseCon($conn);
			  ?>
			</select> 
			</div>
			 <div class="form-group">
	 	 	Book Title:
	 	 	<input type="text" value="<?php echo isset($_POST["update_title"]) ? htmlentities($_POST["update_title"]) : ""; ?>" name="book_title">
	 	 	</div>
	 	 	 <div class="form-group">
	 	 	Author:
	 	 	<input type="text" value="<?php echo isset($_POST["update_author"]) ? htmlentities($_POST["update_author"]) : ""; ?>"  name="author">
	 	 	</div>
	 	 	 <div class="form-group">
	 	 	Link to eBook:
	 	 	<input type="text" value="<?php echo isset($_POST["update_ebook"]) ? htmlentities($_POST["update_ebook"]) : ""; ?>" name="ebook">
	 	 	</div>
	 	 	 <div class="form-group">
	 	 	Link to NITC Library:
	 	 	<input type="text" value="<?php echo isset($_POST["update_library"]) ? htmlentities($_POST["update_library"]) : ""; ?>" name="library_book">
	 	 	</div>
	 	 	
	 	<?php
	 	if(isset($_POST['update_id'])){
	 	
	 	echo '<input type="hidden" value="'. htmlentities($_POST["update_id"]) . '" name="update_id_2"/>'.
	 	'<input type="hidden" value="'.htmlentities($_POST["update_title"]) . '" name="old_title"/>'.
	 	'<input type="hidden" value="'. htmlentities($_POST["update_author"]) . '" name="old_author"/>'.
	 	'<input type="submit" class="btn btn-success" value="Update">';
	 	} else {
	 	echo "<input type='hidden' value='". htmlentities($_POST["insert_id"]) . "' name='insert_id'/><input type='submit' class='btn btn-success' value='Insert'>";
	 	}
	 	
		 ?>
			<a href="admin_view.php" class="btn btn-info" role="button">Go Back to Admin View</a>
		
	  </form>
	<?php
		if(isset($_POST['insert_id'])){
			  	$conn = OpenCon();
			  	$book_title =  mysqli_real_escape_string($conn, $_POST['book_title']);
			  	$author =  mysqli_real_escape_string($conn, $_POST['author']);
			  	$course_id = $_POST['course_id'];
			  	$ebook =  mysqli_real_escape_string($conn,$_POST['ebook']);	
			  	$library_book =  mysqli_real_escape_string($conn,$_POST['library_book']);
			  	$course_join = "insert into book values('".$book_title."','".$author."','".$course_id."','".$ebook."','" . $library_book ."');";
			  	//echo $course_join;
			  	if(!empty($book_title) && !empty($author) && !empty($course_id)){
			  		$course_res = mysqli_query($conn, $course_join);
			  		if ($course_res) {		
			  			echo "Successfully inserted \"$book_title\"";
			  		} else {
			  		echo "Could Not Add Book \"$book_title\"";
			  		}
			  	} else {
			  		echo "Please fill all required details";
			  	}
		} else if(isset($_POST['update_id_2'])){
				$conn = OpenCon();
			  	$book_title =  mysqli_real_escape_string($conn, $_POST['book_title']);
			  	$author =  mysqli_real_escape_string($conn, $_POST['author']);
			  	$course_id = $_POST['course_id'];
			  	$ebook =  mysqli_real_escape_string($conn,$_POST['ebook']);	
			  	$library_book =  mysqli_real_escape_string($conn,$_POST['library_book']);
			  	$update_sql = "UPDATE book SET book_title ='".$book_title."',author='".$author."',course_course_id='".$course_id."',ebook='".$ebook."',library_book='" . $library_book.
			  					"' WHERE book_title ='".mysqli_real_escape_string($conn,$_POST['old_title'])."' AND author='".mysqli_real_escape_string($conn,$_POST['old_author'])."' AND course_course_id='".$course_id."';";
			
			  	if(!empty($book_title) && !empty($author) && !empty($course_id)){
			  		$course_res = mysqli_query($conn, $update_sql);
			  		if ($course_res) {		
			  			echo "Successfully updated \"$book_title\"";
			  		} else {
			  		echo "Could Not Add Book \"$book_title\"";
			  		}	
			  	} else {
			  		echo "Please fill all required details";
			  	}
		
		}
	?>
			
		
        </div></div>
</body>

</html>

