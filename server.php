<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<pre>POST: ' . print_r($_POST, 1) . '</pre>';
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo '<pre>GET: ' . print_r($_GET, 1) . '</pre>';
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $data = file_get_contents('php://input');
    parse_str($data, $output);
    echo '<pre>PUT: ' . print_r($output, 1) . '</pre>';
}

