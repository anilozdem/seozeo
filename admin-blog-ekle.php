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
                                    <div class="form-group"><label>Telefon Numarası</label> <input type="text" name="telefon" class="form-control" data-mask="(999) 999-9999" placeholder="" ></div>                                   
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
									$reg_date=date("Y-m-d");
									
									// write data if there is no error, display message.
									 if(isset($blogEkle))
										{			
											
											
											$updateQuery = "INSERT INTO blogs (reg_date, domain, pt, userName, email, phone, cost, contentProvider)
													VALUES ('".$reg_date."', '".$alanAdi."', '".$ptDegeri."', '".$isimSoyisim."', '".$eposta."', '".$telefon."', '".$ucret."', '".$content_provider."')" ;
													
														
											$result = mysql_query($updateQuery);
										
											if($result){
												
												echo'<div class="alert alert-success"> ';
												echo "<h2>Mesaj:</h2>";
												echo "<br>Müşteri: ".$alanAdi."<br>"."Blog Adı/Yazarı: ".$isimSoyisim."<br>";
												echo "</div>";
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