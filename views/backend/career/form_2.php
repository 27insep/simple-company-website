<?php include APPPATH."views/func.inc.php"; ?>
<script  type="text/javascript">
	tinyMCE.init({
        // General options
        mode : "specific_textareas",
        editor_selector : "mceEditor",
        width: 650,
    	height: 300,
        theme : "modern",
        plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
   		],
   		toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   		toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   		image_advtab: true ,
   
   		external_filemanager_path:"<?php echo WEB_PATH?>/upload/filemanager/",
   		filemanager_title:"Responsive Filemanager" ,
   		external_plugins: { "filemanager" : "<?php echo WEB_PATH?>/assets/js/tiny_mce/plugins/responsivefilemanager/plugin.min.js"},

		//set up preview
		plugin_preview_width : "650",
        plugin_preview_height : "300",
        // Example content CSS (should be your site CSS)
        content_css : "<?php echo WEB_PATH?>/assets/css/style.css"
});
</script>

<form name="myform" id="myform" action="<?php echo $form_action;?>" method="post">
<table class="table_form" cellspacing="1" cellpadding="0">
	<tr height="30px">
		<td align="right">ตำแหน่งงาน : &nbsp;</td>
		<td><?php print_input_text("job_name");?></td>
	</tr>
	<tr height="30px">
		<td align="right">คุณสมบัติ  : &nbsp;</td>
		<td>
			<textarea class="mceEditor"  id="job_qualifier" name="job_qualifier" ><?if(isset($form_data['job_qualifier'])){ echo $form_data['job_qualifier'];}?></textarea>
		</td>	
	</tr>
	<tr height="30px">
		<td align="right">จำนวน  : &nbsp;</td>
		<td><?php print_input_text("job_quantities");?></td>
	</tr>
	<tr height="30px">
		<td align="right">สถานะ  : &nbsp;</td>
		<td>
		<input name="job_status" id="job_status" type="radio" value="1" <?php if(isset($form_data['job_status'])){ if($form_data['job_status'] == 1){ echo 'checked="checked"'; } } ?> <? if($action_status == "insert") echo 'checked="checked"'; ?>/> ใช้งาน 
		<input name="job_status" id="job_status" type="radio" value="0" <?php if(isset($form_data['job_status'])){ if($form_data['job_status'] == 0){ echo 'checked="checked"'; } } ?> /> ซ่อน
		</td>
	</tr>
	<tr>
		<td>
			<? print_input_hidden("job_id"); ?>
			<input type="submit" value="บันทึกข้อมูล"></td>
	</tr>
</table>
</form>
<script> 
// prepare the form when the DOM is ready 

	$("#myform").validate({
		   		rules: {
				   			 job_name: {
					     	 	required:true
				      		 },
							 job_qualifier: {
						       required: true
						     },
						     job_quantities:
						     {
						     	required: true
						     }
		   		},
		   		messages: {
				   			 job_name: {
						     	required:"กรุณาระบุ ตำแหน่งงานค่ะ"
						     }
						     ,job_qualifier: {
						       required: "กรุณาระบุคุณสมบัติค่ะ"
						     }
						     ,job_quantities:
						     {
						     	required:  "กรุณาระบุจำนวนค่ะ"
						     }
		   		},
		   		submitHandler: function(form) 
		   		{
					tinyMCE.triggerSave();

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
                				window.location		=	"<?php echo WEB_PATH?>/backend/career/";
                				<?php }?>
            				}
        			});
				}
   		});

</script> 