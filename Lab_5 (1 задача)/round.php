<?php
require "add/header.php";
$conn = new mysqli("localhost", "root", "root", "Lab_5");
if ($conn->connect_error) {
			die("Ошибка соединения	 " . $conn->connect_error);
}
if (isset($_POST['round1']))
{
	$D = (double)$_POST['round1'];
	$d = (double)$_POST['round2'];
	$a = $D/2; 
	$b = $d/2; 
	$S = pi() * ((pow($a,2)) - (pow($b,2)));
	if($S > 0 && $a >$b)
			{	$sql = "INSERT INTO round (Rb,rl,S)
		VALUES ($a,$b,$S)";
		if ($conn->query($sql) === TRUE)
		{
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
	<form action="round.php" method="post" onsubmit="return check_input()">
		<p>D = <input type="text" name="round1"></p>
		<p>d = <input type="text" name="round2"></p>
		<p>
			<button class="btn" type="submit">Посчитать</button>
		</p>
	</form>
</div>
<?php
if($succes)
{
$cmd ="SELECT * FROM round";
		$tbl = mysqli_query($conn, $cmd) or die("ERROR	" . mysqli_error($conn));
if($tbl)
					{
						$rows = mysqli_num_rows($tbl);
						echo '<table style="width:500px"><tr><th>#</th><th>R</th><th>r</th><th>S</th></tr>';
						for ($i = 0 ; $i < $rows ; ++$i)
						{
						$row = mysqli_fetch_row($tbl);
						echo "<tr>";
								for ($j = 0 ; $j < 4 ; ++$j) echo ("<td>$row[$j]</td>");
						echo "</tr>";
						}
						echo "</table>";
						mysqli_free_result($result);
					}
}
require "add/footer.php";
?>