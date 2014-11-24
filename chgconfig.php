<?php
	
	$file = fopen("files/config.txt","w") or die("Unable to open file!");
	fwrite($file,$_POST["domain"]."/\n");
	fwrite($file,$_POST["remail"]."\n");
	fwrite($file,$_POST["semail"]."\n");
	fwrite($file,$_POST["semail_password"]."\n");
	fclose($file);

	echo "success";
?>