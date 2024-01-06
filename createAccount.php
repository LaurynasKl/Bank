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


    <div class="container">
        <div class="row mb-2">
            <p><b>Name:</b> <?= $_SESSION['name'] ?></p>
            <p><b>Last name:</b> <?= $_SESSION['lastName'] ?></p>
            <p><b>Personal code:</b> <?= $_SESSION['code'] ?></p>
        </div>
        <form action="http://localhost/BIT-backend/bank/store.php" method="post">
            <label for="account"><b>Account</b></label>
            <input type="text" name="account" value="<?= 'LT' . rand(1111111111111111, 9999999999999999) ?>">
            <div class="mt-2">
                <button type="submit" class="btn btn-outline-primary">Create</button>
            </div>
        </form>
    </div>



</body>

</html>