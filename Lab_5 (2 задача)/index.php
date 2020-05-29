<!DOCTYPE html>
<html>
	<head>
		<title>Game_shell</title>
		<meta name ="Content-Type" content="text/html; charset=windows-1251">
		<meta name ="keywords" content="lab-5">
		<link rel="stylesheet" href="add/style.css">
		<style>
    #ball_submit {
      position: relative;
      cursor: pointer;
    }
  </style>
	</head>
	<body>
		<?php
		if(isset($_GET[uname]))
		{
		$conn = new mysqli("localhost", "root", "root", "lab_5_2");
		if ($conn->connect_error) {
					die("Ошибка соединения	 " . $conn->connect_error);
		}
		if (isset($_GET[uname]))
		{
			$uname =(string)$_GET[uname];
			$p = (double)$_GET[p];
			$a = (double)$_GET[a];
			$sql = "INSERT INTO Win (Name,Power,Angle)
				VALUES ('$uname',$p,$a)";
				if ($conn->query($sql) === TRUE)
				{
					$succes = true;
				}
				else
				{
									echo "Ошибка	" . $sql . "<br>TYPE:	" . $conn->error;
				}
			}
		}
		?>
		<div class="forma">
			<form action="index.php" method="post" onsubmit="return function()">
				<p>Сила = <input id="power" type="text" name="power" placeholder=" до 100"></p>
				<p>Угол наклона = <input id="angle" type="text" name="angle" placeholder="до 90"></p>
			</form>
			<p><input class="btn" id="submit" type="submit" value="Бросить" ></p>
		</div>
		<img id="archery" src="add/archery.png" >
		<img  id="ball_submit" src="add/ball.png">
		<script language="javascript">
		submit.onclick = function()
		 {

		 	
			var p = document.getElementById('power').value;
			var a = document.getElementById('angle').value;
			var g = 9.8;
			var T_0 = 0.2;
				
		let start = Date.now();
		let timer = setInterval(function() {
			
			T_0 = T_0 + 0.2;
		let t = archery.getBoundingClientRect();
		let b = ball_submit.getBoundingClientRect();
			
			var y = (p * Math.sin(a * Math.PI / 180) * T_0) - ((g * Math.pow(T_0,2))/2);
			if(a==90)
		var x = 0;
			else
				var x = p * Math.cos(a * Math.PI / 180) * T_0;
			if(y<0)
			clearInterval(timer);
		ball_submit.style.right = x + 'px';
		ball_submit.style.bottom =  y + 'px';
			
		if( (t.top > (b.top-50) && t.top < (b.top+50)) && (t.left > (b.left-10) && t.left < (b.left+10)) )
		{
		alert('Вы выиграли!');
		clearInterval(timer);
			
			for(;;)
			{
				var uname = prompt('Ваш логин? (12characters) ', 'Инкогнито');
				if(uname.length < 13 && uname.length > 0) 
				{
					alert('Вы занесены в список победителей!');
					uname = encodeURIComponent(uname);
					p=encodeURIComponent(p);
					a=encodeURIComponent(a);
					location.href = 'http://localhost/Game_shell/index.php?uname='+uname+'&'+'p='+p+'&'+'a='+a;
					break;
				}
			}
		}
		if (timePassed > 2000)
			clearInterval(timer);
		}, 20);
		}
	
		</script>
	</div>
	</body>
</html>
	<?php
	if($succes)
	{
	$cmd ="SELECT * FROM Win";
			$tbl = mysqli_query($conn, $cmd) or die("Ошибка	" . mysqli_error($conn));
	if($tbl)
						{
							$rows = mysqli_num_rows($tbl);
							echo '<table style="width:500px" align="right" ><tr><th>#</th><th>Name</th><th>Power</th><th>Angle</th></tr>';
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
?>

