<?php
	
	include 'init.php';
	
	if(isset($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$new_student = $student->get_idno($id);
	}
	if(isset($_POST['reser']))
	{
		$student->clear();
	}

	if(isset($_POST['update']))
	{
		$id = $_POST['id'];
		$student->update_student($id);
		header("location:add_student.php?update_success");
	}
?>


<html>


	<center>

		<p>Student List</p>
		<form action = "edit.student.php" method ="POST">
		<label for = "name">Full Name</label> 
		<input type = "hidden" name = "id" value = <?php echo $_GET['edit_id'];?> >
		<input type = "text" name = "name" id = "name" value ="<?php echo $new_student['name'];?>"/> </br>
		<label for = "subject"> Subject </label> &nbsp; &nbsp;&nbsp; <input type = "text" name = "subject" id = "subject" value = "<?php echo $new_student['subject'];?>"/> </br>
		<label for = "grade"> Grade </label> &nbsp; &nbsp; &nbsp; <input type = "text" name ="grade" id = "grade" value ="<?php echo $new_student['grade'];?>"></br>
		<button name = "update">ADD</button>&nbsp; &nbsp;<button name = "reset">RESET</button>
	
		</form>

	</center>
	
</html>