<?php include APPPATH."views/func.inc.php"; ?>

	
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/workwithus/apply.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/workwithus/jquery.preimage.js"></script>
	
	

<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>/assets/css/workwithus.css">
<? //print_r($form_data);
	//print_r($work_history);
?>

<?php echo form_open_multipart($form_action,array('id' => 'myform','name'=>'myform','method'=>'post'));?>


				
			  <table border="0" cellpadding="5" cellspacing="1" width="100%">
				<tbody><tr>
				  <td colspan="3" bgcolor="#0892d0"><span class="style1">ตำแหน่งที่สมัคร</span></td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#eeeded" width="25%" height="28"><strong>* ตำแหน่งที่สมัคร 1 :</strong></td>
				  <td bgcolor="#F6F6F6">
							<select name="position1">
								<option value="" selected="selected">------- โปรดเลือก -------</option>
							<?	foreach($jobs as $val){	?>
									<option value="<?=$val['job_id']?>"<?php echo $form_data['position1'] == $val['job_id'] ? ' selected="selected"' : ""  ?>><?=$val['job_name']?></option>
							<?	}	?> 
							</select>
				  </td>
				  <td rowspan="4" bgcolor="#F6F6F6" width="194">
				  
					  <div align="right">
						<table border="0" cellspacing="10" width="250">
							<tbody><tr>
							<td style="border:1px #999 solid;" align="center" bgcolor="#F7F7F7" width="230" height="250">
								<p>โปรดเลือก รูปประจำตัว</p>
								<div id="prev_file1"></div>
								<?php	if($form_data['pic_path'] != ""){ ?>
									<a href="<?=$form_data['pic_path']?>" />ดูรูปผู้สมัคร</a>
								<?		} ?>
							</td>
							</tr></tbody>
						</table>
						<table border="0" cellspacing="5">
							<tbody><tr>
							  <td align="center" height="18">(เฉพาะไฟล์ JPG,GIF,PNG)</td>
							</tr>
							<tr>
							  <td align="right" height="18">
							  <input class="file" id="file1" name="file1" type='file' />
							  </td>
							</tr></tbody>
						</table>
					</div>
				  </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#eeeded" width="200" height="28"><strong>ตำแหน่งที่สมัคร 2 :</strong></td>
				  <td bgcolor="#F6F6F6">
							<select name="position2">
								<option value="" selected="selected">------- โปรดเลือก -------</option>
							<?	foreach($jobs as $val){	?>
									<option value="<?=$val['job_id']?>"<?php echo $form_data['position2'] == $val['job_id'] ? ' selected="selected"' : ""  ?>><?=$val['job_name']?></option>
							<?	}	?> 
							</select>
				  </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#eeeded" valign="top" width="200" height="8"><strong>* เงินเดือนที่ต้องการ : </strong></td>
				  <td bgcolor="#F6F6F6" valign="top"><?php print_input_text("salary");?> บาท/เดือน</td>
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
					 <input name="can_onsite" value="1" <? if($form_data['can_onsite'] == "1") echo 'checked="checked"'; ?> onclick="document.myform.can_onsite_result.disabled=true; document.myform.can_onsite_reason.value='';" type="radio"> ได้ 
					 <input name="can_onsite" value="2" <? if($form_data['can_onsite'] == "2") echo 'checked="checked"'; ?> onclick="document.myform.can_onsite_reason.disabled=false;" type="radio"> ไม่ได้ &nbsp;
					  เพราะ <input name="can_onsite_reason" onkeypress="document.myform.can_onsite[1].checked = true;" type="text" <? if($form_data['can_onsite'] == "2") echo 'value="'.$form_data['can_onsite_reason'].'"'; ?>></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>พร้อมที่จะปฎิบัติงานได้ :</strong></td>
					  <td bgcolor="#F6F6F6" width="450">
					  <input name="is_ready" value="1" onclick="document.myform.is_ready_day.disabled=true; document.myform.is_ready_day.value='';" <? if($form_data['is_ready'] == "1") echo 'checked="checked"'; ?> type="radio"> ในทันที
					  <input name="is_ready" value="2" <? if($form_data['is_ready'] == "2") echo 'checked="checked"'; ?> onclick="document.myform.is_ready_day.disabled=false;" type="radio"> ภายใน 
					  <input name="is_ready_day" onkeypress=" document.myform.is_ready[1].checked = true;" onkeyup="if(this.value*1!=this.value) this.value='' ;" <? if($form_data['is_ready'] == "2") echo 'value="'.$form_data['is_ready_day'].'"'; ?> type="text" > วัน &nbsp; หลังจากได้รับแจ้งจากบริษัท	
					  </td>
				</tr>
					<tr>
					  <td colspan="2" align="center" bgcolor="#eeeded" height="36">* บริษัทกำหนดให้มีการทดลองงาน 4 เดือน นับจากวันแรกที่ท่านเข้าทำงาน ท่านยินดีที่จะปฏิบัติหรือไม่  :<br />
						<input name="can_pro" value="1" <? if($form_data['can_pro'] == "1") echo 'checked="checked"'; ?> type="radio"> ได้ 
						<input name="can_pro" value="2" <? if($form_data['can_pro'] == "2") echo 'checked="checked"'; ?> type="radio"> ไม่ได้ </td>
				</tr>
				  </tbody>
			</table>
				 
			<table border="0" cellpadding="4" cellspacing="1" width="100%">
			<tbody><tr>
					  <td colspan="4" bgcolor="#0892d0"><span class="style1">ประวัติส่วนตัว</span></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* ชื่อ :</strong></td>
					  <td bgcolor="#F6F6F6" width="376"><?php print_input_text("name_th");?></td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>* นามสกุล :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><?php print_input_text("surname_th");?></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* ชื่อ :<br>
					  (ภาษาอังกฤษ) </strong></td>
					  <td bgcolor="#F6F6F6" width="376"><?php print_input_text("name_en");?></td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>* นามสกุล :<br>
					  (ภาษาอังกฤษ) </strong></td>
					  <td bgcolor="#F6F6F6" width="400"><?php print_input_text("surname_en");?></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* เพศ :</strong></td>
					  <td bgcolor="#F6F6F6" width="376">
						  <input name="gender" value="1" <? if($form_data['gender'] == "1") echo 'checked="checked"'; ?> type="radio"> ชาย
						  <input name="gender" value="2" <? if($form_data['gender'] == "2") echo 'checked="checked"'; ?> type="radio"> หญิง
					  </td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>* วัน/เดือน/ปีเกิด :</strong></td>
					  <td bgcolor="#F6F6F6" width="400">
                      	<div class="pos-re">
						<?php print_input_text("birth_date");?>
                        </div>
					  </td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* อายุ :</strong></td>
					  <td bgcolor="#F6F6F6" width="376"><input name="age" id="age" size="5" onkeyup="if(this.value*1!=this.value) this.value='<?=$form_data['age']?>' ;" type="text" value="<?=$form_data['age']?>"> ปี</td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>ตำหนิบนร่างกาย :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><input name="scar" type="text" value="<?=$form_data['scar']?>" /></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* ส่วนสูง :</strong></td>
					  <td bgcolor="#F6F6F6" width="376">
						<input name="height" size="5" onkeyup="if(this.value*1!=this.value) this.value='<?=$form_data['height']?>' ;" type="text" value="<?=$form_data['height']?>"> เซนติเมตร&nbsp; </td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>* น้ำหนัก :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><input name="weight" maxlength="5" size="5" onkeyup="if(this.value*1!=this.value) this.value='<?=$form_data['weight']?>' ;" type="text" value="<?=$form_data['weight']?>">  กิโลกรัม&nbsp;</td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>สถานที่เกิด&nbsp;อำเภอ :</strong></td>
					  <td bgcolor="#F6F6F6" width="376"><input name="born_city" type="text" value="<?=$form_data['born_city']?>" /></td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>* จังหวัด :</strong></td>
					  <td bgcolor="#F6F6F6" width="400">
							<select name="born_province" id="born_province">
								<option value="">------- โปรดเลือก -------</option>
							<?	foreach($province as $val){	?>
									<option <? if($form_data['born_province'] == $val['province_id']) echo 'selected="selected"'; ?> value="<?=$val['province_id']?>"><?=$val['province_name']?></option>
							<?	}	?>						  
						  
							</select>
					  </td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* สัญชาติ :</strong></td>
					  <td bgcolor="#F6F6F6"><input name="nationality" type="text" value="<?=$form_data['nationality']?>" /></td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    เชื้อชาติ :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><input name="race" type="text" value="<?=$form_data['race']?>" /></td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266">&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp; <strong>ศาสนา :</strong></td>
					  <td bgcolor="#F6F6F6"><input name="religion" type="text" value="<?=$form_data['religion']?>" /></td>
					  <td align="right" bgcolor="#eeeded" width="240">&nbsp;</td>
					  <td bgcolor="#F6F6F6" width="400">&nbsp;</td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>*เลขบัตรประชาชน :</strong></td>
					  <td bgcolor="#F6F6F6" width="376"><input name="citizen_id" maxlength="13" onkeyup="if(this.value*1!=this.value) this.value='<?=$form_data['citizen_id']?>' ;" type="text" value="<?=$form_data['citizen_id']?>" /> </td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>สถานที่ออกบัตร :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><input name="citizen_card_place" type="text" value="<?=$form_data['citizen_card_place']?>" /></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>วันที่ออกบัตร :</strong></td>
					  <td bgcolor="#F6F6F6" width="376">
						<input name="citizen_card_taken" type="text" id="citizen_card_taken" value="<?=$form_data['citizen_card_taken']?>" />
					  </td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>วันที่บัตรหมดอายุ :</strong></td>
					  <td bgcolor="#F6F6F6" width="400">
						<input name="citizen_card_expire" type="text" id="citizen_card_expire"value="<?=$form_data['citizen_card_expire']?>" />
					  </td>
				</tr>
					<tr>
					  <td colspan="4" bgcolor="#eeeded"><strong>&nbsp;บัตรประจำตัวผู้เสียภาษีเลขที่ :</strong>
						<input name="tax_id" onkeyup="if(this.value*1!=this.value) this.value='<?=$form_data['tax_id']?>' ;" maxlength="13" type="text" value="<?=$form_data['tax_id']?>"></td>
					</tr>
					<tr>
					  <td colspan="4" align="left" bgcolor="#eeeded"> 
						<strong>* ฐานะการสมรส : </strong>
						  <input name="marital_status" value="1" <? if($form_data['marital_status'] == "1") echo 'checked="checked"'; ?> type="radio">   โสด  
						  <input name="marital_status" value="2" <? if($form_data['marital_status'] == "2") echo 'checked="checked"'; ?> type="radio">   สมรส  
						  <input name="marital_status" value="3" <? if($form_data['marital_status'] == "3") echo 'checked="checked"'; ?> type="radio">   หย่า 
						  <input name="marital_status" value="4" <? if($form_data['marital_status'] == "4") echo 'checked="checked"'; ?> type="radio">  หม้าย 
						</td>
				</tr>
				  </tbody>
			</table>

			<table border="0" cellpadding="0" cellspacing="0" width="100%">
			  <tbody><tr>
				<td bgcolor="#0892d0" width="100%" height="31"><span class="style1">&nbsp;ประวัติสมรส</span></td>
				</tr>
			  <tr>
				<td><table border="0" cellpadding="6" cellspacing="1" width="100%">
				  <tbody><tr>
					<td align="right" bgcolor="#EEEDED" width="150"><strong>ชื่อคู่สมรส :</strong></td>
					<td bgcolor="#F6F6F6"><?php print_input_text("mar_name");?></td>
					<td align="right" bgcolor="#EEEDED" width="150"><strong>นามสกุลเดิม :</strong></td>
					<td bgcolor="#F6F6F6"><?php print_input_text("mar_surname");?></td>
				  </tr>
				  <tr>
					<td align="right" bgcolor="#EEEDED"><strong>สัญชาติ :</strong></td>
					<td bgcolor="#F6F6F6"><?php print_input_text("mar_nationality");?></td>
					<td align="right" bgcolor="#EEEDED"><strong>เชื้อชาติ :</strong></td>
					<td bgcolor="#F6F6F6"><?php print_input_text("mar_race");?></td>
				  </tr>
				  <tr>
					<td align="right" bgcolor="#EEEDED"><strong>อาชีพคู่สมรส :</strong></td>
					<td bgcolor="#F6F6F6"><?php print_input_text("mar_occupation");?></td>
					<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่ง :</strong></td>
					<td bgcolor="#F6F6F6"><?php print_input_text("mar_position");?></td>
				  </tr>
				  <tr>
					<td colspan="4" bgcolor="#EEEDED"><strong>ชื่อสถานที่ประกอบอาชีพของคู่สมรส :</strong><?php print_input_text("mar_company");?></td>
				  </tr>
				  <tr>
					<td align="right" bgcolor="#EEEDED"><strong>จำนวนบุตรทั้งสิ้น :</strong>&nbsp;&nbsp;</td>
					<td align="left" bgcolor="#F6F6F6"><input name="mar_child" size="5" maxlength="5" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['mar_child']?>">คน&nbsp;</td>
					<td align="right" bgcolor="#EEEDED">&nbsp;&nbsp; <strong> บุตรชาย :</strong></td>
					<td align="left" bgcolor="#F6F6F6"><input name="mar_son" size="5" maxlength="5" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['mar_son']?>">คน&nbsp; </td>
				  </tr>
				  <tr>
					<td align="right" bgcolor="#EEEDED">&nbsp;</td>
					<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
					<td align="right" bgcolor="#EEEDED"><strong>บุตรหญิง :</strong></td>
					<td align="left" bgcolor="#F6F6F6"><input name="mar_daughter" size="5" maxlength="5" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['mar_daughter']?>">คน</td>
				  </tr>
				</tbody></table></td>
				</tr>
			</tbody></table>
			
			
			<table border="0" cellpadding="4" cellspacing="1" width="100%">
			<tbody><tr>
					  <td colspan="4" bgcolor="#0892d0"><span class="style1">ประวัติครอบครัว</span></td>
				</tr>
				
					<tr>
					  <td colspan="4" bgcolor="#CCCCCC" height="14"><strong>บิดา </strong></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150" height="36"><strong>* ชื่อบิดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?php print_input_text("name_fa");?></td>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>* นามสกุลบิดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?php print_input_text("surname_fa");?></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150" height="36"><strong>* สัญชาติ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?php print_input_text("nation_fa");?></td>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>เชื้อชาติ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?php print_input_text("race_fa");?></td>
				</tr>
				<tr>
					  <td align="right" bgcolor="#eeeded" width="150" height="36"><strong>อาชีพของบิดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?php print_input_text("occupation_fa");?></td>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>ชื่อสถานที่ประกอบอาชีพของบิดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?php print_input_text("company_fa");?></td>
				</tr>
					<tr>
					  <td colspan="4" bgcolor="#eeeded" width="100%" height="14"><strong>&nbsp;ที่อยู่ของบิดา </strong></td>
				</tr>
					<tr>
					  <td colspan="4" bgcolor="#F6F6F6" height="30"><textarea name="address_fa" cols="60" rows="2" style="width:99%;"><?=$form_data['address_fa']?></textarea></td>
					</tr>
					 <tr>
					  <td colspan="4" align="left" bgcolor="#CCCCCC" height="14"><strong>มารดา</strong></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150" height="36"><strong>* ชื่อมารดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?php print_input_text("name_mom");?></td>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>* นามสกุลมารดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?php print_input_text("surname_mom");?></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150" height="36"><strong>* สัญชาติ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?php print_input_text("nation_mom");?></td>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>เชื้อชาติ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?php print_input_text("race_mom");?></td>
				</tr>
				   <tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>อาชีพของมารดา :</strong></td>
					  <td bgcolor="#F6F6F6"><?php print_input_text("occupation_mom");?></td>
					  <td align="right" bgcolor="#eeeded" width="270"><strong>ชื่อสถานที่ประกอบอาชีพของมารดา :</strong></td>
					  <td bgcolor="#F6F6F6"><?php print_input_text("company_mom");?></td>
				</tr>
					<tr>
					  <td colspan="4" bgcolor="#eeeded" height="14"><strong>ที่อยู่ของมารดา :</strong></td>
					</tr>
					<tr>
					  <td colspan="4" bgcolor="#eeeded" height="30"><textarea name="address_mom" cols="50" rows="2" id="address_mom" style="width:99%;"><?=$form_data['address_mom']?></textarea></td>
					</tr>
					<tr>
					  <td colspan="4" align="left" bgcolor="#CCCCCC" height="14"><strong>ประวัติพี่น้องร่วมบิดามารดา</strong></td>
				</tr>
					
					<tr>
					  <td colspan="4" bgcolor="#eeeded" height="100"><br>
						<div align="center"><strong>พี่น้องร่วมบิดามารดาทั้งหมด : </strong>
						  <input name="brother_num" size="5" maxlength="5" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['brother_num']?>">              คน  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&nbsp;ท่านเป็นคนที่ : </strong>
						  <input name="you_num" size="5" maxlength="5" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['you_num']?>">
						</div>
						<br>
						<strong>ประวัติพี่น้องร่วมบิดามารดา</strong>
			<table border="0" bordercolor="#DDB7FF" cellpadding="3" cellspacing="1" width="100%">
			  <tbody><tr>
							<td align="center" bgcolor="#CCCCCC"><strong>คนที่</strong></td>
						<td align="center" bgcolor="#CCCCCC"><strong>ชื่อ-สกุล</strong></td>
						<td align="center" bgcolor="#CCCCCC"><strong>อาชีพ</strong></td>
						<td align="center" bgcolor="#CCCCCC"><strong>ที่ทำงาน/สถานศึกษา</strong></td>
						  </tr>
						  <tr>
							<td align="center" bgcolor="#F6F6F6"><input value="<? echo $form_data['b1'] == "0"? "" : $form_data['b1']; ?>" name="b1" size="4" maxlength="1" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input value="<?=$form_data['name_b1']?>" name="name_b1" size="45" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input value="<?=$form_data['occup_b1']?>" name="occup_b1" size="20" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input value="<?=$form_data['comp_b1']?>" name="comp_b1" size="20" type="text"></td>
						  </tr>
						  <tr>
							<td align="center" bgcolor="#F6F6F6"><input value="<? echo $form_data['b2'] == "0"? "" : $form_data['b2']; ?>" name="b2" size="4" maxlength="1" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input value="<?=$form_data['name_b2']?>" name="name_b2" size="45" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input value="<?=$form_data['occup_b2']?>" name="occup_b2" size="20" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input value="<?=$form_data['comp_b2']?>" name="comp_b2" size="20" type="text"></td>
						  </tr>
						  <tr>
							<td align="center" bgcolor="#F6F6F6"><input value="<? echo $form_data['b3'] == "0"? "" : $form_data['b3']; ?>" name="b3" size="4" maxlength="1" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input value="<?=$form_data['name_b3']?>" name="name_b3" size="45" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input value="<?=$form_data['occup_b3']?>" name="occup_b3" size="20" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input value="<?=$form_data['comp_b3']?>" name="comp_b3" size="20" type="text"></td>
						  </tr>
						  <tr>
							<td align="center" bgcolor="#F6F6F6"><input value="<? echo $form_data['b4'] == "0"? "" : $form_data['b4']; ?>" name="b4" size="4" maxlength="1" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input value="<?=$form_data['name_b4']?>" name="name_b4" size="45" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input value="<?=$form_data['occup_b4']?>" name="occup_b4" size="20" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input value="<?=$form_data['comp_b4']?>" name="comp_b4" size="20" type="text"></td>
						  </tr>
					  </tbody></table></td>
				</tr>
			</tbody>
			
			</table>

			<table border="0" cellpadding="5" cellspacing="1" width="100%">
			<tbody><tr>
					  <td colspan="4" bgcolor="#0892d0" width="100%"><span class="style1">ที่อยู่ผู้สมัคร</span></td>
				</tr>
					<tr>
					  <td colspan="4" bgcolor="#CCCCCC" width="100%"><strong>ที่อยู่ปัจจุบันที่สามารถติดต่อได้</strong></td>
				</tr>

					</tr>
						<tr>
						  <td align="right" bgcolor="#eeeded" width="150"><strong>ที่อยู่ :</strong></td>
						  <td colspan="3" bgcolor="#F6F6F6" width="220"><textarea id="cur_address" name="cur_address" cols="91" rows="2"><?=$form_data['cur_address']?></textarea></td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>* จังหวัด :</strong></td>
					  <td bgcolor="#F6F6F6" width="220">
							<select name="province">
								<option selected="selected" value="">------- โปรดเลือก -------</option>
							<?	foreach($province as $val){	?>
									<option <? if($form_data['cur_province'] == $val['province_id']) echo 'selected="selected"'; ?> value="<?=$val['province_id']?>"><?=$val['province_name']?></option>
							<?	}	?>		
							</select>
								</td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>* รหัสไปรษณีย์ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="province_code" maxlength="5" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['cur_postal_code']?>"> </td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>E-mail :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><?php print_input_text("cur_e_mail");?></td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>โทรศัพท์ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="cur_tel" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['cur_tel']?>"></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>โทรศัพท์เคลื่อนที่ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220">
						<input name="cur_mobile" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['cur_mobile']?>">
					  </td>
					  <td align="right" bgcolor="#eeeded" width="150">&nbsp;</td>
					  <td bgcolor="#F6F6F6" width="220">&nbsp;</td>
				</tr>
				<tr>
					  <td colspan="4" bgcolor="#CCCCCC" width="100%"><strong>ที่อยู่ตามทะเบียนบ้าน</strong></td>
				</tr>

					<tr>
						  <td align="right" bgcolor="#eeeded" width="150"><strong>ที่อยู่ :</strong></td>
						  <td colspan="3" bgcolor="#F6F6F6" width="220"><textarea name="home_address" cols="91" rows="2"><?=$form_data['home_address']?></textarea></td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>จังหวัด :</strong></td>
					  <td bgcolor="#F6F6F6" width="220">
							<select name="province2" onchange="document.myform.ck_address[1].checked = true;">
								<option value="" selected="selected">------- โปรดเลือก -------</option>
							<?	foreach($province as $val){	?>
									<option <? if($form_data['home_province'] == $val['province_id']) echo 'selected="selected"'; ?> value="<?=$val['province_id']?>"><?=$val['province_name']?></option>
							<?	}	?>								  
						  
						  </select>
					  
								</td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>รหัสไปรษณีย์ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="province_code2" maxlength="5" onkeypress=" document.myform.ck_address[1].checked = true;" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['home_postal_code']?>"></td>
					</tr>
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
						<tr>
						  <td bgcolor="#F6F6F6"><strong>สูงกว่าระดับอุดมศึกษา</strong></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="name_edu1" type="text" value="<?=$form_data['name_edu1']?>" size="15"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="type_edu1" type="text" value="<?=$form_data['type_edu1']?>" size="10"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="fac_edu1" type="text" value="<?=$form_data['fac_edu1']?>" size="15"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="major_edu1" type="text" value="<?=$form_data['major_edu1']?>" size="10"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="start_edu1" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['start_edu1']?>"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="stop_edu1" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['stop_edu1']?>"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="grade_edu1" size="3" maxlength="5" type="text" value="<?=$form_data['grade_edu1']?>"></td>
						</tr>
						<tr>
						  <td bgcolor="#F6F6F6"><strong>ระดับอุดมศึกษา</strong></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="name_edu2" type="text" value="<?=$form_data['name_edu2']?>" size="15"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="type_edu2" type="text" value="<?=$form_data['type_edu2']?>" size="10"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="fac_edu2" type="text" value="<?=$form_data['fac_edu2']?>" size="15"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="major_edu2" type="text" value="<?=$form_data['major_edu2']?>" size="10"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="start_edu2" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['start_edu2']?>"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="stop_edu2" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['stop_edu2']?>"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="grade_edu2" size="3" maxlength="5" type="text" value="<?=$form_data['grade_edu2']?>"></td>
						</tr>
						<tr>
						  <td bgcolor="#F6F6F6"><strong>ระดับอาชีวศึกษา/<br>
						  อนุปริญญา</strong></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="name_edu3" type="text" value="<?=$form_data['name_edu3']?>" size="15"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="type_edu3" type="text" value="<?=$form_data['type_edu3']?>" size="10"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="fac_edu3" type="text" value="<?=$form_data['fac_edu3']?>" size="15"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="major_edu3" type="text" value="<?=$form_data['major_edu3']?>" size="10"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="start_edu3" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['start_edu3']?>"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="stop_edu3" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['stop_edu3']?>"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="grade_edu3" size="3" maxlength="5" type="text" value="<?=$form_data['grade_edu3']?>"></td>
						</tr>
						<tr>
						  <td bgcolor="#F6F6F6"><strong>ระดับมัธยมศึกษา</strong></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="name_edu4" type="text" value="<?=$form_data['name_edu4']?>" size="15"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="type_edu4" type="text" value="<?=$form_data['type_edu4']?>" size="10"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="fac_edu4" type="text" value="<?=$form_data['fac_edu4']?>" size="15"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="major_edu4" type="text" value="<?=$form_data['major_edu4']?>" size="10"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="start_edu4" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['start_edu4']?>"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="stop_edu4" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['stop_edu4']?>"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="grade_edu4" size="3" maxlength="5" type="text" value="<?=$form_data['grade_edu4']?>"></td>
						</tr>
						<tr>
						  <td bgcolor="#F6F6F6"><strong>ระดับประถมศึกษา</strong></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="name_edu5" type="text" value="<?=$form_data['name_edu5']?>" size="15"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="type_edu5" type="text" value="<?=$form_data['type_edu5']?>" size="10"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="fac_edu5" type="text" value="<?=$form_data['fac_edu5']?>" size="15"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="major_edu5" type="text" value="<?=$form_data['major_edu5']?>" size="10"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="start_edu5" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['start_edu5']?>"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="stop_edu5" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['stop_edu5']?>"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="grade_edu5" size="3" maxlength="5" type="text" value="<?=$form_data['grade_edu5']?>"></td>
						</tr>
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
							<td colspan="4" align="left" bgcolor="#CCCCCC"><strong>บริษัท/หน่วยงานล่าสุด </strong>
								<input type="hidden" name="work_id1" value="<?	if(isset($work_history[0]["id"])){ echo $work_history[0]["id"]; }else{ echo "0"; } ?>" />
							</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED" width="200"><strong>ชื่อบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="company_name1" type="text" value="<? if(isset($work_history[0]['company_name'])){ echo $work_history[0]['company_name']; } ?>">&nbsp;</td>
							<td align="right" bgcolor="#EEEDED"><strong>ที่ตั้งบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="comp_addr1" type="text" value="<? if(isset($work_history[0]['comp_addr'])){ echo $work_history[0]['comp_addr']; } ?>">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>โทรศัพท์ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="comp_tel1" onkeyup="if(this.value*1!=this.value) this.value='' ;" size="8" type="text" value="<? if(isset($work_history[0]['comp_tel'])){ echo $work_history[0]['comp_tel']; } ?>">                &nbsp;</td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>เข้าทำงานเมื่อ :</strong>&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6"><input name="date_in1" type="text" id="date_in1" value="<? if(isset($work_history[0]['date_in'])){ echo $work_history[0]['date_in']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="posi_in1" type="text" value="<? if(isset($work_history[0]['posi_in'])){ echo $work_history[0]['posi_in']; } ?>"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong> ลาออกเมื่อ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="date_out1" type="text" id="date_out1" value="<? if(isset($work_history[0]['date_out'])){ echo $work_history[0]['date_out']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="posi_out1" type="text" value="<? if(isset($work_history[0]['posi_out'])){ echo $work_history[0]['posi_out']; } ?>"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>หน้าที่/ความรับผิดชอบครั้งสุดท้าย : </strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="responsibility1" type="text" value="<? if(isset($work_history[0]['responsibility'])){ echo $work_history[0]['responsibility']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>เงินเดือนเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="salary_in1" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<? if(isset($work_history[0]['salary_in'])){ echo $work_history[0]['salary_in']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED"><strong> เงินเดือนครั้งล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="salary_out1" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<? if(isset($work_history[0]['salary_out'])){ echo $work_history[0]['salary_out']; } ?>"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>ชื่อผู้บังคับบัญชาคนล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="manager1" type="text" value="<? if(isset($work_history[0]['manager'])){ echo $work_history[0]['manager']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>สาเหตุที่ออก :</strong></td>
							<td colspan="3" align="left" bgcolor="#F6F6F6"><textarea name="remark1" cols="50" rows="2"><? if(isset($work_history[0]['remark'])){ echo $work_history[0]['remark']; } ?></textarea></td>
						  </tr>
						  <tr>
							<td colspan="4" align="left" bgcolor="#CCCCCC"><strong>บริษัท/หน่วยงาน อันดับรอง 1 </strong>
								<input type="hidden" name="work_id2" value="<?	if(isset($work_history[1]["id"])){ echo $work_history[1]["id"]; }else{ echo "0"; } ?>" />
							</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>ชื่อบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="company_name2" type="text" value="<? if(isset($work_history[1]['company_name'])){ echo $work_history[1]['company_name']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED"><strong>ที่ตั้งบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="comp_addr2" type="text" value="<? if(isset($work_history[1]['comp_addr'])){ echo $work_history[1]['comp_addr']; } ?>"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>โทรศัพท์ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="comp_tel2" onkeyup="if(this.value*1!=this.value) this.value='' ;" size="8" type="text" value="<? if(isset($work_history[1]['comp_tel'])){ echo $work_history[1]['comp_tel']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>เข้าทำงานเมื่อ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="date_in2" type="text" id="date_in2" value="<? if(isset($work_history[1]['date_in'])){ echo $work_history[1]['date_in']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="posi_in2" type="text" value="<? if(isset($work_history[1]['posi_in'])){ echo $work_history[1]['posi_in']; } ?>"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>ลาออกเมื่อ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="date_out2" type="text" id="date_out2" value="<? if(isset($work_history[1]['date_out'])){ echo $work_history[1]['date_out']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="posi_out2" type="text" value="<? if(isset($work_history[1]['posi_out'])){ echo $work_history[1]['posi_out']; } ?>"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>หน้าที่/ความรับผิดชอบครั้งสุดท้าย :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="responsibility2" type="text" value="<? if(isset($work_history[1]['responsibility'])){ echo $work_history[1]['responsibility']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED" height="29"><strong>เงินเดือนเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="salary_in2" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<? if(isset($work_history[1]['salary_in'])){ echo $work_history[1]['salary_in']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED"><strong>เงินเดือนครั้งล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="salary_out2" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<? if(isset($work_history[1]['salary_out'])){ echo $work_history[1]['salary_out']; } ?>"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>ชื่อผู้บังคับบัญชาคนล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="manager2" type="text" value="<? if(isset($work_history[1]['manager'])){ echo $work_history[1]['manager']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>สาเหตุที่ออก :</strong></td>
							<td colspan="3" align="left" bgcolor="#F6F6F6"><textarea name="remark2" cols="50" rows="2"><? if(isset($work_history[1]['remark'])){ echo $work_history[1]['remark']; } ?></textarea></td>
						  </tr>
						  <tr>
							<td colspan="4" align="left" bgcolor="#CCCCCC"><strong>บริษัท/หน่วยงาน อันดับรอง 2 </strong>
								<input type="hidden" name="work_id3" value="<?	if(isset($work_history[2]["id"])){ echo $work_history[2]["id"]; }else{ echo "0"; } ?>" />
							</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>ชื่อบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="company_name3" type="text" value="<? if(isset($work_history[2]['company_name'])){ echo $work_history[2]['company_name']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED"><strong>ที่ตั้งบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="comp_addr3" type="text" value="<? if(isset($work_history[2]['comp_addr'])){ echo $work_history[2]['comp_addr']; } ?>"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>โทรศัพท์ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="comp_tel3" onkeyup="if(this.value*1!=this.value) this.value='' ;" size="8" type="text" value="<? if(isset($work_history[2]['comp_tel'])){ echo $work_history[2]['comp_tel']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>เข้าทำงานเมื่อ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="date_in3" type="text" id="date_in3" value="<? if(isset($work_history[2]['date_in'])){ echo $work_history[2]['date_in']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="posi_in3" type="text" value="<? if(isset($work_history[2]['posi_in'])){ echo $work_history[2]['posi_in']; } ?>"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>&nbsp; ลาออกเมื่อ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="date_out3" type="text" id="date_out3" value="<? if(isset($work_history[2]['date_out'])){ echo $work_history[2]['date_out']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="posi_out3" type="text" value="<? if(isset($work_history[2]['posi_out'])){ echo $work_history[2]['posi_out']; } ?>"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>หน้าที่/ความรับผิดชอบครั้งสุดท้าย</strong> :</td>
							<td align="left" bgcolor="#F6F6F6"><input name="responsibility3" type="text" value="<? if(isset($work_history[2]['responsibility'])){ echo $work_history[2]['responsibility']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>เงินเดือนเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="salary_in3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<? if(isset($work_history[2]['salary_in'])){ echo $work_history[2]['salary_in']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp; <strong> เงินเดือนครั้งล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="salary_out3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<? if(isset($work_history[2]['salary_out'])){ echo $work_history[2]['salary_out']; } ?>"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>ชื่อผู้บังคับบัญชาคนล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="manager3" type="text" value="<? if(isset($work_history[2]['manager'])){ echo $work_history[2]['manager']; } ?>"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>สาเหตุที่ออก :</strong></td>
							<td colspan="3" align="left" bgcolor="#F6F6F6"><textarea name="remark3" cols="50" rows="2"><? if(isset($work_history[2]['remark'])){ echo $work_history[2]['remark']; } ?></textarea></td>
						  </tr>
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
						<tr align="center">
						  <td rowspan="2" bgcolor="#F6F6F6">1</td>
						  <td bgcolor="#F6F6F6"><input name="train1" style="width:98%;" type="text" value="<?=$form_data['train1']?>"></td>
						  <td bgcolor="#F6F6F6"><input name="place1" style="width:98%;" type="text" value="<?=$form_data['place1']?>"></td>
						</tr>
						<tr align="center">
						  <td colspan="2" align="left" bgcolor="#F6F6F6"><span xml:lang="th" lang="th">ตั้งแต่ วันที่ </span>
							<input name="train_from1" type="text" id="train_from1" value="<?=$form_data['train_from1']?>">
							&nbsp;ถึง&nbsp;
							<input name="train_to1" type="text" id="train_to1" value="<?=$form_data['train_to1']?>">
						  </td>
						</tr>
						<tr align="center">
						  <td rowspan="2" bgcolor="#F6F6F6">2</td>
						  <td bgcolor="#F6F6F6"><input name="train2" style="width:98%;" type="text" value="<?=$form_data['train2']?>"></td>
						  <td bgcolor="#F6F6F6"><input name="place2" style="width:98%;" type="text" value="<?=$form_data['place2']?>"></td>
						</tr>
						<tr align="center">
						  <td colspan="2" align="left" bgcolor="#F6F6F6"><span xml:lang="th" lang="th">ตั้งแต่ วันที่ </span>
							<input name="train_from2" type="text" id="train_from2" value="<?=$form_data['train_from2']?>">
							&nbsp;ถึง&nbsp;
							<input name="train_to2" type="text" id="train_to2" value="<?=$form_data['train_to2']?>">
						  </td>
						</tr>
						<tr align="center">
						  <td rowspan="2" bgcolor="#F6F6F6">3</td>
						  <td bgcolor="#F6F6F6"><input name="train3" style="width:98%;" type="text" value="<?=$form_data['train3']?>"></td>
						  <td bgcolor="#F6F6F6"><input name="place3" style="width:98%;" type="text" value="<?=$form_data['place3']?>"></td>
						</tr>
						<tr align="center">
						  <td colspan="2" align="left" bgcolor="#F6F6F6"><span xml:lang="th" lang="th">ตั้งแต่ วันที่ </span>
							<input name="train_from3" type="text" id="train_from3" value="<?=$form_data['train_from3']?>">
							&nbsp;ถึง&nbsp;
							<input name="train_to3" type="text" id="train_to3" value="<?=$form_data['train_to3']?>">
						  </td>
						</tr>
					  </tbody></table></td>
				</tr>
			</tbody>
			</table>

			<table border="0" cellpadding="5" cellspacing="1" width="100%">
			<tbody><tr>
					  <td colspan="4" bgcolor="#0892d0"><span class="style1">โครงการ/ผลงาน/เกียรติประวัติ</span></td>
				</tr>
					<tr align="center">
					  <td align="right" bgcolor="#EEEDED" valign="middle" width="135"><strong>โครงการ/ผลงาน :</strong></td>
					  <td colspan="3" align="left" bgcolor="#F6F6F6" valign="middle" width="622" height="28">&nbsp;
					  <textarea name="performance" cols="75" rows="5"><?=$form_data['performance']?></textarea> </td>
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
						<tr align="center">
						  <td bgcolor="#F6F6F6" width="190"><input name="name_refer1" type="text" value="<?=$form_data['name_refer1']?>"></td>
						  <td bgcolor="#F6F6F6" width="220"><input name="company_refer1" type="text" value="<?=$form_data['company_refer1']?>"></td>
						  <td bgcolor="#F6F6F6" width="170"><input name="position_refer1" type="text" value="<?=$form_data['position_refer1']?>"></td>
						  <td bgcolor="#F6F6F6" width="150"><input name="tel_refer1" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['tel_refer1']?>"></td>
						</tr>
						<tr align="center">
						  <td bgcolor="#F6F6F6" width="190"><input name="name_refer2" type="text" value="<?=$form_data['name_refer2']?>"></td>
						  <td bgcolor="#F6F6F6" width="220"><input name="company_refer2" type="text" value="<?=$form_data['company_refer2']?>"></td>
						  <td bgcolor="#F6F6F6" width="170"><input name="position_refer2" type="text" value="<?=$form_data['position_refer2']?>"></td>
						  <td bgcolor="#F6F6F6" width="150"><input name="tel_refer2" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['tel_refer2']?>"></td>
						</tr>
						<tr align="center">
						  <td bgcolor="#F6F6F6" width="190"><input name="name_refer3" type="text" value="<?=$form_data['name_refer3']?>"></td>
						  <td bgcolor="#F6F6F6" width="220"><input name="company_refer3" type="text" value="<?=$form_data['company_refer3']?>"></td>
						  <td bgcolor="#F6F6F6" width="170"><input name="position_refer3" type="text" value="<?=$form_data['position_refer3']?>"></td>
						  <td bgcolor="#F6F6F6" width="150"><input name="tel_refer3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['tel_refer3']?>"></td>
						</tr>
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
				<tr>
				  <td align="right" bgcolor="#EEEDED" valign="top" width="150"><strong>ภาษาต่างประเทศ 1 :</strong></td>
				  <td colspan="3" bgcolor="#F6F6F6"><input name="language1" id="language1" size="10" onkeypress="document.myform.level_speak1.disabled=false;document.myform.level_write1.disabled=false;document.myform.level_listen1.disabled=false;" type="text" value="<?=$form_data['language1']?>"></td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED" valign="top" width="150"><b>พูด :</b></td>
				  <td colspan="3" bgcolor="#F6F6F6">
						<select size="1" name="level_speak1">
							<option <? echo $form_data['level_speak1'] == "-" ? 'selected="selected"' : '' ;?>value="-">--- โปรดเลือก ---</option>
							<option <? echo $form_data['level_speak1'] == "พอใช้" ? 'selected="selected"' : '';?> value="พอใช้">พอใช้</option> 
							<option <? echo $form_data['level_speak1'] == "ดี" ? 'selected="selected"' : '';?> value="ดี">ดี</option>         
							<option <? echo $form_data['level_speak1'] == "ดีมาก" ? 'selected="selected"' : '';?>value="ดีมาก">ดีมาก</option>     
						</select>
					&nbsp; &nbsp; &nbsp; <b>เขียน :</b> 
						<select size="1" name="level_write1">
							<option <? echo $form_data['level_write1'] == "-" ? 'selected="selected"' : '' ;?>value="-">--- โปรดเลือก ---</option>
							<option <? echo $form_data['level_write1'] == "พอใช้" ? 'selected="selected"' : '';?> value="พอใช้">พอใช้</option> 
							<option <? echo $form_data['level_write1'] == "ดี" ? 'selected="selected"' : '';?> value="ดี">ดี</option>         
							<option <? echo $form_data['level_write1'] == "ดีมาก" ? 'selected="selected"' : '';?>value="ดีมาก">ดีมาก</option>     
						</select>
					&nbsp; &nbsp; &nbsp; <b>ฟัง : </b>
						<select size="1" name="level_listen1">
							<option <? echo $form_data['level_listen1'] == "-" ? 'selected="selected"' : '' ;?>value="-">--- โปรดเลือก ---</option>
							<option <? echo $form_data['level_listen1'] == "พอใช้" ? 'selected="selected"' : '';?> value="พอใช้">พอใช้</option> 
							<option <? echo $form_data['level_listen1'] == "ดี" ? 'selected="selected"' : '';?> value="ดี">ดี</option>         
							<option <? echo $form_data['level_listen1'] == "ดีมาก" ? 'selected="selected"' : '';?>value="ดีมาก">ดีมาก</option>    
						</select>

			 </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED" valign="top"><strong>ภาษาต่างประเทศ 2 :</strong></td>
				  <td colspan="3" bgcolor="#F6F6F6">  
				  <input name="language2" id="language2" size="10" onkeypress="document.myform.level_speak2.disabled=false;document.myform.level_write2.disabled=false;document.myform.level_listen2.disabled=false;" type="text" value="<?=$form_data['language2']?>"></td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED" valign="top"><b>พูด :</b></td>
				  <td colspan="3" bgcolor="#F6F6F6">
						<select size="1" name="level_speak2">
							<option <? echo $form_data['level_speak2'] == "-" ? 'selected="selected"' : '' ;?>value="-">--- โปรดเลือก ---</option>
							<option <? echo $form_data['level_speak2'] == "พอใช้" ? 'selected="selected"' : '';?> value="พอใช้">พอใช้</option> 
							<option <? echo $form_data['level_speak2'] == "ดี" ? 'selected="selected"' : '';?> value="ดี">ดี</option>         
							<option <? echo $form_data['level_speak2'] == "ดีมาก" ? 'selected="selected"' : '';?>value="ดีมาก">ดีมาก</option>    
						</select>
					 &nbsp; &nbsp; &nbsp; <b>เขียน :</b> 
						<select size="1" name="level_write2">
							<option <? echo $form_data['level_write2'] == "-" ? 'selected="selected"' : '' ;?>value="-">--- โปรดเลือก ---</option>
							<option <? echo $form_data['level_write2'] == "พอใช้" ? 'selected="selected"' : '';?> value="พอใช้">พอใช้</option> 
							<option <? echo $form_data['level_write2'] == "ดี" ? 'selected="selected"' : '';?> value="ดี">ดี</option>         
							<option <? echo $form_data['level_write2'] == "ดีมาก" ? 'selected="selected"' : '';?>value="ดีมาก">ดีมาก</option>    
						</select>
					&nbsp; &nbsp; &nbsp; <b>ฟัง : </b>
						<select size="1" name="level_listen2">
							<option <? echo $form_data['level_listen2'] == "-" ? 'selected="selected"' : '' ;?>value="-">--- โปรดเลือก ---</option>
							<option <? echo $form_data['level_listen2'] == "พอใช้" ? 'selected="selected"' : '';?> value="พอใช้">พอใช้</option> 
							<option <? echo $form_data['level_listen2'] == "ดี" ? 'selected="selected"' : '';?> value="ดี">ดี</option>         
							<option <? echo $form_data['level_listen2'] == "ดีมาก" ? 'selected="selected"' : '';?>value="ดีมาก">ดีมาก</option>    
						</select>
					</td>
				</tr>
				<tr>
				  <td colspan="4" align="left" bgcolor="#CCCCCC"><strong>ความสามารถด้าน Computer</strong></td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 1 :</strong></td>
				  <td bgcolor="#F6F6F6" width="100"><input name="computer1" size="10" type="text" value="<?=$form_data['computer1']?>"></td>
				  <td align="right" bgcolor="#EEEDED" width="100"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6">        
						<select size="1" name="level_use1">
							<option <? echo $form_data['level_use1'] == "-" ? 'selected="selected"' : '' ;?>value="-">--- โปรดเลือก ---</option>
							<option <? echo $form_data['level_use1'] == "พอใช้" ? 'selected="selected"' : '';?> value="พอใช้">พอใช้</option> 
							<option <? echo $form_data['level_use1'] == "ดี" ? 'selected="selected"' : '';?> value="ดี">ดี</option>         
							<option <? echo $form_data['level_use1'] == "ดีมาก" ? 'selected="selected"' : '';?>value="ดีมาก">ดีมาก</option>    
						</select>
				  </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 2 :</strong></td>
				  <td bgcolor="#F6F6F6" width="100"><input name="computer2" size="10" type="text" value="<?=$form_data['computer2']?>"></td>
				  <td align="right" bgcolor="#EEEDED" width="100"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6">        
						<select size="1" name="level_use2">
							<option <? echo $form_data['level_use2'] == "-" ? 'selected="selected"' : '' ;?>value="-">--- โปรดเลือก ---</option>
							<option <? echo $form_data['level_use2'] == "พอใช้" ? 'selected="selected"' : '';?> value="พอใช้">พอใช้</option> 
							<option <? echo $form_data['level_use2'] == "ดี" ? 'selected="selected"' : '';?> value="ดี">ดี</option>         
							<option <? echo $form_data['level_use2'] == "ดีมาก" ? 'selected="selected"' : '';?>value="ดีมาก">ดีมาก</option>    
						</select>
				  </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 3 :</strong></td>
				  <td bgcolor="#F6F6F6" width="100"><input name="computer3" size="10" type="text" value="<?=$form_data['computer3']?>"></td>
				  <td align="right" bgcolor="#EEEDED" width="100"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6">        
						<select size="1" name="level_use3">
							<option <? echo $form_data['level_use3'] == "-" ? 'selected="selected"' : '' ;?>value="-">--- โปรดเลือก ---</option>
							<option <? echo $form_data['level_use3'] == "พอใช้" ? 'selected="selected"' : '';?> value="พอใช้">พอใช้</option> 
							<option <? echo $form_data['level_use3'] == "ดี" ? 'selected="selected"' : '';?> value="ดี">ดี</option>         
							<option <? echo $form_data['level_use3'] == "ดีมาก" ? 'selected="selected"' : '';?>value="ดีมาก">ดีมาก</option>    
						</select>
				  </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 4 :</strong></td>
				  <td bgcolor="#F6F6F6" width="100"><input name="computer4" size="10" type="text" value="<?=$form_data['computer4']?>"></td>
				  <td align="right" bgcolor="#EEEDED" width="100"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6">        
						<select size="1" name="level_use4">
							<option <? echo $form_data['level_use4'] == "-" ? 'selected="selected"' : '' ;?>value="-">--- โปรดเลือก ---</option>
							<option <? echo $form_data['level_use4'] == "พอใช้" ? 'selected="selected"' : '';?> value="พอใช้">พอใช้</option> 
							<option <? echo $form_data['level_use4'] == "ดี" ? 'selected="selected"' : '';?> value="ดี">ดี</option>         
							<option <? echo $form_data['level_use4'] == "ดีมาก" ? 'selected="selected"' : '';?>value="ดีมาก">ดีมาก</option>    
						</select>
				  </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 5 :</strong></td>
				  <td bgcolor="#F6F6F6" width="100"><input name="computer5" size="10" type="text" value="<?=$form_data['computer5']?>"></td>
				  <td align="right" bgcolor="#EEEDED" width="100"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6">        
						<select size="1" name="level_use5">
							<option <? echo $form_data['level_use5'] == "-" ? 'selected="selected"' : '' ;?>value="-">--- โปรดเลือก ---</option>
							<option <? echo $form_data['level_use5'] == "พอใช้" ? 'selected="selected"' : '';?> value="พอใช้">พอใช้</option> 
							<option <? echo $form_data['level_use5'] == "ดี" ? 'selected="selected"' : '';?> value="ดี">ดี</option>         
							<option <? echo $form_data['level_use5'] == "ดีมาก" ? 'selected="selected"' : '';?>value="ดีมาก">ดีมาก</option>    
						</select>
				  </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 6 :</strong></td>
				  <td bgcolor="#F6F6F6" width="100"><input name="computer6" size="10" type="text" value="<?=$form_data['computer6']?>"></td>
				  <td align="right" bgcolor="#EEEDED" width="100"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6">        
						<select size="1" name="level_use6">
							<option <? echo $form_data['level_use6'] == "-" ? 'selected="selected"' : '' ;?>value="-">--- โปรดเลือก ---</option>
							<option <? echo $form_data['level_use6'] == "พอใช้" ? 'selected="selected"' : '';?> value="พอใช้">พอใช้</option> 
							<option <? echo $form_data['level_use6'] == "ดี" ? 'selected="selected"' : '';?> value="ดี">ดี</option>         
							<option <? echo $form_data['level_use6'] == "ดีมาก" ? 'selected="selected"' : '';?>value="ดีมาก">ดีมาก</option>    
						</select>
				  </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"> <strong>พิมพ์ดีดไทย :</strong></td>
				  <td align="left" bgcolor="#F6F6F6"><input name="type_th" size="10" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['type_th']?>"></td>
				  <td colspan="2" align="left" bgcolor="#EEEDED"> คำ/นาที </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>พิมพ์ดีดอังกฤษ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6"><input name="type_en" size="10" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" value="<?=$form_data['type_en']?>"></td>
				  <td colspan="2" align="left" bgcolor="#EEEDED"> คำ/นาที </td>
				</tr>
				<tr>
				  <td colspan="4" style="padding:0px;" align="left" bgcolor="#EEEDED"><table bgcolor="#FFFFFF" border="0" cellpadding="5" cellspacing="1" width="100%">
					
					<tbody><tr>
					  <td colspan="2" bgcolor="#CCCCCC"><strong>ความสามารถในการขับรถ</strong></td>
					  </tr>
					<tr>
					  <td align="right" bgcolor="#EEEDED" width="199"><strong>ความสามารถในการขับรถ :</strong></td>
					  <td bgcolor="#F6F6F6" width="648">
					  <input name="ck_drive" value="1" type="radio" <? echo $form_data['ck_drive'] == 1 ? 'checked="checked"' : '';?>> รถยนต์&nbsp;
					  
					  <input name="ck_drive" value="2" type="radio"<? echo $form_data['ck_drive'] == 2 ? 'checked="checked"' : '';?>> รถจักรยานยนต์&nbsp;
					  
					  <input name="ck_drive" value="3" type="radio"<? echo $form_data['ck_drive'] == 3 ? 'checked="checked"' : '';?>> มีทั้งสอง&nbsp;
					  
					  <input name="ck_drive" value="4" type="radio"<? echo $form_data['ck_drive'] == 4 ? 'checked="checked"' : '';?>> ไม่มี 
						</td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#EEEDED"><strong>มีใบขับขี่ :</strong></td>
					  <td bgcolor="#F6F6F6">
						<input name="ck_cardrive" value="1" type="radio" <? echo $form_data['ck_cardrive'] == 1 ? 'checked="checked"' : '';?>/> รถยนต์&nbsp;
						<input name="ck_cardrive" value="2" type="radio" <? echo $form_data['ck_cardrive'] == 2 ? 'checked="checked"' : '';?>/> รถจักรยานยนต์&nbsp; 
						<input name="ck_cardrive" value="3" type="radio" <? echo $form_data['ck_cardrive'] == 3 ? 'checked="checked"' : '';?>/> มีทั้งสอง&nbsp;
						<input name="ck_cardrive" value="4" type="radio" <? echo $form_data['ck_cardrive'] == 4 ? 'checked="checked"' : '';?>/> ไม่มี 

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
				  <td colspan="2" bgcolor="#F6F6F6" height="50">
				
					<input name="ck_home" value="1" <? echo $form_data['ck_home'] == 1 ? 'checked="checked"' : '';?> onclick="document.myform.ck_home_detail.disabled=true; document.myform.ck_home_detail.value='';" type="radio">  เป็นของตนเอง&nbsp;
					<input name="ck_home" value="2" <? echo $form_data['ck_home'] == 2 ? 'checked="checked"' : '';?> onclick="document.myform.ck_home_detail.disabled=true; document.myform.ck_home_detail.value='';" type="radio">  บ้านเช่าซื้ออยู่ระหว่างผ่อนชำระ&nbsp;
					<input name="ck_home" value="3" <? echo $form_data['ck_home'] == 3 ? 'checked="checked"' : '';?> onclick="document.myform.ck_home_detail.disabled=true; document.myform.ck_home_detail.value='';" type="radio">  หอพัก<br>
					<input name="ck_home" value="4" <? echo $form_data['ck_home'] == 4 ? 'checked="checked"' : '';?> onclick="document.myform.ck_home_detail.disabled=true; document.myform.ck_home_detail.value='';" type="radio">  บ้านเช่าอยู่เอง&nbsp;
					<input name="ck_home" value="5" <? echo $form_data['ck_home'] == 5 ? 'checked="checked"' : '';?> onclick="document.myform.ck_home_detail.disabled=false;" type="radio">  อาศัยผู้อื่นอยู่ (ระบุความสัมพันธ์) 
					<input name="ck_home_detail" onkeypress=" document.myform.ck_home[4].checked = true;" type="text">      </td>
				</tr>
				<tr bgcolor="#D5FFEA">
				  <td align="right" bgcolor="#EEEDED" valign="top" width="203" height="36"><strong>การมีพาหนะเป็นของตนเอง :</strong></td>
				  <td bgcolor="#F6F6F6" width="290">

			
					<input name="ck_car" value="1" <? echo $form_data['ck_car'] == 1 ? 'checked="checked"' : '';?> onclick="$('.secar').show();$('.isCar').show();" type="radio">  มี&nbsp;
					<span class="secar">
						<input name="ck_cartype1" value="1" type="checkbox" <? echo $form_data['ck_car'] == 1 && $form_data['ck_cartype1'] == 1 ? 'checked="checked"' : '';?>>  รถยนต์&nbsp;
						<input name="ck_cartype2" value="1" type="checkbox" <? echo $form_data['ck_car'] == 1 && $form_data['ck_cartype2'] == 1 ? 'checked="checked"' : '';?>> รถจักรยานยนต์</span>
							<br>
					<input name="ck_car" value="2" <? echo $form_data['ck_car'] == 2 ? 'checked="checked"' : '';?> onclick="$('.secar').hide();$('.isCar').hide();" type="radio">  ไม่มี 
					</td>
				  <td bgcolor="#F6F6F6" width="353"><div class="isCar">
						 โดย :&nbsp;<br>
					  <input name="ck_car_status" value="1" <? echo $form_data['ck_car'] == 1 && $form_data['ck_car_status'] == 1 ? 'checked="checked"' : '';?> type="radio">          อยู่ระหว่างการผ่อน<br>
					  <input name="ck_car_status" value="2" <? echo $form_data['ck_car'] == 1 && $form_data['ck_car_status'] == 2 ? 'checked="checked"' : '';?> type="radio">  
					  ชำระหมดแล้ว
					</div>
				  </td>
				</tr>
			  </tbody></table>

			<table border="0" cellpadding="5" cellspacing="1" width="100%">
					<tbody><tr>
					  <td colspan="2" bgcolor="#0892d0"><span class="style1">อื่น ๆ</span></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#EEEDED" width="33%"><span><strong>* งานอดิเรก :</strong></span></td>
					  <td align="left" bgcolor="#F6F6F6" width="67%"><input name="hobby" maxlength="350" type="text" value="<?=$form_data['hobby']?>"></td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#EEEDED"><span><strong>* ท่านเคยได้รับการผ่าตัดหรือไม่ : </strong></span></td>
					  <td align="left" bgcolor="#F6F6F6">
						<input name="ck_sick" value="1" <? echo $form_data['ck_sick'] == 1 ? 'checked="checked"' : '';?> onclick="document.myform.sick_detail.disabled=true;" type="radio">ไม่เคย&nbsp;
						<input name="ck_sick" value="2" <? echo $form_data['ck_sick'] == 2 ? 'checked="checked"' : '';?> onclick="document.myform.sick_detail.disabled=false;" type="radio">เคย&nbsp; <span class="ck_sick">
						<input name="sick_detail" type="text" <? echo $form_data['ck_sick'] == 1 ? 'disabled="true"' : 'value="'.$form_data['sick_detail'].'"';?> ></span></td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#EEEDED"><span><strong>* ท่านเคยมีโรคประจำตัวหรือไม่ : </strong></span></td>
					  <td align="left" bgcolor="#F6F6F6">
						<input name="ck_health" value="1" <? echo $form_data['ck_health'] == 1 ? 'checked="checked"' : '';?> onclick="document.myform.health_detail.disabled=true;" type="radio">ไม่มี&nbsp;
						<input name="ck_health" value="2" <? echo $form_data['ck_health'] == 2 ? 'checked="checked"' : '';?> onclick="document.myform.health_detail.disabled=false;" type="radio">มี&nbsp; <span class="ck_health">
						<input name="health_detail" type="text" <? echo $form_data['ck_health'] == 1 ? 'disabled="true"' : 'value="'.$form_data['health_detail'].'"';?>></span></td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#EEEDED"><span><strong>ท่านเคยฟ้องร้องหรือถูกฟ้องร้องต่อศาลหรือไม่ :</strong></span></td>
					  <td align="left" bgcolor="#F6F6F6">
						<input name="ck_accuse" value="1" <? echo $form_data['ck_accuse'] == 1 ? 'checked="checked"' : '';?> type="radio">ไม่เคย
						<input name="ck_accuse" value="2" <? echo $form_data['ck_accuse'] == 2 ? 'checked="checked"' : '';?> type="radio">เคย&nbsp;</td>
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
					<textarea name="think_in_work" cols="85" rows="4" onkeyup="count(event)" style="width:98%;"><?=$form_data['think_in_work']?></textarea></td>
				</tr>
				<tr>
					<td colspan="4" bgcolor="#EEEDED">
					<strong>ท่านวางแผนในอนาคตของท่านอย่างไร ภายใน 5 ปีข้างหน้า :</strong> *
					( <em>ท่านสามารถกรอกข้อมูลได้สูงสุด <span class="input2">300</span>
					ตัวอักษร</em> ) <br>
					<textarea name="plan_in_future" cols="85" rows="4" onkeyup="countt(event)" style="width:98%;"><?=$form_data['plan_in_future']?></textarea>	  </td>
				</tr>

				<tr>
					<td colspan="4" bgcolor="#EEEDED"><strong>ท่านคิดว่าคุณสมบัติใดที่จะเป็นกุญแจแห่งความสำเร็จในการงานของท่าน </strong>: *
					( <em>ท่านสามารถกรอกข้อมูลได้สูงสุด <span class="input3">300</span>
					ตัวอักษร </em>) <br>
				  <textarea name="success_in_work" cols="85" rows="4" onkeyup="counttt(event)" style="width:98%;"><?=$form_data['success_in_work']?></textarea>		</td>
				</tr>
			</tbody></table>

			<table border="0" cellpadding="5" cellspacing="1" width="100%">
			<tbody><tr>
				<td colspan="4" bgcolor="#0892d0" width="100%"><span class="style1">ทราบข่าวการสมัครงานจาก</span></td>
				</tr>
					<tr bgcolor="#D6C9D5">
					  <td bgcolor="#EEEDED" height="36"><input name="know_news" value="1" type="checkbox" <? echo $form_data['know_news'] == 1 ? 'checked="checked"' : '';?>>  หนังสือพิมพ์ชื่อ </td>
					  <td bgcolor="#F6F6F6"><input name="know_news_detail" type="text" value="<?=$form_data['know_news_detail']?>"></td>
					  <td bgcolor="#EEEDED"><input name="know_employee" value="1" type="checkbox" <? echo $form_data['know_employee'] == 1 ? 'checked="checked"' : '';?>> พนักงานบริษัทชื่อ </td>
					  <td bgcolor="#F6F6F6"><input name="know_employee_detail" type="text" value="<?=$form_data['know_employee_detail']?>"></td>
				</tr>
					<tr bgcolor="#D6C9D5">
					  <td bgcolor="#EEEDED" height="36"><input name="know_internet" value="1" type="checkbox" <? echo $form_data['know_internet'] == 1 ? 'checked="checked"' : '';?>> Internet Site </td>
					  <td bgcolor="#F6F6F6"><input name="know_internet_detail" type="text" value="<?=$form_data['know_internet_detail']?>"></td>
					  <td bgcolor="#EEEDED"><input name="know_market" value="1" type="checkbox" <? echo $form_data['know_market'] == 1 ? 'checked="checked"' : '';?>>  ตลาดนัดแรงงาน </td>
					  <td bgcolor="#F6F6F6"><input name="know_market_detail" type="text" value="<?=$form_data['know_market_detail']?>"></td>
				</tr>
					<tr bgcolor="#D6C9D5">
					  <td bgcolor="#EEEDED" height="36"><input name="know_school" value="1" type="checkbox" <? echo $form_data['know_school'] == 1 ? 'checked="checked"' : '';?>> สถาบันการศึกษาชื่อ </td>
					  <td bgcolor="#F6F6F6"><input name="know_school_detail" type="text" value="<?=$form_data['know_school_detail']?>"></td>
					  <td bgcolor="#EEEDED"><input name="know_etc" value="1" type="checkbox" <? echo $form_data['know_etc'] == 1 ? 'checked="checked"' : '';?>> อื่น ๆ โปรดระบุ </td>
					  <td bgcolor="#F6F6F6"><input name="know_etc_detail" type="text" value="<?=$form_data['know_etc_detail']?>"></td>
				</tr>
					<tr bgcolor="#D6C9D5">
					  <td colspan="2" bgcolor="#EEEDED" height="36"><input name="know_website" value="1" type="checkbox" <? echo $form_data['know_website'] == 1 ? 'checked="checked"' : '';?>> Web Site บริษัท (www.hitera.com) </td>
					  <td colspan="2" bgcolor="#EEEDED"><input name="know_board" value="1" type="checkbox" <? echo $form_data['know_board'] == 1 ? 'checked="checked"' : '';?>> บอร์ดบริษัทหรือสอบถามโดยตรง </td>
				</tr>
			</tbody></table>

			<table border="0" cellpadding="5" cellspacing="1" width="100%">
			<tbody><tr>
					  <td colspan="4" bgcolor="#0892d0" width="100%">
						<span class="style1">ข้อมูลเพิ่มเติม (เช่น เรื่องที่สนใจเป็นพิเศษ, คุณสมบัติอื่น ๆ เป็นต้น)</span>
					  </td>
				</tr>
					<tr style="padding-bottom:10px ">
					  <td align="center" bgcolor="#EEEDED" height="79"> (ท่านสามารถกรอกข้อมูลได้สูงสุด
					  <span class="input4">190</span> ตัวอักษร) <br>
					  <textarea name="other" cols="60" rows="6" onkeyup="countother(event)"><?=$form_data['other']?></textarea></td>
				</tr>
			</tbody></table>
			<br>
			<center>
				<?php print_input_hidden("applicant_id");?>
				<input value="Send" type="submit"> &nbsp;
				<input name="clear" value="Reset" onclick=" if(confirm('Are you sure to reset this form?')) {document.myform.reset();}" type="button">
			</center>
</form>

<script> 

	$("#myform").validate({
		   		rules: {
		   			citizen_id: 
		   			{
			     		required:true
		      		}
  			 		,position1: 
   			 		{
						required: true
				    }
					,salary:
					{
						required: true
					}
					,name_th: 
   			 		{
						required: true
				    }
					,surname_th: 
   			 		{
						required: true
				    }
					,name_en: 
   			 		{
						required: true
				    }
					,surname_en: 
   			 		{
						required: true
				    }
					,birth_date: 
   			 		{
						required: true
				    }
					,age: 
   			 		{
						required: true
				    }
					,height: 
   			 		{
						required: true
				    }
					,weight: 
   			 		{
						required: true
				    }
					,nationality: 
   			 		{
						required: true
				    }

					,name_fa: 
   			 		{
						required: true
				    }
					,surname_fa: 
   			 		{
						required: true
				    }
					,nation_fa: 
   			 		{
						required: true
				    }
					,name_mom: 
   			 		{
						required: true
				    }
					,surname_mom: 
   			 		{
						required: true
				    }
					,nation_mom: 
   			 		{
						required: true
				    }
					,province:
					{
						required: function(){
							if ($("#province option[value='']")) {
								return true;
							}else{
								return false;
							}
						}
					}
					,born_province:
					{
						required: function(){
							if ($("#born_province option[value='']")) {
								return true;
							}else{
								return false;
							}
						}
					}
					,cur_address: 
   			 		{
						required: true
				    }
					,province_code: 
   			 		{
						required: true
				    }
					,cur_mobile: 
   			 		{
						required: true
				    }
					
		   		},
		   		messages: {
				   	citizen_id: {
						required:"กรุณาระบุหมายเลขบัตรประชาชนค่ะ"
					}
					,position1: {
					   	required:"กรุณาระบุตำแหน่งงานที่จะสมัครค่ะ"
					}
					,salary:
					{
					   	required:"กรุณาระบุเงินเดือนที่ต้องการค่ะ"
					}
					,name_th: 
   			 		{
					   	required:"กรุณาระบุชื่อค่ะ"
				    }
					,surname_th: 
   			 		{
					   	required:"กรุณาระบุนามสกุลค่ะ"
				    }
					,name_en: 
   			 		{
						required: "กรุณาระบุชื่อภาษาอังกฤษค่ะ"
				    }
					,surname_en: 
   			 		{
						required: "กรุณาระบุนามสกุลภาษาอังกฤษค่ะ"
				    }
					,birth_date: 
   			 		{
						required: "กรุณาระบุ วัน/เดือน/ปี เกิดค่ะ"
				    }
					,age: 
   			 		{
						required: "กรุณาระบุอายุค่ะ"
				    }
					,height: 
   			 		{
						required: "กรุณาระบุส่วนสูงค่ะ"
				    }
					,weight: 
   			 		{
						required: "กรุณาระบุน้ำหนักค่ะ"
				    }
					,nationality: 
   			 		{
						required: "กรุณาระบุสัญชาติค่ะ"
				    }

					,name_fa: 
   			 		{
						required: "กรุณาระบุชื่อบิดาค่ะ"
				    }
					,surname_fa: 
   			 		{
						required: "กรุณาระบุนามสกุลบิดาค่ะ"
				    }
					,nation_fa: 
   			 		{
						required: "กรุณาระบุสัญชาติบิดาค่ะ"
				    }
					,name_mom: 
   			 		{
						required: "กรุณาระบุชื่อมารดาค่ะ"
				    }
					,surname_mom: 
   			 		{
						required: "กรุณาระบุนามสกุลมารดาค่ะ"
				    }
					,nation_mom: 
   			 		{
						required: "กรุณาระบุสัญชาติมารดาค่ะ"
				    }
					,province:
					{
						required: "กรุณาเลือกจังหวัดด้วยค่ะ"
					}
					,born_province:
					{
						required: "กรุณาเลือกจังหวัดด้วยค่ะ"
					}
					,cur_address: 
   			 		{
						required: "กรุณาใส่บ้านเลขที่ด้วยค่ะ"
				    }
					,province_code: 
   			 		{
						required: "กรุณาระบุรหัสไปรษณีย์ด้วยค่ะ"
				    }
					,cur_mobile: 
   			 		{
						required: "กรุณาระบุหมายเลขโทรศัพท์เคลื่อนที่ด้วยค่ะ"
				    }
		   		}
		   		
				,submitHandler: function(form) 
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
            				}
        			});
				}
				
   		});
</script> 