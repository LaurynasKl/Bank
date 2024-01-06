<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users = file_get_contents(__DIR__ . '/data/users.ser');
    $users = unserialize($users);

    foreach ($users as $user) {
        if ($user['code'] == $_POST['code']) {
            $_SESSION['error'] = 'This personal code is already registered';
            header('Location: http://localhost/BIT-backend/bank/register.php');
            exit;
        }
        if (strlen($_POST['name']) < 3 ) {
            $_SESSION['errorName'] = 'Vardas per trumpas';
            header('Location: http://localhost/BIT-backend/bank/register.php');
            exit;
        }
    }
    $user = [
        'name' => $_POST['name'],
        'lastName' => $_POST['lastName'],
        'code' => $_POST['code'],
        'password' => sha1($_POST['password']),
    ];

    $users[] = $user;
    file_put_contents(__DIR__ . '/data/users.ser', serialize($users));
    header('Location: http://localhost/BIT-backend/bank/login.php');
    exit;
}
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
if (isset($_SESSION['errorName'])) {
    $errorName = $_SESSION['errorName'];
    unset($_SESSION['errorName']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Create Account</title>
</head>

<body>



    <div class="container">
        <div class="row">
            <div class="col">

                <?php if (isset($error)) : ?>
                    <h1 style="color: crimson"><?= $error ?></h1>
                <?php endif ?>
                
                <?php if (isset($errorName)) : ?>
                    <h1 style="color: crimson"><?= $errorName ?></h1>
                <?php endif ?>

                <h1>Welcome to bank</h1>
                <form action="" method="POST">
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="lastName" placeholder="Last name">
                    <input type="text" name="code" placeholder="Personal code">
                    <input type="text" name="password" placeholder="Password">
                    <button type="submit">Registration</button>
                    <p class="mt-2"><b>If you have account, log in <a href="http://localhost/BIT-backend/bank/login.php">here</a></b></p>
                </form>
                <a href="http://localhost/BIT-backend/bank/introPage.php">Back</a>
            </div>
        </div>
    </div>

</body>

</html>