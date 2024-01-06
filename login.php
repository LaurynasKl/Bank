<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users = file_get_contents(__DIR__ . '/data/users.ser');
    $users = unserialize($users);

    foreach ($users as $user) {
        if ($user['code'] == $_POST['code']) {
            if ($user['password'] == sha1($_POST['password'])) {
                $_SESSION['login'] = 1;
                $_SESSION['name'] = $user['name'];
                $_SESSION['lastName'] = $user['lastName'];
                $_SESSION['code'] = $user['code'];
                header('Location: http://localhost/BIT-backend/bank/member.php');
                exit;
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-5">
                <h1>Welcome to bank</h1>
                <form action="" method="post">
                    <input type="text" name="code" placeholder="Personal Code">
                    <input type="text" name="password" placeholder="Password">
                    <button type="submit">Login</button>
                </form>
                <p class="mt-2"><b>If you don't have account, you can register <a href="http://localhost/BIT-backend/bank/register.php">here</a></b></p>

                <a href="http://localhost/BIT-backend/bank/introPage.php">Back</a>
            </div>
        </div>
    </div>

</body>

</html>