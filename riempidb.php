<?php
	/* dichiariamo alcune importanti variabili per collegarci al database */
	$DBhost = "localhost";
	$DBuser = "bigbandroid";
	$DBpass = "";
	$DBName = "my_bigbandroid";

	/* specifichiamo il nome della nostra tabella */
	$table = "DeviceCategory";

	/* Connettiamoci al database */
	mysql_connect($DBhost,$DBuser,$DBpass) or die("Impossibile collegarsi al server");
	@mysql_select_db("$DBName") or die("Impossibile connettersi al database $DBName");

	$i=1;
	$price=60;
	while($i<11)
	{
		$price=rand(50, 1000);
		$osr=rand(0, 2);
		$os="";
		if($osr==0)
			$os="Android";
		if($osr==1)
			$os="IOS";
		if($osr==2)
			$os="Microsoft Window";
		$display=rand(4, 6)+rand(0,9)/10;
		$peso=rand(200,500);
		$batteria=rand(6,15);
		$query="INSERT INTO `my_bigbandroid`.`Device` (`Name`, `Category`, `Price`, `Description`, `OS`, `Dispay`, `Processor`, `Weight`, `BatteryLife`) 
		VALUES ('smartphone ".$i."', 'Smartphones & Phones', '".$price."', 'This smartphone is very beautifull', '".$os."', '".$display."', 'Tegra kappa ".$i."', '".$peso."', '".$batteria."')";
		mysql_query($query);
		$i++;
	}
?>