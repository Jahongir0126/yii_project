<?php 
namespace core;

abstract class UserModel extends DbModel{

    abstract public function getDisplayName():string;
}