<?php require('config.php'); ?>
<?PHP include 'header.php'; ?>

</br></br></br></br>

<div class="wrapper wrapper-content animated fadeInRight">				
		<div class="row" style="margin-bottom:10px;">			
				<div class="col-lg-12">
					<a href="admin-kategoriler.php" onclick="document.form(0).submit();" class="btn btn-primary ">Hepsi</a>
					<a href="admin-kategori-ekle.php" onclick="submit();" href="javascript:void(0);" class="btn btn-primary ">Yeni Ekle</a>
					<a href="admin-kategori-duzenle.php" name="duzenle" class="btn btn-primary ">Düzenle</a>
					<a href="admin-kategori-sil.php" name="sil" class="btn btn-danger ">Sil</a>
				</div>
			</div>
		
		<div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">                   
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                
								
                             
								                                    
                                   
									
								<?php 
								$checkData =  mysql_query("SELECT tag FROM tags  ") or die(mysql_error());	
											
								echo   '<form role="form" action="admin-kategori-sil.php" method="post">
										<div class="form-group"><label>Kategoriler</label> 
										<select class="form-control" name="kategoriler">';
										while($row= mysql_fetch_array($checkData))
								{
										echo "<option class=\"form-control\" value=\"$row[tag]\">$row[tag]</option>";
										
								}
								echo "</select></div>";
								
								echo "<div><button type=\"submit\" name=\"kategoriSil\" class=\"btn btn-sm btn-primary pull-right m-t-n-xs\">Sil!</button></div>";
								echo "</form>";
									
									
									?>
									
                                    
                              
                            
							
							<?php
						extract($_POST);
						$currentDate = date('Y-m-d H:i:s');
						if(isset($kategoriSil)){
						
						$deleteQuery = "delete from tags where tag='$kategoriler'";
								
									
						$result = mysql_query($deleteQuery);
						
						if($result){
							
							echo "<h2>Mesaj:</h2>";
							echo "Kategori başarılı bir şekilde silindi!<br>";
							
							$message="Kategori Silindi.";
							$notifType="Kategori";
							$operationType="Silindi";
							
							$notificationQ = "INSERT INTO notifications (notification, notification_date, item, type, operation)
								VALUES ('".$message."', '".$currentDate."', '".$kategoriler."', '".$notifType."', '".$operationType."')" ;
																					
							$notiresult = mysql_query($notificationQ);
							
						}
						else {
							echo "<h2>Mesaj:</h2>";
							echo "Kategori silinemedi. Lütfen tekrar deneyiniz.";
						}
						
						
						}
						?>
                            
                        </div>
                    </div>
                </div>
            </div>
			
		
			
            </div>
			
			
			
			
			
</div>


<?PHP include 'footer.php'; ?>