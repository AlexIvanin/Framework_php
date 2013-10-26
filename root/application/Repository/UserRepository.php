<?php


class UserRepository extends DatabaseService
{

    public function getUserById($id)
    {
       $q = $this->getConnection()->prepare("SELECT * FROM users WHERE id=:id");
	   $q->bindValue('id',$id);
	   $q->execute();
	   return $q->fetch();
    }

    public function fetchByLoginAndPass($login, $pass)
    {
        $q = $this->getConnection()->prepare("SELECT * FROM users WHERE login=:login AND pass=:pass AND confirmed=1 LIMIT 1");
        $q->bindValue('login', $login);
        $q->bindValue('pass', $pass);
        $q->execute();

        return $q->fetch();
    }

    public function fetchByEmailAndPass($email, $pass)
    {
        $q = $this->getConnection()->prepare("SELECT * FROM users WHERE email=:email AND pass=:pass AND confirmed=1 LIMIT 1");
        $q->bindValue('email', $email);
        $q->bindValue('pass', $pass);
        $q->execute();

        return $q->fetch();
    }

    public function checkLoginAndEmail($login, $email)
    {
        $q = $this->getConnection()->prepare("SELECT * FROM users WHERE login=:login AND email=:email");
        $q->bindValue('login', $login);
        $q->bindValue('email', $email);
        $q->execute();

        if ($q->fetch()) {
            return false;
        }
        return true;
    }

    public function checkLogin($login)
    {
        $q = $this->getConnection()->prepare("SELECT * FROM users WHERE login=:login");
        $q->bindValue('login', $login);
        $q->execute();

        if ($q->fetch()) {
            return false;
        }
        return true;
    }

    public function checkEmail($email)
    {
        $q = $this->getConnection()->prepare("SELECT * FROM users WHERE email=:email");
        $q->bindValue('email', $email);
        $q->execute();

        if ($q->fetch()) {
            return false;
        }
        return true;
    }

    public function addUser($userAr)
    {
        $q = $this->getConnection()->prepare("
                INSERT INTO users(name, surname, email, pass, country, region, city, login,confirm_key, date_register)
                VALUES(:name,:surname,:email,:pass,:country,:region,:city,:login,:confirm_key,NOW())
            ");
        $q->bindValue('name',$userAr['name']);
        $q->bindValue('surname',$userAr['surname']);
        $q->bindValue('email',$userAr['email']);
        $q->bindValue('pass',$userAr['pass']);
        $q->bindValue('country',$userAr['country']);
        $q->bindValue('region',$userAr['region']);
        $q->bindValue('city',$userAr['city']);
        $q->bindValue('login',$userAr['login']);
        $q->bindValue('confirm_key', $userAr['confirm_key']);
        $r = $q->execute();

        if ($r) {
            return true;
        }
        return false;
    }

    public function checkConfirmKey($key)
    {
        $q = $this->getConnection()->prepare("SELECT * FROM users WHERE confirm_key=:key");
        $q->bindValue('key',$key);
        $q->execute();

        return $q->fetch();
    }

    public function updateUserAfterConfirm($id)
    {
        $q = $this->getConnection()->prepare("UPDATE users SET confirmed=1, confirm_key=null WHERE id=:id");
        $q->bindValue('id', $id);
        $r = $q->execute();

        return $r;
    }

    public function getUsers()
    {
        $q = $this->getConnection()->prepare("SELECT * FROM users");
        $q->execute();

        return $q->fetchAll();
    }

    public function updateUser($user)
    {
        $q = $this->getConnection()->prepare("UPDATE users SET name=:name, surname=:surname, email=:email, login=:login, role=:role WHERE id=:id");
        $q->bindValue('name', $user['name']);
        $q->bindValue('surname', $user['surname']);
        $q->bindValue('email', $user['email']);
        $q->bindValue('login', $user['login']);
        $q->bindValue('role', $user['role']);
        $q->bindValue('id', $user['id']);
        $r = $q->execute();

        return $r;
    }
}
