<div id="system_head">
	<div class="right_box">
		<a href="<?php echo WEB_PATH?>/backend/career/form">เพิ่มตำแหน่งงาน</a>
	</div>
</div>
<table cellpadding="0" cellspacing="1" border="0" class="display" id="show_data">
	<thead>
		<tr>
			<th>ลำดับ</th>
			<th>ตำแหน่งที่เปิดรับสมัคร</th>
			<th>จำนวนที่เปิดรับ</th>
			<th>สถานะ</th>
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
        "sAjaxSource": "<?php echo WEB_PATH?>/backend/career/json",
        "fnRowCallback": function(nRow, aData, iDisplayIndex) {
    		nRow.setAttribute('id','row_'+aData[0]);
		}
    } );
function updateData(id)
{
	window.location.href	=	"<?php echo WEB_PATH?>/backend/career/form/"+id;
}
function deleteData(id, row_id)
{
	var msg 	=	"ต้องการลบข้อมูล ?"
	if(confirm(msg))
	{
		$.ajax({
    		url: "<?php echo WEB_PATH?>/backend/career/remove_data/",
    			type: "POST",
    			dataType: "json",
    			data: {"job_id": id},
    			success: function(data)
    			{	
       				alert(data.message);
					oTable.fnDeleteRow($("#row_"+row_id));

       				//oTable.fnDeleteRow(document.getElementById("row_"+id));
					//window.location.href	=	"/backend/career";
    			}
		});
	}
}
</script>