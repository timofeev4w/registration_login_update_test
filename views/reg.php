<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <h1>Регистрация</h1>
    <form action="/reg" method="post">
        <p>Email</p>
        <input type="email" name="email" id="email" value="<?php echo(@$email); ?>">
        <p><small style="color: red;"><?php echo(@$errors['email']['error']); ?></small></p>
        <p><small style="color: red;"><?php echo(@$regResult); ?></small></p>

        <p>Логин</p>
        <input type="text" name="username" id="username" value="<?php echo(@$username); ?>">
        <p><small style="color: red;"><?php echo(@$errors['username']['error']); ?></small></p>
        <p><small style="color: red;"><?php echo(@$regResult); ?></small></p>

        <p>Пароль</p>
        <input type="password" name="password" id="password" value="<?php echo(@$password); ?>">
        <p><small style="color: red;"><?php echo(@$errors['password']['error']); ?></small></p>

        <p>Фамилия</p>
        <input type="text" name="lastname" id="lastname" value="<?php echo(@$lastname); ?>">
        <p><small style="color: red;"><?php echo(@$errors['lastname']['error']); ?></small></p>

        <p>Имя</p>
        <input type="text" name="firstname" id="firstname" value="<?php echo(@$firstname); ?>">
        <p><small style="color: red;"><?php echo(@$errors['firstname']['error']); ?></small></p>

        <p>Отчество</p>
        <input type="text" name="patronymic" id="patronymic" value="<?php echo(@$patronymic); ?>">
        <p><small style="color: red;"><?php echo(@$errors['firstname']['error']); ?></small></p>
        <br><br>
        <input type="submit" name="submit" value="Зарегистрироваться">
    </form>
    <br>
    <a href="/">Уже зарегистрированы?</a>
</body>
</html>