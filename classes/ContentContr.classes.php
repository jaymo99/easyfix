<?php


class ContentContr extends Content {

    public function displayAllMechanics() {
        $myVar = $this->getAllMechanics();
           
        return $myVar;
    }

    public function displayMechanic($mech_id) {
        $myVar = $this->getMechanic($mech_id);
           
        return $myVar;
    }

    public function displayMechanicGallery($mech_id) {
        $myVar = $this->getMechanicGallery($mech_id);
           
        return $myVar;
    }

    public function displayMechanicServices($mech_id) {
        $myVar = $this->getMechanicServices($mech_id);
           
        return $myVar;
    }

    public function displayClientAppointments($client_id) {
        $myVar = $this->getClientAppointments($client_id);
           
        return $myVar;
    }

    public function displayMechanicAppointments($mech_id) {
        $myVar = $this->getMechanicAppointments($mech_id);
           
        return $myVar;
    }

    public function displayMechanicLocations(){
        $myVar = $this->getMechanicLocations();

        return $myVar;
    }
    
    
}
