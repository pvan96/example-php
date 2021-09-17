<?php
    $this->layout('layouts/app');
    $this->set('title', 'Brand-Add');
?>

<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create brand</h3>
        </div>
        <form action="index.php?controller=Brand&action=update" method="POST" enctype="multipart/form-data">
            <input type='hidden' name='id' value="<?= $brand['id'] ?>"/>
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="name" name='name' placeholder="Enter name" value="<?= $brand['name'] ?>"/>
                    <?php if (!empty($errors['name'])) : ?>
                        <span style="color: red;"><?= $errors['name'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Image</label></br>
                    <input type="file" name='image' accept="image/*" value="<?= $brand['image'] ?>"/>
                    <?php if (!empty($errors['image'])) : ?>
                        <span style="color: red;"><?= $errors['image'] ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </form>
    </div>
</div>