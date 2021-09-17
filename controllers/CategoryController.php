<?php

require_once 'Controllers.php';
require_once 'models/Category.php';

class CategoryController extends Controllers
{
    protected $category;

    public function __construct()
    {
        if (isset($_SESSION['user'])) {
            parent::__construct();
            $this->category = new Category;
        } else {
            header('Location: index.php?controller=Auth&action=login');
        }
    }

    public function index()
    {
        $categories = $this->category->all();
        return $this->view('pages/category/index', compact('categories'));
    }

    public function add()
    {
        return $this->view('pages/category/create');
    }

    public function create()
    {
        if (isset($_POST)) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Name field is required';
            }

            if (!empty($errors)) {
                return $this->view('pages/category/create', compact('errors'));
            }

            $data = $_POST;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $builder = $this->category->insert($data);
            dd($builder);
            if ($builder) {
                header("Location: index.php?controller=Category&action=index");
            }
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $category = $this->category->getById($id);
        return $this->view('pages/category/edit', compact('category'));
    }

    public function update()
    {
        if (isset($_POST)) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Name field is required';
            }

            if (!empty($errors)) {
                return $this->view('pages/category/create', compact('errors'));
            }
            $data = $_POST;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $builder = $this->category->update($data);
            if ($builder) {
                header("Location: index.php?controller=Category&action=index");
            }
        }
    }

    public function delete()
    {
        if(isset($_GET)) {
            $id = $_GET['id'];
            $result = $this->category->delete($id);
            if ($result) {
                header("Location: index.php?controller=Category&action=index");
            }
        }
    }
}