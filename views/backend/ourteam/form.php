<?php include APPPATH."views/func.inc.php"; ?>
 <?php echo form_open_multipart("/backend/ourteam/upload",array('id' => 'fileupload','class'=>'form-horizontal','role'=>'form','name'=>'fileupload','method'=>'post'));?>
<div class="form-group">
		<label for="ourteam_img" class="col-sm-3 control-label">ภาพถ่าย : &nbsp;</label>
		<div id="upload_file" class="col-sm-8">
			<?php if(isset($form_data["ourteam_id"])&&!empty($form_data["ourteam_id"])){?>
				 <span id="show_ourteam_img"><img  src="<?php echo WEB_PATH?>/upload/ourteam/<?php echo $form_data["ourteam_id"].".".$form_data["file_type"];?>" height="165px" width="265px" /></span>
			<?php }else{?>
				 <span id="show_ourteam_img"><img  src="<?php echo WEB_PATH?>/assets/images/no_image.png" height="165px" width="265px" /></span>	
			<?}?>
			<br/>
			<br/>
    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Add files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="upload_file" type="file" name="files">
    </span> <span style="color: #FF0000;">*ขนาด ความกว้าง 265 px ความสูง 165 px</span>
    <br>
    <br>
    	<div id="progress" class="progress"><div class="progress-bar progress-bar-success"></div></div>
	</div>
</div>
</form>

<!--<form name="myform" id="myform" action="<?php echo WEB_PATH?><?php echo $form_action;?>" method="post">-->
<?php echo form_open_multipart($form_action,array('id' => 'myform','class'=>'form-horizontal','role'=>'form','name'=>'myform','method'=>'post'));?>
<div class="form-group">
	<label for="product_name" class="col-sm-3 control-label">แผนก :  &nbsp;</label>
	<div class="col-sm-8">
		<select name="ourteam_dept">
			<option value="1" <? if(isset($form_data["ourteam_dept"]) && $form_data["ourteam_dept"]=="1") echo "selected";?>>HIT-SI</option>
			<option value="2" <? if(isset($form_data["ourteam_dept"]) && $form_data["ourteam_dept"]=="2") echo "selected";?>>HIT-SD</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label for="product_name" class="col-sm-3 control-label">ชื่อทีมงาน  : &nbsp;</label>
	<div class="col-sm-4"><?php print_input_text("ourteam_name");?></div>
</div>	
<div class="form-group">
	<label for="product_name" class="col-sm-3 control-label">ชื่อเล่น : &nbsp;</label>
	<div class="col-sm-4"><?php print_input_text("ourteam_nickname");?></div>
</div>	
<div class="form-group">
	<label for="product_name" class="col-sm-3 control-label">ตำแหน่ง : &nbsp;</label>
	<div class="col-sm-4"><?php print_input_text("ourteam_position");?></div>
</div>	
<div class="form-group">
	<div class="col-sm-3 control-label"></div>
	<div class="col-sm-4">
		<input class="btn btn-primary" type="submit" value="บันทึกข้อมูล" />
		<input class="btn btn-warning" type="button"  value="ย้อนกลับ" />
	</div>
</div>
<?php print_input_hidden("ourteam_id");?>
<input type="hidden" name="ourteam_file" id="ourteam_file" class="form-control" value="">
</form>
<script>
var url	=	"<?php echo WEB_PATH?>/backend/ourteam/upload";
$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
      done: function (e, data) {
       		alert(data.result.msg);
       		$('#progress .progress-bar').css('width','0%');	
       		$('#progress').css('height','0');
       		if(data.result.img!="")
       		{
       			$("#ourteam_file").val(data.result.img);
       			$("#show_ourteam_img img").attr("src",data.result.img);
       		}
       },
       progressall: function (e, data) {
           		 var progress = parseInt(data.loaded / data.total * 100, 10);
            	$('#progress').css('height','20px');
            	$('#progress .progress-bar').css(
                	'width',
                	progress + '%'
            	);
        	}
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

});
</script>

<script> 
	$("#myform").validate({
		   		rules: {
		   				ourteam_file:
		   				{
		   					required:true
		   				},
				   		ourteam_name: 
				   		{
					     	required:true
				      	}
		   			 	,ourteam_nickname: 
		   			 	{
						    required: true
						}
						,ourteam_position: 
		   			 	{
						    required: true
						}
		   		},
		   		messages: {
		   			 	ourteam_file: {
							required:" กรุณาเลือกรูปทีมงานค่ะ"
						},
				 		ourteam_name: {
							required:" กรุณาระบุชื่อทีมงานค่ะ"
						}
						,ourteam_nickname: {
							required:" กรุณาระบุชื่อเล่นค่ะ"
						}
						,ourteam_position: {
							required:" กรุณาระบุตำแหน่งค่ะ"
						}
		   		},
		   		submitHandler: function(form) 
		   		{
		   			  $.ajax({
            				url: '<?php echo WEB_PATH?><?php echo $form_action;?>',
            				cache: false,
            				type: 'POST',
           					data: new FormData( form ),
      						processData: false,
      						contentType: false,
            				dataType: "json",
            				success: function (data, status) 
            			 	{
                				alert(data.message);
                				
                				if(data.success == "1")
                				{
                					<?php if($action_status=="insert"){?>
	                				window.location		=	"<?php echo WEB_PATH?>/backend/ourteam/form/"+data.ourteam_id;
	                				<?php }?>
                				}
            				}
        			});
            	}
   		});
</script> 