<script  type="text/javascript">
	tinyMCE.init({
        // General options
        mode : "specific_textareas",
        editor_selector : "mceEditor",
        width: 940,
    	height: 500,
        theme : "modern",
        plugins: [
         "advlist autolink link image lists charmap print preview code hr anchor pagebreak",
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
		plugin_preview_width : "940",
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
<?php include APPPATH."views/func.inc.php"; ?>
<form name="myform" id="myform" action="<?php echo WEB_PATH?><?php echo $form_action;?>" method="post">
<h3>รายละเอียด</h3>
<br/>
<div align="center">
<textarea class="mceEditor" name="page_detail" id="page_detail"><?if(isset($form_data["page_detail"])){ echo $form_data["page_detail"];}?></textarea>
</div>
<?php print_input_hidden("page_id");?>
<br/>
<div align="center">
	<input class="btn btn-primary" type="submit" value="บันทึกข้อมูล" />
</div>
</form>
<script> 
// prepare the form when the DOM is ready 
	$("#myform").validate({
		   		rules: {
				   			page_detail: {
						       required: true
						     }
		   		},
		   		messages: {
				   			 page_detail :{
						    	required:"กรุณากรอกข้อมูลรายละเอียดค่ะ"
						    }
		   		},
		   		submitHandler: function(form) 
		   		{
            				tinyMCE.get("page_detail").save();
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
            				}
        			});
            }
   		});
</script> 