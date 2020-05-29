<?php
require "add/header.php";
$conn = new mysqli("localhost", "root", "root", "Lab_5");
if ($conn->connect_error) {
			die("Ошибка соединения	 " . $conn->connect_error);
}
if (isset($_POST['triangle1']))
{
	$a = (double)$_POST['triangle1'];
	$b = (double)$_POST['triangle2'];
	$c = (double)$_POST['triangle3'];
	$p = ($a + $b + $c)/2;
	$S = sqrt($p*($p-$a)*($p-$b)*($p-$c));
	if($S > 0)
	{
		$sql = "INSERT INTO triangle (a,b,c,S)
		VALUES ($a,$b,$c,$S)";
	if ($conn->query($sql) === TRUE)
	{
		echo("Площадь S = " . $S . "<br> Успешно добавлена");
		$succes = true;
	}
	else
	{
		echo "Ошибка     " . $sql . "<br>TYPE:   " . $conn->error;
	}
	}
	else
	{
		echo('Такой фигуры не существует');
	}
}
?>
<div class="forma">
	<form action="triangle.php" method="post" onsubmit="return check_input()">
		<p>a = <input type="text" name="triangle1"></p>
		<p>b = <input type="text" name="triangle2"></p>
		<p>c = <input type="text" name="triangle3"></p>
		<p>
			<button class="btn" type="submit">Посчитать</button>
		</p>
	</form>
</div>
<?php
if($succes)
{
$cmd ="SELECT * FROM triangle";
$tbl = mysqli_query($conn, $cmd) or die("ERROR  " . mysqli_error($conn));
if($tbl)
{
$rows = mysqli_num_rows($tbl);
echo '<table style="width:500px"><tr><th>#</th><th>a</th><th>b</th><th>c</th><th>S</th></tr>';
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