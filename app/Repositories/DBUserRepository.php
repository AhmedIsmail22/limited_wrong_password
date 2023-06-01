<?php


namespace App\Repositories;

use App\RepositoryInterfaces\UserInterface;
use App\Traits\MaxLimitTrait;
use Illuminate\Support\Facades\Auth;

class DBUserRepository implements UserInterface{

    use MaxLimitTrait;
    public function login($request){
        $data = $request->all();
         if(!Auth::attempt(['email' => $data['email'], 'password' => $data['password']]))
         {
            $this->addHit(60);
            return false;
         }else{
            $this->removeThrottleKey();
            return true;
         }
    }

    public function logout(){
        Auth::logout();
    }
}