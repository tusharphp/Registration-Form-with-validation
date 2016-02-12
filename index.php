<!DOCTYPE html>
 <html lang="en"> 
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
</script>
  <link rel="stylesheet" href="css/style.css" media="all">
  <script language="javascript" type="text/javascript">
  //function to cheack valid email id.
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
  //main function
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
			 
		 //fuction to cheack valid mobile number
        var mobile = document.getElementById("mobile").value;
        var pattern = /^\d{10}$/;
        if (!pattern.test(mobile))
		 {
            alert("It is not valid mobile number. Input 10 digits number!");
            return false;
      
		 }
}

//function to not enter number in name field.
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

  <div class="container">
    <section class="register">
    
      <form name="test" id="test" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" onSubmit="return validate();" enctype="multipart/form-data">
      <div class="reg_section personal_info">
      <h3>Your Personal Information</h3>
     
      <input type="text" name="name" id="name" value="" placeholder="Your Desired Username" onKeyPress="return onlyAlphabets(event,this);">
       <h3>Your Address</h3>
  
      <textarea name="address" id="address" placeholder="Your Address"></textarea>
      <h3>Your Email</h3>
      <input type="text" name="email" id="email" value="" >
      </div>
      <h3>Birthday</h3>
      <input type="text" id="from" name="datepicker" required>
      
     <h3>Phone Number</h3>
     <input type="text" name="mobile" id="mobile" placeholder="Your Mobile Number">
     <h3>Profile Picture</h3><br>
     <input type="file" name="file" id="file"> 
      
      <p class="submit"><input type="submit" name="testsub" value="Sign Up" ></p><br>
      <p class="submit"><a href="viewusers.php">Edit and Delete</a></p>
      </form>
    </section>
  </div>
<?php
require ("connection.php");
if (isset($_POST['testsub']))
{
	$uname=$_POST['name'];
	$uaddress=$_POST['address'];
	$uemail=$_POST['email'];
	$dob=$_POST['datepicker'];
	$umobile=$_POST['mobile'];
	$file=$_FILES['file'];
	$name1=$file['name'];
	$type=$file['type'];
	$size=$file['size'];
	$tmppath=$file['tmp_name'];
	if($name1!=" ")
	{
		move_uploaded_file($tmppath,'image/'.$name1);
	}
	$regsql=mysql_query("insert into test values(null,'$uname','$uaddress','$uemail','$dob','$umobile','$name1')");
	
	if ($regsql)
	{?>
    <script> alert ("Thank You for Registration"); </script>
    <?php
		
	}
}
	
?>

</body>
</html>