<?php
require_once 'Controllers.php';
require_once 'models/User.php';

class UserController extends Controllers
{
    protected $user;

    public function __construct()
    {
        if (isset($_SESSION['user'])) {
            parent::__construct();
            $this->user = new User;
        } else {
            header('Location: index.php?controller=Auth&action=login');
        }
    }

    public function index()
    {
        $users = $this->user->all();
        return $this->view('pages/user/index', compact('users'));
    }

    public function add()
    {
        return $this->view('pages/user/create');
    }

    public function create()
    {
        if (isset($_POST)) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Name is required';
            }

            if (empty($_POST['loginId'])) {
                $errors['loginId'] = 'Login ID is required';
            }

            if (empty($_POST['password'])) {
                $errors['password'] = 'Password is required';
            }

            if (!empty($errors)) {
                return $this->view('pages/user/create', compact('errors'));
            }

            $data = $_POST;
            $data['password']= md5($_POST['password']);
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $builder = $this->user->insert($data);
            if ($builder) {
                header("Location: index.php?controller=User&action=index");
            }
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $user = $this->user->getById($id);
        return $this->view('pages/user/edit', compact('user'));
    }

    public function update()
    {
        if (isset($_POST)) {

            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Name is required';
            }

            if (empty($_POST['loginId'])) {
                $errors['loginId'] = 'Login ID is required';
            }

            if (empty($_POST['password'])) {
                $errors['password'] = 'Password is required';
            }

            if (!empty($errors)) {
                return $this->view('pages/user/create', compact('errors'));
            }

            $data = $_POST;
            $data['password']= md5($_POST['password']);
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $builder = $this->user->update($data);
            if ($builder) {
                header("Location: index.php?controller=User&action=index");
            }
        }
    }

    public function delete()
    {
        if(isset($_GET)) {
            $id = $_GET['id'];
            if ($_SESSION['user']['id'] != $id) {
                $result = $this->user->delete($id);
                if ($result) {
                    header("Location: index.php?controller=User&action=index");
                }
            }
        }
    }

}