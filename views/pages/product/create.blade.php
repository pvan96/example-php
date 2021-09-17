<?php
$this->layout('layouts/app');
$this->set('title','Create Product');
?>
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Product</h3>
        </div>
        <form action="index.php?controller=Product&action=create" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name='name' placeholder="Enter name"/>
                    <?php if (!empty($errors['name'])) : ?>
                        <span style="color: red;"><?= $errors['name'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category_id">
                        <?php foreach ($cateNames as $cateName) { ?>
                            <option value="<?= $cateName['id']?>"><?= $cateName['name']?></option>
                        <?php } ?>   
                    </select>
                </div>
                <div class="form-group">
                    <label>Brand</label>
                    <select class="form-control" name="brand_id">
                        <?php foreach ($brandNames as $brandName) { ?>
                            <option value="<?= $brandName['id']?>"><?= $brandName['name']?></option>
                        <?php } ?>   
                    </select>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name='price' placeholder="Enter price"/>
                    <!-- <?php if (!empty($errors['name'])) : ?>
                        <span style="color: red;"><?= $errors['name'] ?></span>
                    <?php endif; ?> -->
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea rows="5" cols="90" class="form-control" name='description' placeholder="Enter descrition"></textarea>
                    <!-- <?php if (!empty($errors['name'])) : ?>
                        <span style="color: red;"><?= $errors['name'] ?></span>
                    <?php endif; ?> -->
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" class="form-control" name='quantities' placeholder="Enter quantity"/>
                    <!-- <?php if (!empty($errors['name'])) : ?>
                        <span style="color: red;"><?= $errors['name'] ?></span>
                    <?php endif; ?> -->
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" style="border:none" class="form-control" name='path[]' multiple accept="image/*"/>
                    <!-- <?php if (!empty($errors['name'])) : ?>
                        <span style="color: red;"><?= $errors['name'] ?></span>
                    <?php endif; ?> -->
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </form>
    </div>
</div>
