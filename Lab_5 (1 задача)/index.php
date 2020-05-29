<?php require "add/header.php" ?>
<div class="forma">
	<div class="header1"><h3>Выберете фигуру</h3></div>
	<form id="goto" onsubmit="return select()" >
		<input type="radio" id="triangle" name="shape" value="triangle">
		<label for="triangle">Треугольник</label><br>
		<input type="radio" id="trapeze" name="shape" value="trapeze">
		<label for="trapeze">Трапеция</label><br>
		<input type="radio" id="round" name="shape" value="round">
		<label for="round">Окружность</label><br>
		<p>
			<button class="btn" type="submit">Выбрать</button>
		</p>
	</form>
</div>
<script type="text/javascript">
	function select()
	{
		var choise = document.getElementsByName("shape");
		for(var i = 0; i < choise.length; i++)
		{
			if(choise[i].checked)
			{
				document.getElementById('goto').setAttribute('action', choise[i].value + '.php');
				break;
			}
		}
	}
</script>
<?php require "add/footer.php" ?>