<?php

namespace App\Services;

class Session
{
    public function get($key, $default = null)
    {
        return $this->exists($key) ? $_SESSION[$key] : $default;
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;

        return $this;
    }

    public function exists($key)
    {
        return array_key_exists($key, $_SESSION);
    }

    public function delete($key)
    {
        if ($this->exists($key)) {
            unset($_SESSION[$key]);
        }

        return $this;
    }

    public function clear()
    {
        $_SESSION = [];

        return $this;
    }
}