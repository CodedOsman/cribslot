<?php

class Clients extends Dbh{


    //method adds client information to database
    protected function setClient($client_type, $first_name, $last_name, $client_photo, $gender, $email, $contact, $asset_id, $owner_id, $client_status, $occupation){
        $sql = "INSERT INTO clients (client_type, first_name, last_name, client_photo, gender, email, contact, asset_id, owner_id, client_status, occupation) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($client_type, $first_name, $last_name, $client_photo, $gender, $email, $contact, $asset_id, $owner_id, $client_status, $occupation))){
            $stmt = null;
            redirect("Something went wrong! Could not add client", "dashboard.php?clients=add-client");
            exit();
        }

        $stmt = null;
    }

    //method updates client data
    protected function updateClientInfo($client_type, $first_name, $last_name, $gender, $email, $contact, $asset_id, $owner_id, $client_status, $occupation, $client_id){
        $sql = "UPDATE clients SET client_type=?, first_name=?, last_name=?, gender=?, email=?, contact=?, asset_id=?, client_status=?, occupation=? WHERE client_id=?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($client_type, $first_name, $last_name, $gender, $email, $contact, $asset_id, $owner_id, $client_status, $occupation, $client_id))){
            $stmt = null;
            redirect("Something went wrong! Could not update client info", "dashboard.php?clients=update-client&id=".$client_id);
            exit();
        }

        $stmt = null;
    }
    //method updates client photo
    protected function setClientPhoto($photo, $clientid){
        $sql = "UPDATE clients SET client_photo=? WHERE client_id=?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($photo, $clientid))){
            $stmt = null;
            redirect("Could not update client's photo!", "dashboard.php?clients=update-client&id=".$clientid);
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

        $clientData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clientData;
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

        $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clients;
    }

}