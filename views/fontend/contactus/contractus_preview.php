<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
	body{
		font-family:Tahoma, Geneva, sans-serif;
		font-size:14px;
	}
</style>
</head>

<body>
	<table width="800" style="margin:auto;">
    	<tr>
        	<td><img src="http://www.hitera.com/hitera/assets/images/header_mail.jpg" width="800" height="120" /></td>
        </tr>
        <tr>
        	<td style="padding:20px;">
            	เรียน ผู้ดูแลระบบ<br />
                
          	<h2>มีการติดต่อจาก Website Hitera โดยมีรายละเอียดดังนี้</h2>
	     	<table>
				<tr>
					<td>ชื่อ - นามสกุล</td>
					<td><?=$contact_name?></td>
				</tr>
				<tr>
					<td>อีเมล ผู้ติดต่อ</td>
					<td><?=$contact_email?></td>
				</tr>
				<tr>
					<td>เรื่องที่ต้องการติดต่อ</td>
					<td><?=$message_title?></td>
				</tr>
				<tr>
					<td>รายละเอียด</td>
					<td><?=$message_detail?></td>
				</tr>
			</table>
            </td>
        </tr>
        <tr>
        	<td><img src="http://www.hitera.com/hitera/assets/images/footer_mail.jpg" width="800" height="120" /></td>
        </tr>
    </table>
</body>
</html>

