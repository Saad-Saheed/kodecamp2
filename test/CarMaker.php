<?php
require_once('Car.php');

class CarMaker extends Car{

    public function __construct($make, $model, $vin) {        
        parent::__construct($make, $model, $vin);
    }

    public function getMake()
    {
        //we are able to get make here because its a public property.
        //it accessible every where.
        return $this->make;
    }

    public function getVin()
    {
        //we are able to get vin here only through public method.
        //as the private property "vin" can not be access from outside it "Car" Class.
        // $this->spec();
        // $this->vin; Impossible
        return $this->showVin();
    }

    public function getModel()
    {
        //we are able to get model here because we inherit Car class.
        //(In this case Protected methods or properties can only be access through inheritance)

        // $this->model = "Ojoro"; //possible
        // $this->changeModel('Ojoro 2'); //possible       
        return $this->model;
        
    }

}