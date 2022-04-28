<?php

$uf = $_GET['estado'];
$endpoint = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/UF/municipios';

$curl = curl_init();

curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => str_replace("UF", $uf, $endpoint)
    ]
);

$resposta = curl_exec($curl);

curl_close($curl);

$resultado = json_decode($resposta);

$retorno = "<div id='areaCidade_filho'>";
$retorno .= "<select class='form-select' id='slcEstado'>";
$retorno .= "<option>Selecione</option>";

foreach($resultado AS $rs) {
    $retorno .= "<option value='". $rs->nome ."'>". $rs->nome ."</option>";
}

$retorno .= "</select></div>";

echo $retorno;

?>
