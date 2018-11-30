<?php
	
	// obter os dados enviados pelo formulário e armazenar em uma variavel
	$primeiroNome  = $_POST["primeiroNome"];	
	$sobrenome = $_POST["sobrenome"];
	$nickname =$_POST["nickname"];
	$email =$_POST["email"];
	$endereco =$_POST["endereco"];
	$endereco2 =$_POST["endereco2"];
	$pais =$_POST["pais"];
	$estado =$_POST["estado"];
	$cep =$_POST["cep"];
	$sangue =$_POST["sangue"];
	
	
	
	
	// configuração das variaveis de conexão com banco	
	$servidor = "127.0.0.1"; 
	$usuario  = "root";
	$senha    = "admin";
	$db       = "php";
	
	// estabelecer a conexao com banco de dados
	$conn = new mysqli($servidor, $usuario, $senha, $db);
	
	// verifica se a conexão foi realizada com sucesso ou ocorreu erro
	if ($conn->connect_error) {
	    die("Conexão com o banco falhou: " . $conn->connect_error);
	} 
	
	// executar a instrução sql de insert na tabela;
	
	$sql = "INSERT INTO doadores(primeironome,sobrenome,nickname,email,endereco,endereco2,pais,estado,cep,sangue) VALUES('" . $primeiroNome . "', '" . $sobrenome . "', '" . $nickname . "','" . $email . "','" . $endereco . "','" . $endereco2 . "','" . $pais . "','" . $estado . "','" . $cep . "','" . $sangue . "')";
	
	$result = $conn->query($sql);

	if($result){

		echo "Dados salvos com sucesso!"; 

	}else{
	
		echo "Ocorreu algum erro ao salvar os dados!";
		
	}

	$conn->close();

?>