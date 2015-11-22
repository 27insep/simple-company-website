<?php include APPPATH."views/func.inc.php"; ?>
<?php echo form_open_multipart("/backend/slide/upload",array('id' => 'fileupload','class'=>'form-horizontal','role'=>'form','name'=>'fileupload','method'=>'post'));?>
	<div class="form-group">
		<label for="upload_image" class="col-sm-3 control-label">ภาพสไลด์โชว์ : &nbsp;</label>
		<div id="upload_file" class="col-sm-8">
			<?php if($action_status=="update"){?>
				 <span id="show_product_img"><img  src="<?php echo WEB_PATH?>/upload/slide/<?php echo $form_data["image_name"];?>" height="150px" width="300px" /></span>
			<?php }else{?>
				 <span id="show_product_img"><img  src="<?php echo WEB_PATH?>/assets/images/no_image.png" height="150px" width="300px" /></span>	
			<?}?>
			<br/>
			<br/>
    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Add files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="upload_file" type="file" name="files">
    </span> <span style="color: #FF0000;">*ขนาด ความกว้าง 300 px ความสูง 150 px</span>
    <br>
    <br>
    	<div id="progress" class="progress"><div class="progress-bar progress-bar-success"></div></div>
		</div>
	</div>
</form>
<?php echo form_open_multipart($form_action,array('id' => 'myform','class'=>'form-horizontal','role'=>'form','name'=>'myform','method'=>'post'));?>

	<div class="form-group">
		<label for="image_detail" class="col-sm-3 control-label">ข้อความบรรยาท : &nbsp;</label>
		<div class="col-sm-8">
			<textarea name="image_detail" id="image_detail" cols="100" rows="5"><?if(isset($form_data["image_detail"])){ echo $form_data["image_detail"];}?></textarea>
		</div>
	</div>
	<!--
	<div class="form-group">
		<label for="num_order" class="col-sm-3 control-label">ลำดับการแสดง : &nbsp;</label>
		<div class="col-sm-8"><input class="form-control" name="num_order" id="num_order" type="text" value="<?php if($action_status=="update"){echo $form_data["num_order"];}?>" /></div>
	</div>
	-->
	<div class="form-group">
		<label for="is_show" class="col-sm-3 control-label">การแสดงผล : &nbsp;</label>
		<div class="col-sm-8">
			<input type="radio" name="is_show" id="is_show" value="1" <?php if(isset($form_data["is_show"])&&$form_data["is_show"]==1){?> checked="checked" <?php } ?>/> แสดง
			<input type="radio" name="is_show" id="is_show" value="0" <?php if(isset($form_data["is_show"])&&$form_data["is_show"]==0){?> checked="checked" <?php } ?> /> ไม่แสดง
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">&nbsp;</label>
		<div class="col-sm-8">
			<?php 
				print_input_hidden("image_name");
				if(isset($form_data["image_id"])&&!empty($form_data["image_id"]))
				{
					print_input_hidden("image_id");	
				}
			?>
			<input class="btn btn-primary" type="submit" value="บันทึกข้อมูล" />
			<input class="btn btn-warning" type="button"  value="ย้อนกลับ" />
		</div>
	</div>
</form>
<script>
var url	=	"<?php echo WEB_PATH?>/backend/slide/upload";
$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
      done: function (e, data) {
       		alert(data.result.msg);
       		$('#progress .progress-bar').css('width','0%');	
       		$('#progress').css('height','0');
       		if(data.result.img!="")
       		{
       			$("#image_name").val(data.result.img);
       			$("#show_product_img img").attr("src","<?php echo WEB_PATH?>/upload/slide/"+data.result.img);
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
		   			<?php if(!isset($form_data["image_id"])){?>
		   				upload_image:
		   				{
		   					required:true
		   				},
		   				<?php }?>
				   		is_show: 
				   		{
					     	required:true
				      },
				      num_order: 
				   		{
					     	number:true
				      	}
		   		},
		   		messages: {
		   			<?php if(!isset($form_data["image_id"])){?>
		   				
		   			 	image_id: {
						     	required:"กรุณาเลือกรูปภาพค่ะ"
						     },
				   			 <?php }?>
				   			 is_show: {
						     	required:"กรุณาเลือกการแสดงค่ะ"
						     }
						     ,num_order: {
						      	number:"ระบุได้เฉพาะตัวเลขเท่านั้นค่ะ"
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
                				<?php if($action_status=="insert"){?>
                				window.location		=	"<?php echo WEB_PATH?>/backend/slide/form/"+data.image_id;
                				<?php }?>
            				}
        			});
            }
   		});
</script> 