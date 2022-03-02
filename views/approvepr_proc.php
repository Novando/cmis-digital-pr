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
<script type="text/javascript">
	$.parser.onComplete = function(){
		$('body').css('visibility','visible');
	};
</script>
<script type="text/javascript">
//Fungsi untuk logout otomatis Jika 30 menit tidak ada aktifitas
function ceksession(){

	$.ajax({
	type : 'POST',
	url  : "<?php echo base_url('login/check_session'); ?>",
	success : function(data){
		if(data == 1){
			
		}else{
		  document.location.href = "<?php echo base_url('login/logout'); ?>"
		} 
	}
	});
	
}


setInterval("ceksession()", 1800000);
</script>
</head>

	<body class="easyui-layout" style="visibility:hidden">
	<div data-options="region:'center'">
	<div class="easyui-layout" style="width:100%;height:100%;">

	
	
		<div data-options="region:'north',border:false" style="height:35px;background:#ffffff;padding:0px">
            <div class="HeaderTopMenu">
				<div style="background: #3e6db9;padding:10px;float:left" align="left">
					<font color="#ffffff">Cahaya Management Information System :.</font>
				</div>
                <div style="background: #3e6db9;padding:10px;" align="right">
                <div align="right">
                     <font color="#ffffff">Username : <?php echo $this->session->userdata('username') ?> ( <?php echo $this->session->userdata('user_id') ?> )</font>
                </div>
                </div>
            </div>
            <div class="HeaderTopModule"></div>
		</div>
		<div data-options="region:'south',split:true" style="background: #3e6db9;height:30px;padding:3px;">
            <font color="#ffffff"><?php echo copyright ?> | <?php echo version ?> | User : <?php echo $this->session->userdata('username') ?></font>
        </div>

        <!-- #Left Menu -->
		<div data-options="region:'west',split:true" title="Look up &amp; Tools" style="width:200px;">
			<table width="180" border="0" cellspacing="1" cellpadding="2" align="center">
				<tr>
					<td colspan="2"  height="10" valign="middle" align="left"></td>
				</tr>

				<!-- Create sort PR by departement -->
				<!-- START OF CODE BY RIZKY@220225 -->
				<tr>
					<td height="20" valign="middle" align="left" style="font-size:12px;">Division :</td>
				</tr>
				<tr>
					<td width="80" height="20" valign="middle" align="left">
						<select name="groupByDepartment" id="groupByDepartment" class="easyui-combobox" style="width:150px;">
							<option>IT</option>
							<option>Development</option>
							<option>Sales</option>
							<option>Maintenance</option>
							<option>Production</option>
						</select> 
					</td>
				</tr>
				<!-- END OF CODE BY RIZKY@220225 -->
	
				<tr>
					<td colspan="2"  height="10" valign="middle" align="left"></td>
				</tr>

				<tr>
					<td colspan="2" height="25" valign="middle" align="center">
						<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-search',plain:false" onclick="ToSearch()">Search</a>
						<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-back',plain:false" onclick="DoBack()">Back</a>
					</td>
				</tr>
					

			</table>
				<!-- JAVASCRIPT DAN FUNCTION -->
			<script type="text/javascript">
				function myformatter(date){
					var y = date.getFullYear();
					var m = date.getMonth()+1;
					var d = date.getDate();
					return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
				}
				
				function myparser(s){
					if (!s) return new Date();
					var ss = (s.split('-'));
					var y = parseInt(ss[0],10);
					var m = parseInt(ss[1],10);
					var d = parseInt(ss[2],10);
					if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
						return new Date(y,m-1,d);
					} else {
						return new Date();
					}
				}
				
				function DoBack() {
					document.location.href = "<?php echo base_url() ?>";
				}

				function ToSearch(){
					var tglawal		= $("#txtTglAwal").datebox('getValue');
					var tglakhir	= $("#txtTglAkhir").datebox('getValue');
					var id_rma		= $("#id_rma").textbox('getValue');
					var cust		= $("#cust").textbox('getValue');
					var prod_id		= $("#prod_id").textbox('getValue');
					var surat_jalan	= $("#surat_jalan").textbox('getValue');
					var rma_terbit	= $("#rma_terbit").textbox('getValue');
					
					if ( tglawal == "" ) {
						jQuery.messager.show({
							title: 'Peringatan',
							msg: "Isi tanggal dengan lengkap !!"
						});
					} else if ( tglakhir == "" ) {
						jQuery.messager.show({
							title: 'Peringatan',
							msg: "Isi tanggal dengan lengkap !!"
						});
					} else {
						$('#datagrid-rma').datagrid('load',{
							id_rma		: id_rma,
							tglawal		: tglawal,
							tglakhir	: tglakhir,
							cust		: cust,
							prod_id		: prod_id,
							surat_jalan	: surat_jalan,
							rma_terbit	: rma_terbit,
						});
					}
				}

			</script>
			<script>
				function printout(){
					var row = jQuery('#datagrid-rma').datagrid('getSelected');
					if(row){
						var urlID = row.id_rma;
						jQuery('#print').attr('src','<?php echo base_url() ?>rma/form_rma/' + urlID);
						jQuery('#dialog-print-rma').dialog('open').dialog('setTitle','Preview');	
					}
				}

				function addnew(){
					jQuery('#dialog-form').dialog('open').dialog('setTitle','Input PR');
					$('#frame1').attr('src', '<?php echo base_url('pr/newpr'); ?>');
					jQuery('#dialog-form').form('clear');
					reload();
				}

				// START OF CODE BY RIZKY@220301
				// Procurement Approval Modal
				function procurement_approval(){
					jQuery('#dialog-form').dialog('open').dialog('setTitle','Procurement Approval');
					$('#frame1').attr('src', '<?php echo base_url('pr/procurement_approval'); ?>');
					jQuery('#dialog-form').form('clear');
					reload();
				}
				
				// Request Expert Review Modal
				function request_expert(){
					jQuery('#dialog-form').dialog('open').dialog('setTitle','Request Expert Review');
					$('#frame1').attr('src', '<?php echo base_url('pr/request_expert'); ?>');
					jQuery('#dialog-form').form('clear');
					reload();
				}
				// END OF CODE BY RIZKY@220301

				function approvedpr() {
					jQuery('#dialog-open-closed-approved').dialog('open').dialog('setTitle','Approved Purchase Request');
					// var verify = jQuery('#datagrid-rma').datagrid('getSelected');
					// if (verify){
						// alert("Cek 2");
					// }
				}
					
				function verify() {
					var row = jQuery('#datagrid-rma').datagrid('getSelected');
					if(row){
						document.location.href = "<?php echo base_url('rma/rma_verify') ?>/" + row.id_rma;
					}
				}

				function conf_log(){
					var row = jQuery('#datagrid-rma').datagrid('getSelected');
					if ( row.jml_prod_kembali != '' ) {
						var urlID = row.id_rma;
						if (row){
							jQuery.messager.confirm('Confirm','Anda melakukan konfirmasi pada dokumen RMA',function(r){
								if (r){
									jQuery.post('<?php echo base_url('rma/status_log'); ?>/',{id:urlID},function(result){
										if (result.success){
											jQuery('#datagrid-rma').datagrid('reload');
										} else {
											jQuery.messager.show({
												title: 'Error',
												msg: result.msg
											});
										}
									},'json');
								}
							});
						}
					} else {
						jQuery.messager.show({
							title: 'Error',
							msg: 'Mohon untuk mengisi RMA sebelum Konfirmasi'
						});
					}							
				}

				function conf_qa(){
					var row = jQuery('#datagrid-rma').datagrid('getSelected');
					if ( row.no_nc != '' && row.jml_prod_ok != '' && row.jml_prod_ng != '' && row.laporan_pemusnah != '' ) {
						var urlID = row.id_rma;
						if (row){
							jQuery.messager.confirm('Confirm','Anda melakukan konfirmasi pada dokumen RMA',function(r){
							if (r){
								jQuery.post('<?php echo base_url('rma/status_qa'); ?>/',{id:urlID},function(result){
									if (result.success){
										jQuery('#datagrid-rma').datagrid('reload');
									} else {
										jQuery.messager.show({
											title: 'Error',
											msg: result.msg
										});
									}
								},'json');
							}
							});
						}						
					} else {
						jQuery.messager.show({
							title: 'Error',
							msg: 'Mohon untuk mengisi RMA sebelum Konfirmasi'
						});
					}						
				}

				function conf_mkt(){
					var row = jQuery('#datagrid-rma').datagrid('getSelected');
					if ( row.no_so_pengganti != '' && row.jml_cetak != '' && row.surat_jalan_ng2 != '' && row.note_penggantian != '' ) {
						var urlID = row.id_rma;
						if (row){
						jQuery.messager.confirm('Confirm','Anda melakukan konfirmasi pada dokumen RMA',function(r){
							if (r){
								jQuery.post('<?php echo base_url('rma/status_mkt'); ?>/',{id:urlID},function(result){
									if (result.success){
										jQuery('#datagrid-rma').datagrid('reload');
									} else {
										jQuery.messager.show({
											title: 'Error',
											msg: result.msg
										});
									}
								},'json');
							}
						});
						}
					} else {
						jQuery.messager.show({
							title: 'Error',
							msg: 'Mohon untuk mengisi RMA sebelum Konfirmasi'
						});
					}
				}

				function delete_rma(){
					var row = jQuery('#datagrid-rma').datagrid('getSelected');
					if (row){
						var urlID = row.id_rma; //.split('/').join('_');
						jQuery.messager.confirm('Confirm','Are you sure you want to remove?',function(r){
							if (r){
								jQuery.post('<?php echo base_url('rma/delete_rma'); ?>/',{id:urlID},function(result){
									if (result.success){
										jQuery('#datagrid-rma').datagrid('reload');
									} else {
										jQuery.messager.show({
											title: 'Error',
											msg: result.msg
										});
									}
								},'json');
							}
						});						
					}
				}

			</script>

