<?php require('config.php'); ?>
<?PHP include 'header.php'; ?>

</br></br></br></br>

<div class="wrapper wrapper-content animated fadeInRight">				
		<div class="row" style="margin-bottom:10px;">			
				<div class="col-lg-12">
					<a href="admin-gorevler.php" onclick="fnClickAddRow();" class="btn btn-primary ">Hepsi</a>
					<a href="admin-gorev-ekle.php" onclick="fnClickAddRow();" class="btn btn-primary ">Ekle</a>
					<a href="admin-gorev-sil.php" onclick="fnClickAddRow();" class="btn btn-danger ">Sil</a>
					<a href="admin-gorev-silinenler.php" onclick="fnClickAddRow();" class="btn btn-primary ">Silinenler</a>
					<a href="admin-gorev-arsivle.php" onclick="fnClickAddRow();" class="btn btn-primary ">Arşivle</a>
					<a href="admin-gorev-arsivlenenler.php" onclick="fnClickAddRow();" class="btn btn-primary ">Arşivlenler</a>
				</div>
			</div>
		
		<div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">                   
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                
								
                             
								                                    
                                   
									
								<?php 
								$checkData =  mysql_query("SELECT id FROM assignment where status!='Silindi'") or die(mysql_error());	
											
								echo   '<form role="form" action="admin-gorev-sil.php" method="post">
										<div class="form-group"><label>Gorevler</label> 
										<select class="form-control" name="gorevler">';
										while($row= mysql_fetch_array($checkData))
								{
										echo "<option class=\"form-control\" value=\"$row[id]\">$row[id]</option>";
										
								}
								echo "</select></div>";
								
								echo "<div><button type=\"submit\" name=\"gorevSil\" class=\"btn btn-sm btn-danger pull-right m-t-n-xs\">Sil!</button></div>";
								echo "</form>";
									
									
									?>
									
                                    
                              
                            
							
							<?php
						extract($_POST);
						
						if(isset($gorevSil)){
						
						$deleteQuery = "delete from assignment where id='$gorevler'";
								
									
						$result = mysql_query($deleteQuery);
						
						if($result){
							
							echo "<h2>Mesaj:</h2>";
							echo "Görev başarılı bir şekilde silindi!<br>";
							
						}
						else {
							echo "<h2>Mesaj:</h2>";
							echo "Görev silinemedi. Lütfen tekrar deneyiniz.";
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