<?php
sleep(5);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<div class='alert alert-success' role='alert'>
        Name: {$_POST['name']}<br>
        Email: {$_POST['email']}<br>
        Phone: {$_POST['phone']}<br>
    </div>";
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo '<pre>GET: ' . print_r($_GET, 1) . '</pre>';
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $data = file_get_contents('php://input');
    parse_str($data, $output);
    echo '<pre>PUT: ' . print_r($output, 1) . '</pre>';
}

