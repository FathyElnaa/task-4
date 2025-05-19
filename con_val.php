<?php
require_once "Class_validation.php";

$validator = new Validator();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $validator->Val_Name($name);
    $validator->Val_Email($email);
    $validator->Val_Password($password);
    $validator->Val_Phone($phone);

    if ($validator->passes()) {
        echo "All data has been entered";
    } else {
        $errors = $validator->getErrors();
        foreach ($errors as $field => $error) {
            echo "$error <br>";
        }
    }
}
