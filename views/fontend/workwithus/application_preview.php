<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/workwithus/apply.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/workwithus/jquery.preimage.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.validate.min.js"></script>
	
<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>/assets/css/workwithus.css">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>/assets/css/jquery.ui.theme/jquery-ui.min.css">

<div id="main_all">
	 <h2 class="topic"><?=$title_th?><img src="<?php echo WEB_PATH;?>/assets/images/h_topic.png" /></h2>

	 <div class="o clear">

		<? //print_r($data); ?>

		<ul class="workwithusLeft">
			<li><a href="<?php echo WEB_PATH;?>/workwithus">รายชื่อตำแหน่งงานที่เปิดรับสมัคร</a></li> | 
			<li class="active">กรอกใบสมัคร</li> | 
			<li><a href="#">วิธีการสมัคร</a></li>
		</ul>

		<div class="workwithusRight">

			<form action="<?=$base_url?>/<?=$action?>" method="post" name="job" id="job">
			
			<?	foreach($data as $key => $val){	?>
					<input type="hidden" name="<?=$key?>" value="<?=$val?>">
			<?	}	?>
			<?	if(isset($work_data1)){	
					foreach($work_data1 as $key => $val){	?>
						<input type="hidden" name="<?=$key?>" value="<?=$val?>">
			<?		}
				}	?>
			<?	if(isset($work_data2)){	
					foreach($work_data2 as $key => $val){	?>
						<input type="hidden" name="<?=$key?>" value="<?=$val?>">
			<?		}
				}	?>
			<?	if(isset($work_data3)){	
					foreach($work_data3 as $key => $val){	?>
						<input type="hidden" name="<?=$key?>" value="<?=$val?>">
			<?		}
				}	?>
			

			
				
			  <table border="0" cellpadding="5" cellspacing="1" width="100%">
				<tbody><tr>
				  <td colspan="3" bgcolor="#0892d0"><span class="style1">ตำแหน่งที่สมัคร</span></td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#eeeded" width="25%" height="28"><strong>ตำแหน่งที่สมัคร 1 :</strong></td>
				  <td bgcolor="#F6F6F6">
						<?=$data['position1']?>
				  
				  <td rowspan="4" bgcolor="#F6F6F6" width="194">
				  
					  <div align="right">
						<table border="0" cellspacing="10" width="250">
							<tbody><tr>
							<td style="border:1px #999 solid;" align="center" bgcolor="#F7F7F7" width="230" height="250">
								<p>รูปประจำตัว</p>
								<div><img src="<?=$data['pic_path']?>" width="250" height="300" /></div>
							</td>
							</tr></tbody>
						</table>
					</div>
				  </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#eeeded" width="200" height="28"><strong>ตำแหน่งที่สมัคร 2 :</strong></td>
				  <td bgcolor="#F6F6F6">
							<?=$data['position2']?>
				  </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#eeeded" valign="top" width="200" height="8"><strong>* เงินเดือนที่ต้องการ : </strong></td>
				  <td bgcolor="#F6F6F6" valign="top"><?=$data['salary']?> บาท/เดือน</td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#eeeded" valign="top" width="150">&nbsp;</td>
				  <td bgcolor="#F6F6F6" valign="top">&nbsp;</td>
				</tr>
				</tbody>
			</table>
				
			<table border="0" cellpadding="5" cellspacing="1" width="100%">
			<tbody><tr>
					  <td colspan="2" bgcolor="#0892d0"><span class="style1">ลักษณะการปฏิบัติงาน</span></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="25%" height="36"><strong>* สามารถปฏิบัติงานต่างจังหวัด : </strong></td>
					  <td bgcolor="#F6F6F6" width="75%">
						<?	if($data['can_onsite'] == "1"){	?>
							ได้
						<?	}else{	?>
							ไม่ได้ เพราะ <?=$data['can_onsite_reason']?>
						<?	}	?>
					  </td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>พร้อมที่จะปฎิบัติงานได้ :</strong></td>
					  <td bgcolor="#F6F6F6" width="450">
						<?	if($data['is_ready'] == "1"){	?>
							ในทันที
						<?	}else{	?>
							ภายใน  <?=$data['is_ready_day']?>   วัน &nbsp; หลังจากได้รับแจ้งจากบริษัท 
						<?	}	?>
					  </td>
				</tr>
					<tr>
					  <td colspan="2" align="center" bgcolor="#eeeded" height="36">* บริษัทกำหนดให้มีการทดลองงาน 4 เดือน นับจากวันแรกที่ท่านเข้าทำงาน ท่านยินดีที่จะปฏิบัติหรือไม่  : 
					  <?	if($data['can_pro'] == "1"){	?>
							ได้
					  <?	}else{	?>
							ไม่ได้
					  <?	}	?>
					  </td>
				</tr>
				  </tbody>
			</table>
				 
			<table border="0" cellpadding="4" cellspacing="1" width="100%">
			<tbody><tr>
					  <td colspan="4" bgcolor="#0892d0"><span class="style1">ประวัติส่วนตัว</span></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* ชื่อ :</strong></td>
					  <td bgcolor="#F6F6F6" width="376"><?=$data['name_th']?></td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>* นามสกุล :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><?=$data['surname_th']?></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* ชื่อ :<br>
					  (ภาษาอังกฤษ) </strong></td>
					  <td bgcolor="#F6F6F6" width="376"><?=$data['name_en']?></td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>* นามสกุล :<br>
					  (ภาษาอังกฤษ) </strong></td>
					  <td bgcolor="#F6F6F6" width="400"><?=$data['surname_en']?></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* เพศ :</strong></td>
					  <td bgcolor="#F6F6F6" width="376">
						<?	if($data['gender'] == "1"){	?>
							ชาย
						<?	}else{	?>
							หญิง
						<?	}	?>
					  </td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>* วัน/เดือน/ปีเกิด :</strong></td>
					  <td bgcolor="#F6F6F6" width="400">
						  <?=$data['birth_date']?>
					  </td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* อายุ :</strong></td>
					  <td bgcolor="#F6F6F6" width="376"><?=$data['age']?>ปี</td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>ตำหนิบนร่างกาย :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><?=$data['scar']?></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* ส่วนสูง :</strong></td>
					  <td bgcolor="#F6F6F6" width="376"><?=$data['height']?> เซนติเมตร&nbsp; </td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>* น้ำหนัก :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><?=$data['weight']?>  กิโลกรัม&nbsp;</td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>สถานที่เกิด&nbsp;อำเภอ :</strong></td>
					  <td bgcolor="#F6F6F6" width="376"><?=$data['born_city']?></td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>* จังหวัด :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><?=$data['born_province']?></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* สัญชาติ :</strong></td>
					  <td bgcolor="#F6F6F6"><?=$data['nationality']?></td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    เชื้อชาติ :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><?=$data['race']?></td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266">&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp; <strong>ศาสนา :</strong></td>
					  <td bgcolor="#F6F6F6"><?=$data['religion']?></td>
					  <td align="right" bgcolor="#eeeded" width="240">&nbsp;</td>
					  <td bgcolor="#F6F6F6" width="400">&nbsp;</td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>*เลขบัตรประชาชน :</strong></td>
					  <td bgcolor="#F6F6F6" width="376"><?=$data['citizen_id']?></td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>สถานที่ออกบัตร :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><?=$data['citizen_card_place']?></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>วันที่ออกบัตร :</strong></td>
					  <td bgcolor="#F6F6F6" width="376"><?=$data['citizen_card_taken']?></td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>วันที่บัตรหมดอายุ :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><?=$data['citizen_card_expire']?></td>
				</tr>
					<tr>
					  <td bgcolor="#eeeded"><strong>บัตรประจำตัวผู้เสียภาษีเลขที่ :</strong></td>
					  <td bgcolor="#F6F6F6" colspan="3"><?=$data['tax_id']?></td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded"><strong>* ฐานะการสมรส : </strong></td>
					  <td bgcolor="#F6F6F6" colspan="3">
						<?	switch($data['marital_status']){
								case "1" :	echo "โสด";  break;
								case "2" :	echo "สมรส";  break;
								case "3" :	echo "หย่า";  break;
								case "4" :	echo "หม้าย";  break;
								default : break;
							}	?>
					</td>
				</tr>
				  </tbody>
			</table>
	<?php	if($data['marital_status'] != "1"){	?>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
			  <tbody><tr>
				<td bgcolor="#0892d0" width="100%" height="31"><span class="style1">&nbsp;ประวัติสมรส</span></td>
				</tr>
			  <tr>
				<td><table border="0" cellpadding="6" cellspacing="1" width="100%">
				  <tbody><tr>
					<td align="right" bgcolor="#EEEDED" width="120"><strong>ชื่อคู่สมรส :</strong></td>
					<td bgcolor="#F6F6F6"><?=$data['mar_name']?></td>
					<td align="right" bgcolor="#EEEDED" width="120"><strong>นามสกุลเดิม :</strong></td>
					<td bgcolor="#F6F6F6"><?=$data['mar_surname']?></td>
				  </tr>
				  <tr>
					<td align="right" bgcolor="#EEEDED"><strong>สัญชาติ :</strong></td>
					<td bgcolor="#F6F6F6"><?=$data['mar_nationality']?></td>
					<td align="right" bgcolor="#EEEDED"><strong>เชื้อชาติ :</strong></td>
					<td bgcolor="#F6F6F6"><?=$data['mar_race']?></td>
				  </tr>
				  <tr>
					<td align="right" bgcolor="#EEEDED"><strong>อาชีพคู่สมรส :</strong></td>
					<td bgcolor="#F6F6F6"><?=$data['mar_occupation']?></td>
					<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่ง :</strong></td>
					<td bgcolor="#F6F6F6"><?=$data['mar_position']?></td>
				  </tr>
				  <tr>
					<td colspan="4" bgcolor="#EEEDED"><strong>ชื่อสถานที่ประกอบอาชีพของคู่สมรส :</strong<?=$data['mar_company']?></td>
				  </tr>
				  <tr>
					<td align="right" bgcolor="#EEEDED"><strong>จำนวนบุตรทั้งสิ้น :</strong>&nbsp;&nbsp;</td>
					<td align="left" bgcolor="#F6F6F6"><?=$data['mar_child']?> คน&nbsp;</td>
					<td align="right" bgcolor="#EEEDED">&nbsp;&nbsp; <strong> บุตรชาย :</strong></td>
					<td align="left" bgcolor="#F6F6F6"><?=$data['mar_son']?> คน&nbsp; </td>
				  </tr>
				  <tr>
					<td align="right" bgcolor="#EEEDED">&nbsp;</td>
					<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
					<td align="right" bgcolor="#EEEDED"><strong>บุตรหญิง :</strong></td>
					<td align="left" bgcolor="#F6F6F6"><?=$data['mar_daughter']?> คน</td>
				  </tr>
				</tbody></table></td>
				</tr>
			</tbody></table>
	<?php	}	?>		
			
			<table border="0" cellpadding="4" cellspacing="1" width="100%">
			<tbody><tr>
					  <td colspan="4" bgcolor="#0892d0"><span class="style1">ประวัติครอบครัว</span></td>
				</tr>
				
					<tr>
					  <td colspan="4" bgcolor="#CCCCCC" height="14"><strong>บิดา </strong></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150" height="36"><strong>* ชื่อบิดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['name_fa']?></td>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>* นามสกุลบิดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['surname_fa']?></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150" height="36"><strong>* สัญชาติ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['nation_fa']?></td>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>เชื้อชาติ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['race_fa']?></td>
				</tr>
				<tr>
					  <td align="right" bgcolor="#eeeded" width="150" height="36"><strong>อาชีพของบิดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['occupation_fa']?></td>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>ชื่อสถานที่ประกอบอาชีพของบิดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['company_fa']?></td>
				</tr>
					<tr>
					  <td bgcolor="#eeeded" height="14"><strong>&nbsp;ที่อยู่ของบิดา </strong></td>
					  <td colspan="3" bgcolor="#F6F6F6" height="30"><?=$data['address_fa']?></td>
				</tr>
					 <tr>
					  <td colspan="4" align="left" bgcolor="#CCCCCC" height="14"><strong>มารดา</strong></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150" height="36"><strong>* ชื่อมารดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['name_mom']?></td>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>* นามสกุลมารดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['surname_mom']?></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150" height="36"><strong>* สัญชาติ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['nation_mom']?></td>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>เชื้อชาติ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['race_mom']?></td>
				</tr>
				   <tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>อาชีพของมารดา :</strong></td>
					  <td bgcolor="#F6F6F6"><?=$data['occupation_mom']?></td>
					  <td align="right" bgcolor="#eeeded" width="270"><strong>ชื่อสถานที่ประกอบอาชีพของมารดา :</strong></td>
					  <td bgcolor="#F6F6F6"><?=$data['company_mom']?></td>
				</tr>
					<tr>
					  <td bgcolor="#eeeded" height="14"><strong>ที่อยู่ของมารดา :</strong></td>
					  <td colspan="3" bgcolor="#F6F6F6" height="30"><?=$data['address_mom']?></td>
				</tr>
					<tr>
					  <td colspan="4" align="left" bgcolor="#CCCCCC" height="14"><strong>ประวัติพี่น้องร่วมบิดามารดา</strong></td>
				</tr>
					
					<tr>
					  <td colspan="4" bgcolor="#eeeded" height="50"><br>
						<div align="center"><strong>พี่น้องร่วมบิดามารดาทั้งหมด : </strong>
						  <?=$data['brother_num']?>  คน  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&nbsp;ท่านเป็นคนที่ : </strong>
						  <?=$data['you_num']?></div>
						<br>
						<strong>ประวัติพี่น้องร่วมบิดามารดา</strong>
			<table border="0" bordercolor="#DDB7FF" cellpadding="3" cellspacing="1" width="100%">
			  <tbody><tr>
							<td align="center" bgcolor="#CCCCCC"><strong>คนที่</strong></td>
						<td align="center" bgcolor="#CCCCCC"><strong>ชื่อ-สกุล</strong></td>
						<td align="center" bgcolor="#CCCCCC"><strong>อาชีพ</strong></td>
						<td align="center" bgcolor="#CCCCCC"><strong>ที่ทำงาน/สถานศึกษา</strong></td>
						  </tr>
				<?php	if($data['b1'] != ""){	?>
						  <tr>
							<td align="center" bgcolor="#F6F6F6"><?=$data['b1']?></td>
							<td align="center" bgcolor="#F6F6F6"><?=$data['name_b1']?></td>
							<td align="center" bgcolor="#F6F6F6"><?=$data['occup_b1']?></td>
							<td align="center" bgcolor="#F6F6F6"><?=$data['comp_b1']?></td>
						  </tr>
				<?		}	?>
				<?php	if($data['b2'] != ""){	?>
						  <tr>
							<td align="center" bgcolor="#F6F6F6"><?=$data['b2']?></td>
							<td align="center" bgcolor="#F6F6F6"><?=$data['name_b2']?></td>
							<td align="center" bgcolor="#F6F6F6"><?=$data['occup_b2']?></td>
							<td align="center" bgcolor="#F6F6F6"><?=$data['comp_b2']?></td>
						  </tr>
				<?		}	?>
				<?php	if($data['b3'] != ""){	?>
						  <tr>
							<td align="center" bgcolor="#F6F6F6"><?=$data['b3']?></td>
							<td align="center" bgcolor="#F6F6F6"><?=$data['name_b3']?></td>
							<td align="center" bgcolor="#F6F6F6"><?=$data['occup_b3']?></td>
							<td align="center" bgcolor="#F6F6F6"><?=$data['comp_b3']?></td>
						  </tr>
				<?		}	?>
				<?php	if($data['b4'] != ""){	?>
						  <tr>
							<td align="center" bgcolor="#F6F6F6"><?=$data['b4']?></td>
							<td align="center" bgcolor="#F6F6F6"><?=$data['name_b4']?></td>
							<td align="center" bgcolor="#F6F6F6"><?=$data['occup_b4']?></td>
							<td align="center" bgcolor="#F6F6F6"><?=$data['comp_b4']?></td>
						  </tr>
				<?		}	?>
					  </tbody></table></td>
				</tr>
			</tbody>
			
			</table>

			<table border="0" cellpadding="5" cellspacing="1" width="100%">
			<tbody><tr>
					  <td colspan="4" bgcolor="#0892d0" width="100%"><span class="style1">ที่อยู่ผู้สมัคร</span></td>
				</tr>
					<tr>
						<td bgcolor="#eeeded" height="14"><strong>ที่อยู่ปัจจุบันที่สามารถติดต่อได้ :</strong></td>
						<td colspan="3" bgcolor="#F6F6F6" height="30"><?=$data['cur_address']?></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>จังหวัด :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['cur_province']?></td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>รหัสไปรษณีย์ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['cur_postal_code']?></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>E-mail :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['cur_e_mail']?></td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>โทรศัพท์ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['cur_tel']?></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>โทรศัพท์เคลื่อนที่ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['cur_mobile']?></td>
					  <td align="right" bgcolor="#eeeded" width="150">&nbsp;</td>
					  <td bgcolor="#F6F6F6" width="220">&nbsp;</td>
				</tr>
					<tr>
						<td bgcolor="#eeeded" height="14"><strong>ที่อยู่ตามทะเบียนบ้าน :</strong></td>
						<td colspan="3" bgcolor="#F6F6F6" height="30"><?=$data['home_address']?></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>จังหวัด :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['home_province']?></td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>รหัสไปรษณีย์ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?=$data['home_postal_code']?></td>
				</tbody>
			</table>
			
			
			<table bgcolor="#eeeded" border="0" cellpadding="5" cellspacing="0" width="100%">
			<tbody><tr>
					  <td colspan="4" bgcolor="#0892d0"><span class="style1">ประวัติการศึกษา</span></td>
				</tr>
					<tr>
					  <td colspan="4" bgcolor="#eeeded"><table border="0" cellpadding="4" cellspacing="1" width="100%">
						<tbody><tr>
						  <td align="center" bgcolor="#CCCCCC" width="150"><strong>ระดับการศึกษา</strong></td>
						  <td align="center" bgcolor="#CCCCCC"><strong>ชื่อสถานศึกษา</strong></td>
						  <td align="center" bgcolor="#CCCCCC"><strong>คุณวุฒิ</strong></td>
						  <td align="center" bgcolor="#CCCCCC"><strong>คณะ</strong></td>
						  <td align="center" bgcolor="#CCCCCC"><strong>สาขา</strong></td>
						  <td align="center" bgcolor="#CCCCCC"><strong>ปีที่เข้า</strong></td>
						  <td align="center" bgcolor="#CCCCCC"><strong>ปีที่จบ</strong></td>
						  <td align="center" bgcolor="#CCCCCC"><strong>เกรด</strong></td>
						</tr>
					<?	if($data['name_edu1'] != ""){	?>
						<tr>
						  <td bgcolor="#F6F6F6"><strong>สูงกว่าระดับอุดมศึกษา</strong></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['name_edu1']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['type_edu1']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['fac_edu1']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['major_edu1']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['start_edu1']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['stop_edu1']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['grade_edu1']?></td>
						</tr>
					<?	}	?>
					<?	if($data['name_edu2'] != ""){	?>
						</tr>
						<tr>
						  <td bgcolor="#F6F6F6"><strong>ระดับอุดมศึกษา</strong></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['name_edu2']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['type_edu2']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['fac_edu2']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['major_edu2']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['start_edu2']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['stop_edu2']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['grade_edu2']?></td>
						</tr>
					<?	}	?>
					<?	if($data['name_edu3'] != ""){	?>
						<tr>
						  <td bgcolor="#F6F6F6"><strong>ระดับอาชีวศึกษา/<br>
						  อนุปริญญา</strong></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['name_edu3']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['type_edu3']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['fac_edu3']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['major_edu3']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['start_edu3']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['stop_edu3']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['grade_edu3']?></td>
						</tr>
					<?	}	?>
					<?	if($data['name_edu4'] != ""){	?>
						<tr>
						  <td bgcolor="#F6F6F6"><strong>ระดับมัธยมศึกษา</strong></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['name_edu4']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['type_edu4']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['fac_edu4']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['major_edu4']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['start_edu4']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['stop_edu4']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['grade_edu4']?></td>
						</tr>
					<?	}	?>
					<?	if($data['name_edu5'] != ""){	?>
						<tr>
						  <td bgcolor="#F6F6F6"><strong>ระดับประถมศึกษา</strong></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['name_edu5']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['type_edu5']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['fac_edu5']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['major_edu5']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['start_edu5']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['stop_edu5']?></td>
						  <td align="center" bgcolor="#F6F6F6"><?=$data['grade_edu5']?></td>
						</tr>
					<?	}	?>
					  </tbody></table></td>
				</tr>
				</tbody>
			</table>

			<table border="0" cellpadding="0" cellspacing="1" width="100%">
					<tbody><tr>
					  <td colspan="4" style="padding:5px;" bgcolor="#0892d0"><span class="style1">ประวัติการทำงาน</span></td>
				</tr>
					<tr>
					  <td colspan="4" bgcolor="#eeeded">
						<table bgcolor="#FFFFFF" border="0" cellpadding="5" cellspacing="1" width="100%">
						<tbody><tr>
							<td colspan="4" align="left" bgcolor="#CCCCCC"><strong>บริษัท/หน่วยงานล่าสุด </strong></td>
						  </tr>
					<?	if(isset($work_data1)){	?>
						  <tr>
							<td align="right" bgcolor="#EEEDED" width="200"><strong>ชื่อบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data1['company_name1']?>&nbsp;</td>
							<td align="right" bgcolor="#EEEDED"><strong>ที่ตั้งบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data1['comp_addr1']?>&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>โทรศัพท์ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data1['comp_tel1']?>&nbsp;</td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>เข้าทำงานเมื่อ :</strong>&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data1['date_in1']?></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data1['posi_in1']?></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong> ลาออกเมื่อ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data1['date_out1']?></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data1['posi_out1']?></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>หน้าที่/ความรับผิดชอบครั้งสุดท้าย : </strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data1['responsibility1']?></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>เงินเดือนเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data1['salary_in1']?></td>
							<td align="right" bgcolor="#EEEDED"><strong> เงินเดือนครั้งล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data1['salary_out1']?></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>ชื่อผู้บังคับบัญชาคนล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data1['manager1']?></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>สาเหตุที่ออก :</strong></td>
							<td colspan="3" align="left" bgcolor="#F6F6F6"><?=$work_data1['remark1']?></td>
						  </tr>
					<?	}	?>
					<?	if(isset($work_data2)){	?>
						  <tr>
							<td colspan="4" align="left" bgcolor="#CCCCCC"><strong>บริษัท/หน่วยงาน อันดับรอง 1 </strong></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED" width="200"><strong>ชื่อบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data2['company_name2']?>&nbsp;</td>
							<td align="right" bgcolor="#EEEDED"><strong>ที่ตั้งบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data2['comp_addr2']?>&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>โทรศัพท์ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data2['comp_tel2']?>&nbsp;</td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>เข้าทำงานเมื่อ :</strong>&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data2['date_in2']?></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data2['posi_in2']?></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong> ลาออกเมื่อ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data2['date_out2']?></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data2['posi_out2']?></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>หน้าที่/ความรับผิดชอบครั้งสุดท้าย : </strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data2['responsibility2']?></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>เงินเดือนเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data2['salary_in2']?></td>
							<td align="right" bgcolor="#EEEDED"><strong> เงินเดือนครั้งล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data2['salary_out2']?></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>ชื่อผู้บังคับบัญชาคนล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data2['manager2']?></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>สาเหตุที่ออก :</strong></td>
							<td colspan="3" align="left" bgcolor="#F6F6F6"><?=$work_data2['remark2']?></td>
						  </tr>
					<?	}	?>
					<?	if(isset($work_data3)){	?>
						  <tr>
							<td colspan="4" align="left" bgcolor="#CCCCCC"><strong>บริษัท/หน่วยงาน อันดับรอง 2 </strong></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED" width="200"><strong>ชื่อบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data3['company_name3']?>&nbsp;</td>
							<td align="right" bgcolor="#EEEDED"><strong>ที่ตั้งบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data3['comp_addr3']?>&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>โทรศัพท์ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data3['comp_tel3']?>&nbsp;</td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>เข้าทำงานเมื่อ :</strong>&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data3['date_in3']?></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data3['posi_in3']?></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong> ลาออกเมื่อ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data3['date_out3']?></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data3['posi_out3']?></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>หน้าที่/ความรับผิดชอบครั้งสุดท้าย : </strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data3['responsibility3']?></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>เงินเดือนเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data3['salary_in3']?></td>
							<td align="right" bgcolor="#EEEDED"><strong> เงินเดือนครั้งล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data3['salary_out3']?></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>ชื่อผู้บังคับบัญชาคนล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><?=$work_data3['manager3']?></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>สาเหตุที่ออก :</strong></td>
							<td colspan="3" align="left" bgcolor="#F6F6F6"><?=$work_data3['remark3']?></td>
						  </tr>
					<?	}	?>
						</tbody></table></td>
				</tr>
				  </tbody>
				</table>

			  <table border="0" cellpadding="5" cellspacing="0" width="100%">
					<tbody><tr>
					  <td colspan="4" bgcolor="#0892d0"><span class="style1">ประวัติการฝึกอบรมและดูงาน</span></td>
				</tr>
					<tr>
					  <td colspan="4" bgcolor="#EEEDED" width="100%">
					  <table align="center" bgcolor="#EEEDED" border="0" bordercolor="#EEEDED" cellpadding="5" cellspacing="1" width="100%">
						<tbody><tr align="center">
						  <td bgcolor="#CCCCCC" width="50"><strong>ลำดับที่</strong></td>
						  <td bgcolor="#CCCCCC" width="110"><strong>หลักสูตร</strong></td>
						  <td bgcolor="#CCCCCC" width="110"><strong>สถาบัน</strong></td>
						</tr>
				<?	if($data['train1'] != ""){	?>
						<tr align="center">
						  <td rowspan="2" bgcolor="#F6F6F6">1</td>
						  <td bgcolor="#F6F6F6"><?=$data['train1']?></td>
						  <td bgcolor="#F6F6F6"><?=$data['place1']?></td>
						</tr>
						<tr align="center">
						  <td colspan="2" align="left" bgcolor="#F6F6F6">ตั้งแต่ วันที่ 
							<?=$data['train_from1']?>&nbsp;ถึง&nbsp;<?=$data['train_to1']?>
						  </td>
						</tr>
				<?	}	?>
				<?	if($data['train2'] != ""){	?>
						<tr align="center">
						  <td rowspan="2" bgcolor="#F6F6F6">2</td>
						  <td bgcolor="#F6F6F6"><?=$data['train2']?></td>
						  <td bgcolor="#F6F6F6"><?=$data['place2']?></td>
						</tr>
						<tr align="center">
						  <td colspan="2" align="left" bgcolor="#F6F6F6">ตั้งแต่ วันที่ 
							<?=$data['train_from2']?>&nbsp;ถึง&nbsp;<?=$data['train_to2']?>
						  </td>
						</tr>
				<?	}	?>
				<?	if($data['train3'] != ""){	?>
						<tr align="center">
						  <td rowspan="2" bgcolor="#F6F6F6">3</td>
						  <td bgcolor="#F6F6F6"><?=$data['train3']?></td>
						  <td bgcolor="#F6F6F6"><?=$data['place3']?></td>
						</tr>
						<tr align="center">
						  <td colspan="2" align="left" bgcolor="#F6F6F6">ตั้งแต่ วันที่ 
							<?=$data['train_from3']?>&nbsp;ถึง&nbsp;<?=$data['train_to3']?>
						  </td>
						</tr>
				<?	}	?>
					  </tbody></table></td>
				</tr>
			</tbody>
			</table>

			<table border="0" cellpadding="5" cellspacing="1" width="100%">
			<tbody><tr>
					  <td colspan="4" bgcolor="#0892d0"><span class="style1">โครงการ/ผลงาน/เกียรติประวัติ</span></td>
				</tr>
					<tr align="center">
					  <td align="right" bgcolor="#EEEDED" width="135"><strong>โครงการ/ผลงาน :</strong></td>
					  <td colspan="3" align="left" bgcolor="#F6F6F6" valign="middle" width="622" height="28">&nbsp;<?=$data['performance']?></td>
				</tr>
			</tbody></table>

			<table border="0" cellpadding="3" cellspacing="1" width="100%">
					<tbody><tr>
					  <td colspan="4" bgcolor="#0892d0" width="100%"><span class="style1">ผู้รับรองประวัติ/บุคคลอ้างอิง</span></td>
				</tr>
					<tr>
					  <td bgcolor="#EEEDED"><table border="0" cellpadding="3" cellspacing="1" width="100%">
						<tbody><tr align="center">
						  <td bgcolor="#CCCCCC" width="190"><strong>ชื่อ-สกุล</strong></td>
						  <td bgcolor="#CCCCCC" width="220"><strong>ชื่อและที่ตั้งบริษัท</strong></td>
						  <td bgcolor="#CCCCCC" width="170"><strong>ตำแหน่ง</strong></td>
						  <td bgcolor="#CCCCCC" width="150"><strong>โทรศัพท์</strong></td>
						</tr>
				<?	if($data['name_refer1'] != ""){	?>
						<tr align="center">
						  <td bgcolor="#F6F6F6" width="190"><?=$data['name_refer1']?></td>
						  <td bgcolor="#F6F6F6" width="220"><?=$data['company_refer1']?></td>
						  <td bgcolor="#F6F6F6" width="170"><?=$data['position_refer1']?></td>
						  <td bgcolor="#F6F6F6" width="150"><?=$data['tel_refer1']?></td>
						</tr>
				<?	}	?>
				<?	if($data['name_refer2'] != ""){	?>
						<tr align="center">
						  <td bgcolor="#F6F6F6" width="190"><?=$data['name_refer2']?></td>
						  <td bgcolor="#F6F6F6" width="220"><?=$data['company_refer2']?></td>
						  <td bgcolor="#F6F6F6" width="170"><?=$data['position_refer2']?></td>
						  <td bgcolor="#F6F6F6" width="150"><?=$data['tel_refer2']?></td>
						</tr>
				<?	}	?>
				<?	if($data['name_refer3'] != ""){	?>
						<tr align="center">
						  <td bgcolor="#F6F6F6" width="190"><?=$data['name_refer3']?></td>
						  <td bgcolor="#F6F6F6" width="220"><?=$data['company_refer3']?></td>
						  <td bgcolor="#F6F6F6" width="170"><?=$data['position_refer3']?></td>
						  <td bgcolor="#F6F6F6" width="150"><?=$data['tel_refer3']?></td>
						</tr>
				<?	}	?>
					  </tbody></table></td>
				</tr>
			</tbody></table>

			<table border="0" cellpadding="4" cellspacing="1" width="100%">
			<tbody><tr>
					  <td colspan="4" bgcolor="#0892d0"><span class="style1">ความสามารถพิเศษ</span></td>
				</tr>
				<tr>
				  <td colspan="4" align="left" bgcolor="#CCCCCC"><strong>ความสามารถทางด้านภาษา</strong></td>
				</tr>
		<?	if($data['language1'] != ""){	?>
				<tr>
				  <td align="right" bgcolor="#EEEDED" valign="top" width="150"><strong>ภาษาต่างประเทศ 1 :</strong></td>
				  <td colspan="3" bgcolor="#F6F6F6"><?=$data['language1']?></td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED" valign="top" width="150"><b>พูด :</b></td>
				  <td colspan="3" bgcolor="#F6F6F6"><?=$data['level_speak1']?>
					&nbsp; &nbsp; &nbsp; <b>เขียน :</b> <?=$data['level_write1']?>
					&nbsp; &nbsp; &nbsp; <b>ฟัง : </b>	<?=$data['level_listen1']?>
			 </td>
				</tr>
		<?	}	?>
		<?	if($data['language2'] != ""){	?>
				<tr>
				  <td align="right" bgcolor="#EEEDED" valign="top" width="150"><strong>ภาษาต่างประเทศ 2 :</strong></td>
				  <td colspan="3" bgcolor="#F6F6F6"><?=$data['language2']?></td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED" valign="top" width="150"><b>พูด :</b></td>
				  <td colspan="3" bgcolor="#F6F6F6"><?=$data['level_speak2']?>
					&nbsp; &nbsp; &nbsp; <b>เขียน :</b> <?=$data['level_write2']?>
					&nbsp; &nbsp; &nbsp; <b>ฟัง : </b>	<?=$data['level_listen2']?>
			 </td>
				</tr>
		<?	}	?>
				<tr>
				  <td colspan="4" align="left" bgcolor="#CCCCCC"><strong>ความสามารถด้าน Computer</strong></td>
				</tr>
		<?	if($data['computer1'] != ""){	?>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 1 :</strong></td>
				  <td bgcolor="#F6F6F6" width="100"><?=$data['computer1']?></td>
				  <td align="right" bgcolor="#EEEDED" width="100"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6"><?=$data['level_use1']?></td>
				</tr>
		<?	}	?>
		<?	if($data['computer2'] != ""){	?>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 1 :</strong></td>
				  <td bgcolor="#F6F6F6" width="100"><?=$data['computer2']?></td>
				  <td align="right" bgcolor="#EEEDED" width="100"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6"><?=$data['level_use2']?></td>
				</tr>
		<?	}	?>
		<?	if($data['computer3'] != ""){	?>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 1 :</strong></td>
				  <td bgcolor="#F6F6F6" width="100"><?=$data['computer3']?></td>
				  <td align="right" bgcolor="#EEEDED" width="100"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6"><?=$data['level_use3']?></td>
				</tr>
		<?	}	?>
		<?	if($data['computer4'] != ""){	?>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 1 :</strong></td>
				  <td bgcolor="#F6F6F6" width="100"><?=$data['computer4']?></td>
				  <td align="right" bgcolor="#EEEDED" width="100"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6"><?=$data['level_use4']?></td>
				</tr>
		<?	}	?>
		<?	if($data['computer5'] != ""){	?>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 1 :</strong></td>
				  <td bgcolor="#F6F6F6" width="100"><?=$data['computer5']?></td>
				  <td align="right" bgcolor="#EEEDED" width="100"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6"><?=$data['level_use5']?></td>
				</tr>
		<?	}	?>
		<?	if($data['computer6'] != ""){	?>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 1 :</strong></td>
				  <td bgcolor="#F6F6F6" width="100"><?=$data['computer6']?></td>
				  <td align="right" bgcolor="#EEEDED" width="100"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6"><?=$data['level_use6']?></td>
				</tr>
		<?	}	?>
				<tr>
				  <td align="right" bgcolor="#EEEDED"> <strong>พิมพ์ดีดไทย :</strong></td>
				  <td align="left" bgcolor="#F6F6F6" colspan="3"><?=$data['type_th']?> คำ/นาที</td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>พิมพ์ดีดอังกฤษ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6" colspan="3"><?=$data['type_en']?> คำ/นาที</td>
				</tr>
				<tr>
				  <td colspan="4" style="padding:0px;" align="left" bgcolor="#EEEDED"><table bgcolor="#FFFFFF" border="0" cellpadding="5" cellspacing="1" width="100%">
					
					<tbody><tr>
					  <td colspan="2" bgcolor="#CCCCCC"><strong>ความสามารถในการขับรถ</strong></td>
					  </tr>
					<tr>
					  <td align="right" bgcolor="#EEEDED" width="199"><strong>ความสามารถในการขับรถ :</strong></td>
					  <td bgcolor="#F6F6F6" width="648">
						<?	switch($data['ck_drive']){
								case "1" :	echo "รถยนต์"; break;
								case "2" :	echo "รถจักรยานยนต์"; break;
								case "3" :	echo "ทั้งรถยนต์และรถจักรยานยนต์"; break;
								case "4" :	echo "ไม่มี"; break;
								default	 :	break;
							}	?>
						</td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#EEEDED"><strong>มีใบขับขี่ :</strong></td>
					  <td bgcolor="#F6F6F6">
						<?	switch($data['ck_cardrive']){
								case "1" :	echo "รถยนต์"; break;
								case "2" :	echo "รถจักรยานยนต์"; break;
								case "3" :	echo "ทั้งรถยนต์และรถจักรยานยนต์"; break;
								case "4" :	echo "ไม่มี"; break;
								default	 :	break;
							}	?>
					  </td>
					</tr>
				  </tbody></table></td>
				</tr>
			  </tbody></table>

			  <table border="0" cellpadding="5" cellspacing="1" width="100%">
				<tbody><tr>
				  <td colspan="3" bgcolor="#0892d0"><span class="style1">ทรัพย์สิน</span></td>
				</tr>
				<tr bgcolor="#D5FFEA">
				  <td align="right" bgcolor="#EEEDED" valign="top" width="203"><strong>บ้านที่ท่านพักอาศัย :</strong></td>
				  <td colspan="2" bgcolor="#F6F6F6" height="30">
					<?	switch($data['ck_home']){
							case "1" : echo "เป็นของตนเอง"; break;
							case "2" : echo "บ้านเช่าซื้ออยู่ระหว่างผ่อนชำระ"; break;
							case "3" : echo "หอพัก"; break;
							case "4" : echo "บ้านเช่าอยู่เอง"; break;
							case "5" : echo "อาศัยผู้อื่นอยู่ : "; break;
							default : break;
						}	?>&nbsp;
					<?	if($data['ck_home'] == "5"){ echo $data['ck_home_detail'];	}	?>
				  </td>
				</tr>
				<tr bgcolor="#D5FFEA">
				  <td align="right" bgcolor="#EEEDED" valign="top" width="203" height="36"><strong>การมีพาหนะเป็นของตนเอง :</strong></td>
				  <td bgcolor="#F6F6F6" width="290" colspan="3">
					<?	if($data['ck_car'] == "1"){
							if($data['ck_cartype1'] == "1"){	?>
							รถยนต์&nbsp;
						<?	}
							if($data['ck_cartype2'] == "1"){	?>
							รถจักรยานยนต์&nbsp;
						<?	}	?>
							โดย&nbsp;
								<?	switch($data['ck_car_status']){
										case "1" : echo "อยู่ระหว่างการผ่อน"; break;
										case "2" : echo "ชำระหมดแล้ว"; break;
										default : break;
									}	?>
							
					<?	}else{	?>
							ไม่มี
					<?	}	?>
				  </td>
				</tr>
			  </tbody></table>

			<table border="0" cellpadding="5" cellspacing="1" width="100%">
					<tbody><tr>
					  <td colspan="2" bgcolor="#0892d0"><span class="style1">อื่น ๆ</span></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#EEEDED" width="33%"><span><strong>* งานอดิเรก :</strong></span></td>
					  <td align="left" bgcolor="#F6F6F6" width="67%"><?=$data['hobby']?></td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#EEEDED"><span><strong>* ท่านเคยได้รับการผ่าตัดหรือไม่ : </strong></span></td>
					  <td align="left" bgcolor="#F6F6F6">
					  <?	if($data['ck_sick'] == "1"){	
								echo "ไม่เคย"; 
							}else{
								echo "เคย : ".$data['sick_detail'];
							}
					  ?>			
					  </td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#EEEDED"><span><strong>* ท่านเคยมีโรคประจำตัวหรือไม่ : </strong></span></td>
					  <td align="left" bgcolor="#F6F6F6">
					  <?	if($data['ck_health'] == "1"){	
								echo "ไม่มี"; 
							}else{
								echo "มี : ".$data['health_detail'];
							}
					  ?>	
					  </td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#EEEDED"><span><strong>ท่านเคยฟ้องร้องหรือถูกฟ้องร้องต่อศาลหรือไม่ :</strong></span></td>
					  <td align="left" bgcolor="#F6F6F6">
					  <?	if($data['ck_accuse'] == "1"){	
								echo "ไม่เคย"; 
							}else{
								echo "เคย";
							}
					  ?>	
					  </td>
					</tr>
			</tbody></table>

			<table border="0" cellpadding="5" cellspacing="1" width="100%">
			<tbody><tr>
					<td colspan="4" bgcolor="#0892d0"><span class="style1">ทัศนคติต่อการทำงาน</span></td>
				</tr>
				<tr>
					<td colspan="4" bgcolor="#EEEDED">
					<strong>เหตุผลที่ท่านคิดว่าท่านเหมาะสมกับงานที่สมัคร :</strong> *
					( <em>ท่านสามารถกรอกข้อมูลได้สูงสุด <span class="input1">300</span>
					ตัวอักษร  </em>) <br>
					</td>
				</tr>
				<tr>
					<td colspan="4" bgcolor="#FEFEFE">
					<?=$data['think_in_work']?>
					</td>
				</tr>
				<tr>
					<td colspan="4" bgcolor="#EEEDED">
					<strong>ท่านวางแผนในอนาคตของท่านอย่างไร ภายใน 5 ปีข้างหน้า :</strong> *
					( <em>ท่านสามารถกรอกข้อมูลได้สูงสุด <span class="input2">300</span>
					ตัวอักษร</em> ) <br>
					</td>
				</tr>
				<tr>
					<td colspan="4" bgcolor="#FEFEFE">
					<?=$data['plan_in_future']?>
					</td>
				</tr>

				<tr>
					<td colspan="4" bgcolor="#EEEDED"><strong>ท่านคิดว่าคุณสมบัติใดที่จะเป็นกุญแจแห่งความสำเร็จในการงานของท่าน </strong>: *
					( <em>ท่านสามารถกรอกข้อมูลได้สูงสุด <span class="input3">300</span>
					ตัวอักษร </em>) <br>
					</td>
				</tr>
				<tr>
					<td colspan="4" bgcolor="#FEFEFE">
					<?=$data['success_in_work']?>
				  </td>
				</tr>
			</tbody></table>

			<table border="0" cellpadding="5" cellspacing="1" width="100%">
			<tbody><tr>
				<td colspan="4" bgcolor="#0892d0" width="100%"><span class="style1">ทราบข่าวการสมัครงานจาก</span></td>
				</tr>
		<?	if($data['know_news'] == "1"){	?>
				<tr bgcolor="#D6C9D5">
					<td bgcolor="#F6F6F6" width="30%" height="30" align="right">หนังสือพิมพ์ชื่อ :</td>
					<td bgcolor="#F6F6F6" colspan="3"><?=$data['know_news_detail']?></td>
				</tr>
		<?	}	?>
		<?	if($data['know_employee'] == "1"){	?>
				<tr bgcolor="#D6C9D5">
					<td bgcolor="#F6F6F6" width="30%" height="30" align="right">พนักงานชื่อ :</td>
					<td bgcolor="#F6F6F6" colspan="3"><?=$data['know_employee_detail']?></td>
				</tr>
		<?	}	?>
		<?	if($data['know_internet'] == "1"){	?>
				<tr bgcolor="#D6C9D5">
					<td bgcolor="#F6F6F6" width="30%" height="30" align="right">Internet Site :</td>
					<td bgcolor="#F6F6F6" colspan="3"><?=$data['know_internet_detail']?></td>
				</tr>
		<?	}	?>
		<?	if($data['know_market'] == "1"){	?>
				<tr bgcolor="#D6C9D5">
					<td bgcolor="#F6F6F6" width="30%" height="30" align="right">ตลาดนัดแรงงาน :</td>
					<td bgcolor="#F6F6F6" colspan="3"><?=$data['know_market_detail']?></td>
				</tr>
		<?	}	?>
		<?	if($data['know_school'] == "1"){	?>
				<tr bgcolor="#D6C9D5">
					<td bgcolor="#F6F6F6" width="30%" height="30" align="right">สถาบันการศึกษาชื่อ :</td>
					<td bgcolor="#F6F6F6" colspan="3"><?=$data['know_school_detail']?></td>
				</tr>
		<?	}	?>
		<?	if($data['know_etc'] == "1"){	?>
				<tr bgcolor="#D6C9D5">
					<td bgcolor="#F6F6F6" width="30%" height="30" align="right">อื่นๆ :</td>
					<td bgcolor="#F6F6F6" colspan="3"><?=$data['know_etc_detail']?></td>
				</tr>
		<?	}	?>
		
		<?	if($data['know_website'] == "1"){	?>
				<tr bgcolor="#D6C9D5">
					<td bgcolor="#F6F6F6" width="30%" height="30" align="right">เว็บไซต์ :</td>
					<td bgcolor="#F6F6F6" colspan="3">www.hitera.com</td>
				</tr>
		<?	}	?>
		<?	if($data['know_board'] == "1"){	?>
				<tr bgcolor="#D6C9D5">
					<td bgcolor="#F6F6F6" height="30" align="right" colspan="4">บอร์ดบริษัทหรือสอบถามโดยตรง:</td>
				</tr>
		<?	}	?>
			</tbody></table>

			<table border="0" cellpadding="5" cellspacing="1" width="100%">
			<tbody><tr>
					  <td colspan="4" bgcolor="#0892d0" width="100%">
						<span class="style1">ข้อมูลเพิ่มเติม (เช่น เรื่องที่สนใจเป็นพิเศษ, คุณสมบัติอื่น ๆ เป็นต้น)</span>
					  </td>
				</tr>
				<tr>
					<td colspan="4" bgcolor="#EEEDED">
					<?=$data['other']?>
					</td>
				</tr>
			</tbody></table>
			<br>
			<center>
				<input value="ส่ง" type="submit">
			</center>


		</form>
	
		</div>

	</div>

</div>
<script> 
	
	$("#job").validate({
		submitHandler: function(form) 
		   		{
					
		   			  $.ajax({
            				url: '<?php echo $base_url;?>/<?php echo $action;?>',
            				cache: false,
            				type: 'POST',
           					data: new FormData( form ),
      						processData: false,
      						contentType: false,
            				dataType: "json",
            				success: function (data, status) 
            				{
                				alert(data.message);
								//window.location.href	=	"<?php echo WEB_PATH?>/workwithus";

            				}
        			});
					
				}

	});
	
	/*
	$("#job").submit(function() {
		$.ajax({
            url: '<?php echo $base_url;?>/<?php echo $action;?>',
            cache: false,
            type: 'POST',
           	data: new FormData( form ),
      		processData: false,
      		contentType: false,
            dataType: "json",
            success: function (data, status) 
            {
            	alert(data.message);
				//window.location.href	=	"<?php echo WEB_PATH?>/workwithus";

            }
   		});
		
	});
	*/

	
</script> 
