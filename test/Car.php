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
    //     // trait is part of the class that implement it
    //     //so "vin" is a property of Car
    //     return $this->vin;
    // }
}