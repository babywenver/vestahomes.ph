<?php

	include 'init.php';
	if(isset($_POST['save']))
	{
		$student->Add_Student();
	}
	
	if(isset($_POST['reset']))
	{
		$student->clean();
	}
	
	if(isset($_GET['del_id']))
	{
		$id = $_GET['del_id'];
		$student->Delete_Student($id);
	}
	
	
?>

<html>


	<center>

		<p>Student List</p>
		<form action = "add_student.php" method ="POST">
	
		<label for = "name">Full Name</label> <input type = "text" name = "name" id = "name" /> </br>
		<label for = "subject"> Subject </label> &nbsp; &nbsp;&nbsp; <input type = "text" name = "subject" id = "subject" /> </br>
		<label for = "grade"> Grade </label> &nbsp; &nbsp; &nbsp; <input type = "text" name ="grade" id = "grade"></br>
		<button name = "save">ADD</button>&nbsp; &nbsp;<button name = "reset">RESET</button>
	
		
		</form>

	</center>
	
	<form action = "add_student.php" method = "POST">
	
		<label for = "filter">Filter</label> <input type ="text" name ="txt_search" id = "filter">
		<input type ="submit" name = "search" value = "GO"> </input>
	<table>
			
			
			<tbody>
			<th>IDNO</th>
			<th>NAME</th>
			<th>SUBJECT</th>
			<th>GRADE</th>
			<th>Action</th>
				
				<tr>
					<?php
						$student->view();
					?>
				</tr>			
			</tbody>
			
		
	</table>
	</form>

</html>