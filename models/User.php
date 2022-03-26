<?php

class User
{
    public static function getUser($username)
    {
        $conn = DB::getConnection();

        $userList = array();

        $result = $conn->query("SELECT * FROM users 
                                WHERE username='$username' 
                                LIMIT 1");
        
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $userList['id'] = $row['id'];
            $userList['email'] = $row['email'];
            $userList['username'] = $row['username'];
            $userList['firstname'] = $row['firstname'];
            $userList['lastname'] = $row['lastname'];
            $userList['patronymic'] = $row['patronymic'];
        }

        return $userList;
    }


    public static function loginUser($username, $password)
    {
        $conn = DB::getConnection();

        $userList = array();
        $result = $conn->query("SELECT * FROM users 
                                WHERE username='$username'
                                LIMIT 1");
        
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $userList['id'] = $row['id'];
            $userList['email'] = $row['email'];
            $userList['username'] = $row['username'];
            $userList['password_hash'] = $row['pass'];
            $userList['firstname'] = $row['firstname'];
            $userList['lastname'] = $row['lastname'];
            $userList['patronymic'] = $row['patronymic'];
        }

        if (!empty($userList)) {
            if (password_verify($password, $userList['password_hash'])) {
                $_SESSION['user'] = $userList;
                header('Location: /user/'.$username);
            }else {
                $error = 'Неправильный логин или пароль!';
                return $error;
            }
        }else {
            $error = 'Пользователь с таким логином не существует!';
            return $error;
        }
    }

    public static function regUser($email, $username, $password_hash, $lastname, $firstname, $patronymic)
    {
        $conn = DB::getConnection();

        $lastname = htmlentities($lastname);
        $firstname = htmlentities($firstname);
        $patronymic = htmlentities($patronymic);

        $userList = array();
        $result = $conn->query("SELECT * FROM users 
                                WHERE email='$email'
                                OR username='$username'
                                LIMIT 1");
        
        $result->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $result->fetch()) {
            $userList['id'] = $row['id'];
            $userList['email'] = $row['email'];
            $userList['username'] = $row['username'];
            $userList['firstname'] = $row['firstname'];
            $userList['lastname'] = $row['lastname'];
            $userList['patronymic'] = $row['patronymic'];
        }

        if (empty($userList)) {
            $sql = "INSERT INTO users (email, username, pass, firstname, lastname, patronymic) VALUES ('$email', '$username', '$password_hash', '$firstname', '$lastname', '$patronymic')";
                $conn->exec($sql);
                $user = [
                'email' => $email,
                'username' => $username,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'patronymic' => $patronymic];

                $_SESSION['user'] = $user;
                header('Location: /user/'.$username);
        }else {
            $error = 'Пользователь с таким логином или email уже занят!';
            return $error;
        }
    }


    public static function changeFioUser($username, $lastname, $firstname, $patronymic)
    {
        $conn = DB::getConnection();

        $lastname = htmlentities($lastname);
        $firstname = htmlentities($firstname);
        $patronymic = htmlentities($patronymic);

        $result = $conn->prepare("UPDATE users 
                                SET lastname='$lastname',
                                firstname='$firstname',
                                patronymic='$patronymic'
                                WHERE username='$username'");
        $result->execute();

        $_SESSION['user']['lastname'] = $lastname;
        $_SESSION['user']['firstname'] = $firstname;
        $_SESSION['user']['patronymic'] = $patronymic;
    }

    public static function changePasswordUser($username, $password_hash)
    {
        $conn = DB::getConnection();

        $result = $conn->prepare("UPDATE users 
                                SET pass='$password_hash'
                                WHERE username='$username'");
        $result->execute();
    }
}

?>