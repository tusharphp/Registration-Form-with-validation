<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
require ("connection.php");
$uid=$_GET['dell_id'];
$sql=mysql_query("delete from test where id='$uid'");
if($sql )
 {
	 echo "<script> alert('Data Delete Successfully');</script>";
	 echo "<script> window.location.href='viewusers.php'</script>";
	 
 } 
 else
 {
	 echo "<script>alert('Data Not Deleted');</script>";
	 echo "<script> window.location.href='viewusers.php'</script>";
 }

?>
</body>
</html>