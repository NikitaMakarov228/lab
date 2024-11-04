<?php
function isPasswordStrong(string $password): string {
    if (strlen($password) < 8) {
        return "Длина пароля не соответствует требованиям";
    }

    if (!preg_match('/[A-Z]/', $password) || 
        !preg_match('/[a-z]/', $password) || 
        !preg_match('/[0-9]/', $password) || 
        !preg_match('/[!@#$%^&*]/', $password)) {
        return "Пароль не соответствует требованиям";
    }

    $common_patterns = ["12345678", "123456789", "qwerty"];
    if(array_key_exists($password, $common_patterns)) {
        return "Пароль не должен быть последовательностью";
    }
    

    return "Успешно!";
}

$test = [
    "qwerty",
    "qwerty123",
    "FIJJdlsk12!!",
    "jkfherfn24242",
    "!!!!!!",
    "12345678"
];

foreach($test as $t){
    echo isPasswordStrong($t) . "\n";
}