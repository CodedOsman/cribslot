<?php

class  ClientView extends Clients{
    //method fetches client information
    public function fetchClientInfo($clientid){
        $clientData = $this->getClientInfo($clientid);

        return $clientData;
    }
    //method fetches clients of a particular owner
    public function fetchClients($ownerid){
        $clients = $this->getClients($ownerid);

        return $clients;
    }
}