<?php
    //
    // A very simple PHP example that sends a HTTP POST to a remote site
    //
    error_reporting(E_ALL);
    ini_set('display_errors', '2');
    $url = 'https://hotspotparking.com/busTracking/getLastRecordForRoute';
    $data = array('route_id' => $_GET['route_id']);

    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }
    echo json_encode($result);
    //var_dump($result);
    //print_r($data->data->BusLocation->latitude);

    ?>