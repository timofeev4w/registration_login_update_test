<?php

session_start();

class UserController
{
    public function actionLoginUser()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /user/'.$_SESSION['user']['username']);
        }

        if (isset($_POST['submit'])) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $errors = [];

            $errors['username'] = Validator::checkInput($username, [
                'min' => 3,
                'max' => 55
            ]);

            $errors['password'] = Validator::checkInput($password, [
                'min' => 6,
                'max' => 55
            ]);
            $errorsCount = 0;
            foreach ($errors as $key => $value) {
                if (!empty($errors["$key"])) {
                    $errorsCount++;
                }
            }
            if ($errorsCount < 1) {
                $loginResult = User::loginUser($username, $password);
            }
        }

        require_once(ROOT.'/views/login.php');
        return true;
    }


    public function actionRegUser()
    {   
        if (isset($_SESSION['user'])) {
            header('Location: /user/'.$_SESSION['user']['username']);
        }

        if (isset($_POST['submit'])) {
            $email = trim($_POST['email']);
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $lastname = trim($_POST['lastname']);
            $firstname = trim($_POST['firstname']);
            $patronymic = trim($_POST['patronymic']);

            $errors = [];
            
            $errors['email'] = Validator::checkInput($email, [
                        'email' => $email,
                        'max' => 55
                    ]);

            $errors['username'] = Validator::checkInput($username, [
                        'min' => 3,
                        'max' => 55
                    ]);

            $errors['password'] = Validator::checkInput($password, [
                        'min' => 6,
                        'max' => 55
                    ]);

            $errors['lastname'] = Validator::checkInput($lastname, [
                        'min' => 3,
                        'max' => 55
                    ]);

            $errors['firstname'] = Validator::checkInput($firstname, [
                        'min' => 3,
                        'max' => 55
                    ]);

            $errors['patronymic'] = Validator::checkInput($patronymic, [
                        'min' => 3,
                        'max' => 55
                    ]);

            $errorsCount = 0;
            foreach ($errors as $key => $value) {
                if (!empty($errors["$key"])) {
                    $errorsCount++;
                }
            }
            if ($errorsCount < 1) {
                $regResult = User::regUser($email, $username, $password_hash, $lastname, $firstname, $patronymic);
            }
        }
        require_once(ROOT.'/views/reg.php');
        return true;
    }


    public function actionShowUser($username)
    {
        $user = array();
        $user = User::getUser($username);
        require_once(ROOT.'/views/dashboard.php');
        return true;
    }


    public function actionChangeFio()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /');
        }

        if (isset($_POST['submit'])) {
            $username = $_SESSION['user']['username'];
            $lastname = trim($_POST['lastname']);
            $firstname = trim($_POST['firstname']);
            $patronymic = trim($_POST['patronymic']);

            $errors = [];

            $errors['lastname'] = Validator::checkInput($lastname, [
                'min' => 3,
                'max' => 55
            ]);

            $errors['firstname'] = Validator::checkInput($firstname, [
                'min' => 3,
                'max' => 55
            ]);

            $errors['patronymic'] = Validator::checkInput($patronymic, [
                'min' => 3,
                'max' => 55
            ]);

            $errorsCount = 0;
            foreach ($errors as $key => $value) {
                if (!empty($errors["$key"])) {
                    $errorsCount++;
                }
            }

            if ($errorsCount < 1) {
                $regResult = User::changeFioUser($username, $lastname, $firstname, $patronymic);
                header('Location: /user/'.$username);
            }else {
                // $_SESSION['user']['errorfio'] = $errors;
            }
            
        }
        require_once(ROOT.'/views/changefio.php');
        return true;
    }

    
    public function actionChangePassword()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /');
        }

        if (isset($_POST['submit'])) {
            $username = $_SESSION['user']['username'];
            $password = trim($_POST['password']);
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $errors = [];
            
            $errors['password'] = Validator::checkInput($password, [
                        'min' => 6,
                        'max' => 55
                    ]);

            $errorsCount = 0;
            foreach ($errors as $key => $value) {
                if (!empty($errors["$key"])) {
                    $errorsCount++;
                }
            }

            if ($errorsCount < 1) {
                $regResult = User::changePasswordUser($username, $password_hash);
                header('Location: /user/'.$username);
            }
        }

        require_once(ROOT.'/views/changepass.php');
        return true;
    }


    public function actionLogOut()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            header('Location: /');
        }
    }
}

?>