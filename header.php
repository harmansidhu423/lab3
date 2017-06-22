<html>
<head>
	<title>Lab 5</title>
	<link type="text/css" rel="stylesheet" href="styles.css" />
</head>

<body>
<div>

<ul>

<?php

require_once('db.php');

$sql = "SELECT teamId, teamName FROM teams";
$cmd = $conn->prepare($sql);
$cmd->execute();
$teams = $cmd->fetchAll();

//loop through results to create links to roster page
foreach ($teams as $team) {
	echo '<li><a href="roster.php?teamId=' . $team['teamId'] . '">' . $team['teamName'] . '</a></li>';
}

//$conn = null;

?>

	<li><a href="search.php">Search</a></li>
	<li><a href="add-racer.php">Add Racer</a></li>
</ul>

</div>