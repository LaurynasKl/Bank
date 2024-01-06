<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>



    <div class="container">
        <div class="row">
            <div class="col mt-3">
                <h2>Hello, <?= $_SESSION['name'] ?></h2>

                <a href="http://localhost/BIT-backend/bank/myAccounts.php">My Accounts</a>

                <form action="http://localhost/BIT-backend/bank/logout.php" method="post">
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>