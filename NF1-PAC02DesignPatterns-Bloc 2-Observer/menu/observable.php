<?php

abstract class Observable {

    private $observers = array();

    public function addObserver(Observer $observer){

        array_push($this->observers, $observer);
    }

    public function notifyObserver(){
        for ($i=0; $i < count($this->observers); $i++) { 
            $widget = $this->observers[$i];
            $widget->update($this);
        }
    }
}

class DataSource extends Observable{

    private $animals;
    private $names;
    private $things;
    private $movies;

    function __construct(){
        $this->animals = array();
        $this->names = array();
        $this->things = array();
        $this->movies = array();
    }

    public function addRecord($animal, $name, $thing, $movie){
        array_push($this->animals,$animal);
        array_push($this->names,$name);
        array_push($this->things,$thing);
        array_push($this->movies,$movie);
        $this-> notifyObserver();
    }

    public function getData(){
        return array($this->animals, $this->names, $this->things, $this->movies);
    }

}