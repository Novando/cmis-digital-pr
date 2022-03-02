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

<!-- START OF CODE BY RIZKY@220225 -->
<!-- Requestor identity form -->
<!-- <div id="toolbar-requestor" style="padding:4px">
	Nama             : <input  Name="nama" id="nama" size="20" value="" type="text" onkeyup="ceksku();" class="c-textbox"/>
	Departement      : <select name="department" id="department" class="easyui-combobox" style="width:150px;">
											<option>IT</option>
											<option>Development</option>
											<option>Sales</option>
											<option>Maintenance</option>
											<option>Production</option>
										</select> 
	Divisi					 : <input  Name="divisi" id="divisi" size="20" value="" type="text" onkeyup="ceksku();" class="c-textbox"/>
	Jenis				     : <select name="jenis" id="jenis" class="easyui-combobox" style="width:150px;">
											<option>Material</option>
											<option>Umum</option>
										</select>
</div> -->

<!-- Requestor item form -->
<table style="padding-bottom:20px">
	<tr>
		<td style="padding:5px 0">Nama :</td>
		<td style="padding:5px 0" colspan="2"><input  Name="nama" id="nama" size="20" value="" type="text" onkeyup="ceksku();" class="c-textbox"/></td>
		<td style="padding:5px 0">Departemen :</td>
		<td style="padding:5px 0" colspan="2">
			<select name="department" id="department" class="easyui-combobox" style="width:150px;">
				<option>IT</option>
				<option>Development</option>
				<option>Sales</option>
				<option>Maintenance</option>
				<option>Production</option>
			</select> 
		</td>
		<td style="padding:5px 0">Divisi :</td>
		<td style="padding:5px 0" colspan="2"><input  Name="divisi" id="divisi" size="20" value="" type="text" onkeyup="ceksku();" class="c-textbox"/></td>
		<td style="padding:5px 0">Jenis :</td>
		<td style="padding:5px 0" colspan="2">
			<select name="jenis" id="jenis" class="easyui-combobox" style="width:150px;">
				<option>Material</option>
				<option>Umum</option>
			</select>
		</td>
	</tr>
	<tr>
		<td style="padding:5px 0">Barang / Jasa :</td>
		<td style="padding:5px 0" colspan="5"><input  Name="item" id="item" size="50" value="" type="text" onkeyup="ceksku();" class="c-textbox"/></td>
		<td style="padding:5px 0">Qty :</td>
		<td style="padding:5px 0" colspan="2"><input  Name="qty" id="qty" size="20" value="" type="text" onkeyup="ceksku();" class="c-textbox"/></td>
		<td style="padding:5px 0">Satuan :</td>
		<td style="padding:5px 0" colspan="4"><input  Name="satuan" id="satuan" size="10" value="" type="text" onkeyup="ceksku();" class="c-textbox"/></td>
	</tr>
	<tr>
		<td style="padding:5px 0">Keterangan Link :</td>
		<td style="padding:5px 0" colspan="5"><input  Name="link" id="link" size="50" value="" type="text" onkeyup="ceksku();" class="c-textbox"/></td>
		<td style="padding:5px 0">Due Date :</td>
		<td style="padding:5px 0" colspan="5"><input  Name="dueDate" id="dueDate" size="10" value="" type="text" onkeyup="ceksku();" class="c-textbox"/></td>
	</tr>
</table>
<!-- <div id="toolbar-item" style="padding:4px">
	Barang / Jasa			: <input  Name="item" id="item" size="50" value="" type="text" onkeyup="ceksku();" class="c-textbox"/>
	Qty								: <input  Name="qty" id="qty" size="20" value="" type="text" onkeyup="ceksku();" class="c-textbox"/>
	Satuan						: <input  Name="satuan" id="satuan" size="10" value="" type="text" onkeyup="ceksku();" class="c-textbox"/>
</div> -->
<!-- <div id="toolbar-remark" style="padding:4px">
	Keterangan Link		: <input  Name="link" id="link" size="70" value="" type="text" onkeyup="ceksku();" class="c-textbox"/>
	Due Date					: <input  Name="dueDate" id="dueDate" size="10" value="" type="text" onkeyup="ceksku();" class="c-textbox"/>
</div> -->
<div id="toolbar-img" style="padding:4px">
	<label style="padding-right:50px">
		<span>Image 1 :</span>
		<input  Name="img1" id="img1" style="width:250px" class="easyui-filebox" accept="image/*" />
	</label>
	<label style="padding-right:50px">
		<span>Image 2 :</span>
		<input  Name="img2" id="img2" style="width:250px" class="easyui-filebox" accept="image/*" />
	</label>
	<label style="padding-right:50px">
		<span>Image 3 :</span>
		<input  Name="img3" id="img3" style="width:250px" class="easyui-filebox" accept="image/*" />
	</label>
</div>
<!-- END OF CODE BY RIZKY@220225 -->

<div id="tb" style="height:auto; padding: 10px 0 30px 1000px">
	<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add'" onclick="append()">Append</a>
</div>

<table id="datagrin-pr" class="easyui-datagrid" showFooter="true" rownumbers="true" fitColumns="true" singleSelect="true" collapsible="true">

	<!-- Requested item list -->
	<!-- START OF CODE BY RIZKY@220225 -->
	<thead>
		<tr>
			<th data-options="field:'idproduk',width:250" sortable="true"  align="left">Barang / Jasa</th>
			<th data-options="field:'jobid',width:30" sortable="true"  align="left">Qty</th>
			<th data-options="field:'nmproduk',width:80" sortable="true"  align="left">Satuan</th>
			<th data-options="field:'qty',width:80" align="center">Keterangan</th>
			<th data-options="field:'unit',width:50" align="center">Due Date</th>
			<th data-options="field:'delete',width:30" sortable="true"  align="left"></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Kita coba satu barang bagus</td>
			<td>2</td>
			<td>Pcs</td>
			<td>Ini masih statik</td>
			<td>21/11/2022</td>
			<td><a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-cancel',plain:true" onclick="removeit()"></a></td>
		</tr>
	</tbody>
	
	<!-- END OF CODE BY RIZKY@220225 -->

</table>

<!-- START OF CODE BY RIZKY@220301 -->
<!-- Add finish or cancel PR creation -->
<div id="tb" style="padding-top:20px; height:auto; padding-left:1000px">
	<a href="javascript:void(0)" id="submit-jawab-finish" class="easyui-linkbutton" data-options="iconCls:'icon-save'" onclick="finish()">Finish</a>
	<a href="javascript:void(0)" id="submit-jawab-cancel" class="easyui-linkbutton" data-options="iconCls:'icon-remove'">Cancel</a>
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