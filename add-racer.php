<?php

require_once('header.php');

?>

<form method="post" action="insert_racer.php">
<div>
	<label for="racerName">Racer Name</label>
	<input name="racerName" id="racerName" required />
</div>
<div>
	<label for="age">Age</label>
	<input name="age" id="age" maxlength="2" required />
</div>
<div>
	<label for="sex">Sex</label>
	<select name="sex" id="sex">
		<option value="F">F</option>
		<option value="M">M</option>
	</select>
</div>
<div>
	<label for="phoneNum">Phone</label>
	<input name="phoneNum" id="phoneNum" maxlength="15" required />
</div>
<div>
	<select name="teamId">
		<?php
			//connect to db to get list of teams
			require_once('db.php');
			$sql = "SELECT teamId, teamName FROM teams ORDER BY teamName";
			$cmd = $conn->prepare($sql);
			$cmd->execute();
			$teams = $cmd->fetchAll();

			//loop through results to create links to roster page
			foreach ($teams as $team) {
				echo '<option value="' . $team['teamId'] . '">' . $team['teamName'] . '</option>';
			}

			$conn = null;
		?>
	</select>
</div>
<!--<input type="button" value="Save" />-->
<button>save</button>
</form>
</body>
</html>