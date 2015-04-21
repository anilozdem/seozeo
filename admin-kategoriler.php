<?PHP include 'header.php'; ?>
<?php require('config.php'); ?>

<div class="wrapper wrapper-content animated fadeInRight">		
			
					
			<div class="row" style="margin-bottom:10px;">			
				<div class="col-lg-12">
					<a href="admin-kategoriler.php" onclick="document.form(0).submit();" class="btn btn-success ">Hepsi</a>
					<a href="admin-kategori-ekle.php" onclick="submit();" href="javascript:void(0);" class="btn btn-primary ">Yeni Ekle</a>
					<a href="admin-kategori-duzenle.php" name="duzenle" class="btn btn-primary ">Düzenle</a>
					<a href="admin-kategori-sil.php" name="sil" class="btn btn-primary ">Sil</a>
				</div>
			</div>
			
			<div class="row" style="margin-bottom:10px;">
				<div class="col-lg-6">
						<div class="input-group"><input type="text" placeholder="Arama" class="input-sm form-control"> <span class="input-group-btn">
						 <button type="button" class="btn btn-sm btn-primary"> Ara</button> </span></div>
				</div>	
			</div>
			
			
			
			
		
			<div class="row">
				<div class="col-lg-6">
				<div class="ibox">
					<div class="ibox content">
						<form id="kategori" method="post" action="?">
						<table class="table table-striped table-bordered table-hover dataTables-example" id="editable" >
						<thead>
						<tr>
							
							<th>Kategoriler</th>
							
						</tr>
						</thead>
						<tbody>
						<tr class="gradeX">
						
						<?php
						$getBlogs =  mysql_query("SELECT tag FROM tags") or die(mysql_error());
				
				
									while($row= mysql_fetch_array($getBlogs))
									{				echo"<tr>";
													echo"<td>".$row['tag'] . " </td></tr>";
									}

									
						?>
						
						
						</tbody>           
						</table>
						</form>
						
					
					</div>
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