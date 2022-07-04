<?php

class MechLocationContr extends Signup {
    private $lat;
    private $lng;
    private $mech_id;

    public function __construct($lat, $lng, $mech_id)
    {
        $this->lat = $lat;   
        $this->lng = $lng;
        $this->mech_id = $mech_id;
    }

    public function updateMechanicLocation(){
        $this->setMechanicLocation($this->lat, $this->lng, $this->mech_id);
    }

}