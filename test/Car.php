<?php
require_once('CarTrait.php');

class Car {
    use CarTrait;

    public function __construct($make, $model, $vin) {
        $this->make = $make;
        $this->changeModel($model);
        $this->changeVin($vin);
    }
    
    // public function spec()
    // {
    //     // trait is part of the class that use it
    //     // so "vin" is a property of Car.
    //     // so we can access it regardless of it being declared as private
    //     return $this->vin;
    // }
}