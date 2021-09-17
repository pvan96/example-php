<?php
require_once 'Controllers.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Brand.php';
require_once 'models/Product_image.php';

class ProductController extends Controllers
{
    protected $product;
    protected $cateName;
    protected $brandName;
    protected $productImage;

    public function __construct()
    {
        if(isset($_SESSION['user'])){
            parent::__construct();
            $this->product = new Product;
            $this->cateName = new Category;
            $this->brandName = new Brand;
            $this->productImage = new ProductImage;
        }else {
            header('Location: index.php?controller=Auth&action=login');
        }
    }

    public function index()
    {
        $products = $this->product->all();
        //dd($products);
        return $this->view('pages/product/index',compact('products'));
    }

    public function add()
    {
        $cateNames = $this->cateName->getCateName();
        $brandNames= $this->brandName->getBrandName();
        //dd($cateNames);
        return $this->view('pages/product/create',compact('cateNames','brandNames'));
    }

    public function create()
    {
        if(isset($_POST)) {
            $data = $_POST;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $builder = $this->product->insert($data);
            if($builder) {
                $productImage['product_id'] = $builder;
                $productImage['created_at'] = date('Y-m-d H:i:s');
                $productImage['updated_at'] = date('Y-m-d H:i:s');
                if (!empty($_FILES['path'])) {
                    $fileCount = count($_FILES['path']['error']);
                    for ($i = 0; $i < $fileCount; $i++) {
                        if ($_FILES['path']['error'][$i] == 0) {
                            $filePath = "assets/uploads/{$_FILES['path']['name'][$i]}";
                            if (move_uploaded_file($_FILES['path']['tmp_name'][$i], $filePath)) {
                                $productImage['path'] = $filePath;
                                $builder = $this->productImage->insert($productImage);
                            }
                        }
                    }
                }               
                if($builder){
                    header('Location: index.php?controller=Product&action=index');
                }
            }
            //dd($data);
        }
    }

    public function detail() {
        $id = $_GET['id'];
        $product = $this->product->getById($id);
        $cateName = $this->cateName->getById($product['category_id']);
        $brandName= $this->brandName->getById($product['brand_id']);
        $productImages = $this->productImage->getByProductId($product['id']);
        //dd($productImage);
        return $this->view('pages/product/detail',compact('product','cateName','brandName', 'productImages'));
    }

    public function edit() {
        $id = $_GET['id'];
        $product = $this->product->getById($id);
        $cateNames = $this->cateName->getCateName();
        //dd($cateNames);
        $brandNames= $this->brandName->getBrandName();
        $cateNameSelected = $this->cateName->getById($product['category_id']);
        //dd($cateNameSelected);
        $brandNameSelected= $this->brandName->getById($product['brand_id']);
        $productImages = $this->productImage->getByProductId($product['id']);
        //dd($productImage);
        return $this->view('pages/product/edit',compact('product','cateNames','brandNames', 'productImages','cateNameSelected','brandNameSelected'));
    }

    public function update() {
        if(isset($_POST)) {
            $data = $_POST;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $builder = $this->product->update($data);
            if($builder) {
                $productImage['product_id'] = $data['id'];
                $productImage['created_at'] = date('Y-m-d H:i:s');
                $productImage['updated_at'] = date('Y-m-d H:i:s');
                if (!empty($_FILES['path'])) {
                    $builder = $this->productImage->delete($data['id']);
                    //dd($_FILES);
                    $fileCount = count($_FILES['path']['error']);
                    for ($i = 0; $i < $fileCount; $i++) {
                        if ($_FILES['path']['error'][$i] == 0) {
                            $filePath = "assets/uploads/{$_FILES['path']['name'][$i]}";
                            if (move_uploaded_file($_FILES['path']['tmp_name'][$i], $filePath)) {
                                $productImage['path'] = $filePath;
                                $builder = $this->productImage->insert($productImage);
                            }
                        }
                    }
                }               
                if($builder){
                    header('Location: index.php?controller=Product&action=index');
                }
            }
            //dd($data);
        }
    }

    public function delete() {
        if(isset($_GET)) {
            $id = $_GET['id'];
            $result = $this->product->delete($id);
            $result = $this->productImage->delete($id);
            if ($result) {
                header("Location: index.php?controller=Product&action=index");
            }
        }
    }
}