<?php

class SignupView extends Signup{
    public function fetchToken($token){
        $token = $this->getToken($token);

        return $token;
    }

    public function GoActivate($userid){
        $this->Activate($userid);
    }
}