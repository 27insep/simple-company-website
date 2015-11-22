<?php include APPPATH."views/func.inc.php"; ?>
<form name="myform" id="myform" action="<?php echo $form_action;?>" method="post">
<table class="table_form" cellspacing="1" cellpadding="0">
	<tr height="30px">
		<td align="right">ชื่อผู้ใช้ : &nbsp;</td>
		<td><?php print_input_text("user_name");?></td>
	</tr>
	<tr height="30px">
		<td align="right">รหัสผ่าน  : &nbsp;</td>
		<td><?php print_input_password("user_pwd");?></td>
	</tr>
	<tr height="30px">
		<td align="right">ยืนยันรหัสผ่าน  : &nbsp;</td>
		<td><input type="password" name="confirm_pwd" id="confirm_pwd" value=""/></td>
	</tr>
	<tr height="30px">
		<td align="right">ชื่อผู้ดูแลระบบ  : &nbsp;</td>
		<td><?php print_input_text("user_full_name");?></td>
	</tr>
	<tr>
		<td><?php print_input_hidden("user_id");?></td>
		<td><input type="submit" value="บันทึกข้อมูล" /></td>
	</tr>
</table>
</form>
<script> 
// prepare the form when the DOM is ready 
	$("#myform").validate({
		   		rules: {
				   			user_name: {
					     	required:true,
					     	remote: {
				        		url: "/backend/admin/check_username_admin",
				        		type: "post",
				        		data: {
				          			user_name: function() {return $("#user_name").val();} 
				          			,user_name_old: "<?php if(isset($GLOBALS['form_data'])){echo $GLOBALS['form_data']['user_name'];}?>"
				          			,action_status: "<?php echo $action_status;?>"}
				        			}
				      		}
		   			 		 ,user_pwd: {
						       required: true,
						       minlength: 6
						     },
						     confirm_pwd:
						     {
						     	required: true,
						     	equalTo: "#user_pwd"
						     }
		   			 		, user_full_name :{
						    	required:true
						    }
		   		},
		   		messages: {
				   			 user_name: {
						     	required:"กรุณาระบุ  Username  ค่ะ",
						     	remote: "Username ดังกล่าวมีในระบบแล้วค่ะ"
						     }
						     ,user_pwd: {
						       required: "กรุณาระบุรหัสผ่านค่ะ",
						       minlength:"รหัสผ่านต้องมากกว่า 6 ตัวอักษรค่ะ"
						     }
						     ,confirm_pwd:
						     {
						     	required:  "กรุณาระบุยื่นยันรหัสผ่านค่ะ",
						     	equalTo : "ยื่นยันรหัสผ่านไม่ถูกต้องค่ะ"
						     }
						      ,user_full_name :{
						    	required:"กรุณาระบุชื่อผู้ดูแลระบบค่ะ"
						    }
		   		},
		   		submitHandler: function(form) 
		   		{
		   			  $.ajax({
            				url: '<?php echo $form_action;?>',
            				cache: false,
            				type: 'POST',
           					data: $('#myform').serialize(),
            				dataType: "json",
            				timeout: 200,
            				success: function (data, status) 
            					{
                					alert(data.message);
            				}
        			});
            }
   		});
</script> 