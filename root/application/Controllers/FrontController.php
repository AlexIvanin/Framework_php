<?php
class FrontController extends Controller
{
    public function betaPage()
    {
        return $this->render('beta');
    }

    public function betaHandler()
    {
        $login = trim($_POST['login']);
        $pass = trim($_POST['pass']);

        $login_r = $this->getOptions('beta_login');
        $pass_r = $this->getOptions('beta_pass');

        if ($login == $login_r && $pass == $pass_r) {
            $_SESSION['beta'] = 1;
            $this->redirect('/');
        }
    }

    public function indexPage()
    {
	 $user = $this->getService('Security')->getUser();
    if ($user) {
	$sessionService = $this->getService('Session');
$sessionService->setCookie("cookie",$user['login']) ;
    

return $this->render('index');
}	           
	   else {
	

	return $this->render('login_form');
	   }
	}

    

    public function sendMessageFeedback()
    {
        $messageFeedback = array();
        $messageFeedback['title'] = $_POST['title'];
        $messageFeedback['message'] = $_POST['message'];
        $m = $this->getService('Database')->getRepository('Front')->addMessageFeedback($messageFeedback);
    }
}
