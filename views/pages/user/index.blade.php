<?php
    $this->layout('layouts/app');
    $this->set('title', 'User-manager');
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <a href="index.php?controller=User&action=add" ><button class="btn btn-primary btn-sm">Add</button></a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 5%">ID</th>
                    <th style="width: 35%">Name</th>
                    <th style="width: 40%">Login ID</th>
                    <th style="width: 20%">Action</th>
                </tr>
                </thead>
                <?php foreach ($users as $user) { ?>
                <tbody>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['login_id'] ?></td>
                        <td>
                        <a href="index.php?controller=User&action=edit&id=<?= $user['id'] ?>"><button class="btn btn-warning btn-sm">Edit</button></a>
                        <?php if ($_SESSION['user']['id'] != $user['id']) { ?>
                            <a href="index.php?controller=User&action=delete&id=<?= $user['id'] ?>" onclick="return confirm('Are you sure?')"><button class="btn btn-danger btn-sm">Delete</button></a>
                        <?php } ?>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
</div>
 