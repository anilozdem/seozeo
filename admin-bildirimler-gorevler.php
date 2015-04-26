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
            <div>
                      <?php 
						$getNoti =  mysql_query("SELECT COUNT(*) FROM notifications where checked='0'") or die(mysql_error());	
						
						if($getNoti)
						{
								$row=mysql_fetch_array($getNoti);    
								echo '<div class="alert alert-success">';
								echo "<strong>".$row[0]."</strong> yeni bildirim var.";
								
								echo '</div>'; 	
								}
			?>
				</div>
			
            <div class="row">
            <div class="col-lg-12">
            
			
            
            <div class="ibox-content">
            <div class="">
			<a href="admin-bildirimler.php" onclick="fnClickAddRow();" class="btn btn-primary ">Hepsi</a>
            <a href="admin-bildirimler-gorevler.php" onclick="fnClickAddRow();" class="btn btn-success ">Görevler</a>
			<a href="admin-bildirimler-bloglar.php" onclick="fnClickAddRow();" class="btn btn-primary ">Bloglar</a>
			<a href="admin-bildirimler-musteriler.php" onclick="fnClickAddRow();" class="btn btn-primary ">Müşteriler</a>
			<a href="admin-bildirimler-odemeler.php" onclick="fnClickAddRow();" class="btn btn-primary ">Ödemeler</a>
			
            </div>
			</br>
			<div class="row" style="margin-bottom:10px;">
			
			</div>
			
			
			<?php
						extract($_POST);
							
							
						$getBlogs =  mysql_query("SELECT * FROM notifications where type='Görev' and checked='0'") or die(mysql_error());
						$count =  mysql_query("SELECT COUNT(*) FROM notifications where type='Görev' and checked='0'") or die(mysql_error());
						$countNotification = mysql_fetch_array($count);

						$total = $countNotification[0];
												
						echo "<h2>Yeni Bildirimler</h2>";
						if($total<1){
									echo '<div class="alert alert-danger">';
									echo "<strong>Yeni Bildirim Yok!</strong>";
									echo '</div>';
								}	
						else{								
						while($row= mysql_fetch_array($getBlogs))
						{	
					
								
								
										if($row['operation']=="Eklendi"){
										echo '<div class="alert alert-success">';
										echo "<strong>".$row['notification']."</strong>&nbsp Göreve eklenen blog: <strong>".$row['item']."</strong>&nbsp&nbsp Ekleme tarihi:".$row['notification_date'];
										echo '</div>'; 	
											
										}
										
										else if($row['operation']=="Silindi"){
										echo '<div class="alert alert-danger">';
										echo "<strong>".$row['notification']."</strong>&nbsp Silinen Blog: <strong>".$row['item']."</strong>&nbsp&nbsp Silinme tarihi:".$row['notification_date'];
										echo '</div>'; 	
											
										}
										
										else if($row['operation']=="Yayınlandı"){
										echo '<div class="alert alert-info">';
										echo "<strong>".$row['notification']."</strong>&nbsp Yayınlanan blog: <strong>".$row['item']."</strong>&nbsp&nbsp Yayınlanma tarihi:".$row['notification_date'];
										
										echo '</div>'; 	
											
										}
										else if($row['operation']=="Arşivlendi"){
										echo '<div class="alert alert-warning">';
										echo "<strong>".$row['notification']."</strong>&nbsp Arşivlenen blog: <strong>".$row['item']."</strong>&nbsp&nbsp Arşivlenme tarihi:".$row['notification_date'];
										echo '</div>'; 	
											
										}
										
										
										else {
										echo '<div class="alert alert-warning">';
										echo "Yeni Bildirim Yok";
										echo '</div>'; 	
											
										}
									
								}
								
							
						}
						
						$getOld =  mysql_query("SELECT * FROM notifications where type='Görev' and checked='1'") or die(mysql_error());
	
						echo "<h2>Eski Bildirimler</h2>";
								
						while($row= mysql_fetch_array($getOld))
						{	
							
								if($row['operation']=="Eklendi"){
								echo '<div class="alert alert-success">';
								echo "<strong>".$row['notification']."</strong>&nbsp Göreve eklenen blog: <strong>".$row['item']."</strong>&nbsp&nbsp Ekleme tarihi:".$row['notification_date'];
								echo '</div>'; 	
									
								}
								
								else if($row['operation']=="Silindi"){
								echo '<div class="alert alert-danger">';
								echo "<strong>".$row['notification']."</strong>&nbsp Silinen Blog: <strong>".$row['item']."</strong>&nbsp&nbsp Silinme tarihi:".$row['notification_date'];
								echo '</div>'; 	
									
								}
								
								else if($row['operation']=="Yayınlandı"){
								echo '<div class="alert alert-info">';
								echo "<strong>".$row['notification']."</strong>&nbsp Yayınlanan blog: <strong>".$row['item']."</strong>&nbsp&nbsp Yayınlanma tarihi:".$row['notification_date'];
								
								echo '</div>'; 	
									
								}
								else if($row['operation']=="Arşivlendi"){
								echo '<div class="alert alert-warning">';
								echo "<strong>".$row['notification']."</strong>&nbsp Arşivlenen blog: <strong>".$row['item']."</strong>&nbsp&nbsp Arşivlenme tarihi:".$row['notification_date'];
								echo '</div>'; 	
									
								}
								else {
								echo '<div class="alert alert-warning">';
								echo "<strong>".$row['notification']."</strong>&nbsp Göreve eklenen blog: <strong>".$row['item']."</strong>&nbsp&nbsp Ekleme tarihi:".$row['notification_date'];
								echo '</div>'; 	
									
								}
								
							}
	
						
							
						
						
						
								
									
							
						?> 
						
						<?php
						$currentDate = date('Y-m-d H:i:s');
						$okundu = "UPDATE notifications SET checked='1'";
										$result = mysql_query($okundu);

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