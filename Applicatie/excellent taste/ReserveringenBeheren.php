<?php 
	session_start();
        $db = mysqli_connect('localhost', 'root', '', 'excellent taste');
	// initialize variables
    $id = 0;
	$Tafel = "";
	$Datum = "";
    $Tijd = "";
    $KlantID = "";
    $Aantal = "";
    $update = false;
    //select method

	if (isset($_POST['save'])) {
        //save method
		$Tafel = $_POST['Tafel'];
		$Datum = $_POST['Datum'];
        $Tijd =$_POST['Tijd'];
        $KlantID =$_POST['KlantID'];
        $Aantal = $_POST['Aantal'];
		mysqli_query($db, "INSERT INTO reservering (Tafel, Datum, Tijd, KlantID, Aantal) VALUES ('$Tafel', '$Datum', '$Tijd', '$KlantID','$Aantal')");
		$_SESSION['message'] = "Reservering opgeslagen";
		header('location: Reserveringen.php');
    } 
	if (isset($_POST['update'])) {
        //update method
		$id = $_POST['id'];
        $Tafel = $_POST['Tafel'];
        $Datum = $_POST['Datum'];
        $Tijd =$_POST['Tijd'];
        $KlantID =$_POST['KlantID'];
        $Aantal = $_POST['Aantal'];
	
		mysqli_query($db, "UPDATE reservering SET Tafel='$Tafel', Datum='$Datum', Tijd='$Tijd', KlantID='$KlantID', Aantal='$Aantal' WHERE id=$id");
		echo $Tafel;
		$_SESSION['message'] = "Reservering aangepast!";
		header('location: Reserveringen.php');
	}
	if (isset($_GET['del'])) {
        //delete method
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM reservering WHERE id='$id'");
		$_SESSION['message'] = "Reservering verwijderd!";
		header('location: Reserveringen.php');
	}
?>