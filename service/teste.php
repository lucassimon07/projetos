<?php 

    $contents = file_get_contents('selectbanco.php');

    $json = json_decode($contents);

    $method = $_SERVER['REQUEST_METHOD'];

    header('Content-type: application/json');
    $body = file_get_contents('php://input');

    if ($method === 'GET') {
        if ($json[$contents[0]]){
            echo json_encode($json[$contents[0]]);
        } else {
            echo '[]';
        }
    }

?>