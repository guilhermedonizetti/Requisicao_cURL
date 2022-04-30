<h1 align="center">Requisição cURL</h1>
<p align="center">Um exemplo de consumo de API usando o cURL. 🖥️</p>

O cURL é uma ferramenta que pode ser usada para fazer requisições e buscar conteúdo de outro servidor. Neste repositório, o comando foi usado para consultar uma API para obter o nome de todas as cidades de um estado qualquer. Assim, se esse exemplo fosse aplicado em um formulário de cadastro, o usuário não precisaria digitar o nome de sua cidade, e o desenvolvedor não precisaria ter o nome de todas elas para criar um select dinamicamente.

<!--
<p align="center">
<img href="https://github.com/guilhermedonizetti/Requisicao_cURL/blob/master/images/imagem1.png" alt="" width="350" height="300">
</p>
-->

<b>Requisição:</b> quando o usuário seleciona um estado, o JQuery identifica um "change" no select de estados e com isso executa:<br><br>
👉 Pega o value do select de estado<br>
👉 Executa uma requisição por Ajax passando o value por parâtro<br><br>
Da seguinte forma:

```js
$("#slcEstado").on('change', function(){
  var estado = $(this).val();
  var url_requisicao = 'request.php?estado='+estado; // request.php é o arquivo PHP que realiza a requisição na API, esse arquivo está no mesmo diretório

  if (estado == "") {
    $("#areaCidade_filho").remove()
  }

  $.ajax({
    url: url_requisicao,
    type: 'GET'
  }).done(function(data){
    $("#areaCidade_filho").remove()
    document.getElementById('areaCidade_pai').innerHTML = data
   })
});
```

Sobre "areaCidade_filho", é uma div que crio dentro de uma div pai. Isso me permite atualizar uma div, destruindo e recriando, sem perder a referência do local da página que quero recriar, que é dentro da div pai.

<br>

O Ajax aponta para o arquivo request.php, o principal desse arquivo é o comando de requisição na API:

```php
// Pegar o estado selecionado que vem por parametro
$uf = $_GET['estado'];

// Criar uma variavel com o endpoint da requisicao, de acordo com a API consumida
$endpoint = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/UF/municipios';

// Inicializar o comando cURL
$curl = curl_init();

curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => str_replace("UF", $uf, $endpoint) // substituir "UF" pela sigla do estado selecionado
    ]
);

// Pegar o retorno da requisição
$resposta = curl_exec($curl);
```

Assim, esse exemplo se torna uma demonstração do uso do comando cURL para buscar dados remotos e utilizar em uma aplicação.

<br>

<p align="center">
  <b>cURL, PHP, Ajax</b><br>Guilherme Donizetti - 2022.  
</p>