<div id="toolbar-rma" style="display: flex">
	
	<!-- Create legend approval legend -->
	<!-- START OF CODE BY RIZKY@220225 -->
	<div style="margin-left:700px">
		<p>
			Legend : 
			<span style="padding-left:25px; color:#DF0F0F; font-size: 25px">&#x2022;</span>Not Approved
			<span style="padding-left:25px; color:#54CC1B; font-size: 25px">&#x2022;</span>Approved
		</p>
	</div>
	<!-- END OF CODE BY RIZKY@220225 -->
	
</div>
        </div>
		
        
        <!-- #Body -->
        <div data-options="region:'center',title:'Procurement Approval'" style="background-color:#D7E4F2;">
		<!-- TABLE UTAMA -->
		<div style="height:60%" bgcolor="#3E6DB9">
		<table id="datagrid-rma" class="easyui-datagrid" url="<?php echo base_url('rma/getJson'); ?>" fit="true" toolbar="#toolbar-rma" pagination="true" rownumbers="true" fitColumns="false" singleSelect="true" collapsible="true"
		data-options="
							rowStyler: function(index,row){
									if (row.verify === 2){
										return 'color:#ff0000;';
									}									
								},
							'onClickRow': function(index, row, value){
									$('#img_rma').attr('src', row.img_rma);
									
									$('#datagrid-rma-detail').datagrid({
										url: '<?php echo base_url('rma/getJson'); ?>/' + row.id_rma
									});
							},
							'onDblClickRow': function(index, row, value){
									
								if ( '<?php echo $this->uri->segment(2); ?>' === 'rma_log' ) {
									
									if (row.verify != 1) {
										jQuery.messager.show({msg: 'Belum Verify Oleh QA !!'});
									} else if (row.log != 1) {
										$('#id_rma_log').val(row.id_rma);
										jQuery('#form-jawab-log').form('load',row);
										jQuery('#jawab-log').dialog('open').dialog('setTitle','Logistic');
										
									} else {
										jQuery.messager.show({msg: 'Sudah Confirm !!'});
									}	
								} else if ( '<?php echo $this->uri->segment(2); ?>' === 'rma_qa' ) {
									if (row.log != 1) {
										jQuery.messager.show({msg: 'Belum Confirm Oleh Logistic !!'});
									} else if (row.qa != 1) {
										$('#id_rma_qa').val(row.id_rma);
										jQuery('#form-jawab-qa').form('load',row);
										jQuery('#jawab-qa').dialog('open').dialog('setTitle','Quality');
									} else {
										jQuery.messager.show({msg: 'Sudah Confirm !!'});
									}
								} else if ( '<?php echo $this->uri->segment(2); ?>' === 'rma_mkt' ) {
									if (row.qa != 1) {
										jQuery.messager.show({msg: 'Belum Confirm Oleh Quality !!'});
									} else if (row.mkt != 1) {
										$('#id_rma_mkt').val(row.id_rma);
										jQuery('#form-jawab-mkt').form('load',row);
										jQuery('#jawab-mkt').dialog('open').dialog('setTitle','Marketing');
									} else {
										jQuery.messager.show({msg: 'Sudah Confirm !!'});
									}
								} else {
									alert('not found');
								}
							},
							fitColumns:true">
			<thead>
				<tr>
					<th field="id_rma" width="100" sortable="true" align="center">PR No.</th>
					<th field="penarikan_qty" width="100" sortable="true" align="center">Approved</th>
					<th field="cust" width="200" sortable="true" align="center">Approved By</th>
					<th field="surat_jalan" width="100" align="center">Jenis</th>
					<th field="status_log" width="100" sortable="true" align="center">Procurement</th>
					<th field="status_qa" width="100" sortable="true" align="center">Finance</th>
					<th field="no_po" width="200" align="center">PO Number</th>
					<th field="report_date" width="100" sortable="true" align="center">Approval</th>
				</tr>
			</thead>

			<!-- START OF CODE BY RIZKY@220302 -->
			<!-- PR data sample -->
			<tbody>
				<tr>
					<td>0004</td>
					<td><span style="padding-left:25px; color:#54CC1B; font-size: 25px">&#x2022;</span></td>
					<td>Beni Nugraha</td>
					<td>Umum</td>
					<td><span style="padding-left:25px; color:#DF0F0F; font-size: 25px">&#x2022;</span></td>
					<td><span style="padding-left:25px; color:#DF0F0F; font-size: 25px">&#x2022;</span></td>
					<td></td>
					<td><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok',plain:true" onclick="procurement_approval()"></a></td>
				</tr>
				<tr>
					<td>0003</td>
					<td><span style="padding-left:25px; color:#54CC1B; font-size: 25px">&#x2022;</span></td>
					<td>Beni Nugraha</td>
					<td>Material</td>
					<td><span style="padding-left:25px; color:#DF0F0F; font-size: 25px">&#x2022;</span></td>
					<td><span style="padding-left:25px; color:#DF0F0F; font-size: 25px">&#x2022;</span></td>
					<td></td>
					<td><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok',plain:true" onclick="procurement_approval()"></a></td>
				</tr>
				<tr>
					<td>0002</td>
					<td><span style="padding-left:25px; color:#54CC1B; font-size: 25px">&#x2022;</span></td>
					<td>Beni Nugraha</td>
					<td>Umum</td>
					<td><span style="padding-left:25px; color:#54CC1B; font-size: 25px">&#x2022;</span></td>
					<td><span style="padding-left:25px; color:#DF0F0F; font-size: 25px">&#x2022;</span></td>
					<td>002</td>
					<td>dd/mm/yyyy</td>
				</tr>
				<tr>
					<td>0001</td>
					<td><span style="padding-left:25px; color:#54CC1B; font-size: 25px">&#x2022;</span></td>
					<td>Beni Nugraha</td>
					<td>Umum</td>
					<td><span style="padding-left:25px; color:#54CC1B; font-size: 25px">&#x2022;</span></td>
					<td><span style="padding-left:25px; color:#54CC1B; font-size: 25px">&#x2022;</span></td>
					<td>002</td>
					<td>dd/mm/yyyy</td>
				</tr>
			</tbody>
			<!-- END OF CODE BY RIZKY@220302 -->

		</table>
		</div>
		<!-- TABLE UTAMA EOF -->
		<!-- TABLE TENGAH -->
		<div style="height:2px;background-color:#3E6DB9;margin:2px">
		</div>
		<!-- TABLE TENGAH EOF -->
		<!-- TABLE DETAIL -->
		<div style="height:39%" style="border-style: solid;padding:10px">
		<div id="p" class="easyui-panel" title="Detail Purchase Request" fit="true" style="width:auto;height:auto;padding:0px;">
		<div style="float:left;" width="100%" style="border-right: 1px solid #95B8E7">

			<!-- START OF CODE BY RIZKY@220225 -->
			<!-- Create PR items preview -->
			<table id="datagrid-rma-detail" class="easyui-datagrid" url="" style="width:1300px;" fit="false" toolbar="#" pagination="false" rownumbers="true" fitColumns="false" singleSelect="true" collapsible="true"
			data-options="">
				<thead>
					<tr>
						<th field="tgl_prod_diterima" width="500" align="left">Barang</th>
						<th field="jml_prod_kembali" width="100" align="center">Qty</th>
						<th field="no_nc" width="150" align="center">Satuan</th>
						<th field="jml_prod_ok" width="100" align="center">Due Date</th>
						<th field="expert_review" width="150" align="left">Expert Review</th>
						<th field="delete_action" width="50" align="center">#</th>
					</tr>
				</thead>
				
				<!-- START OF CODE BY RIZKY@220301 -->
				<!-- Create dummy data -->
				<tbody>
					<tr>
						<td>Coba lagi lah ya</td>
						<td>2</td>
						<td>Pcs</td>
						<td>01/03/2023</td>
						<td><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-edit',plain:true" onclick="request_expert()"></a></td>
						<td><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel',plain:true" onclick="removeItem()"></a></td>
					</tr>
					<tr>
						<td>Contoh sudah di-approve</td>
						<td>2</td>
						<td>Pcs</td>
						<td>01/03/2023</td>
						<td><span style="left:0px; color:#54CC1B; font-size: 25px">&#x2022;</span>Andi Akbar</td>
						<td><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel',plain:true" onclick="removeItem()"></a></td>
					</tr>
					<tr>
						<td>Kalo ini belum di-approve</td>
						<td>2</td>
						<td>Pcs</td>
						<td>01/03/2023</td>
						<td><span style="left:0px; color:#DF0F0F; font-size: 25px">&#x2022;</span>IT</td>
						<td><a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel',plain:true" onclick="removeItem()"></a></td>
					</tr>
				</tbody>
				<!-- END OF CODE BY RIZKY@220301 -->

			</table>
			<!-- END OF CODE BY RIZKY@220225 -->

		</div>
		<div style="height:98%" width="39%" align="right" style="border-left: 1px solid #95B8E7;background:#000">
				<img id="img_rma" class='img' valign='top' ondblclick="jQuery('#dialog-open-img').dialog('open').dialog('setTitle','Images Detail');
				jQuery('#open-img').attr('src', this.src);">
		</div>
		</div>
		</div>
		<!-- TABLE DETAIL EOF -->
		</div>
	</div>

	</div>
	
