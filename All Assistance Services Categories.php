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
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="All Device Categories.php" >Devices</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="All SL Services Categories.php">Services</a>
                    </li>
                    <li class="active">
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
	
	
	<section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Assistance Services Categories</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
	<div class="container">
            <div class="row">
			<?php
				/* dichiariamo alcune importanti variabili per collegarci al database */
				$DBhost = "localhost";
				$DBuser = "bigbandroid";
				$DBpass = "";
				$DBName = "my_bigbandroid";

				/* specifichiamo il nome della nostra tabella */
				$table = "AssistanceServicesCategory";

				/* Connettiamoci al database */
				mysql_connect($DBhost,$DBuser,$DBpass) or die("Impossibile collegarsi al server");
				@mysql_select_db("$DBName") or die("Impossibile connettersi al database $DBName");

				/* impostiamo la query e cerchiamo solo le amiche donne...*/
				$sqlquery = "SELECT * FROM $table";
				$result = mysql_query($sqlquery);
				$number = mysql_num_rows($result);
				
				$i = 0;
				while ($number > $i) 
				{
					
					$name = mysql_result($result,$i,"Name");
					$description = mysql_result($result,$i,"Description");
					$icon=mysql_result($result,$i,"Icon");
					$description=nl2br($description);
					
					$sendName=str_replace(' ', '', $name);
			?>
					
					<div class="col-lg-3 col-md-6 text-center"><a href="Assistance Service Category.php?category=<?echo $sendName;?>">
						<div class="service-box">
							<i class="fa fa-4x text-primary sr-icons"><img class="deviceCategories" src="img/allAssistanceServicesCategories/<?echo $icon; ?>.png"/></i>
							<h3><?echo $name;?></h3>
							<p class="text-muted"><?echo $description;?></p>
						</div>
					</a></div>
				
			<?php 
					$i++;
				}
			?>		
					<div class="col-lg-3 col-md-6 text-center"><a href="Device Category.php?category=promo">
						<div class="service-box">
							<i class="fa fa-4x text-primary sr-icons"><img class="deviceCategories" src="img/allDeviceCategories/discount.png"/></i>
							<h3>Promo Assistance Services</h3>
							<p class="text-muted"></p>
						</div>
					</a></div>
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

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>
