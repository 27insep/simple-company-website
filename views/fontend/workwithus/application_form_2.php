<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/workwithus/apply.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/workwithus/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/workwithus/jquery.preimage.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>/assets/js/jquery.validate.min.js"></script>
	
<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>/assets/css/workwithus.css">
<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>/assets/css/jquery.ui.theme/jquery-ui.min.css">
<link type="text/css" rel="stylesheet" href="<?php echo WEB_PATH;?>/assets/css/validate.css" />


<div id="main_all">
	 <h2 class="topic"><?=$title_th?><img src="<?php echo WEB_PATH;?>/assets/images/h_topic.png" /></h2>

	 <div class="o clear">


		<ul class="workwithusLeft">
			<li><a href="<?php echo WEB_PATH;?>/workwithus">รายชื่อตำแหน่งงานที่เปิดรับสมัคร</a></li> | 
			<li class="active">กรอกใบสมัคร</li> | 
			<li><a href="<?php echo WEB_PATH;?>/workwithus/how_to_apply">วิธีการสมัคร</a></li>
		</ul>
	<form action="<?=$base_url?>/<?=$action?>" method="post" name="job" id="job" enctype="multipart/form-data">

		<div id="form" class="workwithusRight">




				
			  <table border="0" cellpadding="5" cellspacing="1" width="100%">
				<tbody>
                <tr>
				  <td colspan="3" bgcolor="#0892d0"><span class="style1">ตำแหน่งที่สมัคร</span></td>
				</tr>
                <tr>
                	<td colspan="2" style="line-height: 1;padding: 0;vertical-align: top;background: #e7e7e7;">
                    	<table border="0" cellpadding="5" cellspacing="1" width="100%" height="100%">
                        	<tr>
                              <td align="right" bgcolor="#eeeded" width="25%" height="28"><strong>* ตำแหน่งที่สมัคร 1 :</strong></td>
                              <td bgcolor="#F6F6F6">
                                        <select name="position1">
                                            <option value="" selected="selected">------- โปรดเลือก -------</option>
                                        <?	foreach($jobs as $val){	?>
                                                <option value="<?=$val['job_id']?>"><?=$val['job_name']?></option>
                                        <?	}	?> 
                                        </select>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#eeeded" width="200" height="28"><strong>ตำแหน่งที่สมัคร 2 :</strong></td>
                              <td bgcolor="#F6F6F6">
                                        <select name="position2">
                                            <option value="" selected="selected">------- โปรดเลือก -------</option>
                                        <?	foreach($jobs as $val){	?>
                                                <option value="<?=$val['job_id']?>"><?=$val['job_name']?></option>
                                        <?	}	?> 
                                        </select>
                              </td>
                            </tr>
                            <tr>
                              <td align="right" bgcolor="#eeeded" valign="top" width="200" height="8"><strong>* เงินเดือนที่ต้องการ : </strong></td>
                              <td bgcolor="#F6F6F6" valign="top"><input name="salary" maxlength="10" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"> บาท/เดือน</td>
                            </tr>
                        </table>
                    </td>
                    <td bgcolor="#F6F6F6" width="194">
                        <div align="right">
                            <table border="0" cellspacing="10" width="250">
                                <tbody><tr>
                                <td style="border:1px #999 solid;" align="center" bgcolor="#F7F7F7" width="230" height="250">
                                    <p>โปรดเลือก รูปประจำตัว</p>
                                    <div id="prev_file1"></div>
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
                
                
                
				
                
                
                
                	
                
                
				</tbody>
			</table>
				
			<table border="0" cellpadding="5" cellspacing="1" width="100%">
			<tbody><tr>
					  <td colspan="2" bgcolor="#0892d0"><span class="style1">ลักษณะการปฏิบัติงาน</span></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="25%" height="36"><strong>* สามารถปฏิบัติงานต่างจังหวัด : </strong></td>
					  <td bgcolor="#F6F6F6" width="75%">
					 <input name="can_onsite" value="1" onclick="document.job.can_onsite_result.disabled=true; document.job.can_onsite_result.value='';" type="radio"> ได้ 
					 <input name="can_onsite" value="2" checked="checked" onclick="document.job.can_onsite_result.disabled=false;" type="radio"> ไม่ได้ &nbsp;
					  เพราะ <input name="can_onsite_result" onkeypress="document.job.can_onsite[1].checked = true;" type="text"> </td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>พร้อมที่จะปฎิบัติงานได้ :</strong></td>
					  <td bgcolor="#F6F6F6" width="450">
					  <input name="is_ready" value="1" onclick="document.job.is_ready_day.disabled=true; document.job.is_ready_day.value='';" type="radio"> ในทันที
					  <input name="is_ready" value="2" checked="checked" onclick="document.job.is_ready_day.disabled=false;" type="radio"> ภายใน 
					  <input name="is_ready_day" onkeypress=" document.job.is_ready[1].checked = true;" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text" > วัน &nbsp; หลังจากได้รับแจ้งจากบริษัท	
					  </td>
				</tr>
					<tr>
					  <td colspan="2" align="center" bgcolor="#eeeded" height="36">* บริษัทกำหนดให้มีการทดลองงาน 4 เดือน นับจากวันแรกที่ท่านเข้าทำงาน ท่านยินดีที่จะปฏิบัติหรือไม่  :<br />
						<input name="can_pro" value="1" type="radio"> ได้ 
					  <input name="can_pro" value="2" checked="checked" type="radio"> ไม่ได้ </td>
				</tr>
				  </tbody>
			</table>
				 
			<table border="0" cellpadding="4" cellspacing="1" width="100%">
			<tbody><tr>
					  <td colspan="4" bgcolor="#0892d0"><span class="style1">ประวัติส่วนตัว</span></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* ชื่อ :</strong></td>
					  <td bgcolor="#F6F6F6" width="376"><input name="name_th" type="text"> </td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>* นามสกุล :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><input name="surname_th" type="text"> </td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* ชื่อ :<br>
					  (ภาษาอังกฤษ) </strong></td>
					  <td bgcolor="#F6F6F6" width="376"><input name="name_en" type="text"> </td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>* นามสกุล :<br>
					  (ภาษาอังกฤษ) </strong></td>
					  <td bgcolor="#F6F6F6" width="400"><input name="surname_en" type="text"> </td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* เพศ :</strong></td>
					  <td bgcolor="#F6F6F6" width="376">
						  <input name="gender" value="1" checked="checked" type="radio"> ชาย
						  <input name="gender" value="2" type="radio"> หญิง
					  </td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>* วัน/เดือน/ปีเกิด :</strong></td>
					  <td bgcolor="#F6F6F6" width="400">
					  <input name="birth_date" type="text" id="birth_date"> 
					  </td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* อายุ :</strong></td>
					  <td bgcolor="#F6F6F6" width="376"><input name="age" id="age" size="5" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"> ปี</td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>ตำหนิบนร่างกาย :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><input name="scar" type="text"></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* ส่วนสูง :</strong></td>
					  <td bgcolor="#F6F6F6" width="376"><input name="height" size="5" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"> เซนติเมตร&nbsp; </td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>* น้ำหนัก :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><input name="weight" maxlength="5" size="5" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text">  กิโลกรัม&nbsp;</td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>สถานที่เกิด&nbsp;อำเภอ :</strong></td>
					  <td bgcolor="#F6F6F6" width="376"><input name="born_city" type="text"></td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>* จังหวัด :</strong></td>
					  <td bgcolor="#F6F6F6" width="400">
							<select name="born_province" id="born_province">
								<option selected="selected" value="">------- โปรดเลือก -------</option>
							<?	foreach($province as $val){	?>
									<option value="<?=$val['province_id']?>"><?=$val['province_name']?></option>
							<?	}	?>
							</select>
					  </td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>* สัญชาติ :</strong></td>
					  <td bgcolor="#F6F6F6"><input name="nationality" type="text"></td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    เชื้อชาติ :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><input name="race" type="text"></td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266">&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp; <strong>ศาสนา :</strong></td>
					  <td bgcolor="#F6F6F6"><input name="religion" type="text"></td>
					  <td align="right" bgcolor="#eeeded" width="240">&nbsp;</td>
					  <td bgcolor="#F6F6F6" width="400">&nbsp;</td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>*เลขบัตรประชาชน :</strong></td>
					  <td bgcolor="#F6F6F6" width="376"><input name="citizen_id" maxlength="13" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"> </td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>สถานที่ออกบัตร :</strong></td>
					  <td bgcolor="#F6F6F6" width="400"><input name="citizen_card_place" type="text"></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="266"><strong>วันที่ออกบัตร :</strong></td>
					  <td bgcolor="#F6F6F6" width="376">
						<input name="citizen_card_taken" type="text" id="citizen_card_taken">
					  </td>
					  <td align="right" bgcolor="#eeeded" width="240"><strong>วันที่บัตรหมดอายุ :</strong></td>
					  <td bgcolor="#F6F6F6" width="400">
						<input name="citizen_card_expire" type="text" id="citizen_card_expire">
					  </td>
				</tr>
					<tr>
					  <td colspan="4" bgcolor="#eeeded"><strong>&nbsp;บัตรประจำตัวผู้เสียภาษีเลขที่ :</strong>
						<input name="tax_id" onkeyup="if(this.value*1!=this.value) this.value='' ;" maxlength="13" type="text"></td>
					</tr>
					<tr>
					  <td colspan="4" align="left" bgcolor="#eeeded"> 
						<strong>* ฐานะการสมรส : </strong>
						<input name="marital_status" value="1" checked="checked" type="radio">   โสด  
					  <input name="marital_status" value="2" type="radio">   สมรส  
					  <input name="marital_status" value="3" type="radio">   หย่า 
					  <input name="marital_status" value="4" type="radio">  หม้าย </td>
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
					<td align="right" bgcolor="#EEEDED" width="120"><strong>ชื่อคู่สมรส :</strong></td>
					<td bgcolor="#F6F6F6"><input name="mar_name" type="text"></td>
					<td align="right" bgcolor="#EEEDED" width="120"><strong>นามสกุลเดิม :</strong></td>
					<td bgcolor="#F6F6F6"><input name="mar_surname" type="text"></td>
				  </tr>
				  <tr>
					<td align="right" bgcolor="#EEEDED"><strong>สัญชาติ :</strong></td>
					<td bgcolor="#F6F6F6"><input name="mar_nationality" type="text"></td>
					<td align="right" bgcolor="#EEEDED"><strong>เชื้อชาติ :</strong></td>
					<td bgcolor="#F6F6F6"><input name="mar_race" type="text"></td>
				  </tr>
				  <tr>
					<td align="right" bgcolor="#EEEDED"><strong>อาชีพคู่สมรส :</strong></td>
					<td bgcolor="#F6F6F6"><input name="mar_occupation" type="text"></td>
					<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่ง :</strong></td>
					<td bgcolor="#F6F6F6"><input name="mar_position" type="text"></td>
				  </tr>
				  <tr>
					<td colspan="4" bgcolor="#EEEDED"><strong>ชื่อสถานที่ประกอบอาชีพของคู่สมรส :</strong><input name="mar_company" type="text"></td>
				  </tr>
				  <tr>
					<td align="right" bgcolor="#EEEDED"><strong>จำนวนบุตรทั้งสิ้น :</strong>&nbsp;&nbsp;</td>
					<td align="left" bgcolor="#F6F6F6"><input name="mar_child" size="15" maxlength="5" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text">คน&nbsp;</td>
					<td align="right" bgcolor="#EEEDED">&nbsp;&nbsp; <strong> บุตรชาย :</strong></td>
					<td align="left" bgcolor="#F6F6F6"><input name="mar_son" size="15" maxlength="5" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text">คน&nbsp; </td>
				  </tr>
				  <tr>
					<td align="right" bgcolor="#EEEDED">&nbsp;</td>
					<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
					<td align="right" bgcolor="#EEEDED"><strong>บุตรหญิง :</strong></td>
					<td align="left" bgcolor="#F6F6F6"><input name="mar_daughter" size="15" maxlength="5" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text">คน</td>
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
					  <td bgcolor="#F6F6F6" width="220"><input name="name_fa" type="text"> </td>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>* นามสกุลบิดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="surname_fa" type="text"> </td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150" height="36"><strong>* สัญชาติ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="nation_fa" type="text"> </td>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>เชื้อชาติ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="race_fa" type="text"></td>
				</tr>
				<tr>
					  <td align="right" bgcolor="#eeeded" width="150" height="36"><strong>อาชีพของบิดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="occupation_fa" type="text"></td>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>ชื่อสถานที่ประกอบอาชีพของบิดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="company_fa" type="text"></td>
				</tr>
					<tr>
					  <td colspan="4" bgcolor="#eeeded" width="100%" height="14"><strong>&nbsp;ที่อยู่ของบิดา </strong></td>
				</tr>
					<tr>
					  <td colspan="4" bgcolor="#F6F6F6" height="30"><textarea name="address_fa" cols="60" rows="2" style="width:99%;"></textarea></td>
					</tr>
					 <tr>
					  <td colspan="4" align="left" bgcolor="#CCCCCC" height="14"><strong>มารดา</strong></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150" height="36"><strong>* ชื่อมารดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="name_mom" type="text"> </td>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>* นามสกุลมารดา :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="surname_mom" type="text"> </td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150" height="36"><strong>* สัญชาติ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="nation_mom" type="text"></td>
					  <td align="right" bgcolor="#eeeded" width="200" height="36"><strong>เชื้อชาติ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="race_mom" type="text"></td>
				</tr>
				   <tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>อาชีพของมารดา :</strong></td>
					  <td bgcolor="#F6F6F6"><input name="occupation_mom" type="text"></td>
					  <td align="right" bgcolor="#eeeded" width="270"><strong>ชื่อสถานที่ประกอบอาชีพของมารดา :</strong></td>
					  <td bgcolor="#F6F6F6"><input name="company_mom" type="text"></td>
				</tr>
					<tr>
					  <td colspan="4" bgcolor="#eeeded" height="14"><strong>ที่อยู่ของมารดา :</strong>
						<input name="ck_addr_mom" value="1" checked="checked" onclick="document.job.address_mom.disabled=true; document.job.address_mom.value='';" type="radio">อยู่ที่เดียวกับบิดา&nbsp;
						<input name="ck_addr_mom" value="2" onclick="document.job.address_mom.disabled=false;" type="radio">อยู่คนละที่กับบิดา </td>
					</tr>
					<tr>
					  <td colspan="4" bgcolor="#eeeded" height="30"><textarea name="address_mom" cols="50" rows="2" id="address_mom" onkeypress=" document.job.ck_addr_mom[1].checked = true;" style="width:99%;" disabled="true"></textarea></td>
					</tr>
					<tr>
					  <td colspan="4" align="left" bgcolor="#CCCCCC" height="14"><strong>ประวัติพี่น้องร่วมบิดามารดา</strong></td>
				</tr>
					
					<tr>
					  <td colspan="4" bgcolor="#eeeded" height="100"><br>
						<div align="center"><strong>พี่น้องร่วมบิดามารดาทั้งหมด : </strong>
						  <input name="brother_num" maxlength="5" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text">              คน  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&nbsp;ท่านเป็นคนที่ : </strong>
						  <input name="you_num" maxlength="5" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text">            </div>
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
							<td align="center" bgcolor="#F6F6F6"><input name="b1" size="4" maxlength="1" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input name="name_b1" size="45" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input name="occup_b1" size="20" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input name="comp_b1" size="20" type="text"></td>
						  </tr>
						  <tr>
							<td align="center" bgcolor="#F6F6F6"><input name="b2" size="4" maxlength="1" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input name="name_b2" size="45" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input name="occup_b2" size="20" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input name="comp_b2" size="20" type="text"></td>
						  </tr>
						  <tr>
							<td align="center" bgcolor="#F6F6F6"><input name="b3" size="4" maxlength="1" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input name="name_b3" size="45" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input name="occup_b3" size="20" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input name="comp_b3" size="20" type="text"></td>
						  </tr>
						  <tr>
							<td align="center" bgcolor="#F6F6F6"><input name="b4" size="4" maxlength="1" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input name="name_b4" size="45" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input name="occup_b4" size="20" type="text"></td>
							<td align="center" bgcolor="#F6F6F6"><input name="comp_b4" size="20" type="text"></td>
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
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>* เลขที่ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="home_no" type="text"> </td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>หมู่ที่ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="moo" maxlength="10" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>อาคาร :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="buliding" type="text"></td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>ซอย :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="soi" type="text"></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>หมู่บ้าน :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="muban" type="text"></td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>ถนน : </strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="street" type="text"></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>* แขวง/ตำบล :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="tambon" type="text"> </td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>* เขต/อำเภอ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="city" type="text"> </td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>* จังหวัด :</strong></td>
					  <td bgcolor="#F6F6F6" width="220">
							<select name="province">
								<option selected="selected" value="">------- โปรดเลือก -------</option>
							<?	foreach($province as $val){	?>
									<option value="<?=$val['province_id']?>"><?=$val['province_name']?></option>
							<?	}	?>						  				  
							</select>
					  </td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>* รหัสไปรษณีย์ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="province_code" maxlength="5" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"> </td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>E-mail :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="cur_e_mail" type="text"></td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>โทรศัพท์ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="cur_tel" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong> * โทรศัพท์เคลื่อนที่ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="cur_mobile" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
					  <td align="right" bgcolor="#eeeded" width="150">&nbsp;</td>
					  <td bgcolor="#F6F6F6" width="220">&nbsp;</td>
				</tr>
					<tr>
					  <td colspan="4" bgcolor="#CCCCCC" width="100%"><strong>ที่อยู่ตามทะเบียนบ้าน</strong></td>
				</tr>
					<tr>
					  <td colspan="4" bgcolor="#eeeded" width="100%">&nbsp;
					  <input name="ck_address" value="1" checked="checked" onclick="change(document.job)" type="radio"> 
					  ที่อยู่เดียวกันกับที่อยู่ปัจจุบัน</td>
				</tr>
					<tr>
					  <td colspan="4" bgcolor="#eeeded" width="100%">&nbsp;
					  <input name="ck_address" value="2" onclick="change(document.job)" type="radio">          ที่อยู่คนละที่กับที่อยู่ปัจจุบัน</td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>เลขที่ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="home_no2" maxlength="10" onkeypress=" document.job.ck_address[1].checked = true;" type="text"></td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>หมู่ที่ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="moo2" maxlength="10" onkeypress=" document.job.ck_address[1].checked = true;" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>อาคาร :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="buliding2" onkeypress=" document.job.ck_address[1].checked = true;" type="text"></td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>ซอย :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="soi2" onkeypress=" document.job.ck_address[1].checked = true;" type="text"></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>หมู่บ้าน :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="muban2" onkeypress=" document.job.ck_address[1].checked = true;" type="text"></td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>ถนน :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="street2" onkeypress=" document.job.ck_address[1].checked = true;" type="text"></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>แขวง/ตำบล </strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="tambon2" onkeypress=" document.job.ck_address[1].checked = true;" type="text"></td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>เขต/อำเภอ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="city2" onkeypress=" document.job.ck_address[1].checked = true;" type="text"></td>
				</tr>
					<tr>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>จังหวัด :</strong></td>
					  <td bgcolor="#F6F6F6" width="220">
							<select name="province2" onchange="document.job.ck_address[1].checked = true;">
								<option value="" selected="selected">------- โปรดเลือก -------</option>
							<?	foreach($province as $val){	?>
									<option value="<?=$val['province_id']?>"><?=$val['province_name']?></option>
							<?	}	?> 
							</select>
					  </td>
					  <td align="right" bgcolor="#eeeded" width="150"><strong>รหัสไปรษณีย์ :</strong></td>
					  <td bgcolor="#F6F6F6" width="220"><input name="province_code2" maxlength="5" onkeypress=" document.job.ck_address[1].checked = true;" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
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
						  <td align="center" bgcolor="#F6F6F6"><input name="name_edu1" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="type_edu1" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="fac_edu1" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="major_edu1" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="start_edu1" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="stop_edu1" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="grade_edu1" size="3" maxlength="5" type="text"></td>
						</tr>
						<tr>
						  <td bgcolor="#F6F6F6"><strong>ระดับอุดมศึกษา</strong></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="name_edu2" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="type_edu2" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="fac_edu2" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="major_edu2" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="start_edu2" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="stop_edu2" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="grade_edu2" size="3" maxlength="5" type="text"></td>
						</tr>
						<tr>
						  <td bgcolor="#F6F6F6"><strong>ระดับอาชีวศึกษา/<br>
						  อนุปริญญา</strong></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="name_edu3" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="type_edu3" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="fac_edu3" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="major_edu3" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="start_edu3" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="stop_edu3" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="grade_edu3" size="3" maxlength="5" type="text"></td>
						</tr>
						<tr>
						  <td bgcolor="#F6F6F6"><strong>ระดับมัธยมศึกษา</strong></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="name_edu4" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="type_edu4" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="fac_edu4" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="major_edu4" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="start_edu4" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="stop_edu4" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="grade_edu4" size="3" maxlength="5" type="text"></td>
						</tr>
						<tr>
						  <td bgcolor="#F6F6F6"><strong>ระดับประถมศึกษา</strong></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="name_edu5" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="type_edu5" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="fac_edu5" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="major_edu5" size="10" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="start_edu5" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="stop_edu5" size="3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
						  <td align="center" bgcolor="#F6F6F6"><input name="grade_edu5" size="3" maxlength="5" type="text"></td>
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
							<td colspan="4" align="left" bgcolor="#CCCCCC"><strong>บริษัท/หน่วยงานล่าสุด </strong></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED" width="200"><strong>ชื่อบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="company_name1" type="text">                &nbsp;</td>
							<td align="right" bgcolor="#EEEDED"><strong>ที่ตั้งบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="comp_addr1" type="text">                &nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>โทรศัพท์ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="comp_tel1" onkeyup="if(this.value*1!=this.value) this.value='' ;" size="8" type="text">                &nbsp;</td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>เข้าทำงานเมื่อ :</strong>&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6"><input name="date_in1" type="text" id="date_in1"></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="posi_in1" type="text"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong> ลาออกเมื่อ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="date_out1" type="text" id="date_out1"></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="posi_out1" type="text"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>หน้าที่/ความรับผิดชอบครั้งสุดท้าย : </strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="responsibility1" type="text"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>เงินเดือนเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="salary_in1" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
							<td align="right" bgcolor="#EEEDED"><strong> เงินเดือนครั้งล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="salary_out1" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>ชื่อผู้บังคับบัญชาคนล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="manager1" type="text"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>สาเหตุที่ออก :</strong></td>
							<td colspan="3" align="left" bgcolor="#F6F6F6"><textarea name="remark1" cols="50" rows="2"></textarea></td>
						  </tr>
						  <tr>
							<td colspan="4" align="left" bgcolor="#CCCCCC"><strong>บริษัท/หน่วยงาน อันดับรอง 1 </strong></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>ชื่อบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="company_name2" type="text"></td>
							<td align="right" bgcolor="#EEEDED"><strong>ที่ตั้งบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="comp_addr2" type="text"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>โทรศัพท์ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="comp_tel2" onkeyup="if(this.value*1!=this.value) this.value='' ;" size="8" type="text"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>เข้าทำงานเมื่อ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="date_in2" type="text" id="date_in2"></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="posi_in2" type="text"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>ลาออกเมื่อ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="date_out2" type="text" id="date_out2"></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="posi_out2" type="text"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>หน้าที่/ความรับผิดชอบครั้งสุดท้าย :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="responsibility2" type="text"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED" height="29"><strong>เงินเดือนเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="salary_in2" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
							<td align="right" bgcolor="#EEEDED"><strong>เงินเดือนครั้งล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="salary_out2" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>ชื่อผู้บังคับบัญชาคนล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="manager2" type="text"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>สาเหตุที่ออก :</strong></td>
							<td colspan="3" align="left" bgcolor="#F6F6F6"><textarea name="remark2" cols="50" rows="2"></textarea></td>
						  </tr>
						  <tr>
							<td colspan="4" align="left" bgcolor="#CCCCCC"><strong>บริษัท/หน่วยงาน อันดับรอง 2 </strong></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>ชื่อบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="company_name3" type="text"></td>
							<td align="right" bgcolor="#EEEDED"><strong>ที่ตั้งบริษัท :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="comp_addr3" type="text"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>โทรศัพท์ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="comp_tel3" onkeyup="if(this.value*1!=this.value) this.value='' ;" size="8" type="text"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>เข้าทำงานเมื่อ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="date_in3" type="text" id="date_in3"></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="posi_in3" type="text"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>&nbsp; ลาออกเมื่อ :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="date_out3" type="text" id="date_out3"></td>
							<td align="right" bgcolor="#EEEDED"><strong>ตำแหน่งงานล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="posi_out3" type="text"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>หน้าที่/ความรับผิดชอบครั้งสุดท้าย</strong> :</td>
							<td align="left" bgcolor="#F6F6F6"><input name="responsibility3" type="text"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>เงินเดือนเริ่มต้น :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="salary_in3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp; <strong> เงินเดือนครั้งล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="salary_out3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>ชื่อผู้บังคับบัญชาคนล่าสุด :</strong></td>
							<td align="left" bgcolor="#F6F6F6"><input name="manager3" type="text"></td>
							<td align="right" bgcolor="#EEEDED">&nbsp;</td>
							<td align="left" bgcolor="#F6F6F6">&nbsp;</td>
						  </tr>
						  <tr>
							<td align="right" bgcolor="#EEEDED"><strong>สาเหตุที่ออก :</strong></td>
							<td colspan="3" align="left" bgcolor="#F6F6F6"><textarea name="remark3" cols="50" rows="2"></textarea></td>
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
						  <td bgcolor="#F6F6F6"><input name="train1" style="width:98%;" type="text"></td>
						  <td bgcolor="#F6F6F6"><input name="place1" style="width:98%;" type="text"></td>
						</tr>
						<tr align="center">
						  <td colspan="2" align="left" bgcolor="#F6F6F6"><span xml:lang="th" lang="th">ตั้งแต่ วันที่ </span>
							<input name="train_from1" type="text" id="train_from1">
							&nbsp;ถึง&nbsp;
							<input name="train_to1" type="text" id="train_to1">
						  </td>
						</tr>
						<tr align="center">
						  <td rowspan="2" bgcolor="#F6F6F6">2</td>
						  <td bgcolor="#F6F6F6"><input name="train2" style="width:98%;" type="text"></td>
						  <td bgcolor="#F6F6F6"><input name="place2" style="width:98%;" type="text"></td>
						</tr>
						<tr align="center">
						  <td colspan="2" align="left" bgcolor="#F6F6F6"><span xml:lang="th" lang="th">ตั้งแต่ วันที่ </span>
							<input name="train_from2" type="text" id="train_from2">
							&nbsp;ถึง&nbsp;
							<input name="train_to2" type="text" id="train_to2">
						  </td>
						</tr>
						<tr align="center">
						  <td rowspan="2" bgcolor="#F6F6F6">3</td>
						  <td bgcolor="#F6F6F6"><input name="train3" style="width:98%;" type="text"></td>
						  <td bgcolor="#F6F6F6"><input name="place3" style="width:98%;" type="text"></td>
						</tr>
						<tr align="center">
						  <td colspan="2" align="left" bgcolor="#F6F6F6"><span xml:lang="th" lang="th">ตั้งแต่ วันที่ </span>
							<input name="train_from3" type="text" id="train_from3">
							&nbsp;ถึง&nbsp;
							<input name="train_to3" type="text" id="train_to3">
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
					  <textarea name="performance" cols="75" rows="5"></textarea> </td>
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
						  <td bgcolor="#F6F6F6" width="190"><input name="name_refer1" type="text"></td>
						  <td bgcolor="#F6F6F6" width="220"><input name="company_refer1" type="text"></td>
						  <td bgcolor="#F6F6F6" width="170"><input name="position_refer1" type="text"></td>
						  <td bgcolor="#F6F6F6" width="150"><input name="tel_refer1" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
						</tr>
						<tr align="center">
						  <td bgcolor="#F6F6F6" width="190"><input name="name_refer2" type="text"></td>
						  <td bgcolor="#F6F6F6" width="220"><input name="company_refer2" type="text"></td>
						  <td bgcolor="#F6F6F6" width="170"><input name="position_refer2" type="text"></td>
						  <td bgcolor="#F6F6F6" width="150"><input name="tel_refer2" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
						</tr>
						<tr align="center">
						  <td bgcolor="#F6F6F6" width="190"><input name="name_refer3" type="text"></td>
						  <td bgcolor="#F6F6F6" width="220"><input name="company_refer3" type="text"></td>
						  <td bgcolor="#F6F6F6" width="170"><input name="position_refer3" type="text"></td>
						  <td bgcolor="#F6F6F6" width="150"><input name="tel_refer3" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
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
				  <td colspan="3" bgcolor="#F6F6F6"><input name="language1" id="language1" size="10" onkeypress="document.job.level_speak1.disabled=false;document.job.level_write1.disabled=false;document.job.level_listen1.disabled=false;" type="text"></td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED" valign="top" width="150"><b>พูด :</b></td>
				  <td colspan="3" bgcolor="#F6F6F6">
						<select size="1" name="level_speak1" disabled="disabled">
					  <option value="-" selected="selected">--- โปรดเลือก ---</option>
					  <option value="พอใช้">พอใช้</option>          <option value="ดี">ดี</option>          <option value="ดีมาก">ดีมาก</option>        </select>
					&nbsp; &nbsp; &nbsp; <b>เขียน :</b> 
			 <select size="1" name="level_write1" disabled="disabled">
			  <option value="-" selected="selected">--- โปรดเลือก ---</option>
			  <option value="พอใช้">พอใช้</option>  <option value="ดี">ดี</option>  <option value="ดีมาก">ดีมาก</option></select>
			 &nbsp; &nbsp; &nbsp; <b>ฟัง : </b>
			 <select size="1" name="level_listen1" disabled="disabled">
			  <option value="-" selected="selected">--- โปรดเลือก ---</option>
			  <option value="พอใช้">พอใช้</option>  <option value="ดี">ดี</option>  <option value="ดีมาก">ดีมาก</option></select>
			 </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED" valign="top"><strong>ภาษาต่างประเทศ 2 :</strong></td>
				  <td colspan="3" bgcolor="#F6F6F6">  
				  <input name="language2" id="language2" size="10" onkeypress="document.job.level_speak2.disabled=false;document.job.level_write2.disabled=false;document.job.level_listen2.disabled=false;" type="text"></td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED" valign="top"><b>พูด :</b></td>
				  <td colspan="3" bgcolor="#F6F6F6">
						 <select size="1" name="level_speak2" disabled="disabled">
					  <option value="-" selected="selected">--- โปรดเลือก ---</option>
					  <option value="พอใช้">พอใช้</option>          <option value="ดี">ดี</option>          <option value="ดีมาก">ดีมาก</option>        </select>
					 &nbsp; &nbsp; &nbsp; <b>เขียน :</b> 
			<select size="1" name="level_write2" disabled="disabled">
			  <option value="-" selected="selected">--- โปรดเลือก ---</option>
			  <option value="พอใช้">พอใช้</option>  <option value="ดี">ดี</option>  <option value="ดีมาก">ดีมาก</option></select>
			&nbsp; &nbsp; &nbsp; <b>ฟัง : </b>
			<select size="1" name="level_listen2" disabled="disabled">
			  <option value="-" selected="selected">--- โปรดเลือก ---</option>
			  <option value="พอใช้">พอใช้</option>  <option value="ดี">ดี</option>  <option value="ดีมาก">ดีมาก</option></select>
			</td>
				</tr>
				<tr>
				  <td colspan="4" align="left" bgcolor="#CCCCCC"><strong>ความสามารถด้าน Computer</strong></td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 1 :</strong></td>
				  <td bgcolor="#F6F6F6" width="100"><input name="computer1" size="10" onkeypress="document.job.level_use1.disabled=false;" type="text"></td>
				  <td align="right" bgcolor="#EEEDED" width="100"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6">        <select size="1" name="level_use1" disabled="disabled">
					  <option value="-" selected="selected">--- โปรดเลือก ---</option>
					  <option value="พอใช้">พอใช้</option>          <option value="ดี">ดี</option>          <option value="ดีมาก">ดีมาก</option>        </select>
				  </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 2 :</strong></td>
				  <td bgcolor="#F6F6F6"><input name="computer2" size="10" onkeypress="document.job.level_use2.disabled=false;" type="text"></td>
				  <td align="right" bgcolor="#EEEDED"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6">        <select size="1" name="level_use2" disabled="disabled">
					  <option value="-" selected="selected">--- โปรดเลือก ---</option>
					  <option value="พอใช้">พอใช้</option>          <option value="ดี">ดี</option>          <option value="ดีมาก">ดีมาก</option>        </select>
				  </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 3 :</strong></td>
				  <td bgcolor="#F6F6F6"><input name="computer3" size="10" onkeypress="document.job.level_use3.disabled=false;" type="text"></td>
				  <td align="right" bgcolor="#EEEDED"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6">        <select size="1" name="level_use3" disabled="disabled">
					  <option value="-" selected="selected">--- โปรดเลือก ---</option>
					  <option value="พอใช้">พอใช้</option>          <option value="ดี">ดี</option>          <option value="ดีมาก">ดีมาก</option>        </select>
				  </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 4 :</strong></td>
				  <td bgcolor="#F6F6F6"><input name="computer4" size="10" onkeypress="document.job.level_use4.disabled=false;" type="text"></td>
				  <td align="right" bgcolor="#EEEDED"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6">        <select size="1" name="level_use4" disabled="disabled">
					  <option value="-" selected="selected">--- โปรดเลือก ---</option>
					  <option value="พอใช้">พอใช้</option>          <option value="ดี">ดี</option>          <option value="ดีมาก">ดีมาก</option>        </select>
				  </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 5 :</strong></td>
				  <td bgcolor="#F6F6F6"><input name="computer5" size="10" onkeypress="document.job.level_use5.disabled=false;" type="text"></td>
				  <td align="right" bgcolor="#EEEDED"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6">        <select size="1" name="level_use5" disabled="disabled">
					  <option value="-" selected="selected">--- โปรดเลือก ---</option>
					  <option value="พอใช้">พอใช้</option>          <option value="ดี">ดี</option>          <option value="ดีมาก">ดีมาก</option>        </select>
				  </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>คอมพิวเตอร์ 6 :</strong></td>
				  <td bgcolor="#F6F6F6"><input name="computer6" size="10" onkeypress="document.job.level_use6.disabled=false;" type="text"></td>
				  <td align="right" bgcolor="#EEEDED"><strong>ระดับ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6">        <select size="1" name="level_use6" disabled="disabled">
					  <option value="-" selected="selected">--- โปรดเลือก ---</option>
					  <option value="พอใช้">พอใช้</option>          <option value="ดี">ดี</option>          <option value="ดีมาก">ดีมาก</option>        </select>
				  </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"> <strong>พิมพ์ดีดไทย :</strong></td>
				  <td align="left" bgcolor="#F6F6F6"><input name="type_th" size="10" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
				  <td colspan="2" align="left" bgcolor="#EEEDED"> คำ/นาที </td>
				</tr>
				<tr>
				  <td align="right" bgcolor="#EEEDED"><strong>พิมพ์ดีดอังกฤษ :</strong></td>
				  <td align="left" bgcolor="#F6F6F6"><input name="type_en" size="10" onkeyup="if(this.value*1!=this.value) this.value='' ;" type="text"></td>
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
					  <input name="ck_drive" value="1" onclick="document.job.ck_cardrive[3].checked =false;document.job.ck_cardrive[0].disabled=false;document.job.ck_cardrive[1].disabled=false;document.job.ck_cardrive[2].disabled=false;" type="radio"> รถยนต์&nbsp;
					  
					  <input name="ck_drive" value="2" onclick="document.job.ck_cardrive[3].checked =false;document.job.ck_cardrive[0].disabled=false;document.job.ck_cardrive[1].disabled=false;document.job.ck_cardrive[2].disabled=false;" type="radio"> รถจักรยานยนต์&nbsp;
					  
					  <input name="ck_drive" value="3" onclick="document.job.ck_cardrive[3].checked =false;document.job.ck_cardrive[0].disabled=false;document.job.ck_cardrive[1].disabled=false;document.job.ck_cardrive[2].disabled=false;" type="radio"> มีทั้งสอง&nbsp;
					  
					  <input name="ck_drive" value="4" checked="checked" onclick="document.job.ck_cardrive[3].checked =true; document.job.ck_cardrive[0].disabled=true;document.job.ck_cardrive[1].disabled=true;document.job.ck_cardrive[2].disabled=true;" type="radio"> ไม่มี 
						</td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#EEEDED"><strong>มีใบขับขี่ :</strong></td>
					  <td bgcolor="#F6F6F6">
						<input name="ck_cardrive" value="1" type="radio"> รถยนต์&nbsp;

						<input name="ck_cardrive" value="2" type="radio"/> รถจักรยานยนต์ 

						<input name="ck_cardrive" value="3" type="radio"> มีทั้งสอง&nbsp;

						<input name="ck_cardrive" value="4" checked="checked" type="radio"> ไม่มี 

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
					<input name="ck_home" value="1" checked="checked" onclick="document.job.relation.disabled=true; document.job.relation.value='';" type="radio">  เป็นของตนเอง&nbsp;
					<input name="ck_home" value="2" onclick="document.job.relation.disabled=true; document.job.relation.value='';" type="radio">  บ้านเช่าซื้ออยู่ระหว่างผ่อนชำระ&nbsp;
					<input name="ck_home" value="3" onclick="document.job.relation.disabled=true; document.job.relation.value='';" type="radio">  หอพัก<br>
					<input name="ck_home" value="4" onclick="document.job.relation.disabled=true; document.job.relation.value='';" type="radio">  บ้านเช่าอยู่เอง&nbsp;
					<input name="ck_home" value="5" onclick="document.job.relation.disabled=false;" type="radio">  อาศัยผู้อื่นอยู่ (ระบุความสัมพันธ์) 
					<input name="ck_home_detail" onkeypress=" document.job.ck_home[4].checked = true;" type="text">      </td>
				</tr>
				<tr bgcolor="#D5FFEA">
				  <td align="right" bgcolor="#EEEDED" valign="top" width="203" height="36"><strong>การมีพาหนะเป็นของตนเอง :</strong></td>
				  <td bgcolor="#F6F6F6" width="290">
					 <input name="ck_car" value="1" checked="checked" onclick="$('.secar').show();$('.isCar').show();" type="radio">  มี&nbsp;
					<span class="secar">
							<input name="ck_cartype1" value="1" type="checkbox">  รถยนต์&nbsp;
					<input name="ck_cartype2" value="1" type="checkbox"> รถจักรยานยนต์</span>
							<br>
					<input name="ck_car" value="2" onclick="$('.secar').hide();$('.isCar').hide();" type="radio">  ไม่มี 
					</td>
				  <td bgcolor="#F6F6F6" width="353"><div class="isCar">
						 โดย :&nbsp;<br>
					<input name="ck_car_status" value="1" checked="checked" type="radio">          อยู่ระหว่างการผ่อน<br>
					  <input name="ck_car_status" value="2" type="radio">  
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
					  <td align="left" bgcolor="#F6F6F6" width="67%"><input name="hobby" maxlength="350" type="text"></td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#EEEDED"><span><strong>* ท่านเคยได้รับการผ่าตัดหรือไม่ : </strong></span></td>
					  <td align="left" bgcolor="#F6F6F6"><input name="ck_sick" value="1" checked="checked" onclick="document.job.sick_detail.disabled=true;" type="radio">ไม่เคย&nbsp;
			<input name="ck_sick" value="2" onclick="document.job.sick_detail.disabled=false;" type="radio">เคย&nbsp; <span class="ck_sick">
			<input name="sick_detail" type="text" disabled="true"></span></td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#EEEDED"><span><strong>* ท่านเคยมีโรคประจำตัวหรือไม่ : </strong></span></td>
					  <td align="left" bgcolor="#F6F6F6"><input name="ck_health" value="1" checked="checked" onclick="document.job.health_detail.disabled=true;" type="radio">ไม่มี&nbsp;
			<input name="ck_health" value="2" onclick="document.job.health_detail.disabled=false;" type="radio">มี&nbsp; <span class="ck_health">
			<input name="health_detail" type="text" disabled="true"></span></td>
					</tr>
					<tr>
					  <td align="right" bgcolor="#EEEDED"><span><strong>ท่านเคยฟ้องร้องหรือถูกฟ้องร้องต่อศาลหรือไม่ :</strong></span></td>
					  <td align="left" bgcolor="#F6F6F6"><input name="ck_accuse" value="1" checked="checked" type="radio">ไม่เคย
			  <input name="ck_accuse" value="2" type="radio">เคย&nbsp;</td>
					</tr>
			</tbody></table>

			<table border="0" cellpadding="5" cellspacing="1" width="100%">
			<tbody><tr>
					<td colspan="4" bgcolor="#0892d0"><span class="style1">ทัศนคติต่อการทำงาน</span></td>
				</tr>
				<tr>
					<td colspan="4" bgcolor="#EEEDED">
					<strong>เหตุผลที่ท่านคิดว่าท่านเหมาะสมกับงานที่สมัคร :</strong> *
					( <em>ท่านสามารถกรอกข้อมูลได้สูงสุด <span id="countThink">300</span>
					ตัวอักษร  </em>) <br>
					<textarea id="think" name="think_in_work" cols="85" rows="4" style="width:98%;" onkeydown="limitText('think','countThink', 300)" onkeyup="limitText('think','countThink', 300)"></textarea></td>
				</tr>
				<tr>
					<td colspan="4" bgcolor="#EEEDED">
					<strong>ท่านวางแผนในอนาคตของท่านอย่างไร ภายใน 5 ปีข้างหน้า :</strong> *
					( <em>ท่านสามารถกรอกข้อมูลได้สูงสุด <span id="countPlan">300</span>
					ตัวอักษร</em> ) <br>
					<textarea id="plan" name="plan_in_future" cols="85" rows="4" style="width:98%;" onkeydown="limitText('plan','countPlan', 300)" onkeyup="limitText('plan','countPlan', 300)"></textarea></td>
				</tr>

				<tr>
					<td colspan="4" bgcolor="#EEEDED"><strong>ท่านคิดว่าคุณสมบัติใดที่จะเป็นกุญแจแห่งความสำเร็จในการงานของท่าน </strong>: *
					( <em>ท่านสามารถกรอกข้อมูลได้สูงสุด <span id="countSuccess">300</span>
					ตัวอักษร </em>) <br>
				  <textarea id="success" name="success_in_work" cols="85" rows="4" style="width:98%;" onkeydown="limitText('success','countSuccess', 300)" onkeyup="limitText('success','countSuccess', 300)"></textarea>		</td>
				</tr>
			</tbody></table>

			<table border="0" cellpadding="5" cellspacing="1" width="100%">
			<tbody><tr>
				<td colspan="4" bgcolor="#0892d0" width="100%"><span class="style1">ทราบข่าวการสมัครงานจาก</span></td>
				</tr>
					<tr bgcolor="#D6C9D5">
					  <td bgcolor="#EEEDED" height="36"><input name="know_news" value="1" onclick="change(document.job)" type="checkbox">  หนังสือพิมพ์ชื่อ </td>
					  <td bgcolor="#F6F6F6"><input name="know_news_detail" type="text"></td>
					  <td bgcolor="#EEEDED"><input name="know_employee" value="1" onclick="change(document.job)" type="checkbox"> พนักงานบริษัทชื่อ </td>
					  <td bgcolor="#F6F6F6"><input name="know_employee_detail" type="text"></td>
				</tr>
					<tr bgcolor="#D6C9D5">
					  <td bgcolor="#EEEDED" height="36"><input name="know_internet" value="1" onclick="change(document.job)" type="checkbox"> Internet Site </td>
					  <td bgcolor="#F6F6F6"><input name="know_internet_detail" type="text"></td>
					  <td bgcolor="#EEEDED"><input name="know_market" value="1" onclick="change(document.job)" type="checkbox">  ตลาดนัดแรงงาน </td>
					  <td bgcolor="#F6F6F6"><input name="know_market_detail" type="text"></td>
				</tr>
					<tr bgcolor="#D6C9D5">
					  <td bgcolor="#EEEDED" height="36"><input name="know_school" value="1" onclick="change(document.job)" type="checkbox"> สถาบันการศึกษาชื่อ </td>
					  <td bgcolor="#F6F6F6"><input name="know_school_detail" type="text"></td>
					  <td bgcolor="#EEEDED"><input name="know_etc" value="1" onclick="change(document.job)" type="checkbox"> อื่น ๆ โปรดระบุ </td>
					  <td bgcolor="#F6F6F6"><input name="know_etc_detail" type="text"></td>
				</tr>
					<tr bgcolor="#D6C9D5">
					  <td colspan="2" bgcolor="#EEEDED" height="36"><input name="know_website" value="1" type="checkbox"> Web Site บริษัท (www.hitera.com) </td>
					  <td colspan="2" bgcolor="#EEEDED"><input name="know_board" value="1" type="checkbox"> บอร์ดบริษัทหรือสอบถามโดยตรง </td>
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
					  <span id="countOther">200</span> ตัวอักษร) <br>
					  <textarea id="other" name="other" cols="60" rows="6" onkeydown="limitText('other','countOther', 200)" onkeyup="limitText('other','countOther', 200)"></textarea></td>
				</tr>
			</tbody></table>
			<br>
			<center>
				<input value="Preview" type="button" onclick="showPreview()"> &nbsp;
				<input name="reset" value="Reset form" onclick=" if(confirm('Are you sure to reset this form?')) {document.job.reset();}" type="button">
			</center>
	
		</div>

		<div id="preview" class="workwithusRight">

		</div>

	</form>

	</div>

