<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Смена ФИО</title>
</head>
<body>
    <form class="fio-change-form d-none" action="/changefio" method="post">
        <h4>Введите новую фамилию</h4>
        <input type="text" name="lastname" id="lastname" value="<?php echo(@$lastname); ?>">
        <p><small style="color: red;"><?php echo(@$errors['lastname']['error']); ?></small></p>
        <h4>Введите новое имя</h4>
        <input type="text" name="firstname" id="firstname" value="<?php echo(@$firstname); ?>">
        <p><small style="color: red;"><?php echo(@$errors['firstname']['error']); ?></small></p>
        <h4>Введите новое отчество</h4>
        <input type="text" name="patronymic" id="patronymic" value="<?php echo(@$patronymic); ?>">
        <p><small style="color: red;"><?php echo(@$errors['patronymic']['error']); ?></small></p>
        <br>
        <br>
        <input type="submit" name="submit" value="Сменить ФИО">
    </form>
</body>
</html>