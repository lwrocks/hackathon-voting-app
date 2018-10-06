<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    publishToMultiChain($_POST['vote_id'], $_POST['voter_id'], string2Hex($_POST['vote']));
}

if ($_GET['vote_id']) {
    if ($_GET['voter_id']) {
        readStreamItem($_GET['vote_id'], $_GET['voter_id']);
        return;
    }
    readStreamItems($_GET['vote_id']);
}

function string2Hex($string){
    $hex='';
    for ($i=0; $i < strlen($string); $i++){
        $hex .= dechex(ord($string[$i]));
    }
    return $hex;
}


function hex2String($hex){
    $string='';
    for ($i=0; $i < strlen($hex)-1; $i+=2){
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
    return $string;
}

function getApiKey () {
    return trim(file_get_contents('api_key'));
}

function publishToMultiChain($streamName, $key, $value) {
    echo postMultiChain("{\"method\": \"publish\", \"params\": [\"$streamName\", \"$key\", \"$value\"]}");
}

function readStreamItem($streamName, $key) {
    $response = postMultiChain("{\"method\": \"liststreamkeyitems\", \"params\": [\"$streamName\", \"$key\", false, 1, -1]}");
    $value = hex2String(json_decode($response, true)['result'][0]['data']);
    echo "{\"vote\": \"$value\"}";
}

function readStreamItems($streamName) {
    $response = postMultiChain("{\"method\": \"liststreamitems\", \"params\": [\"$streamName\"]}");
    $result = json_decode($response, true)['result'];
    $response = array_map(function ($item) {
        return hex2String($item['data']);
    }, $result);
    echo json_encode(['votes' => $response]);
}

function postMultiChain ($postFields) {
    $curl = curl_init();
    $apiKey = getApiKey();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://maas-proxy.cfapps.eu10.hana.ondemand.com/d0338c3d-2ef0-4127-b55d-2faca86a1ce5/rpc",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $postFields,
        CURLOPT_HTTPHEADER => array(
            "apikey: $apiKey",
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: 7a4d056d-4ee7-bd8e-2653-7846732cdf59"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        return $response;
    }
}