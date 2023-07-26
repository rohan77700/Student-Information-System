<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"sis");
	$query = "insert into faculty values('$_POST[faculty_id]','$_POST[faculty_name]',
	'$_POST[contact]','$_POST[email]')";
	$query_run = mysqli_query($connection,$query);
?>
<script>
	alert("Faculty added successfully.");
	window.location.href = "admin_dashboard.php";
</script>
