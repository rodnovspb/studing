<?php

class EmptyEmail extends Exception {};
class InvalidEmail extends Exception {};


function checkEmail($email){
    try {
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            throw new InvalidEmail('Неправильная почта');
        } elseif (empty($email)){
            throw new EmptyEmail('Пустая почта');
        }
        echo "Успешно";
    } catch (InvalidEmail $e){
        echo $e->getMessage();
    } catch (EmptyEmail $e){
        echo $e->getMessage();
    }
}

checkEmail('asdf@sf.df');