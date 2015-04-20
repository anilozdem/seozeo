<?php require('config.php'); ?>
<?PHP include 'header.php'; ?>

</br></br></br></br>

<div class="wrapper wrapper-content animated fadeInRight">				
		<div class="row" style="margin-bottom:10px;">			
				<div class="col-lg-12">
					<a href="admin-kategoriler.php" onclick="document.form(0).submit();" class="btn btn-primary ">Hepsi</a>
					<a href="admin-kategori-ekle.php" onclick="submit();" href="javascript:void(0);" class="btn btn-primary ">Yeni Ekle</a>
					<a href="admin-kategori-duzenle.php" name="duzenle" class="btn btn-primary ">Düzenle</a>
					<a href="admin-kategori-sil.php" name="sil" class="btn btn-primary ">Sil</a>
				</div>
			</div>
		
		<div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">                   
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                
								
                             
								                                    
                                   
									
								<?php 
								$checkData =  mysql_query("SELECT id FROM assignment  ") or die(mysql_error());	
											
								echo   '<form role="form" action="admin-kategori-sil.php" method="post">
										<div class="form-group"><label>Görevler</label> 
										<select class="form-control" name="gorevler">';
										while($row= mysql_fetch_array($checkData))
								{
										echo "<option class=\"form-control\" value=\"$row[id]\">$row[id]</option>";
										
								}
								echo "</select></div>";
								
								echo "<div><button type=\"submit\" name=\"arsivle\" class=\"btn btn-sm btn-primary pull-right m-t-n-xs\">Arşivle!</button></div>";
								echo "</form>";
									
									
									?>
									
                                    
                              
                            
							
							<?php
						extract($_POST);
						
						if(isset($arsivle)){
					$archiveQ = "UPDATE assignment SET status='Arşivlendi' WHERE id='$gorevler'";
								
									
						$result = mysql_query($archiveQ);
						
						if($result){
							
							echo "<h2>Mesaj:</h2>";
							echo "Kategori başarılı bir şekilde güncellendi!<br>";
							
						}
						else {
							echo "<h2>Mesaj:</h2>";
							echo "Kategori güncellenemedi! Lütfen tekrar deneyiniz.";
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