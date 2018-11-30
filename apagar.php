<?php
	
	// obter os dados enviados pelo formulário e armazenar em uma variavel
    $id  = $_POST["identificador"];	
    
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
	
	$sql = "delete from doadores where id = " . $id;
	
	$result = $conn->query($sql);

	if($result){

		echo "1"; 

	}else{
	
		echo "0";
		
	}

	$conn->close();

?>