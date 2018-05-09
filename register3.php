<?php
// require("funkcijeZaStranu.php");
// require ("proba.php");

// zaglavlje("Register");

$mail = $_POST['email'];
$ime = $_POST['ime'];
$pass = $_POST['password'];



$db = new mysqli('localhost','root','maric1989','brka'); 
	if(mysqli_connect_errno()) { 
		
		echo "Doslo je do problema u povezivanju sa bazom podataka!<br>";
		exit;
	}
	
		$upit="insert into test2(email,name,password) 
				values(?,?,?);";
				
		$pripNar = $db->prepare($upit); 
		$pripNar->bind_param('sss',$mail,$ime,$pass);
		$pripNar->execute();

		$db->close();

		echo "Dobrodosli $ime uspesno ste se registrovali";

// podnozje();	
?>