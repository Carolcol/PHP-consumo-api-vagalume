<?php
    ini_set('display_errors', 1);
    ini_set('error_reporting', E_ALL);
    ini_set('xdebug.overload_var_dump', 1);

    function getLyricsObject($lyricsData) {
        $lyricsObject = (Object)[
            'letra' => $lyricsData->mus[0]->text,
            'traducao' => $lyricsData->mus[0]->translate[0]->text
        ];
        return $lyricsObject;
    }

    function getRelatedArtistObject($relatedArtistData) {
        $relatedArtistObject = (Object)[
            'artistaRelacionado1' => $relatedArtistData->art->related[0]->name,
            'artistaRelacionado2' => $relatedArtistData->art->related[1]->name,
            'artistaRelacionado3' => $relatedArtistData->art->related[2]->name,
            'artistaRelacionadoFoto1' => $relatedArtistData->art->related[0]->pic_medium,
            'artistaRelacionadoFoto2' => $relatedArtistData->art->related[1]->pic_medium,
            'artistaRelacionadoFoto3' => $relatedArtistData->art->related[2]->pic_medium
        ];
        return $relatedArtistObject;
    }

    function getRelatedAlbumObject($relatedAlbumData) {
        $relatedAlbumObject = (Object)[
            'albumRelacionado' => $relatedAlbumData->mus[0]->alb->name,
            'albumRelacionadoFoto' => $relatedAlbumData->mus[0]->alb->img
        ];
        return $relatedAlbumObject;
    }


    function getDataObj(){
        if (isset($_POST['pesquisar'])) {
            $musicName = $_POST['nome_musica'];
            $artistName = $_POST['nome_artista'];
        
            if ($musicName && $artistName) {
                $baseUrl = "https://api.vagalume.com.br/search.php";
                $lyricsUrl = $baseUrl . "?art=" . $artistName . "&mus=" . $musicName . "&apiKey={apiKey}";
                $relatedLAlbumUrl = $baseUrl . "?apikey=660a4395f992ff67786584e238f501aa&art=". $artistName."&mus=". $musicName ."&extra=alb&nolyrics=1";
                $relatedArtistUrl = $baseUrl . "?art=".$artistName."&extra=relart&extra=relart&apikey={key}";
                
                $lyricsRet = file_get_contents($lyricsUrl);
                $lyricsData = json_decode($lyricsRet);

                $relatedAlbumRet = file_get_contents($relatedLAlbumUrl);
                $relatedAlbumData = json_decode($relatedAlbumRet);

                $relatedArtistUrlRet = file_get_contents($relatedArtistUrl);
                $relatedArtistData = json_decode($relatedArtistUrlRet);

                $lyricsObject = getLyricsObject($lyricsData);
                $relatedAlbumObject = getRelatedAlbumObject($relatedAlbumData);
                $relatedArtistObject = getRelatedArtistObject($relatedArtistData) ;

                $dataObject = (Object)[
                    'letra' => $lyricsObject->letra,
                    'traducao' => $lyricsObject->traducao,
                    'albumRelacionado' =>$relatedAlbumObject->albumRelacionado,
                    'albumRelacionadoFoto' => $relatedAlbumObject->albumRelacionadoFoto,
                    'artistaRelacionado1' =>  $relatedArtistObject->artistaRelacionado1,
                    'artistaRelacionado2' => $relatedArtistObject->artistaRelacionado2,
                    'artistaRelacionado3' => $relatedArtistObject->artistaRelacionado3,
                    'artistaRelacionadoFoto1' => $relatedArtistObject->artistaRelacionadoFoto1,
                    'artistaRelacionadoFoto2' => $relatedArtistObject->artistaRelacionadoFoto2,
                    'artistaRelacionadoFoto3' => $relatedArtistObject->artistaRelacionadoFoto3,
                ];
            }   
        }
        return  $dataObject;
    }
?>