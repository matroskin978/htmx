<?php
//sleep(2);
require __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone'])) {
        echo "<div class='alert alert-danger' role='alert'>Fill in required fields</div>";
    } else {
        if (add_user()) {
            echo "<div class='alert alert-success' role='alert'>Success</div>";
            $users = get_users();
            require __DIR__ . '/views/users-table.php';
            exit;
        } else {
            echo "<div class='alert alert-danger' role='alert'>Something wrong...</div>";
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'get-users') {
    $users = get_users();
    require __DIR__ . '/views/users-table.php';
    exit;
}

function get_users()
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM `workers`");
    $stmt->execute();
    return $stmt->fetchAll();
}

function add_user(): bool
{
    global $db;
    try {
        $stmt = $db->prepare("INSERT INTO workers (name, email, phone) VALUES (?, ?, ?)");
        $stmt->execute([$_POST['name'], $_POST['email'], $_POST['phone']]);
        return true;
    } catch (PDOException $e) {
        file_put_contents("errors.log", $e->getMessage() . PHP_EOL, FILE_APPEND);
        return false;
    }
}
