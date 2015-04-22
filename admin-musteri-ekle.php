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
									<a href="admin-musteriler.php" class="btn btn-primary ">Tümü</a>
									<a href="admin-musteri-ekle.php" class="btn btn-success ">Müşteri Ekle</a>
									<a href="admin-musteri-arsivle.php" class="btn btn-primary ">Müşteriyi Arşivle</a>
									<a href="admin-musteriler-arsivlenmis.php" class="btn btn-primary ">Arşivlenen Müşteriler</a>	
                                </div>
								</br>
                               									
								<form role="form" action="admin-musteri-ekle.php" method="post">
								 <div class="form-group"><label>Müşteri İsmi</label> <input type="text" name="musteriIsmi" placeholder="Lütfen müşteri ismini yazınız " class="form-control"></div>
									<div class="form-group"><label>Yetkili Kişi</label> <input type="text" name="yetkiliKisi" placeholder="Yetkili Kişi" class="form-control"></div>
                                    <div class="form-group"><label>Yetkili E-posta</label> <input type="mail" name="yetkiliEposta" placeholder="E-posta Adresi" class="form-control"></div>
                                   <?php 
									$checkData =  mysql_query("SELECT tag FROM tags") or die(mysql_error());	
												
									echo   '<div class="form-group"><label>Kategori</label> 
											<select class="form-control" name="kategori" MULTIPLE SIZE=5>';
											while($row= mysql_fetch_array($checkData))
									{
											echo "<option class=\"form-control\" value=\"$row[tag]\">$row[tag]</option>";
											
									}
									echo "</select></div>";
									
									
									?>
								   
								   <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" name="musteriEkle" type="submit"><strong>Ekle</strong></button>                        
                                    </div>
                                </form>
                            
							
							<?php
									extract($_POST);
									
									// write data if there is no error, display message.
									 if(isset($musteriEkle))
										{			
											if($musteriIsmi=="" or $yetkiliKisi=="" or $yetkiliEposta==""){
												echo "Lütfen tüm alanları doldurduğunuzdan emin olun.";
												
											}
											else {
											$updateQuery = "INSERT INTO customers (cust_name, responsible, responsible_email, category)
													VALUES ('".$musteriIsmi."', '".$yetkiliKisi."', '".$yetkiliEposta."', '".$kategori."')" ;
													
														
											$result = mysql_query($updateQuery);
										
											if($result){
												
												echo "<h2>Mesaj:</h2>";
												echo "Müşteri Başarı ile Kaydedildi<br>";
												echo "<br><strong>Müşteri:</strong> ".$musteriIsmi."<br>"."<strong>Yetkili Kişi:</strong> ".$yetkiliKisi."<br>";
											}
											else {
												echo "<h2>Mesaj:</h2>";
												echo "Olmadı, tekrar deneyin!";
											}
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