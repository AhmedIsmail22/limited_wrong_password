<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestUserLogin;
use App\Models\User;
use App\RepositoryInterfaces\UserInterface;
use App\Traits\MaxLimitTrait;

class UserController extends Controller
{
    use MaxLimitTrait;
    private $userRepository;
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function loginForm()
    {
        return View("users.login", ["error" => "", "TooManyFailed" => ""]);
    }

    public function login(RequestUserLogin $request){

        if($this->checkTooManyFailedAttempts(3)){
            return View("users.login", ["TooManyFailed" => true]);
        }

        if($this->userRepository->login($request)){
            return redirect(route("dashboard"));
        }else{
            session()->flash("error", "Wrong credentials");
            return redirect(route("loginForm"));
        }
    }


    public function dashboard(){
        $users = User::orderBy("name","ASC")->orderBy("created_at","DESC")->get();
        return View("users.dashboard", compact("users"));
    }

    public function logout(){
        $this->userRepository->logout();
        return redirect(route("loginForm"));
    }
}
