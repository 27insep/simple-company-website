        <div id="main_all">
        	<h2 class="topic">ผลงานที่ผ่านมา <img src="<?php echo WEB_PATH;?>/assets/images/h_topic.png" /></h2>
        	<div id="show_our_work">
        		<div id="show_our_work_image"  align="center"><img src="<?php echo $data[0]["ourwork_image"];?>" width="250px" height="250px" /></div>
        		<div id="show_our_work_detail" class="scrollbox">
        			<?php echo $data[0]["ourwork_detail"];?>
				</div>
        	</div>
            <div class="o clear">
            	<div id="ca-container" class="ca-container">
                    <div class="ca-wrapper">
                    	<?php 
                    	$i=0;
                    	foreach($data as $ourwork_data){?>
						<div class="ca-item ca-item-<?php echo $i;?>" onclick="loadcontent(<?php echo $ourwork_data["ourwork_id"];?>)">
                            <img src="<?php echo $ourwork_data["ourwork_image"];?>" width="500px" height="500px" />
                        </div>
                        <?php $i++;}?>
                    </div>
                </div>
            </div>
        </div><!--End Main-->
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.easing.1.3.js"></script>
<!-- the jScrollPane script -->
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.contentcarousel.js"></script>
<script type="text/javascript">
	$('#ca-container').contentcarousel();
	function loadcontent(id)
	{
		$.ajax({
    		url: "<?php echo WEB_PATH;?>/ourwork/show_content/",
    			type: "POST",
    			dataType: "json",
    			data: {"ourwork_id": id},
    			success: function(data)
    			{		
       					$("#show_our_work_image img").attr("src",data.ourwork_image);
       					$("#show_our_work_detail").html(data.ourwork_detail);
    			}
		});
	}
</script>