<?php if ( $this->permissions->menu($menu_id, 'created') ) { ?>
			<a href="<?php echo base_url('order_dev/form_dev') ?>" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true">New</a>
<?php } ?>
<div id="dialog-form" class="easyui-dialog" style="width:1200px; height:450px; padding: 0px 0px" modal="true" closed="true" buttons="#dialog-buttons-user">
    <iframe id="frame1" name="frame1"  src="" frameborder="0" style="width:100%; height:99%; border:0; border:none" ></iframe> 
</div>
<div id="dialog-open-closed-approved" class="easyui-dialog" style="width:315px; height:200px;padding:4px" modal="true" closed="true">
		<form id="form-capa-close-verify" method="post" name="form_capa_close" novalidate>	
            <!-- <div style="margin-bottom:2px">
				<input name="date_verify" id="date_verify" class="easyui-datebox" data-options="validType:'length[10,10]',formatter:myformatter,parser:myparser" value="<?php echo date('Y-m-d H:i:s') ?>">
			</div> -->

           <div style="float:left;width:120px;align:left">
				<label>Status Approved</label>
			</div>

            <select id="alasan" class="easyui-combobox" name="Alasan" style="width:200px;"  required="true" size="20" maxlength="5">
				<option value="Pembetulan">Approved</option>
				<option value="Tidak ditagih">Not Approved</option>
			</select>

			<div style="margin-bottom:2px">
			<input name="verify_comment" id="verify_comment" multiline="true" class="easyui-textbox" style="width:285px;height:80px;" data-options="validType:'length[0,100]'">
			</div>
			<a href="javascript:void(0)" id="form_verify_submit" class="easyui-linkbutton" iconCls="icon-ok">Submit</a>
		</form>
	</div>	

