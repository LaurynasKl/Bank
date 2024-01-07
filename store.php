<?php
session_start();

$accounts = file_get_contents(__DIR__. '/data/accounts.ser');
$accounts = unserialize($accounts);


$accounts[] = [
    'name' => $_SESSION['name'],
    'lastName' => $_SESSION['lastName'],
    'code' => $_SESSION['code'],
    'eur' => 0,
    'account' => $_POST['account'],

];

file_put_contents(__DIR__. '/data/accounts.ser', serialize($accounts));

$_SESSION['succes'] = "New account created";


header('Location: http://localhost/BIT-backend/bank/myAccounts.php');

?>