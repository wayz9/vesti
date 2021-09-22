<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'users';

    protected $fields = ['name', 'email', 'password', 'is_admin', 'email_verified_at'];

    public function authenticate($email, $password)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE email = :email AND password = :password");
        $this->db->bind(":email", $email);
        $this->db->bind(":password", $password);

        $user = $this->db->fetch();

        return $user ? $user : [];
    }
}