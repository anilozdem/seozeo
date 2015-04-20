<?PHP include 'header.php'; ?>
<?php require('config.php'); ?>

</br></br></br></br>
<div class="wrapper wrapper-content animated fadeInRight">		
			
					
			<div class="row" style="margin-bottom:10px;">			
				<div class="col-lg-12">
					<a href="admin-bloglar.php" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Hepsi</a>
					<a href="admin-bloglar-uygun-olanlar.php" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Uygun Olanlar</a>
					<a href="admin-bloglar-dondurulmus-hesaplar.php" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Dondurulmuş Hesaplar</a>
					<a href="admin-bloglar-silinenler.php" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Silinenler</a>
				</div>
			</div>
			
			<div class="row" style="margin-bottom:10px;">
				<div class="col-lg-6">
						<div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
						 <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
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
							<th>Blog Adı</th>
							<th>E-mail</th>
							<th>P*T Değeri</th>
							<th>Fiyat</th>
							<th>Bilgi</th>
						</tr>
						</thead>
						<tbody>
						<tr class="gradeX">
								<?php
									$getBlogs =  mysql_query("SELECT users.name, users.domain, blogs.date, blogs.tags, url, status FROM blogs,users where user_id=id and user_id =1 and status='Silindi'") or die(mysql_error());
								
								
													while($row= mysql_fetch_array($getBlogs))
													{				echo"<tr>";
																	
																	echo"<td>".$row['name'] . " </td>";
																	echo"<td>".$row['domain'] . " </td>";
																	echo"<td>".$row['date'] . " </td>";
																	echo"<td>".$row['tags'] . " </td>";
																	echo"<td>".$row['url'] . " </td>";
																	echo"<td>".$row['status'] . " </td></tr>";
																	
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
			});
			</script>


<?PHP include 'footer.php'; ?>