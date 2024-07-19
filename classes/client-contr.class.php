<?php

class  ClientContr extends Clients{

    private $ownerid;

    public function __construct($ownerid){
        $this->ownerid = $ownerid;
    }
    //method adds new client information
    public function addClientInfo($client_type, $first_name, $last_name, $client_photo, $gender, $email, $contact, $asset_id, $client_status, $occupation){
        
        if($this->invalidEmail($email) == false){
            redirect("Invalid Email!", "dashboard.php?clients=add-client");
            exit();
        }elseif($this->emptyInput($first_name) == false){
            redirect("First name cannot be empty!", "dashboard.php?clients=add-client");
            exit();
        }elseif($this->emptyInput($last_name) == false){
            redirect("Last name cannot be empty!", "dashboard.php?clients=add-client");
            exit();
        }
        elseif($this->emptyInput($contact) == false){
            redirect("Contact cannot be empty!", "dashboard.php?clients=add-client");
            exit();
        }
        elseif($this->emptyInput($occupation) == false){
            redirect("Occupation cannot be empty!", "dashboard.php?clients=add-client");
            exit();
        }
        $this->setClient($client_type, $first_name, $last_name, $client_photo, $gender, $email, $contact, $asset_id, $this->ownerid, $client_status, $occupation);

        redirect("Client added successfully!","dashboard.php?clients");
    }
    //method updates client information
    public function updateClient($client_type, $first_name, $last_name, $client_photo, $gender, $email, $contact, $asset_id, $owner_id, $client_status, $occupation, $client_id){
        if($this->invalidEmail($email) == false){
            redirect("Invalid Email!", "dashboard.php?clients=add-client");
            exit();
        }elseif($this->emptyInput($contact) == false){
            redirect("Contact cannot be empty!", "dashboard.php?clients=add-client");
            exit();
        }
        elseif($this->emptyInput($occupation) == false){
            redirect("Occupation cannot be empty!", "dashboard.php?clients=add-client");
            exit();
        }

        $this->updateClientInfo($client_type, $first_name, $last_name, $client_photo, $gender, $email, $contact, $asset_id, $owner_id, $client_status, $occupation, $client_id);

        redirect("Client updated successfully!","dashboard.php?clients");
    }

    private function emptyInput($input){
        if(empty($input)){
            $result = false;
        }else{
            $result = true;
        }

    }

    // Email validation error handler
    private function invalidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        } 
        else {
            $result = true;
        }
        return $result;
    }
}