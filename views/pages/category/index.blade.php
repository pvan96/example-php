<?php
    $this->layout('layouts/app');
    $this->set('title', 'Category');
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <a href="index.php?controller=Category&action=add" ><button class="btn btn-primary btn-sm">Add</button></a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 5%">ID</th>
                    <th style="width: 40%">Name</th>
                    <th style="width: 20%">Action</th>
                </tr>
                </thead>
                <?php foreach ($categories as $category) { ?>
                <tbody>
                    <tr>
                        <td><?= $category['id'] ?></td>
                        <td><?= $category['name'] ?></td>
                        <td>
                        <a href="index.php?controller=Category&action=edit&id=<?= $category['id'] ?>"><button class="btn btn-warning btn-sm">Edit</button></a>
                        |
                        <a href="index.php?controller=Category&action=delete&id=<?= $category['id'] ?>" onclick="return confirm('Are you sure?')"><button class="btn btn-danger btn-sm">Delete</button></a> 
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
 