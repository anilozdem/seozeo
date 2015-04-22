<?PHP include 'header.php'; ?>
<?php require('config.php'); ?>

<div class="wrapper wrapper-content animated fadeInRight">		
			<div class="col-lg-12">
				<div>
                     <div class="alert alert-success"><a class="alert-link" href="admin-blog-kabul.php">
                          1 Yeni Blog Kaydolmuştur</a>.
                     </div>
				</div>
			</div>
					
			<div class="row" style="margin-bottom:10px;">			
				<div class="col-lg-12">
					<a href="admin-bloglar.php" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-success ">Hepsi</a>
					<a href="admin-bloglar-uygun-olanlar.php" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Uygun Olanlar</a>
					<a href="admin-bloglar-dondurulmus-hesaplar.php" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Dondurulmuş Hesaplar</a>
					<a href="admin-bloglar-silinenler.php" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Silinenler</a>
				</div>
			</div>
			
			<div class="row" style="margin-bottom:10px;">
				<div class="col-lg-6">
						<div class="input-group"><input type="text" placeholder="Arama" class="input-sm form-control"> <span class="input-group-btn">
						 <button type="button" class="btn btn-sm btn-primary"> Ara </button> </span></div>
				</div>	
			</div>
			
			<div class="ibox float-e-margins" class="row" style="margin-bottom:10px;">
                                           						
						<div class="form-group" id="data_1">
                            <div class="col-lg-3" class="form-group" id="data_1"> 
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014">
                                </div>
							</div>
                        </div>
						
						<div class="col-lg-3" class="form-group" id="data_1">
                                
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="03/04/2014">
                                </div>
						</div>
						
						<div class="col-lg-5">
								<a href="" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Uygula</a>
						</div>
					
			</div>
			
			
		
			<div class="row">
				<div class="col-lg-12">
				<div class="ibox">
					<div class="ibox content">
						<table class="table table-striped table-bordered table-hover dataTables-example" id="editable" >
						<thead>
						<tr>
							<th></th>
							<th>Blog Adı/Blog Sahibi</th>
							<th>E-mail</th>
							<th>P*T Değeri</th>
							<th>Fiyat</th>
							<th>Bilgi</th>
						</tr>
						</thead>
						<tbody>
						<tr class="gradeX">
						
						<?php
						$getBlogs =  mysql_query("SELECT name,email,pt,cost,info FROM blogs where cost>100") or die(mysql_error());
				
				
									while($row= mysql_fetch_array($getBlogs))
									{				echo"<tr>";
													echo "<td><input type=\"checkbox\" class=\"i-checks\" name=\"input[]\"></td>";
													echo"<td>".$row['name'] . " </td>";
													echo"<td>".$row['email'] . " </td>";
													echo"<td>".$row['pt'] . " </td>";
													echo"<td>".$row['cost'] . " </td>";
													echo"<td>".$row['info'] . " </td></tr>";
													
									}
									
									echo "</table>";
						?>
						
						
							
						</tbody>           
						</table>
					</div>
				</div>
				</div>
			</div>
</div>
						<div class="btn-group">
                                <button type="button" class="btn btn-white"><i class="fa fa-chevron-left"></i></button>
                                <button class="btn btn-white">1</button>
                                <button class="btn btn-white  active">2</button>
                                <button class="btn btn-white">3</button>
                                <button class="btn btn-white">4</button>
                                <button type="button" class="btn btn-white"><i class="fa fa-chevron-right"></i> </button>
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