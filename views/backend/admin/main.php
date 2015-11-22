<div id="system_head">
	<div class="right_box">
		<a href="<?php echo WEB_PATH;?>/backend/admin/form">เพิ่มข้อมูลผู้ดูแลระบบ</a>
	</div>
</div>
<table cellpadding="0" cellspacing="1" border="0" class="display" id="show_data">
	<thead>
		<tr>
			<th width="50px">ลำดับ</th>
			<th>ชึ่อผู้ใช้</th>
			<th>รหัสผ่าน</th>
			<th>ชื่อ-นามสกุล</th>
			<!--
			<th>วันที่สร้าง</th>
			<th>วันที่อัพเดทล่าสุด</th>
			-->
			<th width="200px">เครื่องมือ</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
<script type="text/javascript">
   var oTable =   $('#show_data').dataTable( {
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo WEB_PATH;?>/backend/admin/json",
        "fnRowCallback": function(nRow, aData, iDisplayIndex) {
    		nRow.setAttribute('id','row_'+aData[0]);
		}
    } );
function updateData(id)
{
	window.location.href	=	"<?php echo WEB_PATH;?>/backend/admin/form/"+id;
}
function deleteData(id)
{
	var msg 	=	"ต้องการลบข้อมูล ?"
	if(confirm(msg))
	{
		$.ajax({
    		url: "<?php echo WEB_PATH;?>/backend/admin/remove_data/",
    			type: "POST",
    			dataType: "json",
    			data: {"id": id},
    			success: function(data)
    			{	
       				alert(data.message);
       				//oTable.fnDeleteRow(document.getElementById("row_"+id));
    			}
		});
	}
}
</script>