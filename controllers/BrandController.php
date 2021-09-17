<?php

require_once 'Controllers.php';
require_once 'models/Brand.php';

class BrandController extends Controllers
{
    protected $brand;

    public function __construct()
    {
        if (isset($_SESSION['user'])) {
            parent::__construct();
            $this->brand = new Brand;
        } else {
            header('Location: index.php?controller=Auth&action=login');
        }
    }

    public function index()
    {
        $brands = $this->brand->all();
        return $this->view('pages/brand/index', compact('brands'));
    }

    public function add()
    {
        return $this->view('pages/brand/create');
    }

    public function create()
    {
        if (isset($_POST)) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Name field is required';
            }
            $data = $_POST;

            if (!empty($_FILES['image']['tmp_name'])) {
                $mimeType = mime_content_type($_FILES['image']['tmp_name']);
                if(in_array($mimeType, array('image/png','image/jpg', 'image/jpeg', 'image/gif'))){
                    if ($_FILES['image']['error'] == 0) {
                        $filePath = "assets/uploads/{$_FILES['image']['name']}";
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
                            $data['image'] = $filePath;
                        }
                    }
                }else {
                    $errors['image']= 'Can upload only image file';     
                }
            }
            if (!empty($errors)) {
                return $this->view('pages/brand/create', compact('errors'));
            }

            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $builder = $this->brand->insert($data);
            if ($builder) {
                header("Location: index.php?controller=Brand&action=index");
            }
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $brand = $this->brand->getById($id);
        return $this->view('pages/brand/edit', compact('brand'));
    }

    public function update()
    {
        if (isset($_POST)) {
            $data = $_POST;
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Name field is required';
            }

            if (!empty($_FILES['image']['tmp_name'])) {
                //dd($_FILES['image']);
                $mimeType = mime_content_type($_FILES['image']['tmp_name']);
                //dd($mimeType);
                if(in_array($mimeType, array('image/png','image/jpg', 'image/jpeg', 'image/gif'))){
                    if ($_FILES['image']['error'] == 0) {
                        $filePath = "assets/uploads/{$_FILES['image']['name']}";
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
                            $data['image'] = $filePath;
                        }
                    }
                }else {
                    $errors['image']= 'Can upload only image file';     
                }
            }
            if (!empty($errors)) {
                return $this->view('pages/brand/create', compact('errors'));
            }

            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $builder = $this->brand->update($data);
            if ($builder) {
                header("Location: index.php?controller=Brand&action=index");
            }
        }
    }

    public function delete()
    {
        if(isset($_GET)) {
            $id = $_GET['id'];
            $result = $this->brand->delete($id);
            if ($result) {
                header("Location: index.php?controller=Brand&action=index");
            }
        }
    }
}