<?php include APPPATH."views/func.inc.php"; ?>
<script  type="text/javascript">
	tinyMCE.init({
        // General options
        mode : "specific_textareas",
        editor_selector : "mceEditor",
        width: 940,
    	height: 500,
        theme : "modern",
        plugins: [
		"advlist autolink lists link image charmap print preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks visualchars code fullscreen",
		"insertdatetime media nonbreaking save table contextmenu directionality",
		"emoticons template paste textcolor responsivefilemanager"
		],
		toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image responsivefilemanager",
		toolbar2: "print preview media | forecolor backcolor emoticons | preview code",
		image_advtab: true,
  		autosave_ask_before_unload: false,
   		external_filemanager_path:"<?php echo WEB_PATH?>/upload/filemanager/",
   		filemanager_title:"Responsive Filemanager" ,
   		external_plugins: { "filemanager" : "<?php echo WEB_PATH?>/assets/js/tiny_mce/plugins/responsivefilemanager/plugin.min.js"},

		//set up preview
		plugin_preview_width : "600",
        plugin_preview_height : "500",
        
        // URL
		relative_urls : false,
		remove_script_host : true,
		document_base_url : "/hitera/",
		convert_urls : true,
		
        // Example content CSS (should be your site CSS)
        content_css : "<?php echo WEB_PATH?>/assets/css/style.css"
});
      
</script>
 <?php echo form_open_multipart("/backend/ourwork/upload",array('id' => 'fileupload','class'=>'form-horizontal','role'=>'form','name'=>'fileupload','method'=>'post'));?>
<div class="form-group">
		<label for="ourwork_img" class="col-sm-3 control-label">รูปภาพผลงาน : &nbsp;</label>
		<div id="upload_file" class="col-sm-8">
			<?php if(isset($form_data["ourwork_id"])&&!empty($form_data["ourwork_id"])){?>
				 <span id="show_ourwork_img"><img  src="<?php echo $form_data["ourwork_image"];?>" height="380px" width="280px" /></span>
			<?php }else{?>
				 <span id="show_ourwork_img"><img  src="<?php echo WEB_PATH?>/assets/images/no_image.png" height="380px" width="280px" /></span>	
			<?}?>
			<br/>
			<br/>
    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Add files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="upload_file" type="file" name="files">
    </span> <span style="color: #FF0000;">*ขนาด ความกว้าง 280 px ความสูง 380 px</span>
    <br>
    <br>
    	<div id="progress" class="progress"><div class="progress-bar progress-bar-success"></div></div>
	</div>
</div>
</form>
<?php echo form_open_multipart($form_action,array('id' => 'myform','class'=>'form-horizontal','role'=>'form','name'=>'myform','method'=>'post'));?>
<div class="form-group">
<label for="ourwork_name" class="col-sm-3 control-label">ชื่อผลงาน : &nbsp;</label>
	<div class="col-sm-8"><?php print_input_text("ourwork_name");?></div>
</div>
<div class="form-group">
<label for="ourwork_name" class="col-sm-3 control-label">แนะนำผลงาน : &nbsp;</label>
	<div class="col-sm-8"><?php print_input_text("ourwork_intro");?></div>
</div>
	<div class="form-group">
		<label for="is_show" class="col-sm-3 control-label">การแสดงผล : &nbsp;</label>
		<div class="col-sm-8">
			<input type="radio" name="is_show" id="is_show" value="1" <?php if(isset($form_data["is_show"])&&$form_data["is_show"]==1){?> checked="checked" <?php } ?>/> แสดง
			<input type="radio" name="is_show" id="is_show" value="0" <?php if(isset($form_data["is_show"])&&$form_data["is_show"]==0){?> checked="checked" <?php } ?> /> ไม่แสดง
		</div>
	</div>
<div class="form-group">
		<label for="ourwork_detail" class="col-sm-3 control-label">รายละเอียดผลงาน  : &nbsp;</label>
</div>
<div class="form-group">		
		<div class="col-sm-12">
		<textarea class="mceEditor" name="ourwork_detail" id="ourwork_detail" class="form-control"  cols="100" rows="50"><?if(isset($form_data["ourwork_detail"])){ echo $form_data["ourwork_detail"];}?></textarea>
		<br/>
</div>
<div class="form-group">		
		<div align="center">
		<input class="btn btn-primary" type="submit" value="บันทึกข้อมูล" />
		<input class="btn btn-warning" type="button"  value="ย้อนกลับ" />
		</div>
</div>
<?php print_input_hidden("ourwork_id");?>
<input type="hidden" name="ourwork_image" id="ourwork_image" class="form-control" value="">
</form>
<script>
var url	=	"<?php echo WEB_PATH?>/backend/ourwork/upload";
$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
      done: function (e, data) {
       		alert(data.result.msg);
       		$('#progress .progress-bar').css('width','0%');	
       		$('#progress').css('height','0');
       		if(data.result.img!="")
       		{
       			$("#ourwork_image").val(data.result.img);
       			$("#show_ourwork_img img").attr("src",data.result.img);
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
		   			<?php if(!isset($form_data["ourwork_id"])){?>
		   				ourwork_img:
		   				{
		   					required:true
		   				},
		   				<?php }?>
				   			ourwork_name: 
				   			{
					     		required:true
				      		}
		   			 		 ,ourwork_detail: 
		   			 		 {
						       required: true
						     }
		   		},
		   		messages: {
		   			<?php if(!isset($form_data["ourwork_id"])){?>
		   				
		   			 	ourwork_img: {
						     	required:"กรุณาเลือกรูปผลงานค่ะ"
						     },
				   			 <?php }?>
				   			 ourwork_name: {
						     	required:"กรุณาระบุชื่อผลงานค่ะ"
						     }
						     ,ourwork_detail: {
						      	required:"รายละเอียดผลงานค่ะ"
						     }
		   		},
		   		submitHandler: function(form) 
		   		{
		   			tinyMCE.get("ourwork_detail").save();
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
                				window.location		=	"<?php echo WEB_PATH?>/backend/ourwork/form/"+data.ourwork_id;
                				<?php }?>
                				/*
                				if(data.ourwork_img!="")
                				{	
                						$("#show_ourwork_img img").remove();
                				}*/
            				}
        				});
            	}
   		});
</script> 