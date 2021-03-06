<!DOCTYPE html>
<html>
<head>
	<title>Appointment Page</title>
	<link rel="stylesheet" type="text/css" href="appointment.css">
</head>
<body>

<form action="logout.php" method="post">
	<ul>
		<li><a href="https://cryptic-refuge-67781.herokuapp.com/Prove06/appointment.php">Make Appointment</a></li>
		<li><input type="submit" value="Logout"></li>
	</ul>
</form>

<?php
session_start();

if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
}
else
{
	header("Location: login.php");
	die();
}

echo '<h1> Welcome back, ';
echo $_SESSION['fname'];
echo ' ';
echo $_SESSION['lname'];
echo '!</h1>';

$id = $_SESSION['id'];
?>

<h1>Make an Appointment!</h1>

<form action="makeApp.php" method="post">
	<table>
		<tr>
			<th>Military Hour</th>
			<th>Day</th>
			<th>Month</th>
			<th>Year</th>
		</tr>
		<tr>
			<td>
				<select name="militaryHour">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
				</select>
			</td>
			<td>
				<input type="number" name="day" maxlength="2" max="31" size="2">
			</td> 
			<td>
				<input type="number" name="month" maxlength="2" max="12" size="2">
			</td>
			<td>
				<input type="number" name="year" maxlength="2" min="2017" max="2018" size="2">
			</td>
		</tr>
		<tr>
			<td colspan="4">
				<?php echo '<input type="hidden" name="id" value="' . $id . '">'; ?>
				<input type="submit" class="submit" value="Make Appointment">
			</td>
		</tr>
	</table>
</form>

<h1>Current Appointment!</h1>

<table>
		<tr>
			<th>Military Hour</th>
			<th>Day</th>
			<th>Month</th>
			<th>Year</th>
		</tr>
<?php

require("myApps.php");
$row = get_apps($id);

echo '<tr>';
echo '<td>';
echo $row['military_hour'];
echo '</td>';
echo '<td>';
echo $row['day'];
echo '</td>';
echo '<td>';
echo $row['month'];
echo '</td>';
echo '<td>';
echo $row['year'];
echo '</td>';
echo '</tr>';

?>
</table>

</body>
</html>