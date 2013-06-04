<?php
  session_start();
  if(isset($_SESSION['LOGIN_STATUS']) && !empty($_SESSION['LOGIN_STATUS'])){
      header('location:index.php');
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Tournament Manager</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>-->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
function validLogin(){
      var uname=$('#uname').val();
      var password=$('#password').val();

      var dataString = 'uname='+ uname + '&password='+ password;
      $("#flash").show();
      $("#flash").fadeIn(400).html('<img src="image/loading.gif" />');
      $.ajax({
      type: "POST",
      url: "processed.php",
      data: dataString,
      cache: false,
      success: function(result){
               var result=trim(result);
               $("#flash").fadeOut(400);
               if(result=='correct'){
                     window.location='index.php?page=8cf04a9734132302f96da8e113e80ce5';
               }else{
                     $("#errorMessage").html(result);
               }
      }
      });
}

function trim(str){
     var str=str.replace(/^\s+|\s+$/,'');
     return str;
}
</script>
</head>
<body>
<div id="login-container">
	<div id="login-head">
    	<div id="login-logo"></div>
        <font id="txt" face="Arial, Helvetica, sans-serif" color="#FFFFFF" size="+1">Tournament Manager</font>
    </div>
    
    <div id="login-wrapper">
         <table class="login_box" align="center">
              <tr>
                 <td id="login-label">Username</td>
                 <td><input type="text" name="uname" id="uname" size="30"></td>
              </tr>
              <tr>
                 <td id="login-label">Password</td>
                 <td><input type="password" name="password" id="password" size="30"></td>
              </tr>
              <tr id="button_box">
                 <td>&nbsp</td>
                 <td><input type="button" name="submit" value="Login" class="button" onclick="validLogin()"></td>
              </tr>
              <tr><td colspan="2" id="errorMessage"></td></tr>
              <tr><td colspan="2" id="flash"></td></tr>
         </table>
    </div>

    <!--fotter section start-->
    <div id="fotter"></div>
</div>
</body>
</html>



