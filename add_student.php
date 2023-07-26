<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"sis");
	
						
						//code for img
						
						function guid() {
								 if (function_exists('com_create_guid')) {
											return com_create_guid();
										} else {
											mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
											$charid = strtoupper(md5(uniqid(rand(), true)));
											$hyphen = chr(45); // "-"
											$uuid = chr(123)// "{"
													. substr($charid, 0, 8) . $hyphen
													. substr($charid, 8, 4) . $hyphen
													. substr($charid, 12, 4) . $hyphen
													. substr($charid, 16, 4) . $hyphen
													. substr($charid, 20, 12)
													. chr(125); // "}"
											return $uuid;
										}
							  }
								if($_FILES["image"]["name"])
								{
									  $path_parts = pathinfo($_FILES["image"]["name"]);
												  $ext = $path_parts['extension'];
												  $fileName = trim(guid(), '{}') . '.' . $ext;
								}
								else{
									$fileName = $pic['image'];
								}

							move_uploaded_file($_FILES['image']['tmp_name'], "uploads/$fileName");


													
						//end img 
						
						

	$query = "insert into student values('$_POST[roll_no]','$_POST[std_name]','$_POST[dept]','$_POST[batch]',
	'$_POST[sem]','$_POST[father_name]','$_POST[father_contact]','$_POST[dob]','$_POST[gender]','$_POST[address]',
	'$_POST[std_contact]','$_FILES[image]','$_POST[username]','$_POST[email]','$_POST[password]')";
	$query_run = mysqli_query($connection,$query);
?>

<script>
	alert("Student added successfully.");
	window.location.href = "admin_dashboard.php";
</script>
