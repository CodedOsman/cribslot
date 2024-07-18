<?php

class Clients extends Dbh{


    //method adds client information to database
    protected function setClient($client_type, $first_name, $last_name, $client_photo, $gender, $email, $contact, $asset_id, $owner_id, $client_status, $occupation){
        $sql = "INSERT INTO clients (first_name, last_name, client_photo, gender, email, contact, asset_id, owner_id, client_status, occupation) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($client_type, $first_name, $last_name, $client_photo, $gender, $email, $contact, $asset_id, $owner_id, $client_status, $occupation))){
            $stmt = null;
            redirect("Something went wrong! Could not add client", "dashboard.php?dashboard=");
            exit();
        }

        $stmt = null;
    }

    //method updates client data
    protected function updateClientInfo($client_type, $first_name, $last_name, $client_photo, $gender, $email, $contact, $asset_id, $owner_id, $client_status, $occupation, $client_id){
        $sql = "UPDATE clients SET client_type=?, first_name=?, last_name=?, client_photo=?, gender=?, email=?, contact=?, asset_id=?, client_status=?, occupation=? WHERE client_id=?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($client_type, $first_name, $last_name, $client_photo, $gender, $email, $contact, $asset_id, $owner_id, $client_status, $occupation, $client_id))){
            $stmt = null;
            redirect("Something went wrong! Could not update client info", "dashboard.php?dashboard=");
            exit();
        }

        $stmt = null;
    }

    //method gets the data of a client
    protected function getClientInfo($clientid){
        $sql = "SELECT * FROM clients WHERE client_id=?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($clientid))){
            $stmt = null;
            redirect("Something went wrong! Could not fetch client data", "dashboard.php?dashboard=");
            exit();
        }

        $stmt = null;
    }

    //method fetches clients of a particular owner
    protected function getClients($ownerid){
        $sql = "SELECT * FROM clients WHERE owner_id=?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($ownerid))){
            $stmt = null;
            redirect("Something went wrong! Could not find your clients", "dashboard.php?dashboard=");
            exit();
        }


        $stmt = null;
    }

}