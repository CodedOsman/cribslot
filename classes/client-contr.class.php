<?php

class  ClientContr extends Clients{

    private $ownerid;

    public function __construct($ownerid){
        $this->ownerid = $ownerid;
    }
    //method adds new client information
    public function addClientInfo($client_type, $first_name, $last_name, $client_photo, $gender, $email, $contact, $asset_id, $client_status, $occupation){
        $this->setClient($client_type, $first_name, $last_name, $client_photo, $gender, $email, $contact, $asset_id, $this->ownerid, $client_status, $occupation);

        redirect("Client added successfully!","dashboard.php?clients");
    }
    //method updates client information
    public function updateClient($client_type, $first_name, $last_name, $client_photo, $gender, $email, $contact, $asset_id, $owner_id, $client_status, $occupation, $client_id){
        $this->updateClientInfo($client_type, $first_name, $last_name, $client_photo, $gender, $email, $contact, $asset_id, $owner_id, $client_status, $occupation, $client_id);

        redirect("Client updated successfully!","dashboard.php?clients");
    }
}