<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Transfers</title>
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


    <div class="container">
        <div class="row">
            <div class="row-2 mt-2"><b> Name </b><?= $account['name'] ?></div>
            <div class="row-2 mt-2"><b> Last Name </b><?= $account['lastName'] ?></div>
            <div class="row-2 mt-2"><b> EUR </b><?= $account['eur'] ?></div>
            <a href="http://localhost/BIT-backend/bank/add.php?account=<?= $_GET['account'] ?? 0 ?>">Add</a>
            <a href="http://localhost/BIT-backend/bank/remove.php?account=<?= $_GET['account'] ?? 0 ?>">Remove</a>
            <a href="http://localhost/BIT-backend/bank/show.php?account=<?= $account['account'] ?>">Back</a>
        </div>
    </div>
    </div>



</body>

</html>