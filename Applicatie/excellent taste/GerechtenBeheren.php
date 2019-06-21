<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'excellent taste');
// initialize variables
$id = 0;
$Gerechtcode = "";
$Subgerechtcode = "";
$MenuItemcode = "";
$MenuItem = "";
$Prijs = "";
$update = false;
//select method

if (isset($_POST['save'])) {
    //save method
    $Gerechtcode = $_POST['Gerechtcode'];
    $Subgerechtcode = $_POST['Subgerechtcode'];
    $MenuItemcode =$_POST['MenuItemcode'];
    $MenuItem =$_POST['MenuItem'];
    $Prijs = $_POST['Prijs'];

    mysqli_query($db, "INSERT INTO menuitem (Gerechtcode, Subgerechtcode, MenuItemcode, MenuItem, Prijs) VALUES ('$Gerechtcode', '$Subgerechtcode', '$MenuItemcode', '$MenuItem','$Prijs')");
    $_SESSION['message'] = "Gerecht opgeslagen";
    header('location: Gerechten.php');
}
if (isset($_POST['update'])) {
    //update method
    $id = $_POST['id'];
    $Gerechtcode = $_POST['Gerechtcode'];
    $Subgerechtcode = $_POST['Subgerechtcode'];
    $MenuItemcode =$_POST['MenuItemcode'];
    $MenuItem =$_POST['MenuItem'];
    $Prijs = $_POST['Prijs'];

    mysqli_query($db, "UPDATE menuitem SET Gerechtcode='$Gerechtcode', Subgerechtcode='$Subgerechtcode', MenuItemcode='$MenuItemcode', MenuItem='$MenuItem', Prijs='$Prijs' WHERE id= '$id'");
    echo $Tafel;
    $_SESSION['message'] = "Gerecht aangepast!";
    header('location: Gerechten.php');
}
if (isset($_GET['del'])) {
    //delete method
    $id = $_GET['del'];

    mysqli_query($db, "DELETE FROM menuitem WHERE id= '$id'");
    $_SESSION['message'] = "Gerecht verwijderd!";
    header('location: Gerechten.php');
}
?>