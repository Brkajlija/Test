<?php

function provera(){
	if(!isset($_SESSION['korisnik'])){
		header('Location:login.php');
		exit;
	}
}


?>