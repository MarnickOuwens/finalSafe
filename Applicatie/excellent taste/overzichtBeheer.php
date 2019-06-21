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
$update = false;
//select method

?>