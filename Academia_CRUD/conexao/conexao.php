<?php
	$host = "localhost"; // endereço do servidor
	$usuario = "root"; // usuário do MySQL
	$senha = ""; // senha do MySQL
	$database = "Academia"; // nome do banco de dados

	// Cria a conexão
	$connection = new mysqli($host, $usuario, $senha, $database);
	
	// Checa se a conexão foi realizada com sucesso
	if ($connection->connect_error) {
	    die("Falha de conexão: " . $connection->connect_error);
	}
?>