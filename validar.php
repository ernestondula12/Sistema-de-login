<?php  
/*Criando uma variavel dados que tem a função de receber os dados introduzidos pelo usuario.
*/
session_start();
include_once "conexao.php";
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$dados = [
	"nome" => "Ernesto",
	"email" => "ernestondulandula@gmail.com",
	"senha" => "123456",
];

/*
	Testando por intermedio de uma condição se o usuario inserir dados corretamente ou não.
*/

if (empty($dados['email'])) {
	/*
		Criamos a variavel retorna para poder nos retorna uma mensagem de erro caso o usuario inserir os dados incorretos.
	*/
	$retorna = ['erro'=> true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessario preencher o campo usuário!</div>"];
}elseif(empty($dados['senha'])) {
	$retorna = ['erro'=> true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessario preencher o campo senha!</div>"];
}else{
	$query_usuario = "SELECT id, nome, email, senha
			FROM usuario
			WHERE email=:email
			LIMIT 1";

	$result_usuario = $conn->prepare($query_usuario);
	$result_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
	$result_usuario->execute();

	if(($result_usuario) and ($result_usuario->rowCount() != 0)){
		//efectuando leitura de la base de datos apartir da variavel $result_usuario.
		$row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
		//Verificando se senha que o usuario digitar será igual com que esta na base de dados.
		if(password_verify($dados['senha'], $row_usuario['senha'])){
			$_SESSION['id'] = $row_usuario['senha'];
			$_SESSION['nome'] = $row_usuario['nome'];

			$retorna = ['erro'=> false, 'dados' => $result_usuario];
		}else{
			$retorna = ['erro'=> true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Uusuário ou a senha invalida!</div>"];
		}
		//$retorna = ['erro'=> false, 'msg' => "<div class='alert alert-success' role='alert'>Validar</div>"];
	}else {
		$retorna = ['erro'=> true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Uusuário ou a senha invalida!</div>"];
	}
}

echo json_encode($retorna);



?>