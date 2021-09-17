<?php
    $this->layout('layouts/app');
    $this->set('title','products');
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <a href="index.php?controller=Product&action=add" ><button class="btn btn-primary btn-sm">Add</button></a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 5%">ID</th>
                    <th style="width: 25%">Name</th>
                    <th style="width: 20%">Category</th>
                    <th style="width: 20%">Brand</th>
                    <th style="width: 20%">Price</th>
                </tr>
                </thead>
                <?php foreach ($products as $product) { ?>
                <tbody>
                    <tr>
                        <td>
                            <a href="index.php?controller=Product&action=detail&id=<?= $product['id'] ?>"><?= $product['id'] ?></a>
                        </td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['category_name'] ?></td>
                        <td><?= $product['brand_name'] ?></td>
                        <td><?= $product['price'] ?></td>
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