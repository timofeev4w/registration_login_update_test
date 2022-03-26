<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Смена пароля</title>
</head>
<body>
    <form class="password-change-form d-none" action="/changepass" method="post">
        <h4>Введите новый пароль</h4>
        <input type="password" name="password" id="password" value="<?php echo(@$password); ?>">
        <p><small style="color: red;"><?php echo(@$errors['password']['error']); ?></small></p>
        <input type="submit" name="submit" value="Сменить пароль">
    </form>
</body>
</html>