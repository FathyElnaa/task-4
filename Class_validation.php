<?php

class Validator
{
    private $errors = [];

    public function Val_Name($name)
    {
        if (empty($name)) {
            $this->errors['name'] = "Name required";
        } elseif (strlen($name) < 3) {
            $this->errors['name'] = "Name less than three letters";
        }
    }

    public function Val_Email($email)
    {
        if (empty($email)) {
            $this->errors['email'] = "Email required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Invalid email";
        }
    }

    public function Val_Password($password)
    {
        if (empty($password)) {
            $this->errors['password'] = "password required";
        } elseif (strlen($password) < 8) {
            $this->errors['password'] = "Password must be at least 8 characters long";
        }
    }

    public function Val_Phone($phone)
    {
        if (empty($phone)) {
            $this->errors['phone'] = "phone required";
        } elseif (!is_numeric($phone) && !filter_var($phone, FILTER_VALIDATE_INT)) {
            $this->errors['phone'] = "Invalid phone";
        } elseif (strlen($phone) < 11) {
            $this->errors['phone'] = "Phone less than 11 numbers";
        }
    }
    
    public function getErrors()
    {
        return $this->errors;
    }

    public function passes()
    {
        return empty($this->errors);
    }
}
