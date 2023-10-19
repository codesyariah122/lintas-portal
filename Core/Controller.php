<?php
/**
* @author : Puji Ermanto <pujiermanto@gmail.com>
* @return {abstraction}
**/

namespace Core;

use App\Config\Environment;
use Core\Adapter;

abstract class Controller implements Adapter {

    public function __construct() {
        Environment::config();
    }

    abstract public function index();
    abstract public function all();
    abstract public function create();
    abstract public function update();
    abstract public function delete();

    protected function jsonResponse($data) {
        echo json_encode($data);
    }

    protected static function validateInput($data, $rules) {
        $errors = [];

        foreach ($rules as $field => $rule) {
            if (empty($data[$field])) {
                $errors[$field] = "$field is required.";
            } else {
                if (isset($rule['email']) && $rule['email']) {
                    if (!filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                        $errors[$field] = "$field is not a valid email.";
                    }
                }
                if (isset($rule['minLength']) && strlen($data[$field]) < $rule['minLength']) {
                    $errors[$field] = "$field should be at least {$rule['minLength']} characters long.";
                }

                if ($field === 'password' && isset($rule['passwordStrength'])) {
                    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $data[$field])) {
                        $errors[$field] = "$field must contain at least one uppercase letter, one lowercase letter, and one digit.";
                    }
                }

                if ($field === 'confirm_password') {
                    if ($data['password'] !== $data['confirm_password']) {
                        $errors['confirm_password'] = 'Passwords do not match.';
                    }
                }
            }
        }

        return $errors;
    }
}

