<?php
require "add/header.php";
$conn = new mysqli("localhost", "root", "root", "Lab_5");
if ($conn->connect_error)
{
			die("Ошибка соединения	 " . $conn->connect_error);
}
if (isset($_POST['trapeze1']))
{
	$a = (double)$_POST['trapeze1'];
	$b = (double)$_POST['trapeze2'];
	$h = (double)$_POST['trapeze3'];
	$S = (($a+$b)/2)* $h;
	if($S > 0)
	{
		$sql = "INSERT INTO trapeze (a,b,h,S)
		VALUES ($a,$b,$h,$S)";
		if ($conn->query($sql) === TRUE) {
			echo("Площадь S = " . $S . "<br> Успешно добавлена");
			$succes = true;
		}
		else
		{
							echo "Ошибка!	" . $sql . "<br>TYPE:	" . $conn->error;
		}
	}
	else
	{
		echo('Такой фигуры не существует');
	}
}
?>
<div class="forma">
	<form action="trapeze.php" method="post" onsubmit="return check_input()">
		<p>a = <input type="text" name="trapeze1"></p>
		<p>b = <input type="text" name="trapeze2"></p>
		<p>h = <input type="text" name="trapeze3"></p>
		<p>
			<button class="btn" type="submit">Посчитать</button>
		</p>
	</form>
</div>
<?php
if($succes)
{
$cmd ="SELECT * FROM trapeze";
$tbl = mysqli_query($conn, $cmd) or die("ERROR  " . mysqli_error($conn));
if($tbl)
{
$rows = mysqli_num_rows($tbl);
echo '<table style="width:500px"><tr><th>#</th><th>a</th><th>b</th><th>h</th><th>S</th></tr>';
for ($i = 0 ; $i < $rows ; ++$i)
{
$row = mysqli_fetch_row($tbl);
echo "<tr>";
		for ($j = 0 ; $j < 5 ; ++$j) echo ("<td>$row[$j]</td>");
echo "</tr>";
}
echo "</table>";
mysqli_free_result($result);
}
}
require "add/footer.php"; ?>