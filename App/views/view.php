<!DOCTYPE html>
<html>
<head>
	<title>Тестовое задание</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="public/style.css">
	<script type="text/javascript" src="public/script.js"></script>
</head>
<body>
	<div id='main'>
	    <div class="users" id='u-table'>
		<div class='row table-head'>
			<div class="cell" >Имя</div>
			<div class="cell">Возраст</div>
			<div class="cell">Город</div>
		</div>
		{% for value in data %}
		<div class='row'>
				<div class="cell">{{ value.name }}</div>
				<div class="cell">{{ value.age }}</div>
				<div class="cell">{{ value.city }}</div>
		</div>
		{% endfor %}
		</div>
		<div id="controll-panel">
			<h4>Добавить:</h4>
			<button id="open-user-form"> Пользователь </button>
			<button id="open-city-form"> Город </button>
		</div>
	</div>
	<div id = 'window-form'></div>
	<div class="window">
		<div id='form-city' class='form'>

			<form id="city-data">
				<input type="text" name="city" placeholder="Название города" id="city-name">
				<button id='add-city-button'>Добавить</button>
			</form>

			<span id='close-city-form' class="close">X</span>
		</div>

		<div id='form-user' class='form'>

			<form id="user-data">
				<input type='text' name='user' placeholder="Имя" id="user-name">
				<input type="number" name="age" min='10' max='100' id="user-age" placeholder="Возраст">
				<select name='city' id="user-city">
					<option disabled> Город </option>

					{% for data in city  %}

						<option value="{{data.id}}">{{ data.name }}</option>

					{% endfor %}

				</select>
				<button id='add-user-button'>Добавить</button>
			</form>

			<span id='close-user-form' class="close">X</span>
		</div>
	</div>

</body>
</html>