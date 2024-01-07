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
    <?php require __DIR__ . '/parts/msg.php' ?>


    <div class="container">
        <div class="row mb-2">
            <form action="http://localhost/BIT-backend/bank/myAccounts.php" method="get">
                <label for="eur">Sort</label>
                <select name="sort">
                    <option value="default" <?= ($_GET['sort'] ?? '') == 'default' ? 'selected' : '' ?>>Default</option>
                    <option value="eur0-9" <?= ($_GET['sort'] ?? '') == 'eur0-9' ? 'selected' : '' ?>>By Eur 0-9</option>
                    <option value="eur9-0" <?= ($_GET['sort'] ?? '') == 'eur9-0' ? 'selected' : '' ?>>By Eur 9-0</option>
                </select>
                <button type="submit">Sort</button>
            </form>

        </div>
    </div>

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
        $accounts = file_get_contents(__DIR__ . '/data/accounts.ser');
        $accounts = unserialize($accounts); ?>


        <?php
        if (isset($_GET['sort'])) {
            match ($_GET['sort']) {
                'eur0-9' => usort($accounts, fn ($a, $b) => $a['eur'] <=> $b['eur']),
                'eur9-0' => usort($accounts, fn ($a, $b) => $b['eur'] <=> $a['eur']),
                default => $accounts,
            };
        }
        ?>

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