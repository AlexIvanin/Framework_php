<?php


class RegistrationController extends Controller
{
    public function registrationPage()
    {
      // 650px  return $this->render('Registration/registration');
    echo "Пошел на хуй";
	}

    public function registerConfirmPage()
    {
        return $this->render('Registration/register.confirm');
    }

    public function checkRegisterFirstStep()
    {
        /**
         * @var $sessionService \SessionService
         */
        $sessionService = $this->getService('Session');
        $userAr = array(
            'name' => null,
            'surname' => null,
            'email' => null,
            'pass' => null,
            'country' => null,
            'region' => null,
            'city' => null,
            'login' => null,
            'confirm_key' => null
        );

        $registerURL = $this->generate('register');

        $userAr['name'] = trim($_POST['name']);
        $userAr['surname'] = trim($_POST['surname']);
        $userAr['country'] = trim($_POST['country']);
        $userAr['region'] = trim($_POST['region']);
        $userAr['city'] = trim($_POST['city']);
        $userAr['pass'] = trim($_POST['password']);
        $passwordRepeat = trim($_POST['password_repeat']);
        $userAr['email'] = trim($_POST['email']);
        $userAr['login'] = trim($_POST['login']);

        if (!empty($userAr['login'])) {

            if (strlen($userAr['login']) < 3 || strlen($userAr['login']) > 50) {
                $sessionService->setFlash('login-error', 'Неверный пароль. Минимальная длина - 3. Максимальная - 50', $registerURL);
            }

            $loginCheck = $this->getUserRepository()->checkLogin($userAr['login']);
            if (!$loginCheck) {
                $sessionService->setFlash('login-error', 'Логин уже существует. Выберите другой', $registerURL);
            }

        } else {
            $sessionService->setFlash('login-error', 'Введите логин', $registerURL);
        }

        if (!empty($userAr['email'])) {
            if (filter_var($userAr['email'], FILTER_VALIDATE_EMAIL)) {
                $emailCheck = $this->getUserRepository()->checkEmail($userAr['email']);
                if (!$emailCheck) {
                    $sessionService->setFlash('email-error', 'Данный email уже зарегистрирован', $registerURL);
                }
            } else {
                $sessionService->setFlash('email-error', 'Неверные email');
            }
        } else {
            $sessionService->setFlash('email-error', 'Введите email', $registerURL);
        }

        if (!empty($userAr['pass'])) {
            if (strlen($userAr['pass']) < 6 || strlen($userAr['pass']) > 30) {
                $sessionService->setFlash('password-error', 'Неверный пароль. Минимальная длина - 6. Максимальная - 30', $registerURL);
            }
        } else {
            $sessionService->setFlash('password-error', 'Введите пароль', $registerURL);
        }

        if ($passwordRepeat != $userAr['pass']) {
            $sessionService->setFlash('password-rep-error', 'Пароли не совпадают', $registerURL);
        }

        $userAr['pass'] = crypt(md5($userAr['pass']), 'sdfsdf');
        $key = uniqid().md5($userAr['login']).md5($userAr['email']);
        $userAr['confirm_key'] = $key;

        $addResult = $this->getUserRepository()->addUser($userAr);

        if ($addResult) {
            $subject = 'Подтверждение регистрации';
            $link = 'http://'.$_SERVER['SERVER_NAME'].$this->generate('register_second_step', array('key'=>$key));

            $headers = 'From: admin@c-space.com' . "\r\n";

            mail($userAr['email'], $subject, $link, $headers);

            $this->redirect($this->generate('register_confirm_page'));
        }

        echo 'Ошибка при регистрации';
        die;
    }

    public function registerSecondStepPage($ar)
    {
        $checkKey = $this->getUserRepository()->checkConfirmKey($ar['key']);

        if ($checkKey) {
            $id = $checkKey['id'];
            $updateResult = $this->getUserRepository()->updateUserAfterConfirm($id);
            if ($updateResult) {
                $loginResult = $this->getService('Security')->loginById($id);
                if ($loginResult) {
                    $this->redirect($this->generate('user_page', array('id'=>$id)));
                }
            }
        }

        $this->redirect('/');
    }

}