<!-- Followup -->
<div id="jawab-log" class="easyui-dialog" style="width:650px; height:250px; padding: 4px 6px" modal="true" closed="true">
	<form id="form-jawab-log" name="form-jawab-log" method="post" action="<?php echo base_url('rma/jawab_log'); ?>" novalidate>
	<table border="0" width="100%">
					<tr>
						<td width="25%"></td>
						<td width="40%"></td>
						<td width="20%"></td>
						<td width="5%"></td>
					</tr>
					<tr>
						<td>Rencana penarikan </td>
						<td style="padding-left:10px;">
						<input type="hidden" name="id_rma_log" id="id_rma_log" style="width:200px">
							<input type="text" name="rencana_tarik" id="rencana_tarik" class="easyui-datebox" style="width:100px" data-options="validType:'length[10,10]',formatter:myformatter,parser:myparser">
						</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Tanggal produk diterima </td>
						<td style="padding-left:10px;">
							<input type="text" name="tgl_prod_diterima" id="tgl_prod_diterima" class="easyui-datebox" style="width:100px" data-options="validType:'length[10,10]',formatter:myformatter,parser:myparser">
						</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Jumlah produk kembali </td>
						<td style="padding-left:10px;">
							<input name="jml_prod_kembali" id="jml_prod_kembali" class="easyui-textbox" style="width:80px">
						</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Catatan ketidaksesuaian </td>
						<td style="padding-left:10px;" colspan="2">
							<input name="note_ktd" id="note_ktd" class="easyui-textbox" style="width:400px">
						</td>
						<td></td>
					</tr>
					<tr>
						<td colspan="2">
							<div id="btn-jawab-log">
								<a href="#" type="submit" id="submit-jawab-log" class="easyui-linkbutton" style="width:120px">Kirim</a>
							</div>
						</td>
					</tr>
		</table>
		

	</form>
