<?php
class InvalidUserMotdepasseException extends Exception{
    public function __construct($message){
        parent::__construct($message);
    }
}