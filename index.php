<?php
// require ("funkcijeZaStranu.php");
// require ("proba.php");
// require 'register2';
session_start();
$name = $_SESSION['korisnik'];

include('layouts/header.html');
?>
	<h3>Dobro dosli u bazu podataka 
		<?php echo ($_SESSION['korisnik'])? $name :'Mozila Fazila Gorila'?>
	</h3>
<?php if (!$_SESSION['korisnik']) { ?> 
	<p>Ulogujte se ovde ili klikom na dugme "Log in"</p> 
<?php
}
?>	

<table>

	<?php 
	
	if (!$_SESSION['korisnik']) {
		include('layouts/loginForm.html');
	}else{
		$db = new mysqli('localhost','root','maric1989','brka'); 
		
		if(mysqli_connect_errno()) { 
		
		echo "Doslo je do problema u povezivanju sa bazom podataka!<br>";
		exit;
		}

		$sql = "SELECT * FROM test2";
		$results = $db->query($sql);
		if (!empty($results)) {
			while ($row = $results->fetch_assoc()) {
				echo $row['name'];
			}
		}
	};

	?>
</table>

<?php 

include('layouts/footer.html');

 ?>

