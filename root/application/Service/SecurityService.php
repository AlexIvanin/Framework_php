<?php



class SecurityService extends Controller
{
    private $User = null;

    public function __construct(){
        if(isset($_SESSION['user'])){
            $this->User = unserialize($_SESSION['user']);
        }
    }

    public function login($user)
    {
        $_SESSION['user'] = serialize($user);
    }

    public function logout()
    {
        unset($_SESSION['user']);
    }

    public function getUser(){
        if ($this->User) {
            return $this->User;
        }
        return false;
    }

    public function checkByLoginAndPass($login, $pass)
    {
        $pass = crypt(md5($pass), 'sdfsdf');

        $result = $this->getUserRepository()->fetchByLoginAndPass($login, $pass);

        return $result;
    }

    public function checkByEmailAndPass($email, $pass)
    {
        $pass = crypt(md5($pass), 'sdfsdf');

        $result = $this->getUserRepository()->fetchByEmailAndPass($email, $pass);

        return $result;
    }

    public function checkUserByLogin($login)
    {

    }

    public function loginById($id)
    {
        $user = $this->getUserRepository()->getUserById($id);
        if ($user) {
            $this->login($user);
            return $user['role'];
        }
        return false;
    }

}
