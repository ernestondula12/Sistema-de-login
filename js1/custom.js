const loginForm = document.getElementById("login-usuario-form");
const msgAlertErroLogin = document.getElementById("msgAlertErroLogin");
const loginModal = new bootstrap.Modal(document.getElementById("loginModal"));

loginForm.addEventListener("submit", async (e) => {

	e.preventDefault();

	if (document.getElementById("email").value === "") {
		msgAlertErroLogin.innerHTML = "<div class='alert alert-danger' role='alert'>Erro: Necessario preencher o campo usuário!</div>";

	}else if (document.getElementById("senha").value === "") {

		msgAlertErroLogin.innerHTML = "<div class='alert alert-danger' role='alert'>Erro: Necessario preencher o campo senha!</div>";
	}else {

		const dadosForm = new FormData(loginForm);

		const dados = await fetch("validar.php", {

			method: "POST",
			body: dadosForm
		});

		const resposta = await dados.json(); 

		if(resposta['erro']){

			msgAlertErroLogin.innerHTML = resposta['msg']
		}else{
			
			document.getElementById("dados-usuario").innerHTML = "Bem Vindo " + resposta['dados'].nome + "<br>";
			loginForm.reset();
			loginModal.hide();
		}
	}
});