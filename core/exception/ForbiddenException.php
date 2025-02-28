<?php 
namespace core\exception;

use Exception; 


class ForbiddenException extends Exception {

    protected $message ='You don\'t have permission ti access this page ';
    protected $code =403;

}