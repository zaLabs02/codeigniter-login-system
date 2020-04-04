<?php
	$string = "admin"; //passwordnya
	$md5 = md5($string); //hashmd5
	$bcrypt = password_hash($md5, PASSWORD_BCRYPT);
	echo "Masukkan Password = ";
	$pass = trim(fgets(STDIN)); //inputan password 
	$md5pass = md5($pass); //hash md5
	
	if (password_verify($md5pass, $bcrypt)){
		echo "Hasil MD5 = ".md5($pass)."\n";
		echo "Hasil MD5 to BCRYPT = ".$bcrypt."\n";
		echo "\n\nSukses Login\n";
	}
?>