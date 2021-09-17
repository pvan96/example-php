<?php
require_once "Model.php";

class User extends Model
{
    public $table = 'users';

    public function getOneByCondition($input)
    {
        $query = $this->ex_query("SELECT * FROM {$this->table} WHERE login_id = '{$input['loginId']}' AND password = '{$input['password']}'");
        return mysqli_fetch_assoc($query);
    }

    public function all()
    {
        $query = $this->ex_query("SELECT * FROM {$this->table}");
        $result = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        return $result;
    }

    public function insert($data)
    {
        return $this->ex_query("INSERT INTO {$this->table} (name, login_id, password, created_at, updated_at) VALUE ('{$data['name']}', '{$data['loginId']}', '{$data['password']}', '{$data['created_at']}', '{$data['updated_at']}')");
    }

    public function update($data)
    {
        return $this->ex_query("UPDATE {$this->table} SET name = '{$data['name']}', login_id = '{$data['loginId']}', password = '{$data['password']}', created_at = '{$data['created_at']}', updated_at = '{$data['updated_at']}' WHERE id = '{$data['id']}'");
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

}