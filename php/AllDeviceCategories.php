<?php
	// dichiariamo alcune importanti variabili per collegarci al database 
	$DBhost = "localhost";
	$DBuser = "bigbandroid";
	$DBpass = "";
	$DBName = "my_bigbandroid";

	// specifichiamo il nome della nostra tabella 
	$table = "DeviceCategory";

	// Connettiamoci al database 
	mysql_connect($DBhost,$DBuser,$DBpass) or die("Impossibile collegarsi al server");
	@mysql_select_db("$DBName") or die("Impossibile connettersi al database $DBName");

	// impostiamo la query e cerchiamo solo le amiche donne
	$sqlquery = "SELECT * FROM $table";
	$result = mysql_query($sqlquery);
	$number = mysql_num_rows($result);
	
	$i = 0;
	$s="";
	
	while($number > $i) 
	{
		$name = mysql_result($result,$i,"Name");
		$description = mysql_result($result,$i,"Description");
		$icon=mysql_result($result,$i,"Icon");
		$description=nl2br($description);
		
		$sendName=str_replace(' ', '', $name);
		
		$s=$s."<div class='col-lg-3 col-md-6 text-center'><a href='Device Category.php?category=".$sendName."'>
				<div class='service-box'>
					<i class='fa fa-4x text-primary sr-icons'><img class='deviceCategories' src='img/allDeviceCategories/".$icon.".png'/></i>
					<h3>".$name."</h3>
					<p class='text-muted'>".$description."</p>
				</div>
			</a></div>";
		
		$i++;
	}
	
	$s=$s."<div class='col-lg-3 col-md-6 text-center'><a href='Device Category.php?category=promo'>
			<div class='service-box'>
				<i class='fa fa-4x text-primary sr-icons'><img class='deviceCategories' src='img/allDeviceCategories/discount.png'/></i>
				<h3>Promo Devices</h3>
				<p class='text-muted'>
					Discover our best offerts</p>
			</div>
		</a></div>";

	$return["query"]=$s;
	
	echo json_encode($return);
?>