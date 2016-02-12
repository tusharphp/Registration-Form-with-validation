<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Registration Form</title>
  <link rel="stylesheet" href="css/style.css" media="all">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  
 <script>
function dell(cat)
{
	if (confirm('Do you want to delete'))
	{
		window.location.href=cat;
	
	}
	else
	{
		window.location.href='trialform.php';


	}
}

</script>

</head>

<body>
  
<div class="containerupdate">
    <section class="register">
    
<table border="1px" width="900px">
 <tr>
 <th></th>
 <th></th>
  <th>Name</th>
  <th>Address</th>
  <th>Email</th>
  <th>Birthday</th>
  <th>Mobile</th>
  </tr>
  
<?php
require ("connection.php");
$viewsql=mysql_query("select * from test");
while($rowview=mysql_fetch_array($viewsql))

{
	$uid=$rowview['id'];
	$uname=$rowview['name'];
	$uadd=$rowview['address'];
	$uemail=$rowview['email'];
	$ubir=$rowview['birthday'];
	$umob=$rowview['mobno'];
	?>
    <tr>
    <td><a href="#" id=<?php echo 'delete.php?dell_id='.$uid.'';?> onClick='dell(this.id)'>Delete </a>  </td>
    <td><?php echo "<a href='update.php?updateid=$uid'>Edit</a>"  ?></td>
    
    <td><?php echo $uname ?></td>
    <td><?php echo $uadd ?></td>
    <td><?php echo $uemail ?></td>
    <td><?php echo $ubir ?></td>
    <td><?php echo $umob ?></td>
    </tr>
	
	<?php
}
?>
     
     </table>
    </section>
  </div>


</body>
</html>