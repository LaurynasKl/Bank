<?php
session_start();
?>
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
    $accounts = file_get_contents(__DIR__ . '/data/accounts.ser');
    $accounts = unserialize($accounts); ?>




    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <div class="container">
                <div class="row">
                    <div class="col-5"><b> Accounts </b></div>
                    <div class="col-2"><b> EUR </b></div>
                    <div class="col-2"><b> Action </b></div>
                </div>
            </div>
        </li>


        <?php
        foreach ($accounts as $account) : ?>
            <li class="list-group-item">
                <div class="container">
                    <div class="row">
                        <div class="col-5"> <?= $account['account'] ?></div>
                        <div class="col-2"> <?= $account['eur'] ?></div>
                    <div class="col-2">
                        <a href="http://localhost/BIT-backend/bank/show.php?account=<?= $account['account'] ?>">Show</a>
                    </div>
                </div>
            </li>

        <?php endforeach ?>

</body>

</html>