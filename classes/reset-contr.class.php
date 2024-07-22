<?php

class resetContr extends Reset{

    public function sendReset($email){
        if(!$this->emptyInput($email)){
            
            redirect('Provide an email', 'forgot-password.php');
            exit();
        }else{
            $this->setReset($email);
        }
    }

    public function resetPwd($newPwd, $cNewPwd, $email){
        if(!$this->emptyInput($newPwd)){
            redirect('Provide a password', 'forgot-password.php');
            exit();
        }elseif(!$this->emptyInput($cNewPwd)){
            redirect('Repeat your password', 'forgot-password.php');
            exit();
        }elseif(!$this->pwdMatch($newPwd, $cNewPwd)){
            redirect('Passwords do not match!', 'forgot-password.php');
            exit();
        }else{
            $this->SetNewPwd($newPwd, $email);
        }
    }

    public function getToken($token){
        $this->getResetToken($token);
    }

    public function prepPwd($email){
        $this->PrepNewPwd($email);
    }

    private function emptyInput ($input){
        if(empty($input)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function pwdMatch($pwd, $cPwd){
        if($pwd !== $cPwd){
            return false;
        }else{
            return true;
        }
    }

}