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
	if(odbc_exec($db, "INSERT * INTO Produto 
						nomeProduto = 'Livro',
						descProduto = 'Para ler',
						precProduto = '2.00',
						descontPromocao = '1.00'")) {
		echo "Usu&aacute;rio atualizado com sucesso<br>";					
	}else{
		echo "Erro ao cadastrar o usu&aacute;rio";
	}
//-----------------------------------------------------------------
//Deletar produto
echo "Agora vem o DELETE<br>";
if(odbc_exec($db, " DELETE FROM Produto
						WHERE
						nomeProduto = 'Livro'")) {
		echo "Produto deletado com sucesso<br>";					
	}else{
		echo "Erro ao deletar o produto";
	}
	
//------------------------------------------------------------------
$query = odbc_exec($db, "SELECT * FROM Produto");
$result = odbc_fetch_array($query);

echo "Id: {$result['idProduto']} Nome: {$result['nomeProduto']}<br>";
while ($result = odbc_fetch_array($query)){
	flush();
	ob_flush();
	sleep(1);
	echo "Id: {$result['idProduto']} Nome: {$result['nomeProduto']}<br>";
}
//------------------------------------------------------------------
$query = odbc_exec($db, "SELECT * FROM Produto WHERE nomeProduto LIKE 'C%'");
$result = odbc_fetch_array($query);

echo "Id: {$result['idProduto']} Nome: {$result['nomeProduto']}<br>";
while ($result = odbc_fetch_array($query)){
	flush();
	ob_flush();
	sleep(1);
	echo "Id: {$result['idProduto']} Nome: {$result['nomeProduto']}<br>";
}

?>