</div>

<div id="jawab-qa" class="easyui-dialog" style="width:650px; height:250px; padding: 4px 6px" modal="true" closed="true">
	<form id="form-jawab-qa" name="form-jawab-qa" method="post" action="<?php echo base_url('rma/jawab_qa'); ?>" enctype="multipart/form-data">
	<table border="0" width="100%">
						<tr>
							<td width="50%"></td>
							<td width="40%"></td>
							<td width="5%"></td>
							<td width="5%"></td>
						</tr>
<script>
$(document).ready(function () {
			$('#no_nc').combogrid({
				panelWidth:500,
				url: '<?php echo base_url('rma/autocomplete_nc/'); ?>/',
				idField:'id_nc',
				fitColumns: true,
				textField:'id_nc',
				mode:'remote',
				onSelect:  function(){  
				  //var val = $('#prod_name').combogrid('grid').datagrid('getSelected');
				  //$('#prod_id').textbox('setValue', val.id_prod);
				 },
				columns:[[
					{field:'id_nc',title:'ID',width:80},
				]],
			});

});
</script>
						<tr>
							<td>No. NC </td>
							<td style="padding-left:10px;">
								<input type="hidden" name="id_rma_qa" id="id_rma_qa" style="width:200px">
								<input name="no_nc" id="no_nc" class="easyui-textbox" style="width:200px">
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Jumlah produk OK </td>
							<td style="padding-left:10px;">
								<input name="jml_prod_ok" id="jml_prod_ok" class="easyui-textbox" style="width:80px">
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Jumlah produk NG </td>
							<td style="padding-left:10px;">
								<input name="jml_prod_ng" id="jml_prod_ng" class="easyui-textbox" style="width:80px">
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>No. Laporan pemusnahan produk </td>
							<td style="padding-left:10px;">
								<input name="laporan_pemusnah" id="laporan_pemusnah" class="easyui-textbox" style="width:350px">
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="2">
								<div id="btn-jawab-nc">
									<a href="#" type="submit" id="submit-jawab-qa" class="easyui-linkbutton" style="width:120px">Kirim</a>
								</div>
							</td>
						</tr>
	</table>

	</form>
