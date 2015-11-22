<div id="system_head">
	<div class="right_box">
		<a href="<?php echo WEB_PATH?>/backend/product/form">เพิ่มข้อมูลสินค้าและบริการ</a>
	</div>
</div>
<table cellpadding="0" cellspacing="1" border="0" class="display" id="show_data">
	<thead>
		<tr>
			<th width="80px">ลำดับ</th>
			<th width="130px">ภาพสินค้าและบริการ</th>
			<th>ชื่อสินค้าและบริการ</th>
			<th width="100px">แสดงผล</th>
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
        "sAjaxSource": "<?php echo WEB_PATH?>/backend/product/json",
        "fnRowCallback": function(nRow, aData, iDisplayIndex) {
    		nRow.setAttribute('id','row_'+aData[0]);
		}
    } );
function updateData(id)
{
	window.location.href	=	"<?php echo WEB_PATH?>/backend/product/form/"+id;
}
function deleteData(id,row_id)
{
	var msg 	=	"ต้องการลบข้อมูล ?"
	if(confirm(msg))
	{
		$.ajax({
    		url: "<?php echo WEB_PATH?>/backend/product/remove_data/",
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
function changeStatus(id,status)
{
	var msg 	=	"แก้ไขสถานะ ?";
	if(confirm(msg))
	{
		$.ajax({
    		url: "<?php echo WEB_PATH;?>/backend/product/update_data/",
    			type: "POST",
    			dataType: "json",
    			data: {"product_id": id,"is_show":status},
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
function downindex(id,index)
{
	$.ajax({
    		url: "<?php echo WEB_PATH;?>/backend/product/down_index/",
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
    		url: "<?php echo WEB_PATH;?>/backend/product/up_index/",
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