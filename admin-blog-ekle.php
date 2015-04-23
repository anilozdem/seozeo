<?php require('config.php'); ?>
<?PHP include 'header.php'; ?>

		</br></br></br></br>
		<div class="wrapper wrapper-content animated fadeInRight">
			
			<div class="row">
            <div class="col-lg-7">
                <div class="ibox float-e-margins">                   
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6">                               
                                <form role="form" action="admin-blog-ekle.php" method="post">
                                    <div class="form-group"><label>Alan Adı</label> <input type="text" name="alanAdi" placeholder="Alan Adı" class="form-control"></div>
									<div class="form-group"><label>İsim Soyisim</label> <input type="text" name="isimSoyisim" placeholder="İsim Soyisim" class="form-control"></div>
									<div class="form-group"><label>P*T Değeri</label> <input type="text" name="ptDegeri" placeholder="P*T Değeri" class="form-control"></div> 
                                
                            </div>
                            <div class="col-sm-6">
								
                                    <div class="form-group"><label>E-posta Adresi</label> <input type="text" name="eposta" placeholder="E-posta" class="form-control"></div>
                                    <div class="form-group"><label>Telefon Numarası</label> <input type="text" name="telefon" placeholder="Telefon" class="form-control"></div>                                   
                                    <div class="form-group"><label>Ücret</label> <input type="text" name="ucret" placeholder="Ücret" class="form-control"></div>                                   
									
                            </div>
							
									<div class="col-sm-12">
									<label>Yazı tarafınızdan mı, yoksa SEOZEO tarafından mı temin edilecek?  </label><br>
									<label> <input type="radio" name="content_provider" value="1" class="i-checks" checked> Kendim Yazacağım</label>
                                    <label> <input type="radio" name="content_provider" value="2" class="i-checks"> SEOZEO tarafından gönderilsin</label>
                                       
									<button class="btn btn-sm btn-primary pull-right m-t-n-xs" name="blogEkle" type="submit"><strong>Ekle</strong></button>
									</div>
							
							</form>
                        
						<?php
									extract($_POST);
									
									// write data if there is no error, display message.
									 if(isset($blogEkle))
										{			
											
											
											$updateQuery = "INSERT INTO blogs (domain, pt, userName, email, phone, cost, contentProvider)
													VALUES ('".$alanAdi."', '".$ptDegeri."', '".$isimSoyisim."', '".$eposta."', '".$telefon."', '".$ucret."', '".$content_provider."')" ;
													
														
											$result = mysql_query($updateQuery);
										
											if($result){
												
												echo "<h2>Mesaj:</h2>";
												echo "Blog Başarı ile Kaydedildi<br>";
												echo "<br>Müşteri: ".$alanAdi."<br>"."Blog Adı/Yazarı: ".$isimSoyisim."<br>";
											}
											else {
												echo "<h2>Mesaj:</h2>";
												echo "Olmadı, tekrar deneyin!";
											}
											 
										 
										}
										
									?>	
						
						</div>
						<p></p>
						
									
                    </div>
                </div>
            </div>
		</div>









<?PHP include 'footer.php'; ?>