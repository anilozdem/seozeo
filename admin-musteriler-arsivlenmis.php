<?php require('config.php'); ?>
<?PHP include 'header.php'; ?>

</br></br></br></br>
<div class="wrapper wrapper-content animated fadeInRight">		
			
					
			<div class="row" style="margin-bottom:10px;">			
				<div class="col-lg-12">
					<a href="admin-musteri-ekle.php" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Müþteri Ekle</a>
					<a href="" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Müþteriyi Arþivle</a>
					<a href="admin-musteriler-arsivlenmis.php" class="btn btn-primary ">Arþivlenen Müþteriler</a>				
				</div>
			</div>
			
			<div class="row" style="margin-bottom:10px;">
				<div class="col-lg-6">
						<div class="input-group"><input type="text" placeholder="Arama" class="input-sm form-control"> <span class="input-group-btn">
						 <button type="button" class="btn btn-sm btn-primary"> Ara!</button> </span></div>
				</div>	
			</div>
			
			
			<div class="row">
				<div class="col-lg-12">
				<div class="ibox">
					<div class="ibox content">
						<form id="kategori" method="post" action="?">
						<table class="table table-striped table-bordered table-hover dataTables-example" id="editable" >
						<thead>
						<tr>
							
							<th>Müþteri ID</th>
							<th>Müþteri Ýsmi</th>
							<th>Yetkili Kiþi</th>
							<th>Yetkili E-posta</th>
							
						</tr>
						</thead>
						<tbody>
						<tr class="gradeX">
						
						<?php
						$getBlogs =  mysql_query("SELECT id,cust_name,responsible,responsible_email,archive FROM customers where archive='Yes' ") or die(mysql_error());
				
				
									while($row= mysql_fetch_array($getBlogs))
									{				echo"<tr>";
													echo"<td>".$row['id']."</td>";
													echo"<td>".$row['cust_name']."</td>";
													echo"<td>".$row['responsible']."</td>";
													echo"<td>".$row['responsible_email']. " </td></tr>";
									}

									
						?>
						
						
						</tbody>           
						</table>
						</form>
						
					
					</div>
				</div>
				</div>
			</div>
			
		
			
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });
			
			
			
			$('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
			
		});	
			
	</script>


<?PHP include 'footer.php'; ?>