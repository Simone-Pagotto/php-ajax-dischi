<?php
    //importo il database: struttura dati php 
    require_once __DIR__  . '/db/db.php';
    //setto la variabile filter impostando il controllo della sua esistenza 
    $filter = isset($_GET['filter']) ? $_GET['filter'] : '';

    $mod_db = $database; //copia del database in modo da nona ndare a modificarlo con operazioni future
    
    $mod_db['response'] = [];//lo svuoto

    foreach($database['response'] as $response){
        $response['poster'] = str_replace('\\', '', $response['poster']);
        $mod_db['response'][] = $response;
    }//costruisco mod_db con la sintassi giusta: per la futura formattazione json

    /* var_dump($mod_db); */


    if(strlen($filter) !== 0){
        $tmp = [];
        foreach($mod_db['response'] as $value){
            if(is_numeric(stripos($value['author'], $filter))){
                $tmp[] = $value;
            }
        }
        $mod_db['response'] = $tmp;
    }

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    echo json_encode($mod_db);

?>