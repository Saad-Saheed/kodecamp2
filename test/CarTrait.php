<?php

trait CarTrait {
    public $make;
    protected $model;
    private $vin;

    public function showVin()
    {
        return $this->vin;
    }

    protected function changeModel($value)
    {
        $this->model = $value;
    }

    private function changeVin($value)
    {
        $this->vin = $value;
    }


}