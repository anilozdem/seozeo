<?php require('config.php'); ?>
<?PHP include 'header.php'; ?>

<head>

    <!-- Data Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
	
</head>
<body>
			</br></br></br></br>
			        <div class="wrapper wrapper-content animated fadeInRight">
            
            <div class="row">
            <div class="col-lg-12">
            
            
            <div class="ibox-content">
          
			
			
			<div class="ibox float-e-margins" class="row" style="margin-bottom:10px;">
                    <form role="form" action="admin-odemeler.php" method="post">                      						
						
						<div class="form-group" id="data_1">
                            <div class="col-lg-3" class="form-group" id="data_1"> 
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-desktop"></i></span>
									<div class="form-group"> 
											<select class="form-control" name="blogAdi">
												<option class="form-control" value="blogtitle" selected>Blog Adı/Yazarı </option>
												<?php 
												$checkData =  mysql_query("SELECT blog FROM assignment") or die(mysql_error());	

														while($row= mysql_fetch_array($checkData))
												{
														echo "<option class=\"form-control\" value=\"$row[blog]\">$row[blog]</option>";
														
												}
												echo "</select></div>";
												
												
												?>
                                </div>
							</div>
                        </div>
						
			
						
						<div class="form-group" >
                            <div class="col-lg-3" class="form-group" id="data_1"> 
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-try"></i></span><div class="form-group" > 
											<select class="form-control" name="durum">
											<option class="form-control" value="bos" selected>Durum </option>
											<option class="form-control" value="Ödendi">Ödendi </option>
											<option class="form-control" value="Ödeme Bekliyor">Ödeme Bekliyor </option>
											<option class="form-control" value="Ödenmedi">Ödenmedi </option>
						</select></div>
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
					
			</div>
			
			
			</form>
			
			<br><br><br><br>
			
			
            <table class="table table-striped table-bordered table-hover " id="editable" >
            <thead>
            <tr>
				<th>Seçilen</th>
                <th>Blog</th>
                <th>Fiyat</th>
                <th>Durum</th>
                
            </tr>
			</thead>
			
			
			<tbody>
            <tr class="gradeX">
			<form role="form" action="admin-odemeler.php" method="post">
			<?php
							extract($_POST);
							$tot_payment=0;
							$numOfPayments=0;
							if(isset($filtrele))
										{
											//hiçbir seçim yapmadan filtreleme								
										if ($blogAdi=="blogtitle" and $durum=="bos" and $ilkTarih=="" and $sonTarih==""){
											echo "Lütfen Arama Bilgilerinizi Kontrol Edin!";
											
										}
										 //blog adına göre
										else if($blogAdi!=="blogtitle" and $durum=="bos" and $ilkTarih=="" and $sonTarih==""){
												
												$getBlogs =  mysql_query("SELECT blogs.cost, customer, blog, tags, url, topic, aim, date, payment_status FROM assignment, blogs where blog=domain and blog='$blogAdi'") or die(mysql_error());
							
												while($row= mysql_fetch_array($getBlogs))
												{	echo"<tr>";
													echo"<td><input type=\"checkbox\" class=\"i-checks\" name=\"check_list[]\" value=".$row['blog']."></td>";
													echo"<td>".$row['blog'] . " </td>";
													echo"<td>".$row['url'] . " </td>";
													echo"<td>".$row['payment_status'] . " </td></tr>";
												}
													echo "</table>";
											
										}
										//durumuna göre
										else if($blogAdi=="blogtitle" and $durum!=="bos" and $ilkTarih=="" and $sonTarih==""){
												
												$getBlogs =  mysql_query("SELECT blogs.cost, customer, blog, tags, url, topic, aim, date, payment_status FROM assignment,blogs where blog=domain and payment_status='$durum'") or die(mysql_error());
							
												while($row= mysql_fetch_array($getBlogs))
												{	echo"<tr>";
													echo"<td><input type=\"checkbox\" class=\"i-checks\" name=\"check_list[]\" value=".$row['blog']."></td>";
													echo"<td>".$row['blog'] . " </td>";
													echo"<td>".$row['url'] . " </td>";
													echo"<td>".$row['payment_status'] . " </td></tr>";
												}
													echo "</table>";
											
										}
										//blog adı ve durumuna göre
										else if($blogAdi!=="blogtitle" and $durum!=="bos" and $ilkTarih=="" and $sonTarih==""){
												
												$getBlogs =  mysql_query("SELECT blogs.cost, customer, blog, tags, url, topic, aim, date, payment_status FROM assignment,blogs where blog=domain and blog='$blogAdi' and payment_status='$durum'") or die(mysql_error());
							
												while($row= mysql_fetch_array($getBlogs))
												{	echo"<tr>";
													echo"<td><input type=\"checkbox\" class=\"i-checks\" name=\"check_list[]\" value=".$row['blog']."></td>";
													echo"<td>".$row['blog'] . " </td>";
													echo"<td>".$row['url'] . " </td>";
													echo"<td>".$row['payment_status'] . " </td></tr>";
												}
													echo "</table>";
											
										}
										//sadece tarih 
										else if($blogAdi=="blogtitle" and $durum=="bos" and $ilkTarih!=="" and $sonTarih!==""){
												
												$getBlogs =  mysql_query("SELECT blogs.cost, customer, blog, tags, url, topic, aim, date, payment_status FROM assignment,blogs where blog=domain and date between '$ilkTarih' and '$sonTarih' ORDER by customer DESC") or die(mysql_error());
							
												while($row= mysql_fetch_array($getBlogs))
												{	echo"<tr>";
													echo"<td><input type=\"checkbox\" class=\"i-checks\" name=\"check_list[]\" value=".$row['blog']."></td>";
													echo"<td>".$row['blog'] . " </td>";
													echo"<td>".$row['url'] . " </td>";
													echo"<td>".$row['payment_status'] . " </td></tr>";
												}
													echo "</table>";
											
										}
										
										//hepsi seçiliyken
										else {
												
												$getBlogs =  mysql_query("SELECT blogs.cost, customer, blog, tags, url, topic, aim, date, payment_status FROM assignment,blogs where blog=domain and blog='$blogAdi' and payment_status='$durum' and date between '$ilkTarih' and '$sonTarih' ORDER by customer DESC") or die(mysql_error());
							
												while($row= mysql_fetch_array($getBlogs))
												{	echo"<tr>";
													echo"<td><input type=\"checkbox\" class=\"i-checks\" name=\"check_list[]\" value=".$row['blog']."></td>";
													echo"<td>".$row['blog'] . " </td>";
													echo"<td>".$row['url'] . " </td>";
													echo"<td>".$row['payment_status'] . " </td></tr>";
												}
													echo "</table>";
											
										}
										}
										
										else{
											$getBlogs =  mysql_query("SELECT customer, cost, blog, tags, url, topic, aim, date, status, payment_status FROM assignment,blogs WHERE blog=domain and status='Yayınlandı'") or die(mysql_error());
										
		
											while($row= mysql_fetch_array($getBlogs))
											{				echo"<tr>";
															echo"<td><input type=\"checkbox\" class=\"i-checks\" name=\"check_list[]\" value=".$row['blog']."></td>";
															echo"<td>".$row['blog']."</td>";
															echo"<td>".$row['cost']."</td>";
															echo"<td>".$row['payment_status'] . " </td></tr>";
											
											$numOfPayments= $numOfPayments+1;
											$tot_payment += $row['cost'];
											}
											echo"<tr>";
											echo"<td></td>";
											echo"<td><strong>Toplam Blog Sayısı:</strong> $numOfPayments</td>";
											
											echo"<td><strong>Toplam Ödeme:</strong> $tot_payment </td>";
											echo"<td> </td></tr>";
										
										echo "</table>";
											
										}			
							
						?> 
 
				</tbody>
            
				</table>
				<button class="btn btn-primary" name="odendi" type="submit">Ödendi Olarak İşaretle</button>  
				<button class="btn btn-warning" name="bekliyor" type="submit">Bekliyor Olarak İşaretle</button>   
				<button class="btn btn-danger" name="odenmedi" type="submit">Ödenmedi Olarak İşaretle</button> 
				</form>
			<br><br>
			<?php
						extract($_POST);
							$currentDate = date('Y-m-d H:i:s');
														
							if(isset($odendi)){
										foreach($_POST['check_list'] as $selected) {
									
										$deleteQuery = "UPDATE assignment SET payment_status='Ödendi' WHERE blog='$selected'";
										$result = mysql_query($deleteQuery);
										
										if($result){
												echo'<div class="alert alert-success"> ';
												echo "<h2>Mesaj:</h2>";
												echo "Ödeme başarılı bir şekilde yapıldı!<br>";
												echo "Ödeme Yapılan Blog: $selected <br>";
												echo "</div>";
												
																								
												$message="Ödeme Yapıldı.";
												$notifType="Ödeme";
												$operationType="Yayınlandı";
												
												$notificationQ = "INSERT INTO notifications (notification, notification_date, item, type, operation)
													VALUES ('".$message."', '".$currentDate."', '".$selected."', '".$notifType."', '".$operationType."')" ;
																										
												$notiresult = mysql_query($notificationQ);
												
											}
											else {
												echo "<h2>Hata:</h2>";
												echo "Ödeme Yapılamadı. Lütfen tekrar deneyiniz.";
											}
										
										
										}
										header( "Refresh:1; url=admin-odemeler.php", true, 303);
										
							}
							
							else if(isset($bekliyor)){
										foreach($_POST['check_list'] as $selected) {
										
										$archiveQ = "UPDATE assignment SET payment_status='Ödeme Bekliyor' WHERE blog='$selected'";
										$result = mysql_query($archiveQ);
										
										if($result){
											
											echo '<div class="alert alert-success"> ';
											echo "<h2>Mesaj:</h2>";
											echo "Ödeme durumu <strong> Bekliyor </strong> olarak değiştirildi!<br>";
											echo "Durumu Değiştirilen Görev: $selected <br>";
											echo "</div>";
											
												$message="Ödeme durumu <strong>Bekliyor </strong> olarak değiştirildi.";
												$notifType="Ödeme";
												$operationType="Arşivlendi";
												
												$notificationQ = "INSERT INTO notifications (notification, notification_date, item, type, operation)
													VALUES ('".$message."', '".$currentDate."', '".$selected."', '".$notifType."', '".$operationType."')" ;
																										
												$notiresult = mysql_query($notificationQ);
										}
										else {
											
											echo "Görev silinemedi. Lütfen tekrar deneyiniz.";
										}
										
										
										}
										header( "Refresh:1; url=admin-odemeler.php", true, 303);
										
								
							}
							
							else if(isset($odenmedi)){
										foreach($_POST['check_list'] as $selected) {
										
										$archiveQ = "UPDATE assignment SET payment_status='Ödenmedi' WHERE blog='$selected'";
										$result = mysql_query($archiveQ);
										
										if($result){
											echo'<div class="alert alert-success"> ';
											echo "<h2>Mesaj:</h2>";
											echo "Ödeme durumu Ödenmedi olarak değiştirildi!<br>";
											echo "Ödeme Durumu Değiştirilen Blog: $selected <br>";
											echo "</div>";
											
												$message="Ödeme durumu<strong> Ödenmedi </strong> olarak değiştirildi.";
												$notifType="Ödeme";
												$operationType="Yayınlandı";
												
												$notificationQ = "INSERT INTO notifications (notification, notification_date, item, type, operation)
													VALUES ('".$message."', '".$currentDate."', '".$selected."', '".$notifType."', '".$operationType."')" ;
																										
												$notiresult = mysql_query($notificationQ);
										}
										else {
											
											echo "Görev durumu değiştirilemedi. Lütfen tekrar deneyiniz.";
										}
										
										
										}
										header( "Refresh:1; url=admin-odemeler.php", true, 303);
								
								
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