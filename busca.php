<?php
	// obter os dados enviados pelo formulário e armazenar em uma variavel
	$pesquisa  = $_POST["nomePesquisado"];	
	
	// configuração das variaveis de conexão com banco	
	$servidor = "127.0.0.1"; 
	$usuario  = "root";
	$senha    = "admin";
	$db       = "php";
    
    $pdo = new PDO('mysql:host=' . $servidor .  ';dbname=' . $db, $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM doadores WHERE primeironome like '%" . $pesquisa . "%'";	
    $consulta = $pdo->query($sql);
    
    $result = $consulta->fetchAll(\PDO::FETCH_ASSOC);

    echo json_encode($result);
?>