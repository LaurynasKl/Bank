<?php
session_start();


$code = $_SESSION['code'];
$name = $_SESSION['name'];
$lastName = $_SESSION['lastName'];
$account = $_POST['account'] ?? 0;


$accounts = file_get_contents(__DIR__. '/data/accounts.ser');
$accounts = unserialize($accounts);

$accounts[] = [
    'name' => $name,
    'lastName' => $lastName,
    'code' => $code,
    'eur' => 0,
    'account' => $account,

];

file_put_contents(__DIR__. '/data/accounts.ser', serialize($accounts));

header('Location: http://localhost/BIT-backend/bank/myAccounts.php');






?>