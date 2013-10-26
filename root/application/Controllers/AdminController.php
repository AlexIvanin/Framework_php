<?php


class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->checkPermission();
    }

    private function checkPermission()
    {
        $user = $this->getService('Security')->getUser();

        if ($user) {
            if ($user['role'] == 13) {
               return $this->render('Admin/index');
            }
        } else {
            return $this->render('page_not_found');
        }
    }

    public function indexPage()
    {
        
    }

    public function usersPage()
    {
//        $users = $this->getService('Database')->getRepository('User')->getUsers();
//
//        return $this->getService('Templates')->render('Admin/admin.users.html.twig', array('users' => $users));

        return $this->getService('Templates')->render('Admin/admin.users.html.twig');
    }
}
