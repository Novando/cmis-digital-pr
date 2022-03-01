<!DOCTYPE html>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>PT Cahaya Jakarta</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/easyui.css'); ?>">
		<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/icon.css'); ?>" rel="stylesheet">	

	<script type="text/javascript" src="<?php echo base_url('assets/jss/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/jss/jquery.easyui.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/jss/datagrid-groupview.js'); ?>"></script>
<script type="text/javascript">
	$.parser.onComplete = function(){
		$('body').css('visibility','visible');
	};
	function reload(){

	}
</script>
<style>
.c-textbox {
	font-size: 12px;
	  padding: 4px;
	 position: relative;
  border: 1px solid #95B8E7;
  background-color: #fff;
  vertical-align: middle;
  display: inline-block;
  border-radius: 5px 5px 5px 5px;
}
.c-textbox:disabled {
	background-color: #eee;
}

</style>
</head>

<!-- DELETE FROM HERE -->

<!-- START OF CODE BY RIZKY@220301 -->
<!-- Requestor identity form -->
<div style="margin:100px 100px 20px">
  <label>
    <p>Approval Status   :</p>
    <select name="approval" id="approval" class="easyui-combobox" style="width:200px;">
      <option selected>Not Approved</option>
      <option>Approved</option>
    </select> 
  </label>
</div>
<div style="margin:20px 100px 50px">
  <label>
    <p>Remark   :</p>
    <textarea name="remark" id="remark" style="width:500px;height:100px"></textarea>
  </label>
</div>

<!-- Add finish or cancel PR creation -->
<div id="tb" style="height:auto; padding-left:1000px">
	<a href="javascript:void(0)" id="submit-jawab-finish" class="easyui-linkbutton" data-options="iconCls:'icon-ok',plain:true" onclick="finish()">Finish</a>
	<a href="javascript:void(0)" id="submit-jawab-cancel" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true">Cancel</a>
</div>

<div id="dialog-jawab-nc" class="easyui-dialog" style="width:400px; height:125px; padding: 4px 6px" modal="true" closed="true">
	<form id="form-jawab-nc" method="post" action="<?php echo base_url('remove_fp/jawab_nc'); ?>" enctype="multipart/form-data">
			
			<div class="form-item" style="padding-top:4px">
				<div style="float:left;width:130px;align:left">
					<label>Keterangan</label>
				</div>
				<input type="text" name="alasan" id = "alasan" class="easyui-textbox" size="48" maxlength="50"/>
			</div>
			<div style="padding-top:6px">
				<tr>
					<td colspan="2">
						<div id="btn-jawab-nc">
							<a href="#" type="submit" id="submit-jawab-nc" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:false" style="width:100px">Simpan</a>
						</div>
					</td>
				</tr>
			</div>
	</form>
</div>

<!-- DELETE UNTIL HERE -->

<script>

	// Confirm cancel PR creation
	$("#submit-jawab-cancel").on('click', function(){
		jQuery.messager.confirm('Confirm','yakin Mau Keluar ?',function(r){
			$("#dialog-form").dialog("close");
		});
	});

	$('#kdterima').combobox({
	onSelect: function(row){
		var target = this;
		setTimeout(function(){
			jQuery('#datagrin-pr').datagrid('reload');
			reload();
		},0);
	}
	});	

	// Confirm finish PR creation
	$("#submit-jawab-finish").on('click', function(){

		/*
			////// Original code from Mr. Ali //////
			var penerima = $('#kdterima').combobox('getValue');
			var pengirim = $('#kode').combobox('getValue');
			var xalasan = $('#alasan').val();
			var row = $('#datagrin-pr').datagrid('getSelected');
			if (row){
				xsku = row.sku;
			}
			// $('#fak2').textbox('setText', xdelfaktur);
		*/
		
		jQuery.messager.confirm('Confirm','Keterangan akan disimpan ?',function(r){
			/* 
				////// Original code form Mr. Ali //////
				if (r){

					$.ajax({
						type    : 'POST',
						url: "<?php echo base_url(); ?>sjinternal/simpan_keterangan",
						dataType: 'json',
						data:{ nosku:xsku,reason:xalasan,pengirim:pengirim,penerima:penerima},
						success : function(response){
							jQuery('#datagrin-pr').datagrid('reload');
							// jQuery('#datagrid-delete').datagrid('reload');
							jQuery('#dialog-jawab-nc').dialog('close');
							jQuery.messager.show({
								title: 'Success',
								msg: 'Berhasil disimpan'
							});
							reload();
							$("#skuid").val('');
							$("#skuid").focus();

						},
						error : function(error){
							console.log(error);
							jQuery.messager.show({
							title: 'Error',
							msg: 'Gagal disimpan'
							// msg: result.msg
							});
						}
					});
				}
			*/
		});
	});
  // END OF CODE BY RIZKY@220301

	function pagerFilter(data) {
		if (typeof data.length == 'number' && typeof data.splice == 'function') {	// is array
			data = {
				total: data.length,
				rows: data
			}
		}
		var dg = $(this);
		var opts = dg.datagrid('options');
		var pager = dg.datagrid('getPager');
		pager.pagination({
			onSelectPage: function (pageNum, pageSize) {
				opts.pageNumber = pageNum;
				opts.pageSize = pageSize;
				pager.pagination('refresh', {
					pageNumber: pageNum,
					pageSize: pageSize
				});
				dg.datagrid('loadData', data);
			}
		});
		if (!data.originalRows) {
			data.originalRows = (data.rows);
		}
		var start = (opts.pageNumber - 1) * parseInt(opts.pageSize);
		var end = start + parseInt(opts.pageSize);
		data.rows = (data.originalRows.slice(start, end));
		return data;
	}

</script>


</body>
</html>