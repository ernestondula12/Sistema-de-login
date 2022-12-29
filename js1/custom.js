$(function () {

	$('form[name="from_login"]').submit(function (event) {
		event.preventDefault();

		document.getElementById('login-usuario-btn').innerHTML = `<div class="spinner-grow" role="status"><span class="sr-only">Loading...</span></div>`;
		document.getElementById('login-usuario-btn').disabled = true;

		var email = $(this).find('input#email').val();
		
		if (email == '') {
			tata.warn(`Campos Incorretos`, 'Informe um email valido');
			return
		}


		$.ajax({
			url: '/validar.php',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			timeout: 40000,

		}).done(function (msg) {
			if (msg.mensagem.trim() == 'OK') {
				window.location.href = '/home.php'
			} else {
				tata.warn(`${msg.mensagem}`, 'Sistema de Login');
				document.getElementById('login-usuario-btn').disabled = false;
				document.getElementById('login-usuario-btn').innerHTML = `Entrar`;
			}
		}).fail(function (data) {
			tata.warn(`server internal`, 'Sistema de Login');

			console.log(data.responseText)

			document.getElementById('login-usuario-btn').disabled = false;
			document.getElementById('login-usuario-btn').innerHTML = `Entrar`;
		});
	})
})