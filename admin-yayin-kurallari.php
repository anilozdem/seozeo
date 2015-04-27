<?php require('config.php'); ?>
<?PHP include 'header.php'; ?>

		<div class="wrapper wrapper-content">

                      
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Yayın Kuralları</h5>
                            <button id="edit" class="btn btn-primary btn-xs m-l-sm" onclick="edit()" type="button">Düzenle</button>
                            <button id="save" class="btn btn-primary  btn-xs" onclick="save()" type="button">Kaydet</button>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                
                               
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content no-padding">

                            <div class="click2edit wrapper p-md">
							<?php 
							$getBlogs =  mysql_query("SELECT * FROM  publication_rules") or die(mysql_error());
	
	
						while($row= mysql_fetch_array($getBlogs))
						{			
										
										echo $row['text'];
										
										
						}
							?>

							  
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

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- SUMMERNOTE -->
    <script src="js/plugins/summernote/summernote.min.js"></script>

			<script>
				$(document).ready(function(){

					$('.summernote').summernote();

			   });
				var edit = function() {
					$('.click2edit').summernote({focus: true});
				};
				var save = function() {
					var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
					$('.click2edit').destroy();
				};
			</script>


<?PHP include 'footer.php'; ?>