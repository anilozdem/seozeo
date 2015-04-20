<?php require('config.php'); ?>
<?PHP include 'header.php'; ?>

</br></br></br></br>
<div class="wrapper wrapper-content animated fadeInRight">		
			
					
			<div class="row" style="margin-bottom:10px;">			
				<div class="col-lg-12">
					<a href="admin-musteri-ekle.php" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Müşteri Ekle</a>
					<a href="" onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Müşteriyi Arşivle</a>
					<a href="admin-musteriler-arsivlenmis.php" class="btn btn-primary ">Arşivlenen Müşteriler</a>				
				</div>
			</div>
			
		
			
			
			<div class="row">
				<div class="col-lg-6">
				<div class="ibox">
					<div class="ibox content">
						<?php 
								$checkData =  mysql_query("SELECT cust_name FROM customers where archive!='Yes'") or die(mysql_error());	
											
								echo   '<form role="form" action="admin-musteri-arsivle.php" method="post">
										<div class="form-group"><label>Müşteriler</label> 
										<select class="form-control" name="musteri">';
										while($row= mysql_fetch_array($checkData))
								{
										echo "<option class=\"form-control\" value=\"$row[cust_name]\">$row[cust_name]</option>";
										
								}
								echo "</select></div>";
								
								
								echo "<div><button type=\"submit\" name=\"arsivle\" class=\"btn btn-sm btn-primary pull-right m-t-n-xs\">Arşivle!</button></div>";
								echo "</form>";
									
									
									?>
									
                                    
                              
                            
							
							<?php
						extract($_POST);
						
						if(isset($arsivle)){
						
						$archiveQ = "UPDATE customers SET archive='Yes' WHERE cust_name='$musteri'";
								
									
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
			
		
			
    <script>
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });
			
			
			
			$('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
			
		});	
			
	</script>


<?PHP include 'footer.php'; ?>