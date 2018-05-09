<?php
session_start();

require ("../provera.php");

// zaglavlje("Register");


$mail = $_POST['email'];
$pass = $_POST['password'];




$db = new mysqli('localhost','root','maric1989','brka'); 
	if(mysqli_connect_errno()) { 
		
		echo "Doslo je do problema u povezivanju sa bazom podataka!<br>";
		exit;
	}
	
	$upit = "select name,password,email from test2 where test2.email=? ;"; 
		
		$pripNar = $db->prepare($upit);
		$pripNar->bind_param('s',$mail);
		$pripNar->execute(); 
		$pripNar->store_result();
		
		$pripNar->bind_result($name, $password, $email);  
		
		$pripNar->fetch();

			if($mail==$email && $pass==$password){
						$_SESSION['korisnik'] = $name; 
						// echo  "Cestitamo &nbsp;".$name."&nbsp;uspesno ste se ulogovali";

						header('Location:../index.php');
				}else if($mail == "" || $pass == ""){
						echo  "Niste popunili sva polja";
				}else{
						echo  "Korisnicko ime ili sifra nisu tacni";
				}
		
		
		

		

		$pripNar->free_result();
		$db->close();
		

		

// podnozje();	