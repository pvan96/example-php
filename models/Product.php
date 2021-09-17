<?php

require_once 'Model.php';

class Product extends Model 
{
    public $table = 'products';

    public function all()
    {
        $query = $this->ex_query("SELECT products.*, categories.name as category_name, brands.name as brand_name FROM {$this->table} LEFT JOIN brands ON brand_id = brands.id LEFT JOIN categories ON category_id = categories.id");
        $result = [];
        while ( $row = mysqli_fetch_assoc($query)){
            $result[] = $row;
        }
        return $result;
    }

    public function insert($data) {
        $this->ex_query("INSERT INTO {$this->table} (name, category_id, brand_id, description, price, quantities, created_at, updated_at) VALUE ('{$data['name']}', '{$data['category_id']}', '{$data['brand_id']}', '{$data['description']}', '{$data['price']}', '{$data['quantities']}', '{$data['created_at']}', '{$data['updated_at']}')");

        // hàm này nó trả về last id vừa insert nên hơi tù, để mai a nghiên cứu thêm giải pháp, tạm thời cứ dùng tạm đã nhé.
        return mysqli_insert_id($this->conn);
    }

    public function getById($id) {
        $query = $this->ex_query("SELECT * FROM {$this->table} WHERE id = $id");
        return mysqli_fetch_assoc($query);
    }

    public function update($data) {
        return $this->ex_query("UPDATE {$this->table} SET name = '{$data['name']}', category_id = '{$data['category_id']}', brand_id = '{$data['brand_id']}', description = '{$data['description']}', price = '{$data['price']}', quantities = '{$data['quantities']}' WHERE id = {$data['id']}");
    }

    public function delete($id) {
        return $this->ex_query("DELETE FROM {$this->table} WHERE id = $id");
    }
}
