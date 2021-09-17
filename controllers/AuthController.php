<?php
require_once 'models/User.php';
require_once 'Controllers.php';

class AuthController extends Controllers {
    protected $user;

    public function __construct()
    {   
        if (isset($_SESSION['user'])) {
            return header('Location: .');
        }

        parent::__construct();
        $this->user = new User;
    }

    public function login()
    {
        
        if (isset($_POST['login'])) {
            $loginId = $_POST['loginId'];
            $password = md5($_POST['password']);
            $input = compact('loginId', 'password');
            $user = $this->user->getOneByCondition($input);
            if ($user) {
                $_SESSION['user'] = $user;
            } 
            header('Location: .');  
        }
        return $this->view('pages/user/login');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header("Location:index.php?controller=Auth&action=login");
    }
}