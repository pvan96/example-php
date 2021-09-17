<?php
require_once 'Model.php';

class ProductImage extends Model {
    protected $table = 'product_images';

    public function getByProductId($product_id){
        $query = $this->ex_query("SELECT path FROM {$this->table} where product_id = $product_id");
        $return = [];
        while ($row = mysqli_fetch_assoc($query)){
            $return[] = $row;
        }
        return $return;
    }

    public function insert($data) {
        return $this->ex_query("INSERT INTO {$this->table} (product_id, path, created_at, updated_at) VALUE ('{$data['product_id']}', '{$data['path']}', '{$data['created_at']}', '{$data['updated_at']}')");
    }

    public function delete($product_id) {
        return $this->ex_query("DELETE FROM {$this->table} WHERE product_id= $product_id");
    }
}