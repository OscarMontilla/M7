<?php

abstract class Observable {
    private $observers = array();

    public function addObserver(Observer $observer){
        array_push($this->observers, $observer);
    }

    public function notifyObserver(){
        foreach ($this->observers as $observer) { 
            $observer->update($this);
        }
    }
}

class DataSource extends Observable{
    private $labels;
    private $datasets;
    private $bgColors;

    function __construct(){
        $this->labels = array();
        $this->datasets = array();
        $this->bgColors = array();
    }

    public function addRecord($label, $data, $bgColor){
        array_push($this->labels, $label);
        array_push($this->datasets, $data);
        array_push($this->bgColors, $bgColor);
        $this->notifyObserver();
    }

    public function getData(){
        return array($this->labels, $this->datasets, $this->bgColors);
    }
}
