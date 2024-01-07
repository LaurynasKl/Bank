<?php
session_start();

$accountUrl = $_GET['account'] ?? 0;


if (!$accountUrl) {
    header('Location: http://localhost/BIT-backend/bank/myAccounts.php');
    exit;
}

$accounts = file_get_contents(__DIR__ . '/data/accounts.ser');
$accounts = unserialize($accounts);



foreach ($accounts as $index => $account) {
    if ($account['eur'] >= (float)$_POST['eur']) {
            if ($account['eur'] >= (float)$_POST['eur']) {

                if ($account['account'] == $accountUrl) {
                    $account['eur'] = $account['eur'] - (float)$_POST['eur'];
                    $accounts[$index] = $account;
                    break;
                }

            } 
            else {
                header('Location: http://localhost/BIT-backend/bank/myAccounts.php');
            }

        $eur = $_POST['eur'];
        $_SESSION['succes'] = "You removed $eur eur";
    } 
    else {
        $eur = $_POST['eur'];
        $_SESSION['succes'] = "You can't remove $eur eur";
        
    }
}

file_put_contents(__DIR__ . '/data/accounts.ser', serialize($accounts));
header('Location: http://localhost/BIT-backend/bank/myAccounts.php');