</div>

<!-- Marketing EOF-->
<!-- Followup END -->
<script>
$("#submit-jawab-log").on('click', function(){

$('#form-jawab-log').form('submit',{
	url: $(this).attr("action"),
	onSubmit: function(){
		return jQuery(this).form('validate');
	},
	success: function(result){
		var result = eval('('+result+')');
		if(result.success){
			jQuery('#datagrid-rma').datagrid('reload');
			jQuery('#jawab-log').dialog('close');
			jQuery.messager.show({
				title: 'Success',
				msg: 'Berhasil dikirim'
			});
		//return true;

		} else {
			jQuery.messager.show({
				title: 'Error',
				msg: result.msg
			});
		}
	}
}); 
});

$("#submit-jawab-qa").on('click', function(){

$('#form-jawab-qa').form('submit',{
	url: $(this).attr("action"),
	onSubmit: function(){
		return jQuery(this).form('validate');
	},
	success: function(result){
		var result = eval('('+result+')');
		if(result.success){
			jQuery('#datagrid-rma').datagrid('reload');
			jQuery('#jawab-qa').dialog('close');
			jQuery.messager.show({
				title: 'Success',
				msg: 'Berhasil dikirim'
			});
		//return true;

		} else {
			jQuery.messager.show({
				title: 'Error',
				msg: result.msg
			});
		}
	}
}); 
});

