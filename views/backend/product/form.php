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
		plugin_preview_width : "625",
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
<?php echo form_open_multipart("/backend/product/upload",array('id' => 'fileupload','class'=>'form-horizontal','role'=>'form','name'=>'fileupload','method'=>'post'));?>
<div class="form-group">
		<label for="product_img" class="col-sm-3 control-label">ภาพสินค้าและบริการ : &nbsp;</label>
		<div id="upload_file" class="col-sm-8">
			<?php if(isset($form_data["product_id"])&&!empty($form_data["product_id"])){?>
				 <span id="show_product_img"><img  src="<?php echo WEB_PATH?>/upload/product/<?php echo $form_data["product_id"].".".$form_data["file_type"];?>" height="165px" width="265px" /></span>
			<?php }else{?>
				 <span id="show_product_img"><img  src="<?php echo WEB_PATH?>/assets/images/no_image.png" height="165px" width="265px" /></span>	
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
<?php echo form_open_multipart($form_action,array('id' => 'myform','class'=>'form-horizontal','role'=>'form','name'=>'myform','method'=>'post'));?>
<div class="form-group">
<label for="product_name" class="col-sm-3 control-label">ชื่อสินค้าและบริการ : &nbsp;</label>
	<div class="col-sm-8"><?php print_input_text("product_name");?></div>
</div>
<div class="form-group">
		<label for="product_intro" class="col-sm-3 control-label">แนะนำสินค้าและบริการ : &nbsp;</label>
		<div class="col-sm-8"><input name="product_intro" id="product_intro" class="form-control" type="text" maxlength="200" size="110" value="<?php if($action_status=="update"){echo $form_data["product_intro"];}?>" /></div>
</div>
<div class="form-group">
		<label for="product_detail" class="col-sm-3 control-label">รายละเอียดสินค้าแลบริการ  : &nbsp;</label>
</div>
<div class="form-group">
		<div class="col-sm-12">
		<textarea class="mceEditor" name="product_detail" id="product_detail" class="form-control"  cols="100" rows="50"><?if(isset($form_data["product_detail"])){ echo $form_data["product_detail"];}?></textarea>

		</div>
</div>
		<br/>
<div class="form-group" align="center">
	<div class="col-sm-12">
		<input class="btn btn-primary" type="submit" value="บันทึกข้อมูล" />
		<input class="btn btn-warning" type="button"  value="ย้อนกลับ" />
	</div>
</div>
<?php print_input_hidden("product_id");?>
<input type="hidden" name="product_file" id="product_file" class="form-control" value="">
</form>
<script>
var url	=	"<?php echo WEB_PATH?>/backend/product/upload";
$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
      done: function (e, data) {
       		alert(data.result.msg);
       		$('#progress .progress-bar').css('width','0%');	
       		$('#progress').css('height','0');
       		if(data.result.img!="")
       		{
       			$("#product_file").val(data.result.img);
       			$("#show_product_img img").attr("src",data.result.img);
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
		   			<?php if(!isset($form_data["product_id"])){?>
		   				product_img:
		   				{
		   					required:true
		   				},
		   				<?php }?>
				   			product_name: 
				   			{
					     		required:true
				      		}
		   			 		 ,product_detail: 
		   			 		 {
						       required: true
						     }
		   		},
		   		messages: {
		   			<?php if(!isset($form_data["product_id"])){?>
		   				
		   			 	product_img: {
						     	required:"กรุณาเลือกรูปสินค้าและบริการค่ะ"
						     },
				   			 <?php }?>
				   			 product_name: {
						     	required:"กรุณาระบุชื่อสินค้าและบริการค่ะ"
						     }
						     ,product_detail: {
						      	required:"รายละเอียดสินค้าและบริการค่ะ"
						     }
		   		},
		   		submitHandler: function(form) 
		   		{
		   			tinyMCE.get("product_detail").save();
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
                				window.location		=	"<?php echo WEB_PATH?>/backend/product/form/"+data.product_id;
                				<?php }?>
                				/*
                				if(data.product_img!="")
                				{	
                						$("#show_product_img img").remove();
                				}*/
            				}
        				});
            	}
   		});
</script> 