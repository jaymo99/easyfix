<?php

class GalleryContr extends Gallery {

    private $imagePath;    
    private $mech_id;    
    
    public function __construct($imagePath, $mech_id) {
        $this->imagePath = $imagePath;
        $this->mech_id = $mech_id;
    }

    public function uploadImage() {
        $this->setImage($this->imagePath, $this->mech_id);
    }

    public function removeImage($image_id) {
        $this->deleteImage($image_id);
    }
}