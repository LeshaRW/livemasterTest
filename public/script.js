document.addEventListener('DOMContentLoaded', function() {
	var addUser = $('add-user-button');
	addUser.addEventListener('click',function(e) {
		e.preventDefault();
		var userName = $('user-name').value;
		var age = $('user-age').value;
		var userCity = $('user-city').value;
		if (userName == '') 
			alert('Имя не должно быть пустым');
		else if (age < 10 || age > 100) 
			alert('Возраст должен быть от 10 до 100');
		else sendData('user');
		 
	});
	var addCity = $('add-city-button');
	addCity.addEventListener('click',function(e) {
		e.preventDefault();
		var cityName = $('city-name').value;
		if (cityName !== '') {
			sendData('city');
		}else alert('Название города не должно быть пустым');
	});
	String.prototype.firstUpCase = function() {
    	return this.charAt(0).toUpperCase() + this.slice(1);
	}
	$('open-user-form').addEventListener('click' , function() { openForm('user'); });
	$('open-city-form').addEventListener('click' , function() { openForm('city'); });
	$('close-user-form').addEventListener('click' , function() { closeForm('user'); });
	$('close-city-form').addEventListener('click' , function() { closeForm('city'); });
});
function $(id) {
	return document.getElementById(id);
}
function sendData(str) {
	var data = new FormData($(str + '-data'));
	var xhr = new XMLHttpRequest();
	xhr.open('POST', '/ajax/add' + str.firstUpCase(), true);
	xhr.send(data);
	xhr.onreadystatechange = function() { 
	  if (xhr.readyState != 4) return;
	  if (xhr.status != 200) {
	  	console.log('ошибка');
	  } else {
		  	
		    var json = JSON.parse(xhr.responseText);
		    if (json['success_'+str]){
		    	insert_formdata(str);
		    }else {
		    	if (json['error_name'])
		    		alert(json['error_name']);
		    	if (json['error_age'])
		    		alert(json['error_age']);
		    	if (json['error_city'])
		    		alert(json['error_city']);
		    }
	  }
	}
}
function insert_formdata(str) {
	if (str == 'user'){
		var name = $('user-name').value;
		var age = $('user-age').value;
		var city = $('user-city').options[$('user-city').options.selectedIndex].innerHTML;

		$('u-table').innerHTML = $('u-table').innerHTML + 
		'<div class="row new">'+
				'<div class="cell">'+ name +'</div>'+
				'<div class="cell">'+ age +'</div>'+
				'<div class="cell">'+ city +'</div>'+
		'</div>';
	}
}
function openForm(str) {
	var form = $('form-' + str);
	form.style.display = 'block';
	$('window-form').style.display = 'block';
}
function closeForm(str) {
	var form = $('form-' + str);
	form.style.display = 'none';
	$('window-form').style.display = 'none';
}