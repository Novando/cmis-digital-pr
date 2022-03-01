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

<div id="tb" style="height:auto; padding-left:1000px">
        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" onclick="append()">Append</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="removeit()">Remove</a>
</div>
<table id="datagrin-pr" class="easyui-datagrid" url="<?php echo base_url('sjinternal/get_jsonscan'); ?>" showFooter="true" fit="true" toolbar="#toolbar-add" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true" collapsible="true"
	data-options="
			'onDblClickRow': function(index, row, value){
					jQuery('#dialog-jawab-nc').dialog('open').dialog('setTitle','Keterangan');
					$('#id_nc_jawab').val() == row.sku ;
					jQuery('#form-jawab-nc').form('load',row);
				},
			fitColumns:true">

		</table>

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
							<a href="#" type="submit" id="submit-jawab-nc-cancel" class="easyui-linkbutton" data-options="iconCls:'icon-cancel',plain:false" style="width:100px">batal</a>
						</div>
					</td>
				</tr>
			</div>
	</form>
</div>

<script>
	$("#submit-jawab-nc-cancel").on('click', function(){
	// jQuery.messager.confirm('Confirm','yakin Mau Keluar ?',function(r){
		$("#dialog-jawab-nc").dialog().dialog("close");
	// });
	});

	$('#kdterima').combobox({
	onSelect: function(row){
		var target = this;
		setTimeout(function(){
			jQuery('#datagrin-pr').datagrid('reload');
			reload();
		},0);
	}
	})	
	$("#submit-jawab-nc").on('click', function(){
		var penerima = $('#kdterima').combobox('getValue');
		var pengirim = $('#kode').combobox('getValue');
		var xalasan = $('#alasan').val();
		var row = $('#datagrin-pr').datagrid('getSelected');
		if (row){
			xsku = row.sku;
		}
		// $('#fak2').textbox('setText', xdelfaktur);
		jQuery.messager.confirm('Confirm','Keterangan akan disimpan ?',function(r){
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
		});
	});


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