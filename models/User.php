<?php

namespace models;

use core\UserModel;

class User extends UserModel{

    const STATUS_INACTIVE =0;
    const STATUS_ACTIVE =1;
    const STATUS_DELETED =2;

    
    public ?int $id = null;
    public string $firstName = '';
    public string $lastName = '';
    public string $email = '';
    public int $status = self::STATUS_INACTIVE;
    public string $password = '';
    public string $confirmPassword = '';
    public string $created_at = '';  // Добавлено



    public function tableName(): string {
        return 'users';  
    }
    
    public static function primaryKey(): string {
        return 'id' ;
    }


    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password=password_hash($this->password, PASSWORD_DEFAULT); 
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'firstName' => [self::RULE_REQUIRED],
            'lastName' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL,[self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],


        ];
    }

    public function attributes(): array {
        return ['firstName', 'lastName', 'email', 'password','status'];
    } 
    public function labels():array{
        return[
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'email'=> 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Confirm Password',
        ];
    }

    public function getDisplayName(): string {  
        return $this->firstName .' '. $this->lastName;
    }
}
