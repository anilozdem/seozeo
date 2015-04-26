<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Dashboard</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
	<!-- Data Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="js/plugins/dataTables/dataTables.tableTools.min.js"></script>
	
	<link href="css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
	
	   <!-- Data picker -->
	   
	<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
	<link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>                          
                            <span class="clear"><a href="admin-kullanici-bilgileri.php"><span class="block m-t-xs"> <strong class="font-bold">Ceyda Arıcıoğlu</strong>
                             </span> <span class="text-muted text-xs block">Art Director</span> </span> </a>
                            
                        </div>
                        
                    </li>
                    <li>
                        <a href="admin-gorevler.php"><i class="fa fa-th-large"></i> <span class="nav-label">Görevler</span></a>
                    </li>
                    <li>
                        <a href="admin-bloglar.php"><i class="fa fa-diamond"></i> <span class="nav-label">Bloglar</span></a>
							<ul class="nav nav-second-level">
								<li><a href="admin-bloglar.php">Bloglar</a></li>
								<li><a href="admin-blog-ekle.php">Blog Ekle</a></li>
								<li><a href="admin-ozel-bloglar.php">Özel Bloglar</a></li>
								<li><a href="admin-random-bloglar.php">Random Bloglar</a></li>
							</ul>
                    </li>
                    <li>
                        <a href="admin-kategoriler.php"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Kategoriler</span></a>
                    </li>
                    <li>
                        <a href="admin-musteriler.php"><i class="fa fa-envelope"></i> <span class="nav-label">Müşteriler</span></a>
                    </li>
                    <li>
                        <a href="admin-guncellemeler.php"><i class="fa fa-flask"></i> <span class="nav-label">Güncellemeler</span></a>
                    </li>
                    <li>
                        <a href="admin-odemeler.php"><i class="fa fa-edit"></i> <span class="nav-label">Ödemeler</span></a>
                    </li>
                    <li>
                        <a href="admin-yayin-kurallari.php"><i class="fa fa-desktop"></i> <span class="nav-label">Yayın Kuralları</span></a>
                    </li>
                    <li>
                        <a href="admin-yazi-kontrol.php"><i class="fa fa-files-o"></i> <span class="nav-label">Yazı Kontrol</span></a> 
                    </li>
                    <li>
                        <a href="admin-butun-bloglar.php"><i class="fa fa-globe"></i> <span class="nav-label">Bütün Bloglar</span></a>
                        
                    </li>
                    
                </ul>

            </div>
        </nav>
		
        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        
            <ul class="nav navbar-top-links navbar-right">               
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" href="admin-bildirimler.php">
                        <i class="fa fa-bell"></i>  <?php 
										
						$getNoti =  mysql_query("SELECT COUNT(*) FROM notifications where checked='0'") or die(mysql_error());	
						
						if($getNoti)
						{
								$row=mysql_fetch_array($getNoti);    
								echo '<span class="label label-warning">'.$row[0].'</span>';
						}
						?>
                    </a>
                   
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-primary">8</span>
                    </a>
                    
                </li>
                <li>
                    <a href="anasayfa.html"><i class="fa fa-sign-out"></i> Log out</a>
                </li>
            </ul>

        </nav>