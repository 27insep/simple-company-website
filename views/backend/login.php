<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Administrator ::</title>
<link type="text/css" rel="stylesheet" href="<?php echo WEB_PATH?>/assets/css/admin.css" />
<script type="text/javascript" src="<?php echo WEB_PATH?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH?>/assets/js/jquery.form.js"></script>
</head>

<body>
<div id="container_login">
	<div id="container">
    	<div id="login_box">
    		<form action="<?php echo WEB_PATH?>/backend/admin/doLogin" method="post" name="login_form" id="login_form">
        	<h1>Username</h1>
            <div><input type="text" name="user_name" id="user_name" placeholder="Username" /></div>
            <h1>Password</h1>
            <div><input type="password" name="user_pwd" id="user_pwd" placeholder="Password" /></div>
            <div align="center"><input type="submit" value="เข้าสู่ระบบ" /></div>
            </form>
        </div>
    </div>
	<!--<div id="footer_login"></div>-->
</div>
<script> 
// prepare the form when the DOM is ready 
$(document).ready(function() { 
    var options = { 
          //target:        '#output2',   // target element(s) to be updated with server response 
        beforeSubmit:  validateForm  // pre-submit callback 
        ,success:       actionResponse  // post-submit callback 
        ,dataType:  'json'        // 'xml', 'script', or 'json' (expected server response type) 
    }; 
 
    // bind to the form's submit event 
    $('#login_form').submit(function() { 
        // inside event callbacks 'this' is the DOM element so we first 
        // wrap it in a jQuery object and then invoke ajaxSubmit 
        $(this).ajaxSubmit(options); 
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
    }); 
}); 
 
// pre-submit callback 
function validateForm(formData, jqForm, options) { 
    return true; 
} 
 
// post-submit callback 
function actionResponse(data)  
{
	alert(data.message);
	if(data.success==1)
	{
		window.location.href	=	data.url;
	}
} 
</script> 
</body>
</html>
