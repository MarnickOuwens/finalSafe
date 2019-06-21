<?php  include('overzichtBeheer.php'); ?>
<?php
error_reporting(E_ALL);
@ini_set('display_errors', e_all);
if (isset($_GET['edit'])) {
    //if method is edit prepare edit form with set values
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM bestelling WHERE id=$id");
    if (count($record) == 1 ) {
        //get records & count
        $n = mysqli_fetch_array($record);
        $Tafel = $n['Tafel'];
        $Datum = $n['Datum'];
        $Tijd = $n['Tijd'];
        $MenuItemcode = $n['MenuItemcode'];
        $Aantal = $n['Aantal'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Excellent taste</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<body>
<?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM bestelling"); ?>
<div id="tables">
    <?php include 'index.php';?>
    <table>
        <thead>
        <tr>
            <th>Tafel</th>
            <th>Datum</th>
            <th>Tijd</th>
            <th>KlantID</th>
            <th>Aantal</th>
            </th>
        </tr>
        </thead>
        <!--get results (read)-->
        <?php while ($row = mysqli_fetch_array($results)) {  ?>
            <tr>
                <td><?php echo $row['Tafel']; ?></td>
                <td><?php echo $row['Datum']; ?></td>
                <td><?php echo $row['Tijd']; ?></td>
                <td><?php echo $row['MenuItemcode']; ?></td>
                <td><?php echo $row['Aantal']; ?></td>
                <td>
                    <a href="Overzichten.php?edit=<?php echo $row['id']; ?>" class="iets" ></a>
                </td>
                <td>
                    <!--(delete)-->
                    <a href="overzichtBeheer.php?del=<?php echo $row['id']; ?>" class="iets"></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <!-- Create table for all input data & edit data (create & update) -->



</body>
</html>