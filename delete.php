<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>My accounts</title>
    <style>
        .delete {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .btn {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 30px;
        }
        .cant {
            background-color: red;
            padding: 20px;
            border-radius: 10px;
            color: white;
        }
    </style>
</head>

<body>

    <?php require __DIR__ . '/parts/nav.php'; ?>
    <?php require __DIR__ . '/parts/msg.php'; ?>

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

    <?php if ($account['eur'] != 0) : ?>
        <div class="delete mt-5">
            <h2 class="cant">You can't delete this account!!!</h2>
            <a href="http://localhost/BIT-backend/bank/show.php?account=<?= $account['account'] ?>">Back</a>

        </div>
    <?php else : ?>
        <div class="delete">
            <h2>Are you sure?</h2>
            <div class="btn">
                <form action="http://localhost/BIT-backend/bank/destroy.php?account=<?= $_GET['account'] ?? 0 ?>" method="post">
                    <button type="submit" class="btn btn-outline-primary">Yes</button>
                </form>
                <a href="http://localhost/BIT-backend/bank/show.php?account=<?= $_GET['account'] ?? 0 ?>" class="btn btn-outline-danger">No</a>
            </div>
        </div>
        </div>

    <?php endif ?>

</body>

</html>