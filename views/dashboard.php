<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
</head>
<body>
    <h4>Фамилия</h4>
    <p><?php echo($user['lastname']); ?></p>
    <h4>Имя</h4>
    <p><?php echo($user['firstname']); ?></p>
    <h4>Отчество</h4>
    <p><?php echo($user['patronymic']); ?></p>

    <?php if(isset($_SESSION['user']) && $_SESSION['user']['username'] == $username): ?>
        <a href="/changefio"><button>Сменить ФИО</button></a>
        <a href="/changepass"><button>Сменить пароль</button></a>
        <br><br>
        <a href="/logout"><button>Выход</button></a>
    <?php endif; ?>

</body>
</html>