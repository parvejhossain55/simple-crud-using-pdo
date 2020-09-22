<?php 
include 'class/Database.php';
class Student{

	private $name;
	private $dep;
	private $roll;

	public function setValue($name, $dep, $roll){
		$this->name = $name;
		$this->dep = $dep;
		$this->roll = $roll;
	}

	public function insertStd(){
		$sql = 'INSERT INTO student(name, dep, roll) VALUES(:name, :dep, :roll)';
		$data = Database::prepare($sql);
		$data->bindParam(':name', $this->name);
		$data->bindParam(':dep', $this->dep);
		$data->bindParam(':roll', $this->roll);
		return $data->execute();
	}

	public function showAllStd(){
		$sql = 'SELECT * FROM student';
		$data = Database::prepare($sql);
		$data->execute();
		return $data->fetchAll();
	}

	public function updateStdById($id){
		$sql = 'UPDATE student SET name=:name, dep=:dep, roll=:roll WHERE id=:id';
		$data = Database::prepare($sql);
		$data->bindValue(':name', $this->name);
		$data->bindValue(':dep', $this->dep);
		$data->bindValue(':roll', $this->roll);
		$data->bindValue(':id', $id);
		return $data->execute();
	}

	public function deleteStdById($id){
		$sql = 'DELETE FROM student WHERE id=:id';
		$data = Database::prepare($sql);
		$data->bindParam(':id', $id);
		return $data->execute();
	}

	public function showStdById($id){
		$sql = 'SELECT * FROM student WHERE id=:id';
		$data = Database::prepare($sql);
		$data->bindParam(':id', $id);
		$data->execute();
		return $data->fetch();
	}

}

?>