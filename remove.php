<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>remove</title>
</head>

<body>

    <?php require __DIR__ . '/parts/nav.php'; ?>

    <?php

    $accounts = file_get_contents(__DIR__ . '/data/accounts.ser');
    $accounts = unserialize($accounts);

    $accountUrl = $_GET['account'] ?? 0;

    $acc = null;

    foreach ($accounts as $account) {
        if ($account['account'] == $accountUrl) {
            $acc = $account;
            break;
        }
    }
    ?>

    <!-- <?php if ($acc['eur'] < 0) : ?>
        <div>Blogai</div>
        <a href="http://localhost/BIT-backend/bank/myAccounts.php">Back</a>

    <?php else : ?> -->

        <?php if (!$acc) : ?>
            <div>Saskaita nerasta</div>
            <a href="http://localhost/BIT-backend/bank/myAccounts.php">Back</a>


        <?php else : ?>
            <div>You have <?= $account['eur'] ?> EUR</div>

            <form action="http://localhost/BIT-backend/bank/updateRemove.php?account=<?= $_GET['account'] ?> " method="post">
                <label for="">How much remove </label>
                <input type="text" name="eur" value="0">
                <button type="submit">Remove</button>
            </form>

        <?php endif ?>
        
    <!-- <?php endif ?> -->


</body>

</html>