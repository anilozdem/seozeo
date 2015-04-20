<?php require('config.php'); ?>
<?PHP include 'header.php'; ?>

</br></br></br></br>

<div class="wrapper wrapper-content animated fadeInRight">				
		<div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">                   
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div>
									<a href="admin-gorevler.php" onclick="fnClickAddRow();" class="btn btn-primary ">Hepsi</a>
									<a href="admin-gorev-ekle.php" onclick="fnClickAddRow();" class="btn btn-primary ">Ekle</a>
									<a href="admin-gorev-sil.php" onclick="fnClickAddRow();" class="btn btn-primary ">Sil</a>
									<a href="admin-gorev-silinenler.php" onclick="fnClickAddRow();" class="btn btn-primary ">Silinenler</a>
									<a href="admin-gorev-arsivle.php" onclick="fnClickAddRow();" class="btn btn-primary ">Arşivle</a>
									<a href="admin-gorev-arsivlenenler.php" onclick="fnClickAddRow();" class="btn btn-primary ">Arşivlenler</a>
									
                                    
                                </div>
								</br>
                               <button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit"><strong>Ekstra Anahtar Kelime Ekle</strong></button>                        
								</br></br>	</br>											
									<?php 
									$checkData =  mysql_query("SELECT cust_name FROM customers") or die(mysql_error());	
												
									echo   '<form role="form" action="admin-gorev-ekle.php" method="post">
											<div class="form-group"><label>Müşteri</label> 
											<select class="form-control" name="customer">';
											while($row= mysql_fetch_array($checkData))
									{
											echo "<option class=\"form-control\" value=\"$row[cust_name]\">$row[cust_name]</option>";
											
									}
									echo "</select></div>";
									
									
									?>
									
                                  
									
									
									<?php 
									$checkData =  mysql_query("SELECT name FROM blogs") or die(mysql_error());	
												
									echo   '<div class="form-group"><label>Blog Adı/Blog Sahibi</label> 
											<select class="form-control" name="blog">';
											while($row= mysql_fetch_array($checkData))
									{
											echo "<option class=\"form-control\" value=\"$row[name]\">$row[name]</option>";
											
									}
									echo "</select></div>";
									
									
									?>
									
									
									
									
                                    <div class="form-group"><label>Anahtar Kelime</label> <input type="text" name="tags" placeholder="Eğitim, Sağlık, Teknoloji..." class="form-control"></div>
									<div class="form-group"><label>Anahtar Kelimeye Eklenecek URL</label> <input name="url" type="text" placeholder="URL" class="form-control"></div>
                                    <div class="form-group"><label>Yazınin Konusu</label> <input type="text" name="topic" placeholder="Yazının Konusu" class="form-control"></div>
                                    <div class="form-group"><label>Yazınin Yazılma Amacı</label> <input name="aim" type="text" placeholder="Amacı" class="form-control"></div>
                                    <div class="form-group"><label>Tarih</label> <input type="text" name="date" placeholder="23-06-2014 Formatında" class="form-control"></div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" name="gorevEkle" type="submit"><strong>Ekle</strong></button>                        
                                    </div>
                                </form>
                            
							
							<?php
									extract($_POST);
									
									// write data if there is no error, display message.
									 if(isset($gorevEkle))
										{			
											
											
											$updateQuery = "INSERT INTO assignment (customer, blog, tags, url, topic, aim, date)
													VALUES ('".$customer."', '".$blog."', '".$tags."', '".$url."', '".$topic."', '".$aim."', '".$date."')" ;
													
														
											$result = mysql_query($updateQuery);
										
											if($result){
												
												echo "<h2>Mesaj:</h2>";
												echo "Görev Başarı ile Kaydedildi<br>";
												echo "<br>Müşteri: ".$customer."<br>"."Blog Adı/Yazarı: ".$blog."<br>";
											}
											else {
												echo "<h2>Mesaj:</h2>";
												echo "Olmadı, tekrar deneyin!";
											}
											 
										 
										}
										
									?>	
							
							
							
							</div>
                            
                        </div>
                    </div>
                </div>
            </div>
			
            </div>
			
			
			
			
			
</div>


<?PHP include 'footer.php'; ?>