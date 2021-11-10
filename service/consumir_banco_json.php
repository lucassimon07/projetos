<?php 

$json = file_get_contents("http://localhost/webservice/selectbanco.php");	// Check in your php.ini so allow_url_fopen is set to on.
$obj = json_decode($json);

if (json_last_error() == 0) {
    echo '- Nao houve erro! O parsing foi perfeito';
}
else {
    echo 'OCORREU UM ERRO!</br>';
	switch (json_last_error()) {

        case JSON_ERROR_DEPTH:
            echo ' - profundidade maxima excedida';
        break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' - Erro de sintaxe genérico';
        break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' - Caracter de controle encontrado';
        break;
        case JSON_ERROR_SYNTAX:
            echo ' - Erro de sintaxe! String JSON mal-formatado!';
        break;
        case JSON_ERROR_UTF8:
            echo ' - Erro na codificação UTF-8';
        break;
        default:
            echo ' – Erro desconhecido';
        break;
    }
}
//exit();

if (count($obj)>0)
{
	echo "<br><br>Dados extraídos<br>";

	$i=0;
	echo "<br>Dados do Json: ".count($obj)."<br><table><tr><td>ID Animal</td><td>Número Animal</td><td>Data de nascimento</td><td>Sexo</td></tr>";
	while ($i<count($obj))
	{
		echo "<tr><td>".$obj[$i]->id_animal."</td>";
		echo "<td>".$obj[$i]->numero_animal."</td>";
		echo "<td>".$obj[$i]->datanasc_animal."</td>";
		echo "<td>".$obj[$i]->sexo_animal."</td></tr>";
		$i++;
	}
	echo "</table>";
}
else
{
	echo "Json Vazio ou com Problema";
}
?> 