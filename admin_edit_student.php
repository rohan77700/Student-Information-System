<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"sis");
	$query = "update student set roll_no='$_POST[roll_no]',std_name='$_POST[std_name]',dept='$_POST[dept]',batch='$_POST[batch]',sem='$_POST[sem]',
	father_name='$_POST[father_name]',father_contact='$_POST[father_contact]',dob='$_POST[dob]',gender='$_POST[gender]',
	address='$_POST[address]',std_contact='$_POST[std_contact]' where roll_no = '$_POST[roll_no]'";
	$query_run = mysqli_query($connection,$query);
?>
<script>
	alert("Updated successfully.");
	window.location.href = "admin_dashboard.php";
</script>
