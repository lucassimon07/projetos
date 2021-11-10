<?php 
$cone = mysqli_connect("localhost", "root", "","webservice"); 
mysqli_set_charset($cone, "utf8");

$linhas = array();
$rs = $cone->query("Select * from animais");
while($row = $rs->fetch_array()) 
{ 
  $id_animal	= $row['id_animal']; 
  $numero_animal	= $row['numero_animal']; 
  $datanasc_animal	= $row['datanasc_animal']; 
  $sexo_animal	= $row['sexo_animal']; 
  $linhas[] = array('id_animal'=> $id_animal, 'numero_animal'=> $numero_animal, 'datanasc_animal'=> $datanasc_animal, 'sexo_animal'=> $sexo_animal);
} 

$json_string = json_encode($linhas);
echo $json_string;
?> 