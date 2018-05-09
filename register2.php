<?php
require("funkcijeZaStranu.php");
// require ("proba.php");

zaglavlje("Register");

$mail = $_POST['email'];
$ime = $_POST['ime'];
$pass = $_POST['pass'];

//if (isset($_POST['email']) && isset($_POST['ime']) && isset($_POST['pass'])) {
//	$mail = $_POST['email'];
//	$ime = $_POST['ime'];
//	$pass = $_POST['pass'];
//}

//echo $ime.$mail;

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

		if($pripNar->affected_rows >0){
			
			$upit = "select * from test2 ;"; 
		
		$pripNar = $db->prepare($upit);
		
		$pripNar->execute(); 
		$pripNar->store_result();
		
		$pripNar->bind_result($id,$email,$imeKor,$password);  
		
		//echo "Postoje ".$pripNar->num_rows." zapisa.<br>";

		echo "<table border='1'>";
		echo "<tr><th>id</th><th>Email</th><th>Ime i Prezime</th><th>sifra</th></tr>";
		while($pripNar->fetch()){
			echo "<tr>";
				echo "<td>$id</td>";
				echo "<td>$email</td>";
				echo "<td>$imeKor</td>";
				echo "<td>$password</td>";
				echo "</tr>";

		}

		echo "</table>";

		$pripNar->free_result();
		$db->close();
		}else {
			echo "Nije uspelo dodavanje novog reda";
		}

podnozje();	
?>