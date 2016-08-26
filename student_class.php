<?php

	

	
	class Student extends Database
	{
		
		public $name;
		public $subject;
		public $grade;
		public $con;
		public $dbs;
		public $search;
		function __construct()
		{
			$this->dbs = new Database();
			$this->con = $this->dbs->dbcon;
			
			
			$this->name = isset($_POST['name']) ? $_POST['name'] : null;
			$this->subject = isset($_POST['subject']) ? $_POST['subject'] : null;
			$this->grade = isset($_POST['grade']) ? $_POST['grade'] : null;
			$this->search =isset($_POST['txt_search']) ? $_POST['txt_search'] : null;
			
		}
		
		
		
		public function Add_Student()
		{
			$fields = array('name','subject','grade');
			$data = array($this->name, $this->subject, $this->grade);
			$table = 'student';
			try{
				
				return $this->dbs->insert($fields,$data,$table);
				header("add_student.php?Success");
				
			}catch(Exception $e){ echo "Some Exception Occured!";}
			

		}
		
		public function clean()
		{
			$this->name = "";
			$this->subject = "";
			$this->grade = "";
		}
		
		
		public function view()
		{
			$query = "SELECT * from student";
			$stmt = $this->con->query($query);
			$stmt->execute();
			
			
			if($stmt->rowCount() > 0)
			{
				
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
				{
					?>
					
					<tr>
						<td><?php echo $row['idno'];?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['subject'];?></td>
						<td><?php echo $row['grade'];?></td>
						<td><a href = "edit.student.php?edit_id=<?php print $row['idno'];?>">Edit</a>
						| <a href = "add_student.php?del_id=<?php print $row['idno'];?>">Delete</a>
						</td>	
	
	
				</tr>
					
					<?php
				}
				
			}
			else 
			{
				echo "No Records Found!";
			}
			
		}
		
		
		public function Delete_Student($id)
		{
			$stmt = $this->con->prepare("DELETE FROM student WHERE idno = :id");
			$stmt->execute(array(":id" =>$id));
			return true;
		}
		
		
		public function get_idno($id)
		{
			$stmt = $this->con->prepare("SELECT name,subject,grade FROM student WHERE idno = :id");
			$stmt->execute(array(":id" =>$id));
			
			$result = $stmt->fetch();
			return $result;
			
		}
		
		public function update_student($id)
		{
			$stmt = $this->con->prepare("UPDATE student SET name = '".$this->name."',
															subject	= '".$this->subject."',
															grade = '".$this->grade."'	
															WHERE idno=:id");
			$stmt->execute(array(":id"=>$id));
			return true;	
															
		}
		
	
		public function search($name)
		{
			$stmt = $this->con->prepare("SELECT idno,name,subject,grade WHERE name=:name");
			$stmt->execute(array(":name" =>$name));
			
			if($stmt->rowCount()>0)
			{
				
				?>
					
					<tr>
						<td><?php echo $row['idno'];?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['subject'];?></td>
						<td><?php echo $row['grade'];?></td>
						<td><a href = "edit.student.php?edit_id=<?php print $row['idno'];?>">Edit</a>
						| <a href = "add_student.php?del_id=<?php print $row['idno'];?>">Delete</a>
						</td>	
	
	
				</tr>
					
					<?php
				
				
			}
			else 
			{
				echo "No Records Found!";
			}
			
		}
	
	}	



?>