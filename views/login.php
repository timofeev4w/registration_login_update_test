<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
</head>
<body>
    <h1>Вход</h1>
    <form action="/" method="post">
        <p>Логин</p>
        <input type="text" name="username" id="username" value="<?php echo(@$username); ?>">
        <p><small style="color: red;"><?php echo(@$errors['username']['error']); ?></small></p>
        <p><small style="color: red;"><?php echo(@$loginResult); ?></small></p>

        <p>Пароль</p>
        <input type="password" name="password" id="password" value="<?php echo(@$password); ?>">
        <p><small style="color: red;"><?php echo(@$errors['password']['error']); ?></small></p>
        <br><br>
        <input type="submit" name="submit" value="Войти">
    </form>
    <br>
    <a href="/reg">Ещё не зарегистрированы?</a>
</body>
</html>