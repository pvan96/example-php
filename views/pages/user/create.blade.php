<?php
    $this->layout('layouts/app');
    $this->set('title', 'User-add');
?>

<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create User</h3>
        </div>
        <form action="index.php?controller=User&action=create" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name='name' placeholder="Enter name"/>
                    <?php if (!empty($errors['name'])) : ?>
                        <span style="color: red;"><?= $errors['name'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Login ID</label>
                    <input type="text" class="form-control" name='loginId' placeholder="Enter login id"/>
                    <?php if (!empty($errors['loginId'])) : ?>
                        <span style="color: red;"><?= $errors['loginId'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name='password' placeholder="Enter password"/>
                    <?php if (!empty($errors['name'])) : ?>
                        <span style="color: red;"><?= $errors['password'] ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </form>
    </div>
</div>