$("#submit-jawab-mkt").on('click', function(){

$('#form-jawab-mkt').form('submit',{
	url: $(this).attr("action"),
	onSubmit: function(){
		return jQuery(this).form('validate');
	},
	success: function(result){
		var result = eval('('+result+')');
		if(result.success){
			jQuery('#datagrid-rma').datagrid('reload');
			jQuery('#jawab-mkt').dialog('close');
			jQuery.messager.show({
				title: 'Success',
				msg: 'Berhasil dikirim'
			});
		//return true;

		} else {
			jQuery.messager.show({
				title: 'Error',
				msg: result.msg
			});
		}
	}
}); 
});

$("#form-img").submit(function(event){
    //disable the default form submission
    event.preventDefault();
  
    //grab all form data 
    var formData = new FormData($(this)[0]);
  
    $.ajax({
   url: $(this).attr("action"),
   type: 'POST',
   data: formData,
   async: false,
   cache: false,
   contentType: false,
   processData: false,
   success: function (result) {
	   jQuery('#datagrid-rma').datagrid('reload');
	   jQuery('#dialog-upload-rma').dialog('close');
     //$("#form_info").html(returndata);
	 jQuery.messager.show({
		title: 'Success',
		msg: 'Gambar berhasil diupload'
	});
   }
    });
  
    return false;
  
 });
 
function upload_rma(){
	var row = jQuery('#datagrid-rma').datagrid('getSelected');
	if(row){
		var urlID = row.id_rma;
		$('#imgInp').val('');
		$('#id_rma_upload').val(urlID);
		$('#upload-after').attr('src', '');
		jQuery('#dialog-upload-rma').dialog('open').dialog('setTitle','Upload Images');	
	}
}

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		
		reader.onload = function (e) {
			$('#upload-after').attr('src', e.target.result);
		}
		
		reader.readAsDataURL(input.files[0]);
	}
}
    
$("#imgInp").change(function(){
	readURL(this);
});
</script>
</body>
</html>