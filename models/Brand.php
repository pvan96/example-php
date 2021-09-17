<?php

require_once 'Model.php';

class Brand extends Model
{
    public $table = 'brands';

    public function all()
    {
        $query = $this->ex_query("SELECT * FROM {$this->table};");
        $result = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        return $result;
    }

    public function insert($data)
    {
        return $this->ex_query("INSERT INTO {$this->table} (name, image, created_at, updated_at) VALUE ('{$data['name']}', '{$data['image']}', '{$data['created_at']}', '{$data['updated_at']}')");
    }

    public function update($data)
    {
        return $this->ex_query("UPDATE {$this->table} SET name = '". $data['name'] ."', image = '". $data['image'] ."', created_at = '". $data['created_at'] ."', updated_at = '". $data['updated_at'] ."' WHERE id = '". $data['id'] ."'");
    }

    public function getById($id)
    {
        $query = $this->ex_query("SELECT * FROM {$this->table} WHERE id = $id ");
        return mysqli_fetch_assoc($query);
    }

    public function delete($id)
    {
        return $this->ex_query("DELETE FROM {$this->table} WHERE id = $id");
    }

    public function getBrandName()
    {
        $query = $this->ex_query("SELECT id, name FROM {$this->table}");
        $result = [];
        while ($row = mysqli_fetch_assoc($query))
        {
            $result[] = $row ;
        }
        return $result;
    }
}