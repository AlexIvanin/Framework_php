<?php
Class UserController extends Controller
{

    public function userPage($ar)
    {
     $user = $this->getUserRepository()->getUserById($ar['id']);
	 if ($user) {
	 echo "Пользователь - " .$user['login'];
	  }
	  else {
	  echo "Мертв такой пользователь";
	  }

    }

    public function logout()
    {
	  $user = $this->getService('Session')->UnCookie("cookie");
        unset($_SESSION['user']);
        $this->redirect('/');
    }


    public function loginCheck()
    {
        $login = trim($_POST['login']);
        $pass = trim($_POST['pass']);

        if (strlen($login) > 5 && strlen($pass) > 5) {
            /** @var $securityService \SecurityService */
            $securityService = $this->getService('Security');

            if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
                $result = $securityService->checkByEmailAndPass($login, $pass);
            } else {
                $result = $securityService->checkByLoginAndPass($login, $pass);
            }

            if ($result) {
                $securityService->login($result);
                if ($result['role'] == 2) {
                    $this->redirect($this->generate('admin'));
                }
                $this->redirect('/');
            }
        }

        $this->redirect('/');
    }

}