<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>/assets/css/workwithus.css">

<div id="main_all">
	     
	 <h2 class="topic"><?=$title_th?><img src="<?php echo WEB_PATH;?>/assets/images/h_topic.png" /></h2>

	 <div class="o clear">


		<div class="workwithus_left">
			<a href="<?php echo WEB_PATH;?>/workwithus">รายชื่อตำแหน่งงานที่เปิดรับสมัคร</a> | 
			<a href="#">กรอกใบสมัคร</a> | 
			<a href="#">วิธีการสมัคร</a>
		</div>


		<div class="workwithus_right">
		<?	if(isset($err_msg)){
				echo $err_msg;

				//print_r($print_post);
			}else{	?>
				<h2><center>ส่งใบสมัครเสร็จสิ้น กำลังกลับสู่หน้าแรก</center></h2>
				<script>
					setTimeout('window.location.href= "<?php echo WEB_PATH;?>/home/main"', 5000) /* 5 seconds */
				</script>
		<?	}	?>
		
		
		
		
		
		<?
			//echo $testfile;
			//print_r($print_post);
			
			//print_r($insert);
		?>

		</div>

	 </div>
</div>