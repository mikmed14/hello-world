<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Creative - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">
	
	<!-- My CSS -->
    <link rel="stylesheet" href="css/mycss.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav class="navbar navbar-default navbar-fixed-top affix">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.html"><img height="30px" src="img/logo_tim.png"/></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" >
                <ul class="nav navbar-nav navbar-right">
                    <li  class="active">
                        <a class="page-scroll" href="All Device Categories.php" >Devices</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="All SL Services Categories.php">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="All Assistance Services Categories.php">Assistance</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="Group of Telecom Italia.php">Group</a>
                    </li>
					<li>
                        <a class="page-scroll" href="Who We Are.php">Who we are</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <section class="no-padding" id="portfolio">
		
	
        <div class="container-fluid">
		 
		
            <div class="row no-gutter popup-gallery">
			<?php
				/* dichiariamo alcune importanti variabili per collegarci al database */
				$DBhost = "localhost";
				$DBuser = "bigbandroid";
				$DBpass = "";
				$DBName = "my_bigbandroid";
				/* Connettiamoci al database */
				mysql_connect($DBhost,$DBuser,$DBpass) or die("Impossibile collegarsi al server");
				@mysql_select_db("$DBName") or die("Impossibile connettersi al database $DBName");

				/* specifichiamo il nome della nostra tabella $numero1=$_GET['numero1'];*/
				$category=$_GET['category'];
				if($category!="promo")
				{
					$table = $category;

					/* impostiamo la query e cerchiamo solo le amiche donne...*/
					$sqlquery = "SELECT * FROM $table";
					$result = mysql_query($sqlquery);
					$number = mysql_num_rows($result);
					
					$i = 0;
					while ($number > $i) 
					{
						$code= mysql_result($result,$i,"Id");
						$name = mysql_result($result,$i,"Name");
						$price=mysql_result($result,$i,"Price");
						$checkPromo=mysql_result($result,$i,"Promotion");
						$pricePromo=mysql_result($result,$i,"PricePromo");
				
						if($checkPromo==1)
						{
							?>
								
								<a href="Device.php?category=<?echo $category;?>&codeDevice=<?echo $code;?>&name=<?echo $name;?>">
								<div class="col-lg-4 col-sm-6">
									<div class="portfolio-box">
										<center>
											<img src="img/allDeviceCategories/<?echo $category;?>/<?echo $name.".0"; ?>.jpg" class="img-responsive" alt="">
										</center>
										<div class="portfolio-box-caption">
											<div class="portfolio-box-caption-content">
											
												<div class="project-category text-faded">

													<? echo $name;?> </br>
													<? $pricePromo=$pricePromo."EUR";
														echo $pricePromo; 
													?>
													<p class="priceNotPromo"><? $price=$price."EUR";
														echo $price; 
													?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								</a>
							<?
						}
						else
						{
							?>
								<a href="Device.php?category=<?echo $category;?>&codeDevice=<?echo $code;?>&name=<?echo $name;?>">
								<div class="col-lg-4 col-sm-6">
									<div class="portfolio-box">
										<center>
											<img src="img/allDeviceCategories/<?echo $category;?>/<?echo $name.".0"; ?>.jpg" class="img-responsive" alt="">
										</center>
										<div class="portfolio-box-caption">
											<div class="portfolio-box-caption-content">
												<div class="project-category text-faded">
													<? echo $name;?> </br>
													<? $price=$price."EUR";
														echo $price; 
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
								</a>

							<?
						}
					$i++;
					}
				}
				else
				{//I print only the promo device
					$sqlquery = "SELECT * FROM DeviceCategory";
					$result = mysql_query($sqlquery);
					$number = mysql_num_rows($result);
					 
					$i=0;   
					while($number > $i) 
					{
						$nameCategory=mysql_result($result,$i,"Name");
						$nameCategory=str_replace(' ', '', $nameCategory);
						$queryCategory = "SELECT * FROM $nameCategory";
						$resultCategory = mysql_query($queryCategory);
						$numberCategory = mysql_num_rows($resultCategory);
						$j=0;
						while($numberCategory > $j)
						{
							$nameDevice=mysql_result($resultCategory,$j,"Name");
							$code=mysql_result($resultCategory,$j,"Id"); 
							$priceDevice=mysql_result($resultCategory,$j,"Price");
							$pricePromo=mysql_result($resultCategory,$j,"PricePromo");
							$isPromo=mysql_result($resultCategory,$j,"Promotion");
							if($isPromo==1)
							{
								?>
									<a href="Device.php?category=<?echo $nameCategory;?>&codeDevice=<?echo $code;?>&name=<?echo $nameDevice;?>">
									<div class="col-lg-4 col-sm-6">
										<div class="portfolio-box">
											<center>
												<img src="img/allDeviceCategories/<?echo $nameCategory;?>/<?echo $nameDevice.".0"; ?>.jpg" class="img-responsive" alt="">
											</center>
											<div class="portfolio-box-caption">
												<div class="portfolio-box-caption-content">
												
													<div class="project-category text-faded">

														<? echo $nameDevice;?> </br>
														<? $pricePromo=$pricePromo."EUR";
															echo $pricePromo; 
														?>
														<p class="priceNotPromo"><? $priceDevice=$priceDevice."EUR";
															echo $priceDevice; 
														?></p>
													</div>
												</div>
											</div>
										</div>
									</div>
									</a>
								<?
							}
							$j++;
						}
						$i++;
					}
				}
			?>	
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/scrollreveal.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>

    

</body>

</html>
