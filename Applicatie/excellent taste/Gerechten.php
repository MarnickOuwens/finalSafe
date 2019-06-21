<?php  include('GerechtenBeheren.php'); ?>
<?php
error_reporting(E_ALL);
@ini_set('display_errors', e_all);
	if (isset($_GET['edit'])) {
		//if method is edit prepare edit form with set values
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM menuitem WHERE id=$id");
		if (count($record) == 1 ) {
			//get records & count
			$n = mysqli_fetch_array($record);
            $Gerechtcode = $n['Gerechtcode'];
            $Subgerechtcode = $n['Subgerechtcode'];
            $MenuItemcode =$n['MenuItemcode'];
            $MenuItem =$n['MenuItem'];
            $Prijs = $n['Prijs'];
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
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM menuitem"); ?>
<div id="tables">
    <?php include 'index.php';?>
<table>
	<thead>
		<tr>
			<th>Gerechtcode</th>
			<th>Subgerechtcode</th>
            <th>MenuItemcode</th>
            <th>MenuItem</th>
            <th>Prijs</th>

			<th colspan="2">Action</th>
		</tr>
	</thead>
<!--get results (read)-->
	<?php while ($row = mysqli_fetch_array($results)) {  ?>
		<tr>
			<td><?php echo $row['Gerechtcode']; ?></td>
			<td><?php echo $row['Subgerechtcode']; ?></td>
            <td><?php echo $row['MenuItemcode']; ?></td>
            <td><?php echo $row['MenuItem']; ?></td>
            <td><?php echo $row['Prijs']; ?></td>
			<td>
				<a href="Gerechten.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
<!--(delete)-->
				<a href="GerechtenBeheren.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
				<a href="GerechtenBeheren.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<!-- Create table for all input data & edit data (create & update) -->


	<form method="post" action="GerechtenBeheren.php" >
	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="input-group">
		<label>Gerechtcode</label>
		<input type="text" name="Gerechtcode" value="<?php echo $Gerechtcode; ?>">
	</div>

	<div class="input-group">
		<label>Subgerechtcode</label>
		<input type="text" name="Subgerechtcode" value="<?php echo $Subgerechtcode; ?>">
	<div class="input-group">

        <div class="input-group">
            <label>MenuItemcode</label>
            <input type="text" name="MenuItemcode" value="<?php echo $MenuItemcode; ?>">
        </div>

        <div class="input-group">
            <label>MenuItem</label>
            <input type="text" name="MenuItem" value="<?php echo $MenuItem; ?>">
        </div>

        <div class="input-group">
            <label>Prijs</label>
            <input type="text" name="Prijs" value="<?php echo $Prijs; ?>">
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