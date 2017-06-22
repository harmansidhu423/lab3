<?php ob_start();

require_once('header.php');

$ok = true;

if (empty($_POST['racerName'])) {
	$ok = false;
	echo 'Racer Name is Required<br />';
}

if (empty($_POST['age'])) {
	$ok = false;
	echo 'Age is Required<br />';
}

if (empty($_POST['sex'])) {
	$ok = false;
	echo 'Sex is Required<br />';
}

if (empty($_POST['phoneNum'])) {
	$form_ok = false;
	echo 'Phone Number is Required<br />';
}

if ($ok = true) {
	$racerName = $_POST['racerName'];
	$age = $_POST['age'];
	$sex = $_POST['sex'];
	$phoneNum = $_POST['phoneNum'];
	$teamId = $_POST['teamId'];
	
	//form is good, so save to db
	require_once('db.php');
	$sql = "INSERT INTO racers (racerName, age, sex, phoneNum, teamId) VALUES (:racerName, :age, :sex, :phoneNum, :teamId)";
	$cmd = $conn->prepare($sql);
	$cmd->bindParam(':racerName', $racerName, PDO::PARAM_STR, 40);
	$cmd->bindParam(':age', $age, PDO::PARAM_INT);
	$cmd->bindParam(':sex', $sex, PDO::PARAM_STR,1);
	$cmd->bindParam(':phoneNum', $phoneNum, PDO::PARAM_STR, 15);
	$cmd->bindParam(':teamId', $teamId, PDO::PARAM_INT);
	$cmd->execute();
	$conn = null;
	
	header('location:roster.php?teamId=' . $teamId);
}
else {
	echo('Your entry could not be saved.  Click <a href="javascript:history.go(-1)">Here</a> to go back.');
}

?>

</body>
</html>

<?php ob_flush(); ?>