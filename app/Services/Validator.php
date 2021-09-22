<?php

namespace App\Services;

class Validator
{
    private $errors;
    private $attributes = array();

    public function validate(array $data, array $rules): bool
    {
        $valid = true;

        foreach ($rules as $item => $ruleset) { 
            $ruleset = explode('|', $ruleset);

            foreach($ruleset as $rule)
            {
                $pos = strpos($rule, ':');
                if($pos !== false){
                    $parameter = substr($rule, $pos + 1);
                    $rule = substr($rule, 0, $pos);
                }else{
                    $parameter = '';
                }
            }

            $methodName = 'validate' . ucfirst(($rule));

            $value = isset($data[$item]) ? $data[$item] : NULL;

            if(method_exists($this, $methodName)){
                $this->$methodName($item, $value, $parameter) OR $valid = false;
            }
        }

        if($this->errors){
            $this->getErrors();
        }

        return $valid;
    }

    private function validateRequired($item, $value, $parameter): bool
    {
        if($value == '' || $value === NULL){
            $this->errors[] = ucfirst($item) . ' field is required!';

            return false;
        }

        $this->attributes[$item] = $value;
        return true;
    }

    private function validateInt($item, $value, $parameter): bool
    {
        if(!is_int($value)){
            $this->errors[] = ucfirst($item) . ' field must be integer!';

            return false;
        }

        $this->attributes[$item] = $value;
        return true;
    }

    private function validateEmail($item, $value, $parameter): bool
    {
        if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
            $this->errors[] = ucfirst($item) . ' field must be an email!';

            return false;
        }

        $this->attributes[$item] = $value;
        return true;
    }

    public function getErrors()
    {
        return session()->set('errors', $this->errors);
    }

    public function validated(): array
    {
        return $this->attributes;
    }
}