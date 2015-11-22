<?php include APPPATH."views/func.inc.php"; ?>
<form name="myform" id="myform" class="form-horizontal" role="form" action="<?php echo WEB_PATH?><?php echo $form_action;?>" method="post">
	<div class="form-group">
		<label for="user_name" class="col-sm-3 control-label">ชื่อผู้ใช้ : &nbsp;</label>
		<div class="col-sm-8"><?php print_input_text("user_name");?></div>
	</div>
	<div class="form-group">
		<label for="user_pwd" class="col-sm-3 control-label">รหัสผ่าน  : &nbsp;</label>
		<div class="col-sm-8"><?php print_input_password("user_pwd");?></div>
	</div>
	<div class="form-group">
		<label for="user_pwd" class="col-sm-3 control-label">ยืนยันรหัสผ่าน  : &nbsp;</label>
		<div class="col-sm-8"><input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd" value=""/></div>
	</div>
	<div class="form-group">
		<label for="user_pwd" class="col-sm-3 control-label">ชื่อผู้ดูแลระบบ  : &nbsp;</label>
		<div class="col-sm-8"><?php print_input_text("user_full_name");?></div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label"><?php print_input_hidden("user_id");?></label>
		<div class="col-sm-8">
			<input class="btn btn-primary" type="submit" value="บันทึกข้อมูล" />
			<input class="btn btn-warning" type="button"  value="ย้อนกลับ" onclick="window.history.back()" />
		</div>
	</div>
</form>
<script> 
// prepare the form when the DOM is ready 
	$("#myform").validate({
		   		rules: {
				   			user_name: {
					     	required:true,
					     	remote: {
				        		url: "<?php echo WEB_PATH?>/backend/admin/check_username_admin",
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
            				url: '<?php echo WEB_PATH?><?php echo $form_action;?>',
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