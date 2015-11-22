<!--
<div id="system_head">
	<div class="right_box">
		<a href="/backend/admin/form">เพิ่มข้อมูลผู้ดูแลระบบ</a>
	</div>
</div>
-->
<table cellpadding="0" cellspacing="1" border="0" class="display" id="show_data">
	<thead>
		<tr>
			<th>ลำดับ</th>
			<th>เรื่องที่ติดต่อ</th>
			<th>ข้อความ</th>
			<th>ผู้ติดต่อ</th>
			<th>อีเมลผู้ติดต่อ</th>
			<th>วันเวลาติดต่อ</th>
			<th>เครื่องมือ</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
<script type="text/javascript">
   var oTable =   $('#show_data').dataTable( {
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "<?php echo WEB_PATH;?>/backend/contactus/json",
        "fnRowCallback": function(nRow, aData, iDisplayIndex) {
    		nRow.setAttribute('id','row_'+aData[0]);
		}
    } );
/*
function updateData(id)
{
	window.location.href	=	"/backend/contactus/form/"+id;
}
*/

function deleteData(id,row_id)
{
	var msg 	=	"ต้องการลบข้อมูล ?"
	if(confirm(msg))
	{
		$.ajax({
    		url: "<?php echo WEB_PATH;?>/backend/contactus/remove_data/",
    			type: "POST",
    			dataType: "json",
    			data: {"id": id},
    			success: function(data)
    			{	
       				alert(data.message);
       				oTable.fnDeleteRow($("#row_"+row_id));
    			}
		});
	}
}
</script>