<?php

class MechServicesContr extends MechServices {
   
    private $mech_id;    
    
    public function __construct($mech_id) {
        $this->mech_id = $mech_id;
    }

    public function uploadService($mech_service) {
        $this->setService($mech_service, $this->mech_id);
    }

    public function removeService($service_id) {
        $this->deleteService($service_id);
    }

}