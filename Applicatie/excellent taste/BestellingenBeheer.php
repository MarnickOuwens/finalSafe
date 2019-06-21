<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 20-6-2019
 * Time: 12:41
 */

session_start();
$db = mysqli_connect('localhost', 'root', '', 'excellent taste');
// initialize variables
$id = 0;
$Tafel = "";
$Datum = "";
$Tijd = "";
$MenuItemcode = "";
$Aantal = "";
$Prijs = "";
$update = false;
//select method

if (isset($_POST['save'])) {
    //save method
    $Tafel = $_POST['Tafel'];
    $Datum = $_POST['Datum'];
    $Tijd =$_POST['Tijd'];
    $MenuItemcode =$_POST['MenuItemcode'];
    $Aantal = $_POST['Aantal'];
    $Prijs = $_POST['Prijs'];

    mysqli_query($db, "INSERT INTO bestelling (Tafel, Datum, Tijd, MenuItemcode, Aantal, Prijs) VALUES ('$Tafel', '$Datum', '$Tijd', '$MenuItemcode', '$Aantal', '$Prijs')");
    $_SESSION['message'] = "Bestelling opgeslagen";
    header('location: Bestellingen.php');
}
?>