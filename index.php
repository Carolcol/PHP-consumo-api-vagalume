<?php
include_once ('atividade1.php');
$data = getDataObj();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>LÓGICA DE PROGRAMAÇÃO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
    <style>
    .estilo {
        border-width: 3px;
        border-style: solid;
        border-color:#7FFF00;
      }
    .botao {
        background-color:#7FFF00;
      }
    .paragrafo{
        font-style: normal; 
        font-size: 1.5em;
        font-family: "Bembo";
      }

    </style>
</head>

<body>
    <div class="container"> <br>
        <div class="row">
            <div class="col-md-12 bg-dark text-white"><br>
                <h1 class=" text-center">ENCONTRE A LETRA DA SUA CANÇÃO PREFERIDA</h1><BR><BR>
                <form action="." method="POST">
                     <div class="row">
                            <div class="col">
                                <label>DIGITE O NOME DA CANÇÃO *</label>
                                <input type="text" class=" estilo form-control " name ="nome_musica" >
                            </div>

                            <div class="col ">
                                <label> DIGITE O NOME DO ARTISTA *</label>
                                <input type="text" class=" estilo form-control " name ="nome_artista" >
                            </div>

                        </div> <br><br>

                        <div>
                             <input type="submit" class="botao" value="Pesquisar" name="pesquisar">
                        </div><br>
                </form>
            </div>
            <div class="col-sm"><br><br>
                <h4 class="text-lg-left">Lyrics</h4>
                <p  class="paragrafo"> <?= $data->letra?></p>
            </div>   
            <div class="col-sm"><br><br>
                <h4 class="text-lg-left">LETRA(Tradução)</h4>
                <p class="paragrafo"><?= $data->traducao?></p>
            </div>
            
        </div>  
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h1 class=" text-center p-4 bg-dark text-white">INFORMAÇÕES EXTRAS</h1><BR><BR>
            </div>
        </div>
        <article>
                    <h2 class="text-lg-left p-3">Álbum Relacionado</h2>
                    <div class="col-sm-12">
                    <p class="paragrafo"> <?= $data->albumRelacionado?></p>  
                    <img src="<?= $data->albumRelacionadoFoto?>">
                    </div><br>

            
            <h2 class="text-lg-left p-3">Artistas Relacionados</h2>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 align-self-center mb-4">
                        <figure class="gallery_border">
                            <p class="paragrafo"> <?= $data->artistaRelacionado1?></p> 
                            <img src="<?= $data->artistaRelacionadoFoto1?>">
                        </figure>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 align-self-center mb-4">
                        <figure class="gallery_border">
                            <p class="paragrafo"> <?= $data->artistaRelacionado2?></p>
                            <img  src="<?= $data->artistaRelacionadoFoto2?>">
                        </figure>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 align-self-center mb-4">
                        <figure class="gallery_border">
                            <p class="paragrafo"> <?= $data->artistaRelacionado3?></p>
                            <img src="<?= $data->artistaRelacionadoFoto3?>">
                        </figure>
                    </div>
                </div>       
        </article>  <br><br>
    </div>
</body>

</html>
