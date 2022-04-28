<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </head>

    <body style="background-color: #C0C0C0;">
  
    <div class="container" style="margin-top: 100px;">
        <div class="card text-center">
            <div class="card-header">
                Consultar Cidades
            </div>
            <div class="card-body">
                <h5 class="card-title">Selecione um estado:</h5>
                <select class="form-select" id="slcEstado">
                    <option>Selecione</option>
                    <option value="SP">São Paulo</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="MG">Minas Gerais</option>
                </select>
                
                <br>
                <div id="areaCidade_pai">
                    <!-- aqui entra o select de cidades do estado selecionado -->
                </div>
            </div>
            <div class="card-footer text-muted">
                Visite o GitHub: <a href="https://github.com/guilhermedonizetti/" target="_blank">Requisicoes_PHP</a> 
            </div>
        </div>
    </div>

    </body>

    <!-- scripts -->
    <script>

        $("#slcEstado").on('change', function(){
            var estado = $(this).val();
            var url_requisicao = 'request.php?estado='+estado;

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

    </script>
    <!-- fim scripts -->
</html>