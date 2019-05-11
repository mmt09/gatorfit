<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = 'password'; // Password
$db_name = 'fitness_center'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

// if(isset($_POST['formClass']))
// {
// 	$formClass = $_POST['formclass'];
// 	$Aquatics = (isset($_POST['Aquatics']) ? $_POST['Aquatics']: null);
// 	$Boxing = (isset($_POST['Boxing']) ? $_POST['Boxing']: null);
// 	$Cycling = (isset($_POST['Cycling']) ? $_POST['Cycling']: null);
// 	$Dance = (isset($_POST['Dance']) ? $_POST['Dance']: null);
// 	$Soccer = (isset($_POST['Soccer']) ? $_POST['Soccer']: null);
// 	$WeightLifting = (isset($_POST['Weight Lifting']) ? $_POST['Weight Lifting']: null);
// 	$Yoga = (isset($_POST['Yoga']) ? $_POST['Yoga']: null);
	
// 	unset($sql);
// 	if($Aquatics) {
// 		$sql[] = " = '$Aquatics' ";
// 	}
	
// 	if($Boxing) {
// 		$sql[] = " = '$Boxing' ";
// 	}
	
// 	if($Cycling) {
// 		$sql[] = " = '$Cycling' ";
// 	}
	
// 	if($Dance) {
// 		$sql[] = " = '$Dance' ";
// 	}
	
// 	if($Soccer) {
// 		$sql[] = " = '$Soccer' ";
// 	}
	
// 	if($WeightLifting) {
// 		$sql[] = " = '$WeightLifting' ";
// 	}
	
// 	if($Yoga) {
// 		$sql[] = " = '$Yoga' ";
// 	}
// }

$select = $_POST['formClass'];

$sql1 = "SELECT * FROM trainer";
$sql2 = "SELECT T.* FROM trainer T WHERE T.employee_id IN(SELECT C.employee_id FROM class C WHERE C.type = '$_POST[formClass]')";
$sql3 = "SELECT * FROM class";
$sql4 = "SELECT * FROM membership";
$sql5 = "SELECT * FROM member";

// if(!empty($sql)) {
// 	$sql3 .= ' WHERE ' .implode(' C.type ', $sql);
// 	$sql1 = $sql3;
// }

$query = mysqli_query($conn, $sql1);
$query1 = mysqli_query($conn, $sql2);
$query2 = mysqli_query($conn, $sql3);
$query3 = mysqli_query($conn, $sql4);
$query4 = mysqli_query($conn, $sql5);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<p>
<h1>Trainer by Class Selector</h1>
<center><form action="" method="post">
<select name="formClass">
	<option value="">Select...</option>
	<option value="Aquatics">Aquatics</option>
	<option value="Boxing">Boxing</option>
	<option value="Cycling">Cycling</option>
	<option value="Dance">Dance</option>
	<option value="Pilates">Pilates</option>
	<option value="Soccer">Soccer</option>
	<option value="Weight Lifting">Weight Lifting</option>
	<option value="Yoga">Yoga</option>
	<option value="Zumba">Zumba</option>
</select>
<input type="submit" name="submit" value="Find"/>
</form></center>
</p>
<head>
	<title>Displaying MySQL Data in HTML Table</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
</head>
<body>
	<h1>Trainers</h1>
	<table class="data-table">
		<thead>
			<tr>
				<th>Employee ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Certification</th>
				<th>Email</th>
				<th>Phone</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		$total 	= 0;
		while ($row = mysqli_fetch_array($query1))
		{
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['first_name'].'</td>
					<td>'.$row['last_name'].'</td>
					<td>'.$row['certification'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['phone'].'</td>
				</tr>';
			$no++;
		}?>
		</tbody>
	</table>
	<p>
	<h1>Class by Type Selector</h1>
	<center><form action="" method="post">
	<select name="formClass">
		<option value="">Select...</option>
		<option value="Aquatics">Aquatics</option>
		<option value="Boxing">Boxing</option>
		<option value="Cycling">Cycling</option>
		<option value="Dance">Dance</option>
		<option value="Pilates">Pilates</option>
		<option value="Soccer">Soccer</option>
		<option value="Weight Lifting">Weight Lifting</option>
		<option value="Yoga">Yoga</option>
		<option value="Zumba">Zumba</option>
	</select>
	<input type="submit" name="submit" value="Find"/>
	</form></center>
	</p>
	<h1>Classes</h1>
	<table class="data-table">
		<thead>
			<tr>
				<th>Class ID</th>
				<th>Class Name</th>
				<th>Room</th>
				<th>Type</th>
				<th>Employee ID</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		$total 	= 0;
		while ($row = mysqli_fetch_array($query2))
		{
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['name'].'</td>
					<td>'.$row['room'].'</td>
					<td>'.$row['type'].'</td>
					<td>'.$row['employee_id'].'</td>
				</tr>';
			$no++;
		}?>
		</tbody>
	</table>
	<h1>Memberships</h1>
	<table class="data-table">
		<thead>
			<tr>
				<th>Membership ID</th>
				<th>Type</th>
				<th>Price</th>
				<th>Duration</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		$total 	= 0;
		while ($row = mysqli_fetch_array($query3))
		{
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['type'].'</td>
					<td>'.$row['price'].'</td>
					<td>'.$row['duration'].'</td>
				</tr>';
			$no++;
		}?>
		</tbody>
	</table>
	<table>
	<h1>Members</h1>
	<table class="data-table">
		<thead>
			<tr>
				<th>Membership ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		$total 	= 0;
		while ($row = mysqli_fetch_array($query4))
		{
			echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['first_name'].'</td>
					<td>'.$row['last_name'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['phone'].'</td>
				</tr>';
			$no++;
		}?>
		</tbody>
	</table>
</body>
</html>