<?php
$this->layout('layouts/app');
$this->set('title','Detail Product');
?>
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail product</h3>
        </div>
        <div class="card-body">
            <input type='hidden' name='id' value="<?= $product['id'] ?>"/>
            <div class="form-group">
                <label>Name</label>
                <p><?= $product['name'] ?></p>
            </div>
            <div class="form-group">
                <label>Category</label>
                <p><?= $cateName['name']?></p>
            </div>
            <div class="form-group">
                <label>Brand</label>
                <p><?= $brandName['name']?></p>
            </div>
            <div class="form-group">
                <label>Price</label>
                <p><?= $product['price'] ?></p>
            </div>
            <div class="form-group">
                <label>Description</label>
                <p><?= $product['description'] ?></p>
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <p><?= $product['quantities'] ?></p>
            </div>
            <div class="form-group img-prodetail">
                <label style="margin-right: 20px;">Image:</label>
                <?php foreach ($productImages as $productImage) { ?>
                    <div><img class="img-list" src="<?= $productImage['path']?>" alt=""></div>
                <?php } ?>
            </div>
            <div>
                <a href="index.php?controller=Product&action=edit&id=<?= $product['id'] ?>"><button class="btn btn-warning btn-sm">Edit</button></a>
                <a href="index.php?controller=Product&action=delete&id=<?= $product['id'] ?>" onclick="return confirm('Are you sure?')"><button class="btn btn-danger btn-sm">Delete</button></a> 
            </div>
        </div>
    </div>
</div>
