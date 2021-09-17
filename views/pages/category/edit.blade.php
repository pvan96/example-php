<?php
    $this->layout('layouts/app');
    $this->set('title', 'Category-Edit');
?>
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Category</h3>
        </div>
        <form action="index.php?controller=Category&action=update" method="POST">
            <input type='hidden' name='id' value="<?= $category['id'] ?>"/>
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="name" name='name' placeholder="Enter name" value="<?= $category['name'] ?>" />
                    <?php if (!empty($errors['name'])) : ?>
                        <span style="color: red;"><?= $errors['name'] ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </form>
    </div>
</div>
