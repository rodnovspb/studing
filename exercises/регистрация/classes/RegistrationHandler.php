<?php

class RegistrationHandler {

    public function validate($data) {
        $errors = [];
        $requiredFields = ['name', 'email', 'phone', 'inn'];


        /*проверка на заполненность*/
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                $errors[] = "Поле  $field обязательно для заполнения.";
            }
        }

        /*проверка email*/
        if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Неверный формат email.";
        }

        // Проверка телефона
        if (!empty($data['phone']) && !preg_match('/^\+?[0-9]{6,15}$/', $data['phone'])) {
            $errors[] = "Неверный формат телефона.";
        }

        // Проверка ИНН
        if (!empty($data['inn']) && !preg_match('/^[0-9]{10,12}$/', $data['inn'])) { //
            $errors[] = "Неверный формат ИНН.";
        }

        return $errors;
    }

    public function saveData($data) {
        try {
            $organization = Organization::create($data);
            return $organization;
        } catch (\Exception $e) {
            return null;
        }
    }
}
















