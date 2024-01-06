<?php 
session_start();

$accountUrl = $_GET['account'] ?? 0;


if (!$accountUrl) {
    header('Location: http://localhost/BIT-backend/bank/myAccounts.php');
    exit;
}

$accounts = file_get_contents(__DIR__. '/data/accounts.ser');
$accounts = unserialize($accounts);




foreach ($accounts as $index => $account) {
    if ($account['account'] == $accountUrl) {
        $account['eur'] = $account['eur'] + (int)$_POST['eur'];
        $accounts[$index] = $account;
        break;
    }
}
$eur = $_POST['eur'];


file_put_contents(__DIR__. '/data/accounts.ser', serialize($accounts));

$_SESSION['succes'] = "You added $eur eur";

header('Location: http://localhost/BIT-backend/bank/myAccounts.php');