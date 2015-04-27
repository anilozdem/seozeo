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
										
										   echo '<div class="form-group">
											<label>Kategori</label>
											<div class="input-group">
											<select data-placeholder="Kategorileri Seçiniz" class="chosen-select" name="check_list[]" multiple style="width:350px;" tabindex="4" multiple>'; 
				
											while($row= mysql_fetch_array($checkData))
									{
											echo "<option class=\"form-control\" value=\"$row[tag]\">$row[tag]</option>";
											
				
									}
									echo "</select></div></div>";
									
									
									?>
								   
								   <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" name="musteriEkle" type="submit"><strong>Ekle</strong></button>                        
                                    </div>
                                </form>
                            
							
							<?php
									extract($_POST);
									$currentDate = date('Y-m-d H:i:s');
									$cokluKategori="";
									
									 if(isset($musteriEkle))
										{	
											foreach($_POST['check_list'] as $selected) {
											$cokluKategori.="$selected"." ";
											
											
											}
											echo $cokluKategori;
											
											if($musteriIsmi=="" or $yetkiliKisi=="" or $yetkiliEposta==""){
												echo "Lütfen tüm alanları doldurduğunuzdan emin olun.";
												
											}
											else {
											$updateQuery = "INSERT INTO customers (cust_name, responsible, responsible_email, category)
													VALUES ('".$musteriIsmi."', '".$yetkiliKisi."', '".$yetkiliEposta."', '".$cokluKategori."')" ;
													
														
											$result = mysql_query($updateQuery);
										
											if($result){
												
												echo "<h2>Mesaj:</h2>";
												echo "Müşteri Başarı ile Kaydedildi<br>";
												echo "<br><strong>Müşteri:</strong> ".$musteriIsmi."<br>"."<strong>Yetkili Kişi:</strong> ".$yetkiliKisi."<br>";
												
												$message="Müşteri Eklendi.";
												$notifType="Müşteri";
												$operationType="Eklendi";
												
												$notificationQ = "INSERT INTO notifications (notification, notification_date, item, type, operation)
													VALUES ('".$message."', '".$currentDate."', '".$musteriIsmi."', '".$notifType."', '".$operationType."')" ;
																										
												$notiresult = mysql_query($notificationQ);
											
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
<!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Chosen -->
    <script src="js/plugins/chosen/chosen.jquery.js"></script>

   <!-- JSKnob -->
   <script src="js/plugins/jsKnob/jquery.knob.js"></script>

   <!-- Input Mask-->
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

   <!-- Data picker -->
   <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

   <!-- NouSlider -->
   <script src="js/plugins/nouslider/jquery.nouislider.min.js"></script>

   <!-- Switchery -->
   <script src="js/plugins/switchery/switchery.js"></script>

    <!-- IonRangeSlider -->
    <script src="js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <!-- MENU -->
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Color picker -->
    <script src="js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Image cropper -->
    <script src="js/plugins/cropper/cropper.min.js"></script>
 <script>
        $(document).ready(function(){

            var $image = $(".image-crop > img")
            $($image).cropper({
                aspectRatio: 1.618,
                preview: ".img-preview",
                done: function(data) {
                    // Output the result data for cropping image.
                }
            });

            var $inputImage = $("#inputImage");
            if (window.FileReader) {
                $inputImage.change(function() {
                    var fileReader = new FileReader(),
                            files = this.files,
                            file;

                    if (!files.length) {
                        return;
                    }

                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                            $inputImage.val("");
                            $image.cropper("reset", true).cropper("replace", this.result);
                        };
                    } else {
                        showMessage("Please choose an image file.");
                    }
                });
            } else {
                $inputImage.addClass("hide");
            }

            $("#download").click(function() {
                window.open($image.cropper("getDataURL"));
            });

            $("#zoomIn").click(function() {
                $image.cropper("zoom", 0.1);
            });

            $("#zoomOut").click(function() {
                $image.cropper("zoom", -0.1);
            });

            $("#rotateLeft").click(function() {
                $image.cropper("rotate", 45);
            });

            $("#rotateRight").click(function() {
                $image.cropper("rotate", -45);
            });

            $("#setDrag").click(function() {
                $image.cropper("setDragMode", "crop");
            });

            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#data_2 .input-group.date').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('#data_4 .input-group.date').datepicker({
                minViewMode: 1,
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                todayHighlight: true
            });

            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1AB394' });

            var elem_2 = document.querySelector('.js-switch_2');
            var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

            var elem_3 = document.querySelector('.js-switch_3');
            var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            $('.demo1').colorpicker();

            var divStyle = $('.back-change')[0].style;
            $('#demo_apidemo').colorpicker({
                color: divStyle.backgroundColor
            }).on('changeColor', function(ev) {
                        divStyle.backgroundColor = ev.color.toHex();
                    });


        });
        var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
            }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }

        $("#ionrange_1").ionRangeSlider({
            min: 0,
            max: 5000,
            type: 'double',
            prefix: "$",
            maxPostfix: "+",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_2").ionRangeSlider({
            min: 0,
            max: 10,
            type: 'single',
            step: 0.1,
            postfix: " carats",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_3").ionRangeSlider({
            min: -50,
            max: 50,
            from: 0,
            postfix: "°",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_4").ionRangeSlider({
            values: [
                "January", "February", "March",
                "April", "May", "June",
                "July", "August", "September",
                "October", "November", "December"
            ],
            type: 'single',
            hasGrid: true
        });

        $("#ionrange_5").ionRangeSlider({
            min: 10000,
            max: 100000,
            step: 100,
            postfix: " km",
            from: 55000,
            hideMinMax: true,
            hideFromTo: false
        });

        $(".dial").knob();

        $("#basic_slider").noUiSlider({
            start: 40,
            behaviour: 'tap',
            connect: 'upper',
            range: {
                'min':  20,
                'max':  80
            }
        });

        $("#range_slider").noUiSlider({
            start: [ 40, 60 ],
            behaviour: 'drag',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });

        $("#drag-fixed").noUiSlider({
            start: [ 40, 60 ],
            behaviour: 'drag-fixed',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });


    </script>

<?PHP include 'footer.php'; ?>