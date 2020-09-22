<?php 
include 'inc/header.php';
include 'class/Student.php';
$std = new Student();
?>

<section class="mainleft">
<?php 

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$dep = $_POST['dep'];
	$roll = $_POST['roll'];

	$std->setValue($name, $dep, $roll);

	if($std->updateStdById($id)){
		echo "Data Update Successfully";
	}
}

?>

<?php 
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$dep = $_POST['dep'];
	$roll = $_POST['roll'];
	$std->setValue($name, $dep, $roll);
	if($std->insertStd()){
		echo "Data Inserted Successfully";
	}
}
?>
<?php 
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
	$id = base64_decode($_GET['id']);
	if ($std->deleteStdById($id)){
		echo "Data Deleted Successfully";
	}
}
?>
<?php 
if (isset($_GET['action']) && $_GET['action'] == 'edit') {
	$id = base64_decode($_GET['id']);
	$result = $std->showStdById($id);
?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <table>
            <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
            <tr>
                <td>Name : </td>
                <td><input type="text" name="name" value="<?php echo $result['name'] ?>"></td>    
            </tr>

            <tr>
               <td>Department : </td>
                <td><input type="text" name="dep" value="<?php echo $result['dep'] ?>"></td>
            </tr>

            <tr>
              <td>Roll : </td>
                <td><input type="text" name="roll" value="<?php echo $result['roll'] ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="update" value="Update"/>
                    <input type="reset" value="Clear"/>
                </td>
            </tr>
        </table>
    </form>

	<?php } else{ ?>

	   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <table>
            <input type="hidden" name="id"/>
            <tr>
                <td>Name : </td>
                <td><input type="text" name="name"></td>    
            </tr>

            <tr>
               <td>Department : </td>
                <td><input type="text" name="dep"></td>
            </tr>

            <tr>
              <td>Roll : </td>
                <td><input type="text" name="roll"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Submit"/>
                    <input type="reset" value="Clear"/>
                </td>
            </tr>
        </table>
    </form>

<?php } ?>

</section>



<section class="mainright">
  <table class="tblone">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Department</th>
        <th>Roll</th>
        <th>Action</th>
    </tr>
<?php 
	$i=0;
	foreach ($std->showAllStd() as $value) {
	$i++
 ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value['name']; ?></td>
        <td><?php echo $value['dep']; ?></td>
        <td><?php echo $value['roll']; ?></td>
        <td>
        <?php echo "<a href='index.php?action=edit&id=".base64_encode($value['id'])."'>Edit</a>"; ?> 
        <?php echo "<a href='index.php?action=delete&id=".base64_encode($value['id'])."'>Delete</a>"; ?>
        </td>
    </tr>
<?php } ?>
  </table>
</section>

<?php include 'inc/footer.php' ?>