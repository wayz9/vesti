<?php

namespace App\Models;

use App\Database\Database;
use Pecee\SimpleRouter\Exceptions\HttpException;

class Model
{
    protected $table;
    protected $fields = [];

    public function __construct()
    {
        $this->db = new Database();
    }

    public function find($id): array
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = :id");
        $this->db->bind(":id", $id);

        $item = $this->db->fetch();

        if($this->db->rowCount()){
            return $item;
        }else{
            throw new HttpException('Records not found', 404);
        }
    }

    public function all($sortBy = 'DESC'): array
    {
        $this->db->query("SELECT * FROM {$this->table} ORDER BY created_at {$sortBy}");
        $items = $this->db->fetchAll();

        return $items ? $items : [];
    }

    public function create(array $values): bool
    {
        $this->db->query('INSERT INTO ' . $this->table . ' (' . implode(', ', $this->fields) . ', created_at, updated_at) values (' . implode(', ', prefix($this->fields)) . ', now(), now())');

        foreach ($this->fields as $field) {
            $this->db->bind(":{$field}", $values[$field]);
        }

        return $this->db->execute() ? true : false;
    }

    public function update(array $values, $id): bool
    {
        $this->db->query('UPDATE '. $this->table .' SET ' . implode(', ', map($this->fields)) . ', updated_at = now() WHERE id = :id');

        $this->db->bind(":id", $id);

        foreach ($this->fields as $field) {
            $this->db->bind(":{$field}", $values[$field]);
        }

        return $this->db->execute() ? true : false;
    }

    public function where($column, $operator, $value): array
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE {$column} {$operator} :{$column}");
        $this->db->bind(":{$column}", $value);

        $items = $this->db->fetchAll();

        return $items ? $items : [];
    }

    public function attach($relation, $email, $id): bool
    {
        $this->db->query("INSERT INTO {$this->table}_{$relation} (email, {$this->table}_id) values (:email, :{$this->table}_id)");

        $this->db->bind(":{$this->table}_id", $id);
        $this->db->bind(":email", $email);

        return $this->db->execute() ? true : false;
    }

    public function getRelated($relation, $value): array
    {
        $this->db->query("SELECT * FROM {$this->table}_{$relation} WHERE {$this->table}_id = :id");
        $this->db->bind(":id", $value);

        $items = $this->db->fetchAll();

        return $items ? $items : [];
    }

    public function getAllRelated($relation): array
    {
        $this->db->query("SELECT * FROM {$this->table}_{$relation}");
        $items = $this->db->fetchAll();

        return $items ? $items : [];
    }
}
