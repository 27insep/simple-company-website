<div id="system_head">
	<div class="left_box">
		<a href="#" id="dept_1">ทีมงาน HIT-SI</a>
	</div>
	<div class="left_box">
		<a href="#" id="dept_2">ทีมงาน HIT-SD</a>
	</div>
	<div class="right_box">
		<a href="/backend/ourteam/form">เพิ่มข้อมูลทีมงาน</a>
	</div>
</div>
<input type="hidden" id="ddl_dept" value="1">
<table cellpadding="0" cellspacing="1" border="0" class="display" id="show_data">
	<thead>
		<tr>
			<th>ลำดับ</th>
			<th width="70px">รูปภาพ</th>
			<th>แผนก</th>
			<th>ชื่อทีมงาน</th>
			<th>ชื่อเล่น</th>
			<th width="220px">ตำแหน่ง</th>
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
        "sAjaxSource": "<?php echo WEB_PATH;?>/backend/ourteam/json",
        "fnServerParams": function ( aoData ) {
			aoData.push( { "name": "ddl_dept", "value": $("#ddl_dept").val() });
		},
        "fnRowCallback": function(nRow, aData, iDisplayIndex) {
    		nRow.setAttribute('id','row_'+aData[0]);
		},
		"order": [[ 0, "desc" ]]
    } );
    
    $("#dept_1").click(
		function(){		
			 $("#ddl_dept").val("1");
			 oTable.fnDraw();
		}
	);
	
	$("#dept_2").click(
		function(){		
			 $("#ddl_dept").val("2");
			 oTable.fnDraw();
		}
	);
    
function updateData(id)
{
	window.location.href	=	"<?php echo WEB_PATH;?>/backend/ourteam/form/"+id;
}
function deleteData(id,row_id,file_type)
{
	var msg 	=	"ต้องการลบข้อมูล ?"
	if(confirm(msg))
	{
		$.ajax({
    		url: "<?php echo WEB_PATH;?>/backend/ourteam/remove_data/",
    			type: "POST",
    			dataType: "json",
    			data: {"id": id,"file_type": file_type},
    			success: function(data)
    			{	
       				alert(data.message);
       				oTable.fnDeleteRow($("#row_"+row_id));
    			}
		});
	}
}

function downindex(dept,id,index)
{
	$.ajax({
    		url: "<?php echo WEB_PATH;?>/backend/ourteam/down_index/",
    			type: "POST",
    			dataType: "json",
    			data: {"dept": dept,"id": id,"current_index": index},
    			success: function(data)
    			{	
    				if(data.success == "0")
       					alert(data.message);
       				else
       					oTable.fnDraw();
    			}
		});
}

function upindex(dept,id,index)
{
	$.ajax({
    		url: "<?php echo WEB_PATH;?>/backend/ourteam/up_index/",
    			type: "POST",
    			dataType: "json",
    			data: {"dept": dept,"id": id,"current_index": index},
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