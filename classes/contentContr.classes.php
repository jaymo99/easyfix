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
    
    
}