</div>
<script> 
	$( document ).ready(function() {
		$("#preview").hide();
	});
	
	
	function hidePreview(){
		$("#form").show();
		$("#preview").hide();
	}

	function showPreview(){
		$.blockUI({ css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        } }); 

		

		if($("#job").valid()){


			$("#form").hide();
			$("#preview").show();
			$.post("<?php echo WEB_PATH?>/workwithus/preview_test", $( "#job" ).serialize(), function(data){
				$("#preview").html(data);
				readURL( ($("#file1"))[0] );
				setTimeout($.unblockUI, 1000);
			});
		}else{
			$.unblockUI();
			alert("กรุณากรอกข้อมูลให้ครบถ้วนค่ะ");
		}
	}

	function limitText(field, countId, limit){	
		if ($("#"+field).val().length > limit){
			$("#"+field).val($("#"+field).val().slice(0, 200));
		}else{
			$("#"+countId).text(""+ (limit - $("#"+field).val().length) );
		}
	}

	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photo')
                    .attr('src', e.target.result)
                    .width(250)
                    .height(300);
				//alert("aaaa" + e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }else{
				$('#photo')
                    .attr('src', '<?php echo WEB_PATH; ?>/assets/images/no_image.png')
                    .width(250)
                    .height(200);
		}
    }

	$("#job").validate({
				focusInvalid: true,
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
					,home_no: 
   			 		{
						required: true
				    }
					,tambon: 
   			 		{
						required: true
				    }
					,city: 
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
					,hobby:
					{
						required: true
					}
					,think_in_work:
					{
						required: true
					}
					,plan_in_future:
					{
						required: true
					}
					,success_in_work:
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
					,home_no: 
   			 		{
						required: "กรุณาใส่บ้านเลขที่ด้วยค่ะ"
				    }
					,tambon: 
   			 		{
						required: "กรุณาระบุตำบลด้วยค่ะ"
				    }
					,city: 
   			 		{
						required: "กรุณาระบุอำเภอด้วยค่ะ"
				    }
					,province_code: 
   			 		{
						required: "กรุณาระบุรหัสไปรษณีย์ด้วยค่ะ"
				    }
					,cur_mobile: 
   			 		{
						required: "กรุณาระบุหมายเลขโทรศัพท์เคลื่อนที่ด้วยค่ะ"
				    }
					,hobby:
					{
						required: "กรุณาระบุงานอดิเรกด้วยค่ะ"
					}
					,think_in_work:
					{
						required: "กรุณากรอกข้อมูลค่ะ"
					}
					,plan_in_future:
					{
						required: "กรุณากรอกข้อมูลค่ะ"
					}
					,success_in_work:
					{
						required: "กรุณากรอกข้อมูลค่ะ"
					}
		   		},
		   		submitHandler: function(form) 
		   		{
					//this.submit();
					$.blockUI({ css: { 
						border: 'none', 
						padding: '15px', 
						backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', 
						opacity: .5, 
						color: '#fff' 
					} }); 
					
		   			$.ajax({
            				url: '<?php echo $base_url;?>/apply_confirm_backup',
            				cache: false,
            				type: 'POST',
           					data: new FormData( form ),
      						processData: false,
      						contentType: false,
            				dataType: "json",
            				success: function (data, status) 
            				{
                				setTimeout($.unblockUI, 500);
								alert(data.message);
								window.location.href	=	"<?php echo WEB_PATH?>/workwithus";

            				}
        			});
					
				}
   		});
</script> 
