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
                                
								
                                <form role="form" action="admin-kategori-ekle.php" method="post">
								                                    
                                    <div class="form-group"><label>Yeni Kategori</label> <input type="text" name="yenikategori" id="yenikategori" placeholder="Yeni Kategoriyi Yazınız" class="form-control"></div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" name="kategoriEkle" type="submit"><strong>Ekle</strong></button>                        
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
			
			<?php
		extract($_POST);
	
		// write data if there is no error, display message.
		 if(isset($kategoriEkle))
			{	
		
				$updateQuery = "INSERT INTO tags (tag)
						VALUES ('$yenikategori')";
						
							
				$result = mysql_query($updateQuery);
			
				if($result){
					echo "Yeni Kategori Başarılı bir şekilde eklendi.<br>";
					echo "<br>Yeni Eklenen Kategori: ".$yenikategori."<br><br>";
				}
				else {
					echo "Kategori eklenirken bir hata meydana geldi!";
				}
				 
			 
			}
			
		?>	
			</div>
            </div>
			
			
			
			
			
</div>


<?PHP include 'footer.php'; ?>