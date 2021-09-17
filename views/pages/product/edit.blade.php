<?php
$this->layout('layouts/app');
$this->set('title','Edit Product');
?>
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Product</h3>
        </div>
        <form action="index.php?controller=Product&action=update" method="POST" enctype="multipart/form-data">
            <input type='hidden' name='id' value="<?= $product['id'] ?>"/>
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="<?= $product['name'] ?>" class="form-control" name='name' placeholder="Enter name"/>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category_id">
                        <?php foreach ($cateNames as $cateName) { ?>
                            <option value="<?= $cateName['id']?>"
                                <?php if ($cateName['id'] == $cateNameSelected['id']) { ?>
                                    selected
                                <?php } ?>
                            ><?= $cateName['name']?></option>
                        <?php } ?>   
                    </select>
                </div>
                <div class="form-group">
                    <label>Brand</label>
                    <select class="form-control" name="brand_id">
                        <?php foreach ($brandNames as $brandName) { ?>
                            <option value="<?= $brandName['id']?>"
                                <?php if ($brandName['id'] == $brandNameSelected['id']) { ?>
                                    selected
                                <?php } ?>
                            ><?= $brandName['name']?></option>
                        <?php } ?>   
                    </select>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" value="<?= $product['price'] ?>" class="form-control" name='price' placeholder="Enter price"/>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea rows="5" cols="90" class="form-control" name='description' placeholder="Enter descrition"> <?= $product['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" value="<?= $product['quantities'] ?>" class="form-control" name='quantities' placeholder="Enter quantity"/>
                </div>
                <div class="form-group img-prodetail">
                    <label style="margin-right: 20px;">Image:</label>
                    <?php foreach ($productImages as $productImage) { ?>
                        <div><img class="img-list" src="<?= $productImage['path']?>" alt=""></div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <input type="file" style="border:none" class="form-control" name='path[]' multiple accept="image/*"/>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </form>
    </div>
</div>
