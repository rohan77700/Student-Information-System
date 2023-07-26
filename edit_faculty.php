<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"sis");
	$query = "update faculty set faculty_name='$_POST[faculty_name]',contact='$_POST[contact]',
    email='$_POST[email]' where faculty_name = '$_POST[faculty_name]'";
	$query_run = mysqli_query($connection,$query);
?>
<script>
	alert("Updated successfully.");
	window.location.href = "admin_dashboard.php";
</script>
