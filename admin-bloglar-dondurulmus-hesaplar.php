<?php require('config.php'); ?>
<?PHP include 'header.php'; ?>

<head>

    <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
	
</head>
<body>
			
			        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="col-lg-12">
				<div>
                      <div class="alert alert-success"><a class="alert-link" href="admin-blog-kabul.php">
                          1 Yeni Blog Kaydolmuştur</a>.
                     </div>
				</div>
			</div>
			
            <div class="row">
            <div class="col-lg-12">
            
            
            <div class="ibox-content">
            <div class="">
			<a href="admin-bloglar.php" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-success ">Hepsi</a>
			<a href="admin-bloglar-uygun-olanlar.php" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Uygun Olanlar</a>
			<a href="admin-bloglar-dondurulmus-hesaplar.php" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Dondurulmuş Hesaplar</a>
			<a href="admin-bloglar-silinenler.php" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Silinenler</a>
			</div>
			</br>
			<div class="row" style="margin-bottom:10px;">
				<div class="col-lg-6">
						<div class="input-group"><input type="text" placeholder="Arama" class="input-sm form-control"> <span class="input-group-btn">
						 <button type="button" class="btn btn-sm btn-primary"> Ara</button> </span></div>
				</div>	
			
				<br><br>
					<div class="ibox float-e-margins" class="row" style="margin-bottom:10px;">
                    <form role="form" action="admin-bloglar.php" method="post">                      						
						
							
						<div class="form-group" >
                            <div class="col-lg-3" class="form-group" id="data_1"> 
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-try"></i></span><div class="form-group" > 
											<select class="form-control" name="blogAdi">
											<option class="form-control" value="bos" selected>Blog Adı </option>
											<?php 
												$checkData =  mysql_query("SELECT DISTINCT domain FROM blogs") or die(mysql_error());	

														while($row= mysql_fetch_array($checkData))
												{
														echo "<option class=\"form-control\" value=\"$row[domain]\">$row[domain]</option>";
														
												}
												echo "</select>";
												
												
												?></div>
                                </div>
							</div>
                        </div>
						
						
						<div class="form-group" id="data_1">
                            <div class="col-lg-3" class="form-group" id="data_1"> 
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-desktop"></i></span>
									<div class="form-group"> 
											<select class="form-control" name="durum">
												<option class="form-control" value="blogtitle" selected>Durumu </option>
												<?php 
												$checkData =  mysql_query("SELECT DISTINCT  info FROM blogs") or die(mysql_error());	

														while($row= mysql_fetch_array($checkData))
												{
														echo "<option class=\"form-control\" value=\"$row[info]\">$row[info]</option>";
														
												}
												echo "</select>";
												
												
												?></div>
                                </div>
							</div>
                        </div>
						
						
						<div class="form-group" id="data_1">
                            <div class="col-lg-2" class="form-group" id="data_1"> 
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" name="ilkTarih" value="bos" placeholder="23/04/2014" class="form-control">
                                </div>
							</div>
                        </div>
						
						<div class="col-lg-2" class="form-group" id="data_1">
                                
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="date" name="sonTarih" value="bos" placeholder="23/06/2014" class="form-control" >
                                </div>
						</div>
						
						<div class="col-lg-2">
								<button class="btn btn-primary" name="filtrele" type="submit">Filtrele</button>   
						</div>
						</form>
						
						
						
					
			</div>
			
			
				</form>
			</div>
			
			
			
            <table class="table table-striped table-bordered table-hover " id="editable" >
            <thead>
            <tr>
				<th>Seçilen</th>
				<th>Blog Adı/Domain</th>
				<th>E-mail</th>
				<th>P*T Değeri</th>
				<th>Fiyat</th>
				<th>Bilgi</th>
            </tr>
			</thead>
			
			
			<tbody>
            <tr class="gradeX">
			<form role="form" action="admin-bloglar.php" method="post">
			<?php
							extract($_POST);
							
							if(isset($filtrele))
										{
											//hiçbir seçim yapmadan filtreleme								
										if ($blogAdi=="bos" and $durum=="blogtitle" and $ilkTarih=="" and $sonTarih==""){
											echo "Lütfen Arama Bilgilerinizi Kontrol Edin!";
											
										}
										 //blog adına göre
										else if($blogAdi!=="bos" and $durum=="blogtitle" and $ilkTarih=="" and $sonTarih==""){
												
												$getBlogs =  mysql_query("SELECT blog_id,name,email,pt,cost,info,domain FROM blogs where info='Dondurulmuş' and domain='$blogAdi'") or die(mysql_error());
							
												while($row= mysql_fetch_array($getBlogs))
												{	echo"<tr>";
														echo"<td><input type=\"checkbox\" class=\"i-checks\" name=\"check_list[]\" value=".$row['blog_id']."></td>";
														echo"<td>".$row['domain'] . " </td>";
													echo"<td>".$row['email'] . " </td>";
													echo"<td>".$row['pt'] . " </td>";
													echo"<td>".$row['cost'] . " </td>";
													echo"<td>".$row['info'] . " </td></tr>";
												}
													
											
										}
										//durumuna göre
										else if($blogAdi=="bos" and $durum!=="blogtitle" and $ilkTarih=="" and $sonTarih==""){
												
												$getBlogs =  mysql_query("SELECT blog_id,name,email,pt,cost,info,domain FROM blogs where info='Dondurulmuş' and  info='$durum'") or die(mysql_error());
							
												while($row= mysql_fetch_array($getBlogs))
												{	echo"<tr>";
													echo"<td><input type=\"checkbox\" class=\"i-checks\" name=\"check_list[]\" value=".$row['blog_id']."></td>";
														echo"<td>".$row['domain'] . " </td>";
													echo"<td>".$row['email'] . " </td>";
													echo"<td>".$row['pt'] . " </td>";
													echo"<td>".$row['cost'] . " </td>";
													echo"<td>".$row['info'] . " </td></tr>";
												}
													
											
										}
										//blog adı ve durumuna göre
										else if($blogAdi!=="bos" and $durum!=="blogtitle" and $ilkTarih=="" and $sonTarih==""){
												
												$getBlogs =  mysql_query("SELECT blog_id,name,email,pt,cost,info,domain FROM blogs where info='Dondurulmuş' and  domain='$blogAdi' and info='$durum'") or die(mysql_error());
							
												while($row= mysql_fetch_array($getBlogs))
												{	echo"<tr>";
													echo"<td><input type=\"checkbox\" class=\"i-checks\" name=\"check_list[]\" value=".$row['blog_id']."></td>";
														echo"<td>".$row['domain'] . " </td>";
													echo"<td>".$row['email'] . " </td>";
													echo"<td>".$row['pt'] . " </td>";
													echo"<td>".$row['cost'] . " </td>";
													echo"<td>".$row['info'] . " </td></tr>";
												}
													
											
										}
										//sadece tarih 
										else if($blogAdi=="bos" and $durum=="blogtitle" and $ilkTarih!=="" and $sonTarih!==""){
												
												$getBlogs =  mysql_query("SELECT blog_id,name,email,pt,cost,info,domain FROM blogs where info='Dondurulmuş' and  reg_date between '$ilkTarih' and '$sonTarih'") or die(mysql_error());
							
												while($row= mysql_fetch_array($getBlogs))
												{	echo"<tr>";
													echo"<td><input type=\"checkbox\" class=\"i-checks\" name=\"check_list[]\" value=".$row['blog_id']."></td>";
													echo"<td>".$row['domain'] . " </td>";
													echo"<td>".$row['email'] . " </td>";
													echo"<td>".$row['pt'] . " </td>";
													echo"<td>".$row['cost'] . " </td>";
													echo"<td>".$row['info'] . " </td></tr>";
												}
													
											
										}
										
										//hepsi seçiliyken
										else {
												
												$getBlogs =  mysql_query("SELECT blog_id,name,email,pt,cost,info,domain FROM blogs where info='Dondurulmuş' and domain='$blogAdi' and info='$durum' and reg_date between '$ilkTarih' and '$sonTarih'") or die(mysql_error());
							
												while($row= mysql_fetch_array($getBlogs))
												{	echo"<tr>";
													echo"<td><input type=\"checkbox\" class=\"i-checks\" name=\"check_list[]\" value=".$row['blog_id']."></td>";
													echo"<td>".$row['domain'] . " </td>";
													echo"<td>".$row['email'] . " </td>";
													echo"<td>".$row['pt'] . " </td>";
													echo"<td>".$row['cost'] . " </td>";
													echo"<td>".$row['info'] . " </td></tr>";
												}
													
											
										}
										}
										
							else{
								$getBlogs =  mysql_query("SELECT blog_id,name,email,pt,cost,info,domain FROM blogs where info='Dondurulmuş'") or die(mysql_error());
				
				
									while($row= mysql_fetch_array($getBlogs))
									{				echo"<tr>";
													echo"<td><input type=\"checkbox\" class=\"i-checks\" name=\"check_list[]\" value=".$row['blog_id']."></td>";
													echo"<td>".$row['domain'] . " </td>";
													echo"<td>".$row['email'] . " </td>";
													echo"<td>".$row['pt'] . " </td>";
													echo"<td>".$row['cost'] . " </td>";
													echo"<td>".$row['info'] . " </td></tr>";
													
									}
						
						echo "</table>";
								
							}			
							
						?> 
						
						
 
            </tbody>
			</table>
				<button class="btn btn-warning" name="ekle" type="submit">Ekle</button>  
				<button class="btn btn-primary" name="uygun" type="submit">Uygun Olarak İşaretle</button>   
				<button class="btn btn-info" name="dondur" type="submit">Dondur</button> 
				<button class="btn btn-danger" name="sil" type="submit">Sil</button>  				
           
			</form>
			<br><br>
				<?php
						extract($_POST);
							
														
							if(isset($sil)){
										
										foreach($_POST['check_list'] as $selected) {
										
										$archiveQ = "UPDATE blogs SET info='Silindi' WHERE blog_id='$selected'";
										$result = mysql_query($archiveQ);
										
											if($result){
												echo'<div class="alert alert-success"> ';
												echo "<h2>Mesaj:</h2>";
												echo "Görev başarılı bir şekilde silindi!<br>";
												echo "Silinen Görev ID:$selected <br>";
												echo "</div>";
											}
											else {
												echo "<h2>Hata:</h2>";
												echo "Görev silinemedi. Lütfen tekrar deneyiniz.";
											}
										
										
										}
										header( "Refresh:1; url=admin-bloglar.php", true, 303);
										
							}
							
							else if(isset($dondur)){
										foreach($_POST['check_list'] as $selected) {
										
										$archiveQ = "UPDATE blogs SET info='Donduruldu' WHERE blog_id='$selected'";
										$result = mysql_query($archiveQ);
										
										if($result){
											
											 echo '<div class="alert alert-success"> ';
											 echo "<h2>Mesaj:</h2>";
											echo "Blog başarılı bir şekilde donduruldu!<br>";
											echo "Dondurulan Görev ID:$selected <br>";
											echo "</div>";
										}
										else {
											
											echo "Blog dondurulamadı. Lütfen tekrar deneyiniz.";
										}
										
										
										}
										header( "Refresh:1; url=admin-bloglar.php", true, 303);
										
								
							}
							
							else if(isset($uygun)){
									
										
										foreach($_POST['check_list'] as $selected) {

										$archiveQ = "UPDATE blogs SET info='Uygun' WHERE blog_id='$selected'";
										$result = mysql_query($archiveQ);
										
										if($result){
											echo'<div class="alert alert-success"> ';
											echo "<h2>Mesaj:</h2>";
											echo "Görevin durumu Uygun olarak değiştirildi!<br>";
											echo "Uygun olarak işaretlenen görev ID:$selected <br>";
											echo "</div>";
										}
										else {
											
											echo "Görev durumu değiştirilemedi. Lütfen tekrar deneyiniz.";
										}
										
										
										}
										header( "Refresh:1; url=admin-bloglar.php", true, 303);
								
								
							}
							
							else if(isset($ekle)){
								header('Location: admin-blog-ekle.php');
								
								
								
							}
						
						?>
			 </div>
						<div class="btn-group">
                                <button type="button" class="btn btn-white"><i class="fa fa-chevron-left"></i></button>
                                <button class="btn btn-white active">1</button>
                                <button class="btn btn-white">2</button>
                                <button class="btn btn-white">3</button>
                                <button class="btn btn-white">4</button>
                                <button type="button" class="btn btn-white"><i class="fa fa-chevron-right"></i> </button>
                        </div>
            </div>
            </div>
            </div>
        </div>
        

        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
<style>
    body.DTTT_Print {
        background: #fff;

    }
    .DTTT_Print #page-wrapper {
        margin: 0;
        background:#fff;
    }

    button.DTTT_button, div.DTTT_button, a.DTTT_button {
        border: 1px solid #e7eaec;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }
    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
        border: 1px solid #d2d2d2;
        background: #fff;
        color: #676a6c;
        box-shadow: none;
        padding: 6px 8px;
    }

    .dataTables_filter label {
        margin-right: 5px;

    }
</style>
</body>

<?PHP include 'footer.php'; ?>