<?php



namespace App\Traits;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

trait MaxLimitTrait{

    public function checkTooManyFailedAttempts($times){
        if (RateLimiter::tooManyAttempts(Str::lower(request("email")) . '|' . request()->ip(), $times)) {
            return true;
        }else{
            return false;
        }
    }

    public function addHit($duration){
         RateLimiter::hit(Str::lower(request("email")) . '|' . request()->ip(), $seconds = $duration);
    }

    public function removeThrottleKey(){
        RateLimiter::clear(Str::lower(request("email")) . '|' . request()->ip());
    }
}