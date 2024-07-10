<?php

class DashView extends UserDash{

    public function fetchName($userid){
        $profileinfo = $this->getProfileInfo($userid);

        echo $profileinfo[0]['firstname']." ". $profileinfo[0]['lastname'];
    }
    

    public function fetchdp($userid){
        $profileinfo = $this->getProfileInfo($userid);

        return $profileinfo[0]['dp'];
    }

    public function fetchGender($userid){
        $profileinfo = $this->getProfileInfo($userid);

        return $profileinfo[0]['gender'];
    }

    public function fetchContact($userid){
        $profileinfo = $this->getProfileInfo($userid);

        return $profileinfo[0]['contact'];
    }

    public function fetchUserName($userid){
        $profileinfo = $this->getUsername($userid);

        return $profileinfo[0]['username'];
    }

    public function fetchEmail($userid){
        $profileinfo = $this->getEmail($userid);

        return $profileinfo[0]['email'];
    }

    public function fetchFirstName($userid){
        $profileinfo = $this->getProfileInfo($userid);

        echo $profileinfo[0]['firstname'];
    }

    public function fetchLastName($userid){
        $profileinfo = $this->getProfileInfo($userid);

        echo $profileinfo[0]['lastname'];
    }

    public function fetchDob($userid){
        $profileinfo = $this->getProfileInfo($userid);

        $dob = $profileinfo[0]['dob'];
        

        list($year, $month, $day) = explode('-', $dob);

        // return the split data
        return [
            'year' => $year,
            'month' => $month,
            'day' => $day
        ];
    }

}