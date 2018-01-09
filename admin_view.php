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
            
    <h1> Admin View - Update Reference Books</h1>
    
    <form action="admin_view.php" class="form-group" method="post">
    	 <select name="course_id" >
    	 	<?php
    	 		include 'db_connection.php';
			  	
			  	$conn = OpenCon();
			  	$course_join = "SELECT course_name, course_id FROM course ORDER BY course_name";
			  	$course_res = mysqli_query($conn, $course_join);
			  	if ($course_res) {
			  		if(mysqli_num_rows($course_res)> 0){
			  			 while($row = mysqli_fetch_array($course_res)){
							echo "<option value=".$row['course_id'].">" . $row['course_name']. "</option>";
						}
					}
			  	
			  	} else {
    				echo "Error: " . $book_join . "<br>" . mysqli_error($conn);
				}

				CloseCon($conn);
			  ?>
			 
		</select> 
 	 	<input type="submit" class="btn" value="Search">
	</form>
	<br>
	<br>
	<?php
	
		if(isset($_POST['delete_id'])){
			$conn = OpenCon();
			$title = $_POST['delete_title'];
			$course = $_POST['delete_id'];
			$delete_sql= sprintf("DELETE FROM book WHERE course_course_id = '%s' AND author= '%s' AND book_title='%s';",
			$course,
			mysqli_real_escape_string($conn,$_POST['delete_author']),
			mysqli_real_escape_string($conn,$_POST['delete_title'])
            );
			$book_res = mysqli_query($conn, $delete_sql);
			if ($book_res) {
				echo "Deleted \"$title\"<br><br>";
			} else {
				echo "Could not delete \"$title\"";
			}
			CloseCon($conn);
			}
	?>
	
	
  <?php
		if(isset($_POST['course_id']) || isset($_POST['delete_id'])){
				$conn = OpenCon();
				
				if(isset($_POST['course_id'])){
				$course = $_POST['course_id'];
				} else {
				$course = $_POST['delete_id'];
				}
				
				$book_join = "SELECT * FROM book WHERE course_course_id = '$course'";
				$book_res = mysqli_query($conn, $book_join);
				if ($book_res) {
					if(mysqli_num_rows($book_res) > 0){
						echo "<table class='table table-hover'>";
							echo "<tr>";
								echo "<th>Book Name</th>";
								echo "<th>Author</th>";
								echo "<th>EBook</th>";
								echo "<th>Library Link</th>";
								echo "<th>Options</th>";
							echo "</tr>";
						while($row = mysqli_fetch_array($book_res)){
							echo "<tr>";
								echo "<td>" . $row['book_title'] . "</td>";
								echo "<td>" . $row['author'] ."</td>";
								echo "<td>" . $row['ebook'] ."</td>";
								echo "<td>" . $row['library_book'] ."</td>";
								$title =$row['book_title'];
								echo '<td><form action="admin_view.php" method="post">' .
									 '<button type="submit" class="btn btn-warning" value="'. htmlentities($title) .'" name="delete_title">Delete</button>'.
									'<input type="hidden" value="'. htmlentities($row['author']).'" name="delete_author"/>'.
									'<input type="hidden" value="'.$course. '" name="delete_id"/>'.
									'</form></td>';
								echo '<td><form action="insert_view.php" method="post">'. '<button type="submit" class="btn btn-info" value="' .
									htmlentities($title).'" name="update_title">Update</button>
									<input type="hidden" value="'.htmlentities($row['author']).'" name="update_author"/>
									<input type="hidden" value="'.$course.'" name="update_id"/>
									<input type="hidden" value="'.htmlentities($row['ebook']).'" name="update_ebook"/>
									<input type="hidden" value="'.htmlentities($row['library_book']).'" name="update_library"/>
									</form></td>';		
							echo "</tr>"; 
						}
						echo "</table>";
						
						
						mysqli_free_result($book_res);
						
						
					} else {
    				echo "No books found";
					}
					echo "<br><br><form action='insert_view.php' method='post'>
								<button type='submit' class='btn btn-default' value='" .
									$course
								."' name='course'>Add a book</button>
							</form>";
				CloseCon($conn);
				}
			}
		?>
		
        </div>
        </div>

</body>

</html>

