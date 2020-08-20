<?php

/*
$string_origin = "cadastrar\tESTA FUNCAO CADASTRA\tlucas.martins
registrar_usuario   ESTA FUNCAO REGISTRA\tlucas.martins
deletar-usuario   ESTA FUNCAO DELETA USUARIO lucas.martins";

$string_destinatary = "registrar_usuario\tESTA FUNCAO É ALEATORIA\tkarina.campos
acessar_banco_de_dados\tESTA FUNCAO É IMPORTANTE\tkarina.campos
proceder_triggers\tESTA FUNCAO É BOA\tkarina.campos";

*/

#function regex_permissions($string){
    
#    $pattern = '/\S\w*/';
#    $match = preg_match($pattern, $string, $output);
    
 
#    foreach($output as $key => $value){
#        return $value;
#    }
#}

/*
$array_lines_o = explode("\n", $string_origin);
$array_lines_d = explode("\n", $string_destinatary);

$origin_data = [];
$destinatary_data = [];


for ($i = 0; $i < count($array_lines_o); $i++){
    $origin_data[] = regex_permissions($array_lines_o[$i]);
}

for ($i = 0; $i < count($array_lines_d); $i++){
    $destinatary_data[] = regex_permissions($array_lines_d[$i]);
}

$origin_permissions = array_diff($origin_data, $destinatary_data);
$destinatary_permissions = array_diff($destinatary_data, $origin_data);

echo "_______________________________________________________\n";
echo "\nDestinatary doesn't contain related to origin: \n";
foreach($origin_permissions as $permission){
    echo $permission." | ";
}
echo "\n_______________________________________________________\n";

echo "\nOrigin doesn't contain related to destinatary: \n";
foreach($destinatary_permissions as $permission){
    echo $permission. " | ";
}
echo "\n_______________________________________________________\n\n";

?>

*/


$string = "test_func this is a test lucas.souza";

$string2 = "join_Func this is a test karina.campos
mec_func this is a mec func karina.campos";


# This regex catches the first word until the first char that unmatches the \w token
$regex = "/^[\s]*(\w*)/m";
preg_match_all($regex, $string, $matches);
preg_match_all($regex, $string2, $matches2);


# Calculating the difference between the two arrays
$origem = array_diff($matches[1], $matches2[1]);
$destinatario = array_diff($matches2[1], $matches[1]);


# Creating a file to save the results
$arquivo = fopen("./origem.txt", "w");
$arquivo2 = fopen("./destinatario.txt", "w");

$origem_string = "O *destinatário* não possui em relação a *origem*: \n\n";
$destinatario_string = "A *origem* não possui em relação ao *destinatario*: \n\n";


foreach($origem as $permission){
    $origem_string .= $permission."\n";
}

foreach($destinatario as $permission){
    $destinatario_string .= $permission."\n";
}

# Saving the results into the file

fwrite($arquivo, $destinatario_string);
fwrite($arquivo2, $origem_string);

# Closing the file

fclose($arquivo);
fclose($arquivo2);

?>