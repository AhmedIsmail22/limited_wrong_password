<?php 


namespace App\RepositoryInterfaces;



interface UserInterface{

    public function login($data);
    public function logout();
}