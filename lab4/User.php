<?php
/**
 * Created by PhpStorm.
 * User: kikoano111
 * Date: 29/11/2018
 * Time: 23:52
 */

class User
{
    private $name;
    private $surname;
    private $phone;
    private $email;
    private $address;
    public function __construct($name,$surname,$phone,$email,$address)
    {
        $this->name=$name;
        $this->surname=$surname;
        $this->phone=$phone;
        $this->email=$email;
        $this->address=$address;
    }


    public function getName()
    {
        return $this->name;
    }


    public function getSurname()
    {
        return $this->surname;
    }


    public function getPhone()
    {
        return $this->phone;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function getAddress()
    {
        return $this->address;
    }

}