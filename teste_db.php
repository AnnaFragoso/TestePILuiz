<?php

$db_host = "10.135.0.53\sqledutsi";
$db_name = "Kanino";
$user = "TSI";
$password = "SistemasInternet123";
$dsn = "Driver={SQL Server};Server=$db_host;Port=1433;Database=$db_name;";
               
if($db = odbc_connect(	$dsn, $user, $password)){
	echo "Iniciando Processamento<br>";
	flush();
	ob_flush();
	sleep(5);
	if(odbc_exec($db, " UPDATE Usuario
						SET
						loginUsuario = 'AN@gmail.com',
						tipoPerfil = 'p' WHERE
						loginUsuario = 'ANNA@gmail.com'")) {
		echo "Usu&aacute;rio atualizado com sucesso<br>";					
	}else{
		echo "Erro ao cadastrar o usu&aacute;rio";
	}
	
}else{
	
	echo ":-( N&atilde;o deu certo";
	
}
//Deletar usuario
echo "Agora vem o DELETE<br>";
if(odbc_exec($db, " DELETE FROM Usuario
						WHERE
						loginUsuario = 'AN@gmail.com'")) {
		echo "Usu&aacute;rio deletado com sucesso<br>";					
	}else{
		echo "Erro ao deletar o usu&aacute;rio";
	}
//-------------------------------------------------
$query = odbc_exec($db, "SELECT * FROM Usuario");
$result = odbc_fetch_array($query);

echo "Id: {$result['idUsuario']} Nome: {$result['nomeUsuario']}<br>";
while ($result = odbc_fetch_array($query)){
	flush();
	ob_flush();
	sleep(1);
	echo "Id: {$result['idUsuario']} Nome: {$result['nomeUsuario']}<br>";
}

//-------------------------------------------------
$query = odbc_exec($db, "SELECT * FROM Usuario WHERE nomeUsuario LIKE 'A%'");
$result = odbc_fetch_array($query);

echo "Id: {$result['idUsuario']} Nome: {$result['nomeUsuario']}<br>";
while ($result = odbc_fetch_array($query)){
	flush();
	ob_flush();
	sleep(1);
	echo "Id: {$result['idUsuario']} Nome: {$result['nomeUsuario']}<br>";
}
?>
