<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>My accounts</title>
</head>

<body>

    <?php require __DIR__ . '/parts/nav.php'; ?>

    <?php

    $accountUrl = $_GET['account'] ?? 0;

    $accounts = file_get_contents(__DIR__ . '/data/accounts.ser');
    $accounts = unserialize($accounts);

    $acc = null;

    foreach ($accounts as $account) {
        if ($account['account'] == $accountUrl) {
            $acc = $account;
            break;
        }
    }
    ?>

    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-5"><b> Account </b></div>
                    <div class="col-2"><b> EUR </b></div>
                    <div class="col-2"><b> Action </b></div>
                </div>
            </div>
        </li>

        <?php
        if (!$accountUrl) : ?>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-danger" role="alert">
                            Account not found!
                        </div>
                    </div>
                </div>
            </div>

        <?php else : ?>

            <div class="container">
                <div class="row">
                    <div class="col-5"> <?= $account['account'] ?> </div>
                    <div class="col-2"> <?= $account['eur'] ?> </div>
                    <div class="col-2">
                        <a href="http://localhost/BIT-backend/bank/transfers.php?account=<?= $account['account'] ?>">Transfers</a>
                        <a href="http://localhost/BIT-backend/bank/delete.php?account=<?= $account['account'] ?>">Delete</a>
                        <a href="http://localhost/BIT-backend/bank/myAccounts.php">Back</a>
                    </div>
                </div>
            </div>
        <?php endif ?>
</body>

</html>