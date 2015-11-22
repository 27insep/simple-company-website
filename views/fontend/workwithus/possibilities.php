	<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/workwithus/jobs.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>/assets/css/workwithus.css">

<div id="main_all">
	 <h2 class="topic"><?=$title_th?><img src="<?php echo WEB_PATH;?>/assets/images/h_topic.png" /></h2>

	 <div class="o clear">

		<ul class="workwithusLeft">
			<li class="active">รายชื่อตำแหน่งงานที่เปิดรับสมัคร</li> | 
			<li><a href="<?php echo WEB_PATH;?>/workwithus/apply">กรอกใบสมัคร</a></li> | 
			<li><a href="<?php echo WEB_PATH;?>/workwithus/how_to_apply">วิธีการสมัคร</a></li>
		</ul>

		<div class="workwithusRight">

			<table id="career_table" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
				<thead>
					<tr class="h">
						<th align="center" width="60">ลำดับ</th>
						<th>ตำแหน่งที่เปิดรับสมัคร</th>
						<th align="center" width="150">จำนวนที่เปิดรับ</th>
					</tr>
				</thead>
                <tbody>
			<?	$i=1;
				foreach($jobs as $job){	?>
				

					<tr class="career<?=$i%2?>" id="career_name<?=$job["job_id"]?>" onclick="popup('<?=$job["job_id"]?>')" style="">
						<td align="center" valign="top"><strong><?=$i?></strong></td>
						<td valign="top"><strong><?=$job["job_name"]?></strong></td>
						<td align="center" valign="top">
						<?php if($job["job_quantities"] == 0) { echo "-"; }else{ echo $job["job_quantities"]; } ?>
						</td>
					</tr>
					<tr class="career<?=$i%2?>" id="career_detail<?=$job["job_id"]?>" style="display: none;">
						<td>&nbsp;</td>
						<td colspan="2" align="center" valign="top"><?=$job["job_qualifier"]?></td>
					</tr>

			<?			$i++;
				}	?>


				</tbody>
			</table>

		</div>

	 </div>
</div>