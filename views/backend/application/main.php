<div id="system_head">
	<div class="right_box">
		<a href="<?php echo WEB_PATH?>/backend/application/report">รายงานการสมัครงาน</a>
	</div>
	<div class="right_box">
		<a href="<?php echo WEB_PATH?>/backend/application/">จัดการผู้สมัครงาน</a>
	</div>
</div>
<table cellpadding="0" cellspacing="1" border="0" class="display" id="show_data">
	<thead>
		<tr>
			<th>รหัสผู้สมัคร</th>
			<th>ชื่อ</th>
			<th>นามสกุล</th>
			<th>ตำแหน่งที่สมัคร1</th>
			<th>โทรศัพท์</th>
			<th>วันที่สมัคร</th>
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
        "sAjaxSource": "<?php echo WEB_PATH?>/backend/application/json",
        "fnRowCallback": function(nRow, aData, iDisplayIndex) {
    		nRow.setAttribute('id','row_'+aData[0]);
		}
    } );
function updateData(id)
{
	window.location.href	=	"<?php echo WEB_PATH?>/backend/application/form/"+id;
}
function deleteData(id, row_id)
{
	var msg 	=	"ต้องการลบข้อมูล ?"
	if(confirm(msg))
	{
		$.ajax({
    		url: "<?php echo WEB_PATH?>/backend/application/remove_data/",
    			type: "POST",
    			dataType: "json",
    			data: {"applicant_id": id},
    			success: function(data)
    			{	
       				alert(data.message);
					oTable.fnDeleteRow($("#row_"+row_id));

       				//oTable.fnDeleteRow(document.getElementById("row_"+id));
					//window.location.href	=	"/backend/application";
    			}
		});
	}
}
</script>