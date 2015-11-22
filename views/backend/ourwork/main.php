<div id="system_head">
	<div class="right_box">
		<a href="<?php echo WEB_PATH?>/backend/ourwork/form">เพิ่มข้อมูลผลงาน</a>
	</div>
</div>
<table cellpadding="0" cellspacing="1" border="0" class="display" id="show_data">
	<thead>
		<tr>
			<th width="50px">ลำดับ</th>
			<th width="70px">รูปภาพ</th>
			<th>ชื่อผลงาน</th>
			<th width="80px">สถานะ</th>
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
         "aaSorting": [[ 1, "asc" ]],
        "sAjaxSource": "<?php echo WEB_PATH?>/backend/ourwork/json",
        "fnRowCallback": function(nRow, aData, iDisplayIndex) {
    		nRow.setAttribute('id','row_'+aData[0]);
		}
    } );
function updateData(id)
{
	window.location.href	=	"<?php echo WEB_PATH?>/backend/ourwork/form/"+id;
}
function changeStatus(id,status)
{
	var msg 	=	"แก้ไขสถานะ ?";
	if(confirm(msg))
	{
		$.ajax({
    		url: "<?php echo WEB_PATH;?>/backend/ourwork/update_data/",
    			type: "POST",
    			dataType: "json",
    			data: {"ourwork_id": id,"is_show":status},
    			success: function(data)
    			{	
       				alert(data.message);
       				
       				if(status==0)
       				{
       					$("#status_show_"+id).addClass('hide');
       					$("#status_hide_"+id).removeClass('hide');
       				}
       				
       				if(status==1)
       				{
       					$("#status_show_"+id).removeClass('hide');
       					$("#status_hide_"+id).addClass('hide');
       				}
       			}
		});
	}
}
function deleteData(id,row_id)
{
	var msg 	=	"ต้องการลบข้อมูล ?"
	if(confirm(msg))
	{
		$.ajax({
    		url: "<?php echo WEB_PATH?>/backend/ourwork/remove_data/",
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
function downindex(id,index)
{
	$.ajax({
    		url: "<?php echo WEB_PATH;?>/backend/ourwork/down_index/",
    			type: "POST",
    			dataType: "json",
    			data: {"id": id,"current_index": index},
    			success: function(data)
    			{	
    				if(data.success == "0")
       					alert(data.message);
       				else
       					oTable.fnDraw();
    			}
		});
}

function upindex(id,index)
{
	$.ajax({
    		url: "<?php echo WEB_PATH;?>/backend/ourwork/up_index/",
    			type: "POST",
    			dataType: "json",
    			data: {"id": id,"current_index": index},
    			success: function(data)
    			{	
    				if(data.success == "0")
       					alert(data.message);
       				else
       					oTable.fnDraw();
    			}
		});
}
</script>