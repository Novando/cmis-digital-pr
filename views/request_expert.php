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

<!-- START OF CODE BY RIZKY@220301 -->
<!-- Approval form -->
<div style="margin:20px 100px">
  <label>
    <span>No. PR   :</span>
    <span>0001</span>
  </label>
</div>
<div style="margin:20px 100px">
  <label>
    <span>Request to   :</span>
    <select name="division" id="division" class="easyui-combobox" style="width:200px;">
      <option selected>N/A</option>
      <option>IT</option>
      <option>Maintenance</option>
    </select> 
  </label>
</div>
<div style="margin:20px 100px">
  <label>
    <span>No. Item   :</span>
    <span>1</span> 
  </label>
</div>
<div style="margin:20px 100px">
  <label>
    <span>Barang   :</span>
    <span>Coba lagi lah ya</span> 
  </label>
</div>
<div style="margin:20px 100px">
  <label>
    <p>Remark   :</p>
    <textarea name="remark" id="remark" style="width:500px;height:100px"></textarea>
  </label>
</div>

<!-- save or cancel expert approval -->
<div id="tb" style="height:auto; padding-left:1000px">
  <a href="javascript:void(0)" id="submit-jawab-save" class="easyui-linkbutton" data-options="iconCls:'icon-ok',plain:true" onclick="save()">Save</a>
	<a href="javascript:void(0)" id="submit-jawab-cancel" class="easyui-linkbutton" data-options="plain:true">Cancel</a>
</div>

<script>

	// Confirm cancel PR approval
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

	// Confirm save PR approval
	$("#submit-jawab-save").on('click', function(){

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
		
		jQuery.messager.confirm('Confirm','PR disetujui ?',function(r){
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