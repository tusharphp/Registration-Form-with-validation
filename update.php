<?php $getid=$_GET['updateid']; 
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Registration Form</title>
 
 <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css" type="text/css" media="all">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>

<script>
$(function()
{
        
        $("#from").datepicker({ dateFormat: 'yy-mm-dd' }).bind("change",function()
{
           
           
        })
    });
</script> <link rel="stylesheet" href="css/style.css" media="all">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  
  <script language="javascript" type="text/javascript">
  
function echeck(str) 
		{
        var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1)
		{
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr)
		{
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr)
		{
		    alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1)
		 {
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot)
		 {
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1)
		 {
		    alert("Invalid E-mail ID")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1)
		 {
		    alert("Invalid E-mail ID")
		    return false
		 }

 		 return true					
	    }
  
    function validate()
	
	 {
		 
		 if (document.test.name.value=="" )
	{
		alert("Enter Your Name");
		document.test.name.focus();
		return false;
	} 
	if (document.test.address.value=="" )
	{
		alert("Enter Your Address");
		document.test.address.focus();
		return false;
	}
		 
		 
		 
		 	var emailID=document.test.email	
	         if ((emailID.value==null)||(emailID.value==""))
			 {
		          alert("Please Enter your Email ID")
		          emailID.focus()
		          return false
	         }
	         if (echeck(emailID.value)==false)
			 {
		         emailID.value=""
		         emailID.focus()
		         return false
	          }	
   		
	
return true;
		 
		 
        var mobile = document.getElementById("mobile").value;
        var pattern = /^\d{10}$/;
        if (!pattern.test(mobile))
		 {
            alert("It is not valid mobile number.input 10 digits number!");
            return false;
      
		 }
    
	
	var name=document.getElementById("name").value;
	var num=/^[a-zA-Z]*$/;
	if (!num.test(num1))
	{
		alert ("Enter Only name");
		return false;
	}
	


}
		function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
	}
	
</script>

</head>

<body>
<?php
require ("connection.php");

	
$viewsql=mysql_query("select * from test where id='$getid'");
while($rowview=mysql_fetch_array($viewsql))

{
	$uid=$rowview['id'];
	$uname=$rowview['name'];
	$uadd=$rowview['address'];
	$uemail=$rowview['email'];
	$ubir=$rowview['birtday'];
	$umob=$rowview['mobno'];
	$upic=$rowview['image'];
}
?>
  <div class="container">
    <section class="register" >
    
      <form name="test" id="test" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" onSubmit="return validate();" enctype="multipart/form-data">
      <div class="reg_section personal_info">
      <h3>Your Personal Information</h3>
      <input type="text" name="name" id="name" value="<?php echo $uname ?>" placeholder="Your Desired Username" onKeyPress="return onlyAlphabets(event,this);">
       <h3>Your Address</h3>
  
      <textarea name="address" id="address" placeholder="Your Address"><?php echo $uadd ?></textarea>
      <h3>Your Email</h3>
      <input type="text" name="email" id="email" value="<?php echo $uemail ?>" >
      </div>
    <h3>Birthday</h3>
      <input type="text" id="from" name="datepicker" value="<?php echo $ubir;  ?>" required>
      
    
      
       <input type="hidden" value="<?php echo $getid; ?>" name="hidden" />
      <h3>Phone Number</h3>
     <input type="text" name="mobile" id="mobile" value="<?php echo $umob ?>" placeholder="Your Mobile Number">
     <h3>Update Profile Picture</h3> 
      <input type="file" name="file" id="file"  required> &nbsp;
      <img src="../Registration Form/image/<?php echo $upic; ?>"  height="100px" width="100px" name="file"/><br /><br />
      <p class="submit"><input type="submit" name="testsub" value="Update" >
       &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="viewusers.php" class="cancel">Cancel</a></p>
      </form>
    </section>
  </div>
<?php
if (isset($_POST['testsub']))
{
	$u_name=$_POST['name'];
	$u_address=$_POST['address'];
	$u_email=$_POST['email'];
	$u_birthday=$_POST['datepicker'];
	$u_mobile=$_POST['mobile'];
	$hiddenval=$_POST['hidden'];
	
	$file=$_FILES['file'];
	$name1=$file['name'];
	$type=$file['type'];
	$size=$file['size'];
	$tmppath=$file['tmp_name'];
	if($name1!=" ")
	{
		move_uploaded_file($tmppath,'image/'.$name1);
	}
	$regsql=mysql_query("update test set name='$u_name',address='$u_address',email='$u_email',birthday='$u_birthday',mobno='$u_mobile',image='$name1' where id='$hiddenval'");
	
	if ($regsql)
	{?>
    <script> alert ("Update Succefully"); </script>
    <script>window.location.href='viewusers.php'</script>
    <?php
		
	}
	
	
}




?>


</body>
</html>