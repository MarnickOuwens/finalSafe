<?php  include('BestellingenBeheer.php'); ?>
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
        $Prijs =$n['prijs'];
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



<?php $results = mysqli_query($db, "SELECT * FROM bestelling; "); ?>
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
                    <a href="Bestellingen.php?edit=<?php echo $row['id']; ?>" class="iets" ></a>
                </td>
                <td>
                    <!--(delete)-->
                    <a href="BestellingenBeheer.php?del=<?php echo $row['id']; ?>" class="iets"></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <!-- Create table for all input data & edit data (create & update) -->


    <form method="post" action=" BestellingenBeheer.php" >
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="input-group">
            <label>Tafel</label>
            <input type="text" name="Tafel" value="<?php echo $Tafel; ?>">
        </div>

        <div class="input-group">
            <label>Datum</label>
            <input type="text" name="Datum" value="<?php echo $Datum; ?>">
            <div class="input-group">

                <div class="input-group">
                    <label>Tijd</label>
                    <input type="text" name="Tijd" value="<?php echo $Tijd; ?>">
                </div>

                <div class="input-group">
                    <label>MenuItemcode</label>
                    <input type="text" name="MenuItemcode" value="<?php echo $MenuItemcode; ?>">
                </div>

                <div class="input-group">
                    <label>Aantal</label>
                    <input type="text" name="Aantal" value="<?php echo $Aantal; ?>">
                </div>

                <?php if ($update == true): ?>
                    <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
                <?php else: ?>
                    <button class="btn" type="submit" name="save" >Save</button>
                <?php endif ?>
            </div>
        </div>
</div>
</form>
</body>
</html>