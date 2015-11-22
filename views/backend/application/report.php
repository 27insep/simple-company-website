<div id="system_head">
	<div class="right_box">
		<a href="<?php echo WEB_PATH?>/backend/application/report">รายงานการสมัครงาน</a>
	</div>
	<div class="right_box">
		<a href="<?php echo WEB_PATH?>/backend/application/">จัดการผู้สมัครงาน</a>
	</div>
</div>
<br />
<div align="right">
จากวันที่ <input type="text" name="from" id="from" /> ถึง <input type="text" name="to" id="to" /> <input type="button" id="filter" name="filter" value="ค้นหา" />
</div>
<table cellpadding="0" cellspacing="1" border="0" class="display" id="show_data">
	<thead>
		<tr>
			<th>ตำแหน่งงาน</th>
			<th>จำนวน (คน)</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>
<script type="text/javascript">

	var oTable =   $('#show_data').dataTable( {
        "bProcessing": true,
        "bServerSide": true,
		"bFilter": false,
        "sAjaxSource": "<?php echo WEB_PATH?>/backend/application/report_json",
		"fnServerParams": function ( aoData ) {
			aoData.push( { "name": "from", "value": $("#from").val() },{ "name": "to", "value": $("#to").val() } );
		},
        "fnRowCallback": function(nRow, aData, iDisplayIndex) {
    		nRow.setAttribute('id','row_'+aData[0]);
		}
	} );


	$("#from").datepicker({
		showOn: 'both', 
		buttonImage: '<?php echo WEB_PATH?>/assets/images/calendar.gif', 
		buttonImageOnly: true, 
		dateFormat : 'yy-mm-dd',
		changeMonth: true, 
		changeYear: true
	});

	$("#to").datepicker({
		showOn: 'both', 
		buttonImage: '<?php echo WEB_PATH?>/assets/images/calendar.gif', 
		buttonImageOnly: true, 
		dateFormat : 'yy-mm-dd',
		changeMonth: true, 
		changeYear: true
	});

	$( "#filter" ).click(function() {
		//alert( "Handler for .click() called." );
		
		var begD = $.datepicker.parseDate('yy-mm-dd', $('#from').val());
		var endD = $.datepicker.parseDate('yy-mm-dd', $('#to').val());
		if (begD > endD) {
            alert('วันที่เริ่มต้นต้องไม่เกินวันที่สิ้นสุดค่ะ');
            $('#from').focus();

			return false;
		}


		if($("#from").val() == "" || $("#to").val() == ""){
			alert("กรุณาเลือกช่วงเวลาค่ะ");
			return false;
		}
		
		
		oTable.fnDraw();

	});

	

</script>