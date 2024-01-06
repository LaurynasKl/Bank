<?php
session_start();

$accountUrl = $_GET['account'] ?? 0;

$accounts = file_get_contents(__DIR__ . '/data/accounts.ser');
$accounts = unserialize($accounts);

foreach ($accounts as $index => $account) {
    if ($account['account'] == $accountUrl) {
        unset($accounts[$index]);
        break;
    }
}


file_put_contents(__DIR__ . '/data/accounts.ser', serialize($accounts));

header('Location: http://localhost/BIT-backend/bank/myAccounts.php');